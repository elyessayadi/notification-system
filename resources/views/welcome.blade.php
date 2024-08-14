<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta name="user-id" content="1">
</head>
<body>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div id="notifications-container"></div>

</body>
</html>
