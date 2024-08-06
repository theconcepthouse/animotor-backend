<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailTrackerController extends Controller
{
    public function index()
    {
        $mailTrackers = MailTracker::latest()->get();
        return view('admin.mail-tracker.index', compact('mailTrackers'));
    }

    public function create()
    {
        return view('admin.mail-tracker.create');
    }

    public function edit($id)
    {
        $mailtracker = MailTracker::findOrFail($id);
        return view('admin.mail-tracker.edit', compact('mailtracker'));
    }

    public function destroy($id)
    {
        $mailtracker = MailTracker::find($id);
        $mailtracker->delete();
        return redirect()->back()->with('success', 'Mail Tracker has been deleted');
    }
}
