@extends('layouts.index')

@section('title', 'Monitoring Data')

@section('content')
    <h1>Data Monitoring</h1>

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

    <!-- Tabel untuk menampilkan data monitoring -->
    <table>
        <thead>
            <tr>
                <th>Device ID</th>
                <th>Parameter</th>
                <th>Value</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $parameter => $items) <!-- Loop berdasarkan parameter -->
                @foreach ($items as $item) <!-- Loop berdasarkan item per parameter -->
                    <tr>
                        <td>{{ $item['device_id'] }}</td>
                        <td>{{ ucfirst($parameter) }}</td> <!-- Menampilkan nama parameter, seperti 'temperature' atau 'humidity' -->
                        <td>{{ $item['value'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['created_at'])->toFormattedDateString() }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection

<!-- Script untuk grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari controller (menggunakan @json untuk mengonversi data menjadi JSON)
    const data = @json($data);

    // Filter data berdasarkan parameter
    const temperatureData = data.temperature || [];
    const humidityData = data.humidity || [];
    const lightIntensityData = data['light intensity'] || [];

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
                    x: { display: true },
                    y: { display: true, beginAtZero: true }
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
