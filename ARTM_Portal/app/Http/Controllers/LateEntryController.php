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
            'status' => 'Pending', // Set default status to 'waiting'
            'isApproved' => 0, // Set default isApproved to 0
        ]);

        return redirect()->route('dashboard')->with('status', 'Late entry recorded successfully!');
    }

    public function index()
    {
        $lateEntries = LateEntry::with('user')->where('isApproved', 0)->get();
        return view('late_slip_requests', compact('lateEntries'));
        foreach ($lateEntries as $lateEntry) {
            if ($lateEntry->isApproved == 1) {
                $lateEntry->status = 'Approved';
            }
        }

    }

}