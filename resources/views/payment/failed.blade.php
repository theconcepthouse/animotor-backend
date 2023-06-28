<!DOCTYPE html>
<html>
<head>
    <title>{{ settings('site_name') }} payment success</title>
</head>
<style>
    .container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>
<body>
<div class="container">
    <img height="200"  src="{{ asset('default/failed.png') }}" alt="Centered Image">
</div>
</body>
</html>
