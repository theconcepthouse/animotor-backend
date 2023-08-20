@extends('frontpage.layouts.return')


@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-xl mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="card card-bordered-">
                                <form class="nk-stepper stepper-init is-alter nk-stepper-s1" action="#" id="stepper-create-project">
                                    <div class="row g-0 col-sep col-sep-md col-sep-xl">
                                        <div class="col-md-4 col-xl-4">
                                            <div class="card-inner">
                                                <ul class="nk-stepper-nav nk-stepper-nav-s1 stepper-nav is-vr">
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Paint & bodywork</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Wheels & tyres</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Windscreens</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Mirrors</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Dash</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Interior</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Exterior</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Handbook</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Spare Wheels</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Fuel cap</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Aerial</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Floor mat</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="step-item">
                                                            <div class="step-text">
                                                                <div class="lead-text">Tools</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-xl-8">
                                            <div class="card-inner">
                                                <div class="nk-stepper-content">
                                                    <div class="nk-stepper-steps stepper-steps">
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Is there any damage to the paint or bodywork</h4>
                                                            <p>Damage includes rust, dent, holes, chips and scratches of any size
                                                                <br>
                                                                Make sure to check all bodywork panels, including:
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Bumpers</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Doors</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Doors Pillars</span></a></li>
                                                                    </ul>
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <ul  class="link-list-opt no-bdr">
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Bumpers</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Doors</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Doors Pillars</span></a></li>
                                                                    </ul>
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <h4 class="nk-block-title fw-bold">How many panel is damaged</h4>
                                                            <p>Panels include: Door pillars (between doors), roof, bonnet, bumpers, etc
                                                            </p>

                                                            <form action="">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap number-spinner-wrap">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                                            <input type="number" class="form-control number-spinner" value="2">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 mt-4">
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Type Of Damage</label>
                                                                            <p>Largest damage for panel 1*</p>
                                                                            <div class="form-control-wrap ">
                                                                                <div class="form-control-select">
                                                                                    <select class="form-control" id="default-06">
                                                                                        <option value="default_option">Default Option</option>
                                                                                        <option value="option_select_name">Option select name</option>
                                                                                        <option value="option_select_name">Option select name</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="form-group">
                                                                            <p>Largest damage for panel 2*</p>
                                                                            <div class="form-control-wrap ">
                                                                                <div class="form-control-select">
                                                                                    <select class="form-control" id="default-07">
                                                                                        <option value="default_option">Default Option</option>
                                                                                        <option value="option_select_name">Option select name</option>
                                                                                        <option value="option_select_name">Option select name</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Any damage to your alloy wheels. wheels trim or tyres?</h4>
                                                            <p>
                                                                Let us know if the alloys or wheel trims are scuffled or the tyres are worn/punctured
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>
                                                            <form action="">
                                                                <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                                                <div class="col-sm-12 ">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Scuffed Alloy</label>
                                                                        <p>How many alloy are scuffed</p>
                                                                        <div class="form-control-wrap number-spinner-wrap">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                                            <input type="number" class="form-control number-spinner" value="2">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Worn Tyre</label>
                                                                        <p>How many tyre are blow the 1.6mm</p>
                                                                        <div class="form-control-wrap number-spinner-wrap">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-minus" data-number="minus"><em class="icon ni ni-minus"></em></button>
                                                                            <input type="number" class="form-control number-spinner" value="2">
                                                                            <button class="btn btn-icon btn-outline-light number-spinner-btn number-plus" data-number="plus"><em class="icon ni ni-plus"></em></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">I there any windscreen or rear window damage?</h4>
                                                            <p>
                                                                This include anything from a small stone chip to a large crack
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <form action="">
                                                                <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="preview-block">
                                                                        <div class="custom-control custom-checkbox checked">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                                            <label class="custom-control-label" for="customCheck1">Chipped or cracked driver side</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="custom-control custom-checkbox checked mt-2 mb-2">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                                            <label class="custom-control-label" for="customCheck2">Chipped or cracked passenger side</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="custom-control custom-checkbox checked">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                            <label class="custom-control-label" for="customCheck3">Chipped or cracked rear window</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Are there any problems with the mirrors?</h4>
                                                            <p>
                                                                This includes electrical faults or if the glass or cover is scratched and/ or missing.
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>
                                                            <form action="">
                                                                <h4 class="nk-block-title fw-bold mt-3">What's the damage?</h4>
                                                                <p>Please select from the following:</p>
                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="preview-block">
                                                                        <strong class="mb-3">Mirror electronics</strong><br>
                                                                        <div class="custom-control custom-checkbox checked">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                            <label class="custom-control-label" for="customCheck4">Faulty</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="preview-block mt-4">
                                                                        <strong class="mb-3">Mirror glass</strong><br>
                                                                        <div class="custom-control custom-radio checked mt-2">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                                            <label class="custom-control-label" for="customCheck5">One scratched or missing</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="custom-control custom-radio checked mt-2">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                            <label class="custom-control-label" for="customCheck6">One scratched or missing</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="preview-block mt-4">
                                                                        <strong class="mb-3">Mirror Cover</strong><br>
                                                                        <div class="custom-control custom-radio checked mt-2">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                                            <label class="custom-control-label" for="customCheck7">One scratched or missing</label>
                                                                        </div>
                                                                        <br>
                                                                        <div class="custom-control custom-radio checked mt-2">
                                                                            <input type="checkbox" class="custom-control-input" id="customCheck8">
                                                                            <label class="custom-control-label" for="customCheck8">One scratched or missing</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Are any of the following warning lights on?</h4>
                                                            <p>
                                                                Check your dashboard (while the engine is running ) for the following warnings:
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Service due</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Oil warning</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Engine management</span></a></li>
                                                                        <li><a ><em class="icon ni ni-check"></em><span>Airbag warning</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card card-bordered">
                                                                <div class="card-inner">
                                                                    <p>Tip: Make sure your mileage is exact so that we can give you a guaranteed price.</p>
                                                                    <form action="">
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="form-control-wrap">
                                                                                    <p style="text-align: left">80000 miles</p>
                                                                                    <div class="input-group">
                                                                                        <input type="text" class="form-control" placeholder="8000">
                                                                                        <div class="input-group-append">
                                                                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Which lights are still on?</h4>
                                                            <p>
                                                                Please select from the following:
                                                            </p>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="custom-control custom-radio checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck9">
                                                                        <label class="custom-control-label" for="customCheck9">Service due</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-radio checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck10">
                                                                        <label class="custom-control-label" for="customCheck10">Oil warning</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-radio checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck11">
                                                                        <label class="custom-control-label" for="customCheck11">Engine management</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-radio checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck12">
                                                                        <label class="custom-control-label" for="customCheck12">Airbag warning</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-radio checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck13">
                                                                        <label class="custom-control-label" for="customCheck13">ABS</label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Any seat, carpet or upholstery damage?</h4>
                                                            <p>
                                                                Let us know if there are any stains, tears or burns to the interior.
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">What’s the damage?</h4>
                                                            <p>
                                                                Please select from the following:
                                                            </p>
                                                            <form action="">
                                                                <div class="preview-block mt-4">

                                                                    <div class="custom-control custom-checkbox checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck14">
                                                                        <label class="custom-control-label" for="customCheck14">Has stains</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-checkbox checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck15">
                                                                        <label class="custom-control-label" for="customCheck15">Has tears</label>
                                                                    </div>
                                                                    <br>
                                                                    <div class="custom-control custom-checkbox checked mt-2">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck16">
                                                                        <label class="custom-control-label" for="customCheck16">Has burns</label>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Exterior is clean?</h4>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile">
                                                                                    <label class="form-file-label" for="customFile">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Handbook?</h4>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile2">
                                                                                    <label class="form-file-label" for="customFile2">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea2">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea2"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Spare Wheels?</h4>

                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFilesp">
                                                                                    <label class="form-file-label" for="customFilesp">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textareaspa">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textareaspa"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Fuel cap?</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile3">
                                                                                    <label class="form-file-label" for="customFile3">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea3">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea3"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Aerial?</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile4">
                                                                                    <label class="form-file-label" for="customFile4">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea4">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea4"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Floor mat?</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile5">
                                                                                    <label class="form-file-label" for="customFile5">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea5">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea5"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="nk-stepper-step">
                                                            <h4 class="nk-block-title fw-bold">Tools?</h4>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-secondary btn-lg mt-3">yes</a>
                                                                </div>
                                                                <div class="col-6">
                                                                    <a href="" class="btn btn-outline-secondary btn-lg mt-3">No</a>
                                                                </div>
                                                            </div>

                                                            <h4 class="nk-block-title fw-bold mt-3">Upload images and write your description?</h4>
                                                            <form action="">
                                                                <div class="preview-block mt-4">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label">Upload Images</label>
                                                                            <div class="form-control-wrap">
                                                                                <div class="form-file">
                                                                                    <input type="file" class="form-file-input" id="customFile6">
                                                                                    <label class="form-file-label" for="customFile6">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label class="form-label" for="default-textarea6">Description</label>
                                                                            <div class="form-control-wrap">
                                                                                <textarea class="form-control no-resize" id="default-textarea6"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <ul class="nk-stepper-pagination pt-4 gx-4 gy-2 stepper-pagination">
                                                        <li class="step-prev"><button class="btn btn-dim btn-primary">Prev</button></li>
                                                        <li class="step-next"><button class="btn btn-primary">Next</button></li>
                                                        <li class="step-submit"><button class="btn btn-primary">Submit</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>
@endsection
