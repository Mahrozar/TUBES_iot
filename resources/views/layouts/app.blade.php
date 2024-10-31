<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

    <div class="sidebar">
        <h2>Dashboard</h2>
        <a href="{{ route('overview') }}">Overview</a>
        <a href="{{ route('data-monitoring') }}">Data Monitoring</a>
        <a href="{{ route('settings') }}">Settings</a>
        <a href="{{ route('support') }}">Support</a>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>
