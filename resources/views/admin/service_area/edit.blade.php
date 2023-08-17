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
                                    <h4 class="title nk-block-title">Add new service area</h4>
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.regions.index') }}" wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.regions.index') }}" wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>

                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">

                                            <form action="{{ route('admin.regions.update', $region->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
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


                                                <div class="row gy-4">

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $region->name, 'fieldName' => 'name','title' => 'Name'])
{{--                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $region->timezone,  'fieldName' => 'timezone','title' => 'Timezone'])--}}
                                                    @include('admin.partials.form.select_array', ['attributes' => 'required', 'key' => true ,'colSize' => 'col-md-4', 'fieldName' => 'timezone', 'value' => $region->timezone, 'title' => 'Timezone','options' => $timezones])

                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $region->currency_symbol, 'fieldName' => 'currency_symbol','title' => 'Currency Symbol'])
                                                    @include('admin.partials.form.text', ['attributes' => 'required', 'colSize' => 'col-md-4', 'value' => $region->currency_code,  'fieldName' => 'currency_code','title' => 'Currency code'])


                                                    @include('admin.partials.form.select_w_object', ['attributes' => 'required' ,'colSize' => 'col-md-4', 'fieldName' => 'country_id', 'value' => $region->country_id, 'title' => 'Country','options' => $countries])


                                                    @include('admin.partials.form.select_w_object', ['colSize' => 'col-md-4', 'fieldName' => 'parent_id', 'value' => $region->parent_id, 'title' => 'Region','options' => $regions])


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
                                                            <textarea  type="text" name="coordinates"  id="coordinates" class="form-control">
                                                                @foreach($area['coordinates'] as $key=>$coords)
                                                                    <?php if(count($area['coordinates']) != $key+1) {if($key != 0) echo(','); ?>({{$coords[1]}}, {{$coords[0]}})
                                                                    <?php } ?>
                                                                @endforeach
                                                            </textarea>
                                                        </div>

                                                        <div class="map-warper rounded mt-0">
                                                            <input id="pac-input" class="controls rounded" title="search_your_location_here" type="text" placeholder="search_here"/>
                                                            <div id="map-canvas" class="rounded"></div>
                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="form-group mt-3">
                                                    <button id="reset_btn" type="button" class="btn btn-lg btn-warning">Reset</button>

                                                    <button type="submit" class="btn btn-lg btn-primary">Update record </button>
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

    <script src="https://maps.googleapis.com/maps/api/js?v=3.45.8&key={{ env('MAP_API_KEY') }}&libraries=drawing,places"></script>

    <script>
        auto_grow();
        function auto_grow() {
            let element = document.getElementById("coordinates");
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

    </script>
    <script>
        var map; // Global declaration of the map
        var lat_longs = new Array();
        var drawingManager;
        var lastpolygon = null;
        var bounds = new google.maps.LatLngBounds();
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
            var myLatlng = new google.maps.LatLng({{trim(explode(' ',$region->center)[1], 'POINT()')}}, {{trim(explode(' ',$region->center)[0], 'POINT()')}});
            var myOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

            const polygonCoords = [

                    @foreach($area['coordinates'] as $coords)
                { lat: {{$coords[1]}}, lng: {{$coords[0]}} },
                @endforeach
            ];

            var zonePolygon = new google.maps.Polygon({
                paths: polygonCoords,
                strokeColor: "#050df2",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillOpacity: 0,
            });

            zonePolygon.setMap(map);

            zonePolygon.getPaths().forEach(function(path) {
                path.forEach(function(latlng) {
                    bounds.extend(latlng);
                    map.fitBounds(bounds);
                });
            });


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

            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
                var newShape = event.overlay;
                newShape.type = event.type;
            });

            google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
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

        google.maps.event.addDomListener(window, 'load', initialize);



        function set_all_zones()
        {
            $.get({
                url: '{{route('admin.regions.all_coordinates')}}/{{$region->id}}',
                dataType: 'json',
                success: function (data) {

                    console.log(data);
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
            set_all_zones();
            $("#zone_form").on('keydown', function(e){
                if (e.keyCode === 13) {
                    e.preventDefault();
                }
            })
        });

        $('#reset_btn').click(function(){
            // $('#zone_name').val('');
            // $('#coordinates').val('');
            // $('#min_delivery_charge').val('');
            // $('#delivery_charge_per_km').val('');
            location.reload(true);
        })

    </script>

@endsection
