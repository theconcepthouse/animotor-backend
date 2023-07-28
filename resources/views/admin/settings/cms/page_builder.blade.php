@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">page components  builder</h3>
                            </div><!-- .nk-block-head-content -->

                            <div class="nk-block-head-content">
                                <a href="{{ route('admin.setting.page.edit', $page->id) }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-building"></em><span>Page Builder</span></a>
                           </div>
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->


                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <div class="row-">

                                <form action="{{ route('admin.setting.page.content.store') }}" method="POST" enctype="multipart/form-data">
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


                                    <div class="row gy-4 pt-4">


                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input name="page_id" type="hidden" value="{{ $page->id }}">
                                                    <select name="component_id" class="form-select js-select2" data-ui="xl" id="component_id">
                                                        @foreach($components as $i)
                                                            <option value="{{ $i->id }}">{{ $i->title }}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class="form-label-outlined" for="component_id">{{ ucfirst($title) }}</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group mt-">
                                                <button type="submit" class="btn btn-lg btn-primary">Save </button>
                                            </div>
                                        </div>


                                    </div>


                                </form>


                            </div>


                            <div class="row mt-5">


                                @foreach($data as $item)
                                    @if($item->title)
                                    <div class="col-md-12">
                                <div id="faqs" class="accordion">
                                    <div class="accordion-item">
                                        <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#faq-q{{ $loop->index }}">
                                            <h6 class="title">{{ $item->title }}</h6>
                                            <span class="accordion-icon"></span>
                                        </a>
                                        <div class="accordion-body collapse show_" id="faq-q{{ $loop->index }}" data-bs-parent="#faqs">
                                            <div class="accordion-inner">

                                            </div>
                                        </div>
                                    </div>


                                    <!-- .accordion-item -->
                                </div><!-- .accordion -->
                                    </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>


                        <div class="card">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>


    <script>
        $('.lfm').filemanager('image');
    </script>

@endsection
