<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class StudentSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $students = User::where('name', 'LIKE', "%{$query}%")->get();

        return view('student_search', compact('students'));
    }
}
