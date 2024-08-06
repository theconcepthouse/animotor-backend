

<div class="nk-block nk-block-lg">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content ">
{{--            <h4 class="title nk-block-title">{{ 'Editing ' .$car->title  }} {{ $steps[$step - 1] }}</h4>--}}
          @if($step > 1)
                <h4 wire:click="goBack" class="title nk-block-title" style="cursor: pointer">
                    <img src="{{ asset('assets/img/icons/arrow-left.png') }}" />
                    {{ $steps[$step - 1] }}
                </h4>
          @endif

        </div>

        <div class="nk-block-head-content">
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.mailTracker.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.mailTracker.index') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
        </div>
{{--        <div class="nk-block-head-content">--}}
{{--            @if($step)--}}
{{--                <h4></h4>--}}
{{--            @endif--}}
{{--        </div>--}}

    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit.prevent="saveMailTracker">
                        <div class="container">
                            <div class="row">
                                <div style="background: transparent" class="step-form">
                                    @foreach($steps as $item)
                                        <div wire:key="{{ $item }}" wire:click="setStep({{ $loop->index + 1 }})"
                                             class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                            @if($step > $loop->index + 1)
                                                <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}" style="height: 30px"/>
                                            @else
                                                <p>{{ $item }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--    {{ $step }}--}}
                        <div class="card card-">
                              <div class="card-inner">
                                  <div class="preview-block ">
                                      @if($step == 1)
                                          <h4 class="text-center">New Customer Details</h4>
                                        <div wire:key="1" class="row mt-3 gy-4">
                                           <div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="dateReceived" class="form-label">Date post received</label>
                                                    <input type="date" class="form-control" id="dateReceived" wire:model="mail_tracker.date_post_received">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="from" class="form-label">From</label>
                                                    <input type="text" class="form-control" id="from" wire:model="mail_tracker.from">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="referenceNo" class="form-label">Reference no.</label>
                                                    <input type="text" class="form-control" id="referenceNo" wire:model="mail_tracker.reference_no">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="type" class="form-label">Type</label>
                                                    <select class="form-select" id="type" wire:model="mail_tracker.type">
                                                        <option selected disabled>Choose...</option>
                                                        <option value="Type 1">Type 1</option>
                                                        <option value="Type 2">Type 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="other" class="form-label">Other</label>
                                                    <input type="text" class="form-control" id="other" wire:model="mail_tracker.other">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="deadlineDate" class="form-label">Deadline Date</label>
                                                    <input type="date" class="form-control" id="deadlineDate" wire:model="mail_tracker.deadline_date">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="priority" class="form-label">Priority</label>
                                                    <select class="form-select" id="priority" wire:model="mail_tracker.priority">
                                                        <option selected disabled>Choose</option>
                                                        <option value="Urgent">Urgent</option>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="status" class="form-label">Status</label>
                                                    <select class="form-select" id="status" wire:model="mail_tracker.status">
                                                        <option selected disabled>Choose</option>
                                                        <option value="Open">Open</option>
                                                        <option value="1">Closed</option>
                                                        <option value="2">Pending</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="notes" class="form-label">Notes</label>
                                                    <textarea class="form-control" id="notes" rows="3" wire:model="mail_tracker.notes"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                        </div>
                                    @endif

                                    @if($step == 2)
                                        <h4 class="text-center">Tracker Details</h4>
                                        <div wire:key="2" class="row justify-content-center">

                                            <div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="taskDueDate" class="form-label">Task due date*</label>
                                                        <input type="date" class="form-control" id="taskDueDate" wire:model="details.task_due_date">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="fileUploadLocation" class="form-label">File upload location</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="fileUploadLocation" placeholder="No Target audience selected" wire:model="details.file_upload_location">
                                                            <button class="btn btn-outline-secondary" type="button">Change</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="taskInstructions" class="form-label">Task instructions*</label>
                                                    <textarea class="form-control" id="taskInstructions" rows="3" wire:model="details.task_instructions"></textarea>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label for="linkupWith" class="form-label">Linkup with</label>
                                                        <input type="text" class="form-control" id="linkupWith" wire:model="details.linkup_with">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="notifyTo" class="form-label">Notify to</label>
                                                        <input type="text" class="form-control" id="notifyTo" wire:model="details.notify_to">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="vehicleRegistrationNo" class="form-label">Vehicle registration no.</label>
                                                        <input type="text" class="form-control" id="vehicleRegistrationNo" wire:model="details.vehicle_registration_no">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label for="staffMember" class="form-label">Staff member</label>
                                                        <input type="text" class="form-control" id="staffMember" wire:model="details.staff_member">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="reminder" class="form-label">Reminder</label>
                                                        <input type="text" class="form-control" id="reminder" wire:model="details.reminder">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="other" class="form-label">Other</label>
                                                        <input type="text" class="form-control" id="other" wire:model="details.other">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                  </div>
                              </div>
                        </div>

                        <div class="row justify-content-center-">
                            <div class="col-lg-8 offset-lg-4">
                                <div class="form-group mt-3 w-100">
                                    <button type="submit" style="display: inline" class="btn btn-lg btn-primary col-4 text-center">{{ $step > 3 ? 'Save' : 'Next' }}</button>
                                </div>
                            </div>

                        </div>

                    </form>

                     <div class="modal fade" id="addItem" tabindex="-1" aria-labelledby="addItemLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <a href="#" class="close" data-bs-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                                <div class="modal-body modal-body-md">
                                   <form wire:submit.prevent="saveOtherRate" method="POST">
                                       @csrf
                {{--                       <input type="hidden" name="driver_id" value="{{ $driver->id }}">--}}
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="num">Item</label>
                                            <input type="text" class="form-control" id="num" wire:model="other_items.0.item" placeholder="Item" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="amount">Unit</label>
                                            <input type="number" class="form-control" id="amount" wire:model="other_items.0.units" placeholder="Unit" required>
                                        </div>

                                         <div class="form-group col-md-4">
                                            <label for="receivedDate">Price</label>
                                            <input type="number" class="form-control" id="receivedDate" wire:model="other_items.0.price" placeholder="Price" required>
                                        </div>


                                    </div>

                                    <button type="submit" class="btn btn-primary">Save Item</button>
                              </form>

                                </div><!-- .modal-body -->
                            </div>
                            <!-- .modal-content -->
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->
