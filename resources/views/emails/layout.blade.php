<!DOCTYPE html>
<html lang="zxx" class="js">

<head>

    <title>@yield('title')</title>
    <!-- StyleSheets  -->

{{--    <!-- StyleSheets  -->--}}
{{--    <link rel="stylesheet" href="{{ asset('admin/assets/css/dashlite.css?ver=3.1.1') }}">--}}
{{--    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/theme.css?ver=3.1.1') }}">--}}
{{--    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/assets/css/style-email.css') }}">--}}


    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap');
        @import url('https://fonts.googleapis.com/css?family=Nunito:200,300,400,500,600,700,800,900,200i,300i,400i,500i,600i,700i,800i,900i&display=swap');
        body {
            font-family:var(--bs-body-font-family);
            font-size:var(--bs-body-font-size);
            font-weight:var(--bs-body-font-weight);
            line-height:var(--bs-body-line-height);
            color:var(--bs-body-color);
            text-align:var(--bs-body-text-align);
        }
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: var(--bs-body-font-family);
            font-size: var(--bs-body-font-size);
            font-weight: var(--bs-body-font-weight);
            line-height: var(--bs-body-line-height);
            color: var(--bs-body-color);
            text-align: var(--bs-body-text-align);
            background-color: var(--bs-body-bg);
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        body {
            min-width: 320px;
        }

        html {
            font-size: 16px;
        }

        :root {
            --bs-lighter-rgb: 245, 246, 250;
            --bs-body-font-family: Roboto, sans-serif;
            --bs-body-font-size: 0.875rem;
            --bs-body-font-weight: 400;
            --bs-body-line-height: 1.65;
            --bs-body-color: #526484;
            --bs-body-bg: #fff;
            --bs-link-color: #798bff;
            --bs-link-hover-color: #465fff;
        }

        @media (prefers-reduced-motion: no-preference){
            :root {
                scroll-behavior: smooth;
            }
        }

        .card-inner {
            padding: 1.25rem;
        }

        @media (min-width: 576px){
            .card-inner {
                padding: 1.5rem;
            }
        }

        *,:before,:after {
            box-sizing: border-box;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-family: Nunito, sans-serif;
            font-weight: 700;
            line-height: 1.1;
            color: #364a63;
        }

        h4 {
            font-size: 1.25rem;
        }

        h4 {
            letter-spacing: -0.02em;
        }

        @media (min-width: 992px){
            h4 {
                font-size: 1.5rem;
            }
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .text-soft {
            color: #8094ae !important;
        }

        .overline-title {
            font-size: 11px;
            line-height: 1.2;
            letter-spacing: 0.2em;
            color: #8094ae;
            text-transform: uppercase;
            font-weight: 700;
            font-family: Roboto, sans-serif;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        .email-wraper {
            background: #f5f6fa;
            font-size: 14px;
            line-height: 22px;
            font-weight: 400;
            color: #8094ae;
            width: 100%;
        }

        tbody {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        td {
            border-color: inherit;
            border-style: solid;
            border-width: 0;
        }

        .py-5 {
            padding-top: 2.75rem !important;
            padding-bottom: 2.75rem !important;
        }

        .email-header {
            width: 100%;
            max-width: 620px;
            margin: 0 auto;
        }

        .email-body {
            width: 96%;
            max-width: 620px;
            margin: 0 auto;
            background: #ffffff;
        }

        .email-footer {
            width: 100%;
            max-width: 620px;
            margin: 0 auto;
        }

        .pb-4 {
            padding-bottom: 1.5rem !important;
        }

        .text-center {
            text-align: center !important;
        }

        .px-3 {
            padding-right: 1rem !important;
            padding-left: 1rem !important;
        }

        .pt-3 {
            padding-top: 1rem !important;
        }

        .pb-3 {
            padding-bottom: 1rem !important;
        }

        @media (min-width: 576px){
            .px-sm-5 {
                padding-right: 2.75rem !important;
                padding-left: 2.75rem !important;
            }

            .pt-sm-5 {
                padding-top: 2.75rem !important;
            }
        }

        .pb-2 {
            padding-bottom: 0.75rem !important;
        }

        .pt-4 {
            padding-top: 1.5rem !important;
        }

        @media (min-width: 576px){
            .pb-sm-5 {
                padding-bottom: 2.75rem !important;
            }
        }

        a {
            color: var(--bs-link-color);
            text-decoration: none;
        }

        a {
            transition: color 0.4s, background-color 0.4s, border 0.4s, box-shadow 0.4s;
        }

        .email-wraper a  {
            color: #6576ff;
            word-break: break-all;
        }

        a:hover {
            color: var(--bs-link-hover-color);
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        .email-title {
            font-size: 13px;
            color: #6576ff;
            padding-top: 12px;
        }

        p:last-child {
            margin-bottom: 0;
        }

        h2 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-family: Nunito, sans-serif;
            font-weight: 700;
            line-height: 1.1;
            color: #364a63;
        }

        h2 {
            font-size: 1.75rem;
        }

        h2 {
            letter-spacing: -0.03em;
        }

        @media (min-width: 992px){
            h2 {
                font-size: 2.5rem;
                letter-spacing: -0.03em;
            }
        }

        .email-heading {
            font-size: 18px;
            color: #6576ff;
            font-weight: 600;
            margin: 0;
            line-height: 1.4;
        }

        h2:last-child {
            margin-bottom: 0;
        }

        .email-btn {
            background: #6576ff;
            border-radius: 4px;
            color: #ffffff !important;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            line-height: 44px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            padding: 0 30px;
        }

        .email-heading-s2 {
            font-size: 16px;
            color: #526484;
            font-weight: 600;
            margin: 0;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .link-block {
            display: flex;
        }

        .email-wraper .link-block  {
            display: block;
        }

        .email-note {
            margin: 0;
            font-size: 13px;
            line-height: 22px;
            color: #8094ae;
        }

        .email-copyright-text {
            font-size: 13px;
        }

        ul {
            padding-left: 2rem;
        }

        ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .fs-12px {
            font-size: 12px;
        }

        img {
            vertical-align: middle;
        }

        img {
            max-width: 100%;
        }

        .email-logo {
            height: 40px;
        }

        li {
            list-style: none;
        }

        .email-social li  {
            display: inline-block;
            padding: 4px;
        }

        .email-social li a  {
            display: inline-block;
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background: #ffffff;
        }

        .email-social li a img  {
            width: 30px;
        }


    </style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <div class="nk-wrap ">

            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="content-page wide-md m-auto">
                                @yield('content')
                            </div><!-- .content-page -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->

</body>

</html>
