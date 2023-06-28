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
    <img height="300"  src="{{ asset('default/success.gif') }}" alt="Centered Image">
</div>
</body>
</html>
