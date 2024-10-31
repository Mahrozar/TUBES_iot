<!-- resources/views/monitoring/data.blade.php -->

<h1>Data Monitoring</h1>

<!-- Tambahkan tag canvas untuk grafik -->
<div class="card">
    <canvas id="monitoringChart" width="400" height="200"></canvas>
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
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->device_id }}</td>
                <td>{{ $item->parameter }}</td>
                <td>{{ $item->value }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Tambahkan script untuk grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Ambil data dari tabel
    const data = @json($data);

    // Siapkan data untuk grafik
    const labels = data.map(item => new Date(item.created_at).toLocaleString());
    const dataValues = data.map(item => item.value);

    // Dapatkan konteks dari canvas
    const ctx = document.getElementById('monitoringChart').getContext('2d');
    const monitoringChart = new Chart(ctx, {
        type: 'line', // Jenis grafik
        data: {
            labels: labels, // Label untuk sumbu X
            datasets: [{
                label: 'Parameter Value',
                data: dataValues, // Data untuk sumbu Y
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Timestamp'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Value'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>
