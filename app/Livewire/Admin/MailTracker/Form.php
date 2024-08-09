<?php

namespace App\Livewire\Admin\MailTracker;

use App\Models\FleetEvent;
use App\Models\MailTracker;
use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Form extends Component
{
    public $mailtracker;
    public $mail_tracker = [];
    public $details = [];
    public $status;
    public $mailTrackerId;

    protected $rules = [
        // Rules for Step 1
        'mail_tracker.date_post_received' => 'nullable|date',
        'mail_tracker.from' => 'nullable|string|max:255',
        'mail_tracker.reference_no' => 'nullable|string|max:255',
        'mail_tracker.type' => 'nullable|string|max:255',
        'mail_tracker.other' => 'nullable|string|max:255',
        'mail_tracker.deadline_date' => 'nullable|date',
        'mail_tracker.priority' => 'nullable|string|max:255',
        'mail_tracker.notes' => 'nullable|string',
        'mail_tracker.status' => 'nullable|string|max:255',

        // Rules for Step 2
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

    public array $steps = [
        'Mail Tracker',
        'Details',
    ];

     public function successMsg()
    {
        $this->js("NioApp.Toast('Successfully updated', 'success', {
                                position: 'top-right'
                            });");
    }

    #[Computed]
    public int $step = 1;

    public function goBack(){
        if($this->step > 1){
            $this->step--;
        }
    }

    public function setStep($step)
    {
        $this->step = $step;
    }

     public function saveMailTracker()
    {
        if ($this->step == 1){
            $this->saveTracker();
            return $this->step++;
        }
        if ($this->step == 2){
            $this->saveDetails();
            return $this->step++;
        }
        $this->successMsg();
    }

    public function saveTracker()
    {
        $validatedData = $this->validate();
//        dd($validatedData['mail_tracker']['deadline_date']);
        $mail_tracker = MailTracker::updateOrCreate(
            [
                'mail_tracker' => $this->mail_tracker,
                'status' => $this->status
            ]
        );

        $event = new FleetEvent();
        $event->title = "Mail Tracker Event";
        $event->start_date = $mail_tracker->updated_at;
        $event->end_date = Carbon::parse($mail_tracker->mail_tracker['deadline_date']);
        $event->category = "event-success";
        $event->save();

        if (!$this->mailTrackerId) {
            $this->mailTrackerId = $mail_tracker->id;
        }
        $this->successMsg('Saved successfully.');
    }

   public function saveDetails()
    {
        $validatedData = $this->validate();
        if (!$this->mailTrackerId) {
            $this->addError('mailTracker', 'No Mail Tracker ID provided.');
            return;
        }
        $mail_tracker = MailTracker::find($this->mailTrackerId);
        if (!$mail_tracker) {
            $this->addError('mailTracker', 'Mail Tracker not found.');
            return;
        }

        $mail_tracker->details = $this->details;
        $mail_tracker->save();
        $this->redirect('/admin/mail-tracker');
    }

    public function mount($mailTrackerId = null)
    {
        if ($mailTrackerId) {
            $this->loadMailTracker($mailTrackerId);
        }
    }

    protected function loadMailTracker($mailTrackerId)
    {
        $mailTracker = MailTracker::find($mailTrackerId);
        if ($mailTracker) {
            $this->mail_tracker = $mailTracker->mail_tracker;
            $this->details = $mailTracker->details ?? [];
            $this->status = $mailTracker->status;
            $this->mailTrackerId = $mailTracker->id;
        } else {
            $this->addError('mailTracker', 'Unable to load Mail Tracker.');
        }
    }


    public function render()
    {
        return view('livewire.admin.mail-tracker.form');
    }

}
