@extends('emails.layout')

@section('content')
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <table class="email-wraper">
                <tr>
                    <td class="py-5">
                        <table class="email-header">
                            <tbody>
                            <tr>
                                <td class="text-center pb-4">
                                    <h2 class="text-center"><a href="{{ url('/') }}">{{ settings('site_name') }}</a></h2>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="email-body">
                            <tbody>
                            <tr>
                                <td class="px-3 px-sm-5 pt-3 pt-sm-5 pb-3">
                                    <h2 class="email-heading">{{ $message['title'] }}</h2>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-3 px-sm-5 pb-2">
                                    <p>Hi {{ $user?->name }},</p>
                                    {!! $message['message'] !!}

                                    @if(isset($message['lines']))
                                        @if(count($message['lines']) > 0)
                                            <div style="margin-top: 20px">
                                            @foreach($message['lines'] as $item)
                                                <p>{!! $item !!}</p>
                                            @endforeach
                                            </div>
                                        @endif
                                    @endif



                                   @if(isset($message['link']))
                                       <p style="margin-top: 20px">
                                           <a href="#" class="email-btn">{{ isset($message['link_text']) ? $message['link_text'] : 'View' }}</a>

                                       </p>
                                    @endif
                                </td>
                            </tr>


                            </tbody>
                        </table>
                        <table class="email-footer">
                            <tbody>
                            <tr>
                                <td class="text-center pt-4">
                                    <p class="email-copyright-text">Copyright © {{ date('Y') }} {{ settings('site_name') }}. All rights reserved.</p>

                                    <p class="fs-12px pt-4">This email was sent to you as a registered user of <a href="{{ url('/') }}">{{ settings('site_name') }}</a>.
{{--                                        To update your emails preferences <a href="#">click here</a>--}}
                                        .</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div><!-- .nk-block -->
@endsection
