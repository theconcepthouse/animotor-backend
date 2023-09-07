@extends('frontpage.layouts.return')


@section('content')
    <div class="nk-content " >
        <div class="container-fluid">
            <div class="nk-content-inner">

                <div class="nk-content-body">
                    <div class="components-preview wide-xl mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered-">
                                <a class="mt-3 h6" href="{{ route('booking.view', $carDamageReport->booking_id ) }}">
                                    <-
                                    Back to booking dashboard</a>
                                <h4 class="mt-3">Upload all images</h4>
                                <form class="mt-4" method="post" action="{{ route('vehicle_return.damage_report_images.store') }}">

                                    @csrf
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ formatImagesError($error) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if(session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                    @endif

                                    <div class="row">

                                        <input name="car_damage_report_id" type="hidden" value="{{ $carDamageReport->id }}" />

                                        @foreach($images as $item => $key)
{{--                                            {{ $item }} => {{ $key }}--}}
                                            @include('admin.partials.image-upload', ['field' => "images[$item]", 'id' => 'car_image_'.$item, 'colSize' => 'col-md-4 mt-3', 'image' => old('images.' . $item, $key),'title' => ucfirst(convertToWord($item))])
                                        @endforeach

                                    <div class="col-12 mt-5">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                </form>

                            </div>

                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>

            </div>
        </div>
    </div>
@endsection
