@extends('admin.layout.app')
@section('content')

    <style>
        .btn, .dual-listbox .dual-listbox__button {
            position: relative;
            letter-spacing: 0.02em;
             display: inline;
            align-items: center;
        }
    </style>

    <div class="nk-content mt-5">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head-content mb-3">
                        <a href="{{ route('admin.driverPcn', $driver->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex">
                            <em class="icon ni ni-arrow-left"></em>
                            <span>Back</span>
                        </a>

                    </div>
                     <div class="container mb-3 mt-4">
                         <h4>Driver Name: {{ $driver->name }}</h4>
                     </div>
                    <div class="components-preview wide-md- mx-auto">

                           <div class="nk-block">

                                <div class="card card-bordered">
                                    <div class="card-inner-group">
                                        <div class="card-inner p-0">

                                            <div class="container mt-5">
                                                <div class="form-container">
                                                    <h3 class="text-center mb-4">PCN Log</h3>
                                                   <form action="{{ route('admin.updateDriverPcn', ['pcnId' => $pcn->id]) }}" method="POST">
                                                       @csrf
                                                       @if(session()->has('error'))
                                                           <div class="alert alert-danger">
                                                               {{ session()->get('error') }}
                                                           </div>
                                                       @endif
                                                       @if(session()->has('message'))
                                                           <div class="alert alert-success">
                                                               {{ session()->get('message') }}
                                                           </div>
                                                       @endif
                                                       <input type="hidden" name="driver_id" value="{{ $driver->id }}">

                                                       <div class="row">
                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="datePostReceived">Date
                                                                   post received</label>
                                                               <input type="date" class="form-control"
                                                                      id="datePostReceived" name="date_post_received"
                                                                      value="{{ old('date_post_received', $pcn->date_post_received ?? '') }}"
                                                                      required>
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="vrm">VRM</label>
                                                               <select name="vrm" class="form-control" id="vrm">
                                                                   @foreach($cars as $item)
                                                                       <option value="{{ $item->registration_number }}"
                                                                           {{ old('vrm', $pcn->vrm ?? '') == $item->registration_number ? 'selected' : '' }}>
                                                                           {{ $item->registration_number }}
                                                                       </option>
                                                                   @endforeach
                                                               </select>
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="pcnNo">PCN no.</label>
                                                               <input type="text" class="form-control" id="pcnNo"
                                                                      name="pcn_no" required placeholder="MUKHTAR-0579"
                                                                      value="{{ old('pcn_no', $pcn->pcn_no ?? '') }}">
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="dateOfIssue">Date of
                                                                   issue</label>
                                                               <input type="date" class="form-control" id="dateOfIssue"
                                                                      name="date_of_issue"
                                                                      value="{{ old('date_of_issue', $pcn->date_of_issue ?? '') }}">
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="dateOfContravention">Date
                                                                   of contravention</label>
                                                               <input type="date" class="form-control"
                                                                      id="dateOfContravention"
                                                                      name="date_of_contravention"
                                                                      value="{{ old('date_of_contravention', $pcn->date_of_contravention ?? '') }}">
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="deadlineDate">Deadline
                                                                   Date</label>
                                                               <input type="date" class="form-control" id="deadlineDate"
                                                                      name="deadline_date"
                                                                      value="{{ old('deadline_date', $pcn->deadline_date ?? '') }}">
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="issuingAuthority">Issuing
                                                                   authority
                                                                   <a href="#" class="btn btn-sm btn-primary"
                                                                      data-bs-toggle="modal"
                                                                      data-bs-target="#exampleModal">Add</a>
                                                               </label>
                                                               <select id="issuingAuthority" name="issuing_authority"
                                                                       class="form-control">
                                                                   @foreach($authority as $item)
                                                                       <option value="{{ $item->name }}"
                                                                           {{ old('issuing_authority', $pcn->issuing_authority ?? '') == $item->name ? 'selected' : '' }}>
                                                                           {{ $item->name }}
                                                                       </option>
                                                                   @endforeach
                                                               </select>
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="priority">Priority</label>
                                                               <select id="priority" name="priority"
                                                                       class="form-control">
                                                                   <option
                                                                       value="Urgent" {{ old('priority', $pcn->priority ?? '') == 'Urgent' ? 'selected' : '' }}>
                                                                       Urgent
                                                                   </option>
                                                                   <option
                                                                       value="High" {{ old('priority', $pcn->priority ?? '') == 'High' ? 'selected' : '' }}>
                                                                       High
                                                                   </option>
                                                                   <option
                                                                       value="Medium" {{ old('priority', $pcn->priority ?? '') == 'Medium' ? 'selected' : '' }}>
                                                                       Medium
                                                                   </option>
                                                                   <option
                                                                       value="Low" {{ old('priority', $pcn->priority ?? '') == 'Low' ? 'selected' : '' }}>
                                                                       Low
                                                                   </option>
                                                               </select>
                                                           </div>
                                                       </div>

                                                       <div class="row">
                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="notes">Notes</label>
                                                               <input type="text" class="form-control" id="notes"
                                                                      name="notes" placeholder="MUKHTAR-0579"
                                                                      value="{{ old('notes', $pcn->notes ?? '') }}">
                                                           </div>

                                                           <div class="form-group col-md-6">
                                                               <label class="form-label" for="status">Status</label>
                                                               <select id="status" name="status" class="form-control">
                                                                   <option value="Send to driver"
                                                                       {{ old('status', $pcn->status ?? '') == 'Send to driver' ? 'selected' : '' }}>
                                                                       Send to driver
                                                                   </option>
                                                                   <option value="Representation made"
                                                                       {{ old('status', $pcn->status ?? '') == 'Representation made' ? 'selected' : '' }}>
                                                                       Representation made
                                                                   </option>
                                                                   <option value="Statutory deceleration"
                                                                       {{ old('status', $pcn->status ?? '') == 'Statutory deceleration' ? 'selected' : '' }}>
                                                                       Statutory deceleration
                                                                   </option>
                                                                   <option value="Paid"
                                                                       {{ old('status', $pcn->status ?? '') == 'Paid' ? 'selected' : '' }}>
                                                                       Paid
                                                                   </option>
                                                                   <option value="Appealed"
                                                                       {{ old('status', $pcn->status ?? '') == 'Appealed' ? 'selected' : '' }}>
                                                                       Appealed
                                                                   </option>
                                                               </select>
                                                           </div>
                                                       </div>

                                                       <div class="m-3 text-center">
                                                           <button type="submit"
                                                                   class="btn btn-custom btn-primary col-lg-6">Next
                                                           </button>
                                                       </div>
                                                   </form>


                                                </div>
                                            </div>

                                            <!-- .nk-tb-list -->
                                        </div>

                                    </div>
                                </div>



                            </div>



                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Issuing Authority</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{ route('admin.storePCNAuthority') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label>Add Issuing Authority</label>
                  <input type="text" name="name" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')


@endsection
