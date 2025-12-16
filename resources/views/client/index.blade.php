<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DVINGOLD</title>
    <link rel="icon" type="image/png" href="client/icons/favicon.png">
    @vite(['resources/js/app.js'])
    @routes
</head>
<body>
    @inertia
</body>
</html>
