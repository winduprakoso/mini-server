<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Laravel Broadcast Redis Socket io
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h1>
            Laravel Broadcast Redis Socket io
        </h1>
        <div id="notification"></div>
    </div>

</body>

<script src="https://raw.githubusercontent.com/glitterlip/echoexample/master/public/js/echocompiled.js"></script>
<script type="text/javascript">
    window.laravel_echo_hostname = "{{ env('LARAVEL_ECHO_HOSTNAME') }}";
</script>
<script src="https://cdn.socket.io/4.8.1/socket.io.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var i = 0;
    window.Echo.channel('user-channel').listen('.UserEvent', (data) => {
        i++;
        $("#notification").append('<div class="alert alert-success">' + i + '. ' + data.title + '</div>');
    });
</script>

</html>