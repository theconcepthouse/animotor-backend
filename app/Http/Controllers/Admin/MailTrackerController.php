<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MailTracker;
use Illuminate\Http\Request;

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
        $mail_tracker = MailTracker::findOrFail($id);
        return view('admin.mail-tracker.edit', compact('mail_tracker'));
    }
}
