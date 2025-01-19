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
            'time' => Carbon::now()->toTimeString(),
            'reason' => $request->reason,
        ]);

        return redirect()->route('dashboard')->with('status', 'Late entry recorded successfully!');
    }
}
