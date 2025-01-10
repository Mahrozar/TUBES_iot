<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Data</title>

    <!-- Google Fonts -->
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

    <!-- Konten Utama -->
    <main class="main-content">
        <h1>Data Sensor Monitoring</h1>

        <!-- Pesan Error -->
        @if (!empty($error))
            <div class="error">
                <p>{{ $error }}</p>
            </div>
        @endif

        <!-- Chart Container -->
        @if (!empty($data))
            <div class="chart-container">
                <div class="card">
                    <h2>Temperature</h2>
                    <canvas id="temperatureChart" width="350" height="175"></canvas>
                </div>
                <div class="card">
                    <h2>Humidity</h2>
                    <canvas id="humidityChart" width="350" height="175"></canvas>
                </div>
                <div class="card">
                    <h2>Light Density Resistor</h2>
                    <canvas id="ldrChart" width="350" height="175"></canvas>
                </div>
                <div class="card">
                    <h2>Soil Moisture</h2>
                    <canvas id="soilChart" width="350" height="175"></canvas>
                </div>
            </div>

            <!-- Tabel Data -->
            <h1>Table Data Sensor Monitoring</h1>

            <h2>Temperature Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['temperature'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['device_id'] }}</td>
                            <td>{{ $item['value'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Humidity Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['humidity'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['device_id'] }}</td>
                            <td>{{ $item['value'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Light Density Resistor</h2>
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['ldr'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['device_id'] }}</td>
                            <td>{{ $item['value'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h2>Soil Moisture Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Device ID</th>
                        <th>Value</th>
                        <th>Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['soil'] ?? [] as $item)
                        <tr>
                            <td>{{ $item['device_id'] }}</td>
                            <td>{{ $item['value'] }}</td>
                            <td>{{ $item['created_at'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; Monitoring Network Data. Kelompok IoT Team.</p>
    </footer>

    <script>
        @if (!empty($data))
            const data = @json($data);

            // Filter data berdasarkan parameter
            const temperatureData = data['temperature'] || [];
            const humidityData = data['humidity'] || [];
            const ldrData = data['ldr'] || [];
            const soilData = data['soil'] || [];

            // Siapkan data untuk grafik
            const temperatureLabels = temperatureData.map(item => new Date(item.created_at).toLocaleString());
            const temperatureValues = temperatureData.map(item => item.value);

            const humidityLabels = humidityData.map(item => new Date(item.created_at).toLocaleString());
            const humidityValues = humidityData.map(item => item.value);

            const ldrLabels = ldrData.map(item => new Date(item.created_at).toLocaleString());
            const ldrValues = ldrData.map(item => item.value);

            const soilLabels = soilData.map(item => new Date(item.created_at).toLocaleString());
            const soilValues = soilData.map(item => item.value);

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
                            fill: true,
                            tension: 0.3
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: true } },
                        scales: { y: { beginAtZero: true } }
                    }
                });
            }

            createChart(document.getElementById('temperatureChart').getContext('2d'), 'Temperature', temperatureLabels, temperatureValues, 'rgba(255, 99, 132, ');
            createChart(document.getElementById('humidityChart').getContext('2d'), 'Humidity', humidityLabels, humidityValues, 'rgba(54, 162, 235, ');
            createChart(document.getElementById('ldrChart').getContext('2d'), 'LDR', ldrLabels, ldrValues, 'rgba(255, 206, 86, ');
            createChart(document.getElementById('soilChart').getContext('2d'), 'Soil Moisture', soilLabels, soilValues, 'rgba(75, 192, 192, ');
        @endif
    </script>
</body>
</html>
