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
        $lateEntries = LateEntry::where('user_id', $user->id)->get();

        return view('dashboard', compact('lateEntries'));
    }
}
