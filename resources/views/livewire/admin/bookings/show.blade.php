<div class="nk-content-body">

    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title"> <strong class="text-primary small">{{ $booking->reference }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>{{ __('admin.booked_on') }} : <span class="text-base">{{ $booking->created_at->format('d-M-Y H:i:s') }}</span></li>
                    </ul>

                    @if($booking->is_confirmed)
                        <p class="text-success"><strong>{{ __('admin.booking_confirmed') }}</strong></p>
                        <p class="text-success"><strong>{{ __('admin.confirmation_no') }} : {{ $booking->confirmation_no }}</strong></p>
                    @else

                    <p class="text-danger">{{ __('admin.booking_not_confirmed_please_confirm_booking') }}</p>
                    @endif
                </div>
            </div>
            <div class="nk-block-head-content">
                @if(!$booking->is_confirmed)
                    <a  data-bs-toggle="modal" href="#{{ 'delete_'.$booking->id }}"  class="btn btn-danger">Confirm Booking</a>
                @endif
                @if($booking->is_confirmed)
                    <button class="btn btn-success">Booking Confirmed</button>
                @endif
                <a wire:navigate href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.bookings.index')  }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>{{ __('admin.back') }}</span></a>
                <a  wire:navigate href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.bookings.index')  }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>



            </div>
        </div>
    </div><!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card card-bordered">
            <div class="card-aside-wrap">
                <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-md" data-content="userAside" data-toggle-screen="md" data-toggle-overlay="true" data-toggle-body="true">
                    <div class="card-inner-group" data-simplebar>
                        <div class="card-inner">

                            <div class="user-card user-card-s2">
                                <div class="user-avatar lg bg-primary">
                                    <img src="{{ $booking?->customer?->avatar }}" />
                                </div>
                                <div class="user-info">
                                    <div class="badge bg-outline-light rounded-pill ucap">{{ __('admin.customer') }}</div>
                                    <h5 class="text-capitalize">{{ $booking?->customer?->name }}</h5>
                                    <span class="sub-text">{{ $booking?->customer?->email }}</span>
                                    <span class="sub-text">{{ $booking?->customer?->phone }}</span>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="overline-title-alt mb-2">{{ __('admin.booking_status') }}</div>
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <form method="POST" action="{{ route('admin.bookings.update_status') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" name="id" value="{{ $booking->id }}" />
                                                    <div class="form-group">
                                                        <label class="form-label" for="fuel_type">{{ __('admin.booking_status') }}</label>
                                                        <div class="form-control-wrap">
                                                            <select name="status" class="form-select form-control form-control-lg" id="fuel_type">
                                                                    <option {{ $booking->status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                                                    <option {{ $booking->status == 'completed' ? 'selected' : '' }}  value="completed">Completed</option>
                                                            </select>
                                                            @error("booking.status") <span class="invalid">{{ $message }}</span>@enderror

                                                        </div>
                                                    </div>


                                                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-12 mt-3', 'value' => $booking->picked,'fieldName' => 'picked','title' => __('admin.vehicle_picked'),'options' => ['yes','no']])

                                                    @include('admin.partials.form.textarea', ['colSize' => 'col-md-12 mt-3 mb-3', 'value' => $booking->comment, 'fieldName' => 'comment','title' => __('admin.status_comment')])


                                                    <div class="form-group mt-3">
                                                        <button type="submit" class="btn btn-lg btn-primary">{{ __('admin.update') }}</button>
                                                    </div>

                                                </div>
                                            </form>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->


                        <div class="card-inner">
                            <div class="overline-title-alt mb-2">{{ __('admin.pickup_location') }}</div>
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <div class="">
                                                {{ $booking->pick_location }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="overline-title-alt mb-2">{{ __('admin.pickup_date_time') }}</div>
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <div class="">
                                                {{ $booking->pick_up_date }} / {{ $booking->pick_up_time }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                        <div class="card-inner">
                            <div class="overline-title-alt mb-2">{{ __('admin.dropoff_date_time') }}</div>
                            <div class="profile-balance">
                                <div class="profile-balance-group gx-4">
                                    <div class="profile-balance-sub">
                                        <div class="profile-balance-amount">
                                            <div class="">
                                                {{ $booking->drop_off_date }} / {{ $booking->drop_off_time }}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->


                        <div class="card-inner">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="profile-stats">
                                        <span class="amount">{{ $booking->currency }}{{ $booking->grand_total }}</span>
                                        <span class="sub-text">{{ __('admin.grand_total') }}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="profile-stats">
                                        <span class="amount">{{ $booking->currency }}{{ $booking->tax }}</span>
                                        <span class="sub-text">{{ __('admin.tax') }}</span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="profile-stats">
                                        <span class="amount">{{ $booking->discount }} %</span>
                                        <span class="sub-text">{{ __('admin.discount') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .card-inner -->
                </div><!-- .card-aside -->

                <div class="card-content">
                    <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#info"><span>{{ __('admin.other_details') }}</span></a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-bs-toggle="tab" href="#info"><span>{{ __('admin.booking_not_confirmed') }}</span></a>--}}
{{--                        </li>--}}

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <div class="card-inner pt-0">
                                <div class="nk-block">
                                    <div class="nk-block-head">
                                        <h5 class="title">{{ __('admin.personal_information') }}</h5>
                                    </div><!-- .nk-block-head -->
                                    <div class="profile-ud-list">

                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">

                                                <span class="profile-ud-label">{{ __('admin.booking_status') }}</span>
                                                <span class="profile-ud-value">{{ $booking->status }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.payment_status') }}</span>
                                                <span class="profile-ud-value">{{ $booking->payment_status }}</span>

                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.payment_method') }}</span>
                                                <span class="profile-ud-value">{{ $booking->payment_method }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.service_area') }}</span>
                                                <span class="profile-ud-value">{{ $booking?->region?->name ?? __('admin.not_set') }}</span>
                                            </div>
                                        </div>

                                    </div><!-- .profile-ud-list -->
                                    <div class="nk-block-head mt-4">
                                        <h5 class="title">{{ __('admin.billing_information') }}</h5>
                                    </div><!-- .nk-block-head -->
                                    <div class="profile-ud-list">

                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.base_price') }}</span>
                                                <span class="profile-ud-value">{{ $booking->currency }}{{ $booking->fee }}</span>
                                            </div>

                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.tax') }}</span>
                                                <span class="profile-ud-value">{{ $booking->currency }}{{ $booking->tax }}</span>
                                            </div>
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.discount') }}</span>
                                                <span class="profile-ud-value">{{ $booking->currency }}{{ $booking->discount }}</span>
                                            </div>
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">{{ __('admin.grand_total') }}</span>
                                                <span class="profile-ud-value">{{ $booking->currency }}{{ $booking->grand_total }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div>
                        </div><!--tab pan -->

                    </div><!-- .tab-content -->
                </div>

            </div><!-- .card-aside-wrap -->
        </div><!-- .card -->
    </div><!-- .nk-block -->


    @component('admin.components.delete_modal', [
    'modalId' => 'delete_'.$booking->id, // Unique ID for the modal
    'button' => 'Yes confirm it',
    'method' => 'POST',
    'title' => 'Are you sure you want to confirm this booking?',
    'action' => route('admin.bookings.confirm', $booking->id), // Form action URL for the delete action
    'message' => 'This booking will be confirmed and mail sent to customer.', // Message to display in the modal
])
    @endcomponent

</div>



