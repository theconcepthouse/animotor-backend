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

                                        <div class="col">
                                            <div class="form-group mt-">
                                                <button type="submit" class="btn btn-lg btn-primary">Add </button>

                                                <a target="_blank" href="{{ route('admin.setting.all_blocks') }}" class="btn btn-lg btn-success">View components </a>

                                            </div>
                                        </div>



                                    </div>


                                </form>


                            </div>


                            <div class="row mt-5">


                                @foreach($data as $item)
                                    @if($item->title)
                                    <div class="col-md-12 mt-3">
                                <div id="faqs" class="accordion">
                                    <div class="accordion-item">
                                        <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#faq-q{{ $loop->index }}">
                                            <h6 class="title">{{ $item->title }}</h6>
                                            <span class="accordion-icon"></span>
                                        </a>
                                        <div class="accordion-body collapse show_" id="faq-q{{ $loop->index }}" data-bs-parent="#faqs">
                                            <div class="accordion-inner">

                                                        <form action="{{ route('admin.setting.page.content.update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input name="id" value="{{ $item->id }}" hidden />
                                                        <div class="row">
                                                            @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $item->title,  'colSize' => 'col-md-12', 'fieldName' => 'title','title' => 'Title'])
                                                            @include('admin.partials.form.text', ['attributes' => 'required', 'type' => 'number', 'value' => $item->level,  'colSize' => 'col-md-12 mt-4', 'fieldName' => 'level','title' => 'Level'])

                                                            @if($item->is_shortcode)
                                                                @include('admin.partials.form.text', ['attributes' => 'required', 'value' => $item->content,  'colSize' => 'col-md-12 mt-4', 'fieldName' => 'content','title' => 'Shortcode'])
                                                            @else
                                                                <div class="col-12 mt-4">
{{--                                                                <textarea name="content" id="editor{{ $item->id }}" class="form-control- tinymce-basic_ my_editor">{{ old('content', $item->content) }}</textarea>--}}

                                                                    <textarea name="content" id="editor{{ $item->id }}" class="form-control-  summernote-basic tinymce-basic_">{{ old('content', $item->content) }}</textarea>
                                                                </div>
                                                            @endif


                                                            <div class="form-group mt-3">
                                                                <button type="submit" class="btn btn-lg btn-primary">Update </button>

                                                                <a  data-bs-toggle="modal" href="#{{ 'delete_'.$item->id }}"  class="btn btn-danger btn-lg">Delete</a>

                                                            </div>
                                                        </div>
                                                        </form>

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


    @foreach($data as $item)


        @component('admin.components.delete_modal', [
    'modalId' => 'delete_'.$item->id, // Unique ID for the modal
    'action' => route('admin.setting.page.content.destroy', $item->id), // Form action URL for the delete action
    'message' => 'This page component will be removed permanently.', // Message to display in the modal
])
    @endcomponent

    @endforeach

@endsection

@section('jss')

    <link rel="stylesheet" href="{{ asset('admin/assets/css/editors/summernote.css?ver=3.1.1') }}">
    <script src="{{ asset('admin/assets/js/libs/editors/summernote.js?ver=3.1.1') }}"></script>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

{{--    <link rel="stylesheet" href="{{ asset('admin/assets/css/editors/tinymce.css?ver=3.1.1') }}">--}}
{{--    <script src="{{ asset('admin/assets/js/libs/editors/tinymce.js?ver=3.1.1') }}"></script>--}}

    <script src="{{ asset('admin/assets/js/editors.js?ver=3.1.1') }}"></script>


    <script>
        var editor_config = {
            path_absolute : "/",
            selector: '.my_editor',
            height: '300px',
            extended_valid_elements: 'hr',
            menubar: true,
            content_css : ['/assets/css/main.css'],
            relative_urls: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>

@endsection

@section('js')
{{--    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>--}}
{{--    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>--}}

{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>--}}

<link rel="stylesheet" href="{{ asset('admin/assets/css/editors/summernote.css?ver=3.1.1') }}">
<script src="{{ asset('admin/assets/js/libs/editors/summernote.js?ver=3.1.1') }}"></script>

    <!-- markup -->
{{--    <textarea id="summernote-editor" name="content">{!! old('content', $content) !!}</textarea>--}}

    <!-- summernote config -->
    <script>
        $(document).ready(function(){

            // Define function to open filemanager window
            var lfm = function(options, cb) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
                window.SetUrl = cb;
            };

            // Define LFM summernote button
            var LFMButton = function(context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-picture"></i> ',
                    tooltip: 'Insert image with filemanager',
                    click: function() {

                        lfm({type: 'image', prefix: '/filemanager'}, function(lfmItems, path) {
                            lfmItems.forEach(function (lfmItem) {
                                context.invoke('insertImage', lfmItem.url);
                            });
                        });

                    }
                });
                return button.render();
            };

            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('.summernote-basic').summernote({
                // toolbar: [
                //     ['popovers', ['lfm']],
                // ],
                callbacks: {
                    onInit: function () {
                        // Load custom CSS into the editor
                        loadCustomCss();
                    }

                    // onEnter: function () {
                    //     // Load custom CSS into the editor's iframe
                    //     loadCustomCss();
                    // }
                },
                toolbar: [['style', ['style']], ['popovers', ['lfm']], ['font', ['bold', 'underline', 'strikethrough', 'clear']], ['font', ['superscript', 'subscript']], ['color', ['color']], ['fontsize', ['fontsize', 'height']], ['para', ['ul', 'ol', 'paragraph']], ['table', ['table']],  ['view', ['fullscreen', 'codeview', 'help']]],
                buttons: {
                    lfm: LFMButton
                }
            })

            // function loadCustomCss() {
            //     // Replace 'path/to/custom.css' with the actual path to your custom CSS file
            //     var customCssPath = '/assets/css/main.css';
            //
            //     // Get the iframe where the editor content is displayed
            //     var iframe = $('.summernote-basic').next('.note-editor').find('.note-editing-area').first().prop('ownerDocument').defaultView.frameElement;
            //
            //     // Create a new <link> element and set its attributes
            //     var link = document.createElement('link');
            //     link.href = customCssPath;
            //     link.rel = 'stylesheet';
            //
            //     // Append the link element to the head of the iframe
            //     iframe.contentDocument.head.appendChild(link);
            // }
            function loadCustomCss() {
                // Replace 'path/to/custom.css' with the actual path to your custom CSS file
                var customCssPath = '/assets/css/main.css';

                // Get the style element for custom CSS (if it already exists)
                var customStyle = $('style#customSummernoteStyle');

                // If the style element doesn't exist, create it and append to the head
                if (!customStyle.length) {
                    customStyle = $('<style id="customSummernoteStyle"></style>');
                    $('head').append(customStyle);
                }

                // Fetch the contents of the custom CSS file using AJAX
                $.get(customCssPath, function (cssContent) {
                    // Set the custom CSS content to the style element
                    customStyle.html(cssContent);

                    // Add a class to the Summernote editor's editable area
                    $('.note-editable').addClass('custom-summernote-style');
                });
            }
        });
    </script>
@endsection
