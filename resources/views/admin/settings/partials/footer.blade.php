<div class="card-inner pt-0">

{{--    <h4 class="mt-3 mb-4">Frontend Footer</h4>--}}

    <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
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
            <br/>
        @endif

        <input name="active_setting" value="footer" type="hidden" />
        <input name="type" value="theme" type="hidden" />

        <div class="row g-3- align-center-">

            <textarea name="frontend_footer" id="footer" class="form-control-  summernote-basic tinymce-basic_">
                @if(strlen(settings('frontend_footer')) > 50)
                    {!! settings('frontend_footer') !!}
                @else
                    {!! default_footer() !!}
                @endif
            </textarea>

        </div>

        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>

@section('js')

    <link rel="stylesheet" href="{{ asset('admin/assets/css/editors/summernote.css?ver=3.1.1') }}">
    <script src="{{ asset('admin/assets/js/libs/editors/summernote.js?ver=3.1.1') }}"></script>

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
