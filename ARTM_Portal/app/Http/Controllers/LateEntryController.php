<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LateEntry;
use Carbon\Carbon;

class LateEntryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        LateEntry::create([
            'user_id' => Auth::id(),
            'date' => Carbon::now()->toDateString(),
            'time' => Carbon::now()->format('h:i:s'), // Original time
            'reason' => $request->reason,
            'status' => 'Waiting', // Set default status to 'waiting'
        ]);

        return redirect()->route('dashboard')->with('status', 'Late entry recorded successfully!');
    }

    public function index()
    {
        $lateEntries = LateEntry::with('user')->get();
        return view('late_slip_requests', compact('lateEntries'));
    }
}
