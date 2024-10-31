<!-- resources/views/layouts/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Monitoring Network Data')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="main-content">
        @if(view()->exists($content))
            @include($content, ['data' => $data]) 
        @else
            <p>Selamat datang di Monitoring Data</p> 
        @endif
    </div>

    <div class="footer">
        
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
