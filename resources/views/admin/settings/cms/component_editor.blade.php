<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ settings('site_name') }} | Editor</title>

    <link rel="shortcut icon" href="/assets/img/favicon.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        #editor {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>

</head>
<body>
<div class="main-wrapper">

    <header class="header">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg header-nav">
                <div class="navbar-header">
                    <a href="#" class="navbar-brand logo">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                    <a href="#" class="navbar-brand logo-small">
                        <img style="height: 50px" src="{{ settings('light_logo',asset('default/logo.png')) }}" class="img-fluid" alt="Logo">
                    </a>
                </div>

                <ul class="nav header-navbar-rht">
                    <li class="nav-item">
                        <input class="form-control" value="{{ $title }}" name="title" id="content_title" />
                    </li>
                    <li class="nav-item">
                        <button class="nav-link header-login"  onclick="saveContent()"><span><i class="fa-regular fa-save"></i></span>Save changes</button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link header-reg" href="{{ back()->getTargetUrl() }}"><span><i class="fa-solid fa-close"></i></span>Exit builder</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <textarea name="content" id="editor" class="form-control my-editor">{{ old('content', $content) }}</textarea>


</div>

<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;"></path>
    </svg>
</div>


<script src="/assets/js/jquery-3.6.4.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>


<script src="/assets/js/backToTop.js"></script>

<script src="/assets/js/script.js"></script>


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    var editor_config = {
        path_absolute : "/",
        selector: '#editor',
        height: '90vh',
        extended_valid_elements: 'hr',
        menubar: true,
        content_css : ['/assets/css/bootstrap.min.css','/assets/plugins/fontawesome/css/all.min.css',
            '/assets/css/style.css'],
        relative_urls: false,
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

    toastr.options = {
        closeButton: true,
        progressBar: true,
        positionClass: 'toast-bottom-right',
        timeOut: 3000 // 3 seconds
    };

    tinymce.init(editor_config);


    function saveContent() {
        var editorContent = tinymce.get('editor').getContent();

        let id = "{{ $id }}";
        let type = "{{ $type }}"
        let title = $('#content_title').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('admin.setting.editor.store') }}",
            type: 'POST',
            data: {
                content: editorContent,
                id : id,
                type : type,
                title : title,
            },
            success: function(response) {
                // Handle the response from the server
                console.log(response.data)
                toastr.success('Content saved successfully');
            },
            error: function(xhr) {
                // Handle errors
                console.log(xhr.responseText);
            }
        });
    }

</script>




</body>
</html>
