<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LateEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboard extends Controller
{
    public function index()
    {
        /* TO BE IMPLEMENTED
        $userList = user::orderBy('name', DESC);
        if(request()->has('search')) */

        if (Auth::check()) {
            $usertype = Auth::user()->usertype;

            if ($usertype == 'student') {
                return redirect()->route('dashboard');
            } elseif ($usertype == 'admin' && $usertype == 'superadmin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect('/');
    }

    public function adminDashboard()
    {
        $students = User::where('usertype', 'student')
            ->withCount(['lateEntries' => function ($query) {
                $query->where('isApproved', 1);
            }])
            ->get();

        return view('admin.admin_dashboard', compact('students'));
    }

    public function showStudentLateEntries($id)
    {
        $student = User::findOrFail($id);
        $lateEntries = LateEntry::where('user_id', $id)->where('isApproved', 1)->get();
        return view('admin.student_late_entries', compact('student', 'lateEntries'));
    }

    public function createAdmin()
    {
        return view('admin.create_admin');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'usertype' => 'admin',
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin created successfully.');
    }

    public function createStudent()
    {
        return view('admin.create_student');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => 'student',
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'Student created successfully!');
    }

    public function monitor()
    {
        $data = LateEntry::selectRaw('DATE_FORMAT(date, "%Y-%m") as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [$item->month, (int) $item->count];
            });

        return view('linechart', compact('data'));
    }
}