<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LateEntry;
use App\Models\User;
use Carbon\Carbon;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

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
    }

    public function approve($id)
    {
        $lateEntry = LateEntry::findOrFail($id);
        $lateEntry->isApproved = 1;
        $lateEntry->status = 'Approved';
        $lateEntry->save();

        // Set notification for the user
        $user = $lateEntry->user;
        $user->notification = 'Your late slip request has been approved.';
        $user->notification_timestamp = Carbon::now();
        $user->save();

        return redirect()->route('late-slip-requests')->with('status', 'Late slip request approved successfully!');
    }

    public function reject($id)
    {
        $lateEntry = LateEntry::findOrFail($id);
        $lateEntry->isApproved = 3;
        $lateEntry->status = 'Rejected';
        $lateEntry->save();

        return redirect()->route('late-slip-requests')->with('status', 'Late slip request rejected successfully!');
    }

    public function generateQR(Request $request)
    {
        $lateEntry = LateEntry::findOrFail($request->entry_slip);
        $url = route('late-entry.valid', ['id' => $lateEntry->id]);

        $options = new QROptions([
            'version'    => 5,
            'outputType' => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'   => QRCode::ECC_L,
        ]);

        $qrcode = (new QRCode($options))->render($url);

        return view('show_qr', compact('qrcode'));
    }

    public function showValidEntry($id)
    {
        $lateEntry = LateEntry::findOrFail($id);
        return view('late_entry_valid', compact('lateEntry'));
    }
}