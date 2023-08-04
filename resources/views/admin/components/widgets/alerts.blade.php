@if(!isApiSet())
<div class="example-alert mb-3">
    <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
        <em class="icon ni ni-cross-circle"></em> <strong>Complete your setup</strong>! One or more API key not set. <a wire:navigate href="{{ route('admin.settings') }}?active=api">FIX HERE</a>  <button class="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif

@if(!isPaymentMethodSet())
<div class="example-alert mb-3">
    <div class="alert alert-fill alert-danger alert-dismissible alert-icon">
        <em class="icon ni ni-cross-circle"></em> <strong>Complete your setup</strong>! No active payment method . <a wire:navigate href="{{ route('admin.settings') }}?active=payment-methods">FIX HERE</a>  <button class="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif


{{--<div class="example-alert mb-3">--}}
{{--    <div class="alert alert-fill alert-warning alert-dismissible alert-icon">--}}
{{--        <em class="icon ni ni-cross-circle"></em> <strong>Invalid SMTP settings</strong>! Fix your SMTP details to enable mail sending . <a wire:navigate href="{{ route('admin.settings') }}?active=smtp">FIX HERE</a>  <button class="close" data-bs-dismiss="alert"></button>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="example-alert mb-3">--}}
{{--    <div class="alert alert-fill alert-warning alert-dismissible alert-icon">--}}
{{--        <em class="icon ni ni-cross-circle"></em> <strong>Task not processing</strong>! Your task scheduler is not running, this will make the app not to function properly <a href="">FIX HERE</a> . <button class="close" data-bs-dismiss="alert"></button>--}}
{{--    </div>--}}
{{--</div>--}}
