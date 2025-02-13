<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LateEntry;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lateEntries = LateEntry::where('student_id', $user->student_id)->get();

        return view('dashboard', compact('lateEntries'));
    }
}

