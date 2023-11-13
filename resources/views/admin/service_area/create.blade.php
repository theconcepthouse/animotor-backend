@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    @if($is_airport)
                                        <h4 class="title nk-block-title">Add new special area for {{ $region->name }}</h4>
                                    @else
                                        <h4 class="title nk-block-title">Add new service area</h4>
                                    @endif
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.regions.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.regions.index') }}"  wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>

                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.regions.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
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
                                                    <div class="col">
                                                        <div class="row gy-4">

                                                            @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'name','title' => 'Name'])

                                                            @if($is_airport)
                                                                <input type="hidden" name="parent_id" value="{{ $region->id }}">
                                                                <input type="hidden" name="type" value="airport">
                                                                @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'airport_amount','title' => 'Amount'])
                                                                @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'airport_fee_type', 'title' => 'Amount Type','options' => ['percent','flat']])
                                                                @include('admin.partials.form.select_array', ['attributes' => 'required', 'colSize' => 'col-md-3', 'fieldName' => 'airport_fee_mode', 'title' => 'Amount Mode','options' => ['increment','decrement']])

                                                            @else
                                                                <input type="hidden" name="type" value="region">

                                                                @include('admin.partials.form.select_w_object', ['attributes' => 'required' ,'colSize' => 'col-md-6', 'fieldName' => 'country_id', 'title' => 'Country','options' => $countries])
                                                                @include('admin.partials.form.select_array', ['attributes' => 'required', 'key' => true ,'colSize' => 'col-md-6', 'fieldName' => 'timezone', 'title' => 'Timezone','options' => $timezones])

                                                                @include('admin.partials.form.select_w_object', ['colSize' => 'col-md-6', 'fieldName' => 'parent_id', 'title' => 'Region','options' => $regions])

                                                            @endif

                                                            {{--                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4',  'fieldName' => 'timezone','title' => 'Timezone'])--}}
                                                            {{--                                                    @include('admin.partials.form.text', [ 'colSize' => 'col-md-4', 'fieldName' => 'currency_symbol','title' => 'Currency Symbol'])--}}
                                                            {{--                                                    @include('admin.partials.form.text', [ 'colSize' => 'col-md-4', 'fieldName' => 'currency_code','title' => 'Currency code'])--}}
                                                            {{--                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'fieldName' => 'coordinates','title' => 'Coordinates'])--}}

                                                            {{--                                                    @include('admin.partials.form.select', ['attributes' => 'required' ,'colSize' => 'col-md-4', 'fieldName' => 'is_active', 'title' => 'Status','options' => '--}}
                                                            {{--                        <option value="1">Active</option>--}}
                                                            {{--                        <option value="0">Disabled</option>--}}
                                                            {{--                        '])--}}


                                                        </div>
                                                    </div>

                                                    @if(!$is_airport)
                                                        <div class="col-5">
                                                            <div class="row gy-4">

                                                                @include('admin.partials.image-upload',['field' => 'image', 'colSize' => 'col-md-12','id' => 'image','title' => 'Image'])

                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-md-5">
                                                        <div class="zone-setup-instructions">
                                                            <div class="zone-setup-top">
                                                                <h5>Instructions</h5>
                                                                <p class="mt-3">
                                                                    Create zone by click on map and connect the dots together
                                                                </p>
                                                            </div>
                                                            <div class="zone-setup-item">
                                                                <div class="zone-setup-icon">
                                                                    <i class="tio-hand-draw"></i>
                                                                </div>
                                                                <div class="info">
                                                                    Use this to drag map to find proper area
                                                                </div>
                                                            </div>
                                                            <div class="zone-setup-item">
                                                                <div class="zone-setup-icon">
                                                                    <i class="tio-voice-line"></i>
                                                                </div>
                                                                <div class="info">
                                                                    Click this icon to start pin points in the map and connect them to draw a zone . Minimum 3 points required
                                                                </div>
                                                            </div>
                                                            <div class="instructions-image mt-4">
                                                                <img src={{asset('admin/assets/images/instructions.gif')}} alt="instructions">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-xl-7 zone-setup">

                                                        <div class="form-group mb-3 d-none">
                                                            <label class="input-label"
                                                                   for="exampleFormControlInput1">Coordinates<span
                                                                    class="input-label-secondary" title="draw_your_zone_on_the_map">draw your zone on the map</span></label>
                                                            <textarea  type="text" name="coordinates"  id="coordinates"  class="form-control" readonly></textarea>
                                                        </div>

                                                        <div class="map-warper rounded mt-0">
                                                            <input id="pac-input" class="controls rounded" title="search_your_location_here" type="text" placeholder="search_here"/>
                                                            <div id="map-canvas" class="rounded"></div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="form-group mt-3">
                                                    <button id="reset_btn" type="reset" class="btn btn-lg btn-warning">Reset</button>

                                                    <button type="submit" class="btn btn-lg btn-primary">Save record </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->


                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(".popover-wrapper").click(function(){
            $(".popover-wrapper").removeClass("active");
        });
        auto_grow();
        function auto_grow() {
            let element = document.getElementById("coordinates");
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&callback=initialize&libraries=drawing,places&v=3.49"></script>

    <script>
        var map; // Global declaration of the map
        var drawingManager;
        var lastpolygon = null;
        var polygons = [];

        function resetMap(controlDiv) {
            // Set CSS for the control border.
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginTop = "8px";
            controlUI.style.marginBottom = "22px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Reset map";
            controlDiv.appendChild(controlUI);
            // Set CSS for the control interior.
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25)";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "10px";
            controlText.style.lineHeight = "16px";
            controlText.style.paddingLeft = "2px";
            controlText.style.paddingRight = "2px";
            controlText.innerHTML = "X";
            controlUI.appendChild(controlText);
            // Setup the click event listeners: simply set the map to Chicago.
            controlUI.addEventListener("click", () => {
                lastpolygon.setMap(null);
                $('#coordinates').val('');

            });
        }

        function initialize() {

            var myLatlng = { lat: {{ '23.757989' }}, lng: {{ '90.360587' }} };


            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            drawingManager = new google.maps.drawing.DrawingManager({
                drawingMode: google.maps.drawing.OverlayType.POLYGON,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.TOP_CENTER,
                    drawingModes: [google.maps.drawing.OverlayType.POLYGON]
                },
                polygonOptions: {
                    editable: true
                }
            });
            drawingManager.setMap(map);


            //get current location block
            // infoWindow = new google.maps.InfoWindow();
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };
                        map.setCenter(pos);
                    });
            }

            drawingManager.addListener("overlaycomplete", function(event) {
                if(lastpolygon)
                {
                    lastpolygon.setMap(null);
                }
                $('#coordinates').val(event.overlay.getPath().getArray());
                lastpolygon = event.overlay;
                auto_grow();
            });

            const resetDiv = document.createElement("div");
            resetMap(resetDiv, lastpolygon);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);

            // Create the search box and link it to the UI element.
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            let markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };
                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        })
                    );

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        // initialize();


        function set_all_zones()
        {
            $.get({
                url: '{{route('admin.regions.all_coordinates')}}',
                dataType: 'json',
                success: function (data) {
                    for(var i=0; i<data.length;i++)
                    {
                        polygons.push(new google.maps.Polygon({
                            paths: data[i],
                            strokeColor: "#FF0000",
                            strokeOpacity: 0.8,
                            strokeWeight: 2,
                            fillColor: "#FF0000",
                            fillOpacity: 0.1,
                        }));
                        polygons[i].setMap(map);
                    }

                },
            });
        }
        $(document).on('ready', function(){
            // set_all_zones();
        });

    </script>
    <script>
        $('#search-form').on('submit', function () {
            var formData = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post({
                url: '{{route('admin.regions.search')}}',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (data) {
                    $('#set-rows').html(data.view);
                    $('#itemCount').html(data.total);
                    $('.page-area').hide();
                },
                complete: function () {
                    $('#loading').hide();
                },
            });
        });
    </script>
@endsection
