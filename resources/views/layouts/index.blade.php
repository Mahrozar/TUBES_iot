<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Data</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- File CSS Eksternal -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
    <!-- Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>Monitoring Network Data</h1>
    </header>

    <!-- Konten Utama Halaman -->
    <main class="main-content">
        <h1>Data Sensor Monitoring</h1>

        <div class="chart-container">
            <!-- Chart Temperature -->
            <div class="card">
                <h2>Temperature</h2>
                <canvas id="temperatureChart" width="350" height="175"></canvas>
            </div>

            <!-- Chart Humidity -->
            <div class="card">
                <h2>Humidity</h2>
                <canvas id="humidityChart" width="350" height="175"></canvas>
            </div>

            <!-- Chart Light Intensity -->
            <div class="card">
                <h2>Light Intensity</h2>
                <canvas id="lightIntensityChart" width="350" height="175"></canvas>
            </div>
        </div>

        <h1>Table Data Sensor Monitoring</h1>

        <!-- Tabel untuk Temperature -->
        <h2>Temperature Data</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if ($item->parameter === 'temperature')
                            <tr>
                                <td>{{ $item->device_id }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel untuk Humidity -->
        <h2>Humidity Data</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if ($item->parameter === 'humidity')
                            <tr>
                                <td>{{ $item->device_id }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel untuk Light Intensity -->
        <h2>Light Intensity Data</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if ($item->parameter === 'light intensity')
                            <tr>
                                <td>{{ $item->device_id }}</td>
                                <td>{{ $item->value }}</td>
                                <td>{{ $item->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Monitoring Network Data .Kelompok iottttyyyyy.</p>
    </footer>

    <!-- File JavaScript Eksternal -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script>
        // Ambil data dari tabel
        const data = @json($data); // Mengambil data dari controller

        // Filter data berdasarkan parameter
        const temperatureData = data.filter(item => item.parameter === 'temperature');
        const humidityData = data.filter(item => item.parameter === 'humidity');
        const lightIntensityData = data.filter(item => item.parameter === 'light intensity');

        // Siapkan data untuk masing-masing grafik
        const temperatureLabels = temperatureData.map(item => new Date(item.created_at).toLocaleString());
        const temperatureValues = temperatureData.map(item => item.value);

        const humidityLabels = humidityData.map(item => new Date(item.created_at).toLocaleString());
        const humidityValues = humidityData.map(item => item.value);

        const lightIntensityLabels = lightIntensityData.map(item => new Date(item.created_at).toLocaleString());
        const lightIntensityValues = lightIntensityData.map(item => item.value);

        // Fungsi untuk membuat grafik
        function createChart(ctx, label, labels, dataValues, color) {
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: label,
                        data: dataValues,
                        backgroundColor: color + '0.2)',
                        borderColor: color + '1)',
                        borderWidth: 1,
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        x: {
                            display: false
                        },  
                        y: {
                            display: false,
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Buat grafik untuk temperature
        const temperatureCtx = document.getElementById('temperatureChart').getContext('2d');
        createChart(temperatureCtx, 'Temperature', temperatureLabels, temperatureValues, 'rgba(255, 99, 132, ');

        // Buat grafik untuk humidity
        const humidityCtx = document.getElementById('humidityChart').getContext('2d');
        createChart(humidityCtx, 'Humidity', humidityLabels, humidityValues, 'rgba(54, 162, 235, ');

        // Buat grafik untuk light intensity
        const lightIntensityCtx = document.getElementById('lightIntensityChart').getContext('2d');
        createChart(lightIntensityCtx, 'Light Intensity', lightIntensityLabels, lightIntensityValues, 'rgba(255, 206, 86, ');
    </script>
</body>
</html>
