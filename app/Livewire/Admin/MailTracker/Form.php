<?php

namespace App\Livewire\Admin\MailTracker;

use App\Models\MailTracker;
use App\Models\FleetEvent;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Computed;

class Form extends Component
{
    public ?int $mailTrackerId = null;
    public array $mail_tracker = [];
    public array $details = [];


    #[Computed]
    public int $step = 1;

    protected $rules = [
        'mail_tracker.date_post_received' => 'nullable|date',
        'mail_tracker.from' => 'nullable|string|max:255',
        'mail_tracker.reference_no' => 'nullable|string|max:255',
        'mail_tracker.type' => 'nullable|string|max:255',
        'mail_tracker.other' => 'nullable|string|max:255',
        'mail_tracker.deadline_date' => 'nullable|date',
        'mail_tracker.priority' => 'nullable|string|max:255',
        'mail_tracker.notes' => 'nullable|string',
        'mail_tracker.status' => 'nullable|string|max:255',
        'details.task_due_date' => 'nullable|date',
        'details.file_upload_location' => 'nullable|string',
        'details.task_instructions' => 'nullable|string',
        'details.linkup_with' => 'nullable|string',
        'details.notify_to' => 'nullable|string',
        'details.staff_member' => 'nullable|string',
        'details.reminder' => 'nullable|string',
        'details.vehicle_registration_no' => 'nullable|string',
        'details.other' => 'nullable|string',
    ];

    public array $steps = ['Mail Tracker', 'Details'];

    public function saveMailTracker()
    {
        if ($this->step === 1) {
            $this->saveTracker();
            $this->step++;
            return;
        }

        if ($this->step === 2) {
            $this->saveDetails();
            return;
        }

        $this->successMsg();
    }


    public function saveTracker()
    {
//        dd($this->mail_tracker, $this->mailTrackerId);
        $this->validate();

        $tracker = $this->mailTrackerId
            ? MailTracker::findOrFail($this->mailTrackerId)
            : new MailTracker;

        $tracker->mail_tracker = $this->mail_tracker;       // store as JSON
        $tracker->status = $this->mail_tracker['status'] ?? null;
        $tracker->user_id = auth()->id();
        $tracker->save();


        $this->mailTrackerId = $tracker->id;
    }


    public function saveDetails()
    {
        $this->validate();

        $mailTracker = MailTracker::find($this->mailTrackerId);
        if (!$mailTracker) {
            $this->addError('mailTracker', 'Mail Tracker not found.');
            return;
        }

        $mailTracker->details = $this->details;
        $mailTracker->save();

        $this->successMsg();
        $this->redirect('/admin/mail-tracker');
    }

    public function mount(int $mailTrackerId = null): void
    {
        if (!$mailTrackerId) {
            return;
        }

        $tracker = MailTracker::findOrFail($mailTrackerId);

        $this->mail_tracker = (array)$tracker->getAttribute('mail_tracker');
        $this->details = (array)$tracker->getAttribute('details');
        $this->mailTrackerId = (int)$tracker->id;
    }


    public function render()
    {
        return view('livewire.admin.mail-tracker.form');
    }

    private function successMsg()
    {
        $this->js("NioApp.Toast('Successfully saved', 'success', { position: 'top-right' });");
    }
}
