// // Inisialisasi grafik
// function initCharts(data) {
//     // Filter data berdasarkan parameter
//     const temperatureData = data.filter(
//         (item) => item.parameter === "temperature"
//     );
//     const humidityData = data.filter((item) => item.parameter === "humidity");
//     const lightIntensityData = data.filter(
//         (item) => item.parameter === "ldr"
//     );

//     // Siapkan data untuk masing-masing grafik
//     const temperatureLabels = temperatureData.map((item) =>
//         new Date(item.created_at).toLocaleString()
//     );
//     const temperatureValues = temperatureData.map((item) => item.value);

//     const humidityLabels = humidityData.map((item) =>
//         new Date(item.created_at).toLocaleString()
//     );
//     const humidityValues = humidityData.map((item) => item.value);

//     const lightIntensityLabels = lightIntensityData.map((item) =>
//         new Date(item.created_at).toLocaleString()
//     );
//     const lightIntensityValues = lightIntensityData.map((item) => item.value);

//     // Fungsi untuk membuat grafik
//     function createChart(ctx, label, labels, dataValues, color) {
//         return new Chart(ctx, {
//             type: "line",
//             data: {
//                 labels: labels,
//                 datasets: [
//                     {
//                         label: label,
//                         data: dataValues,
//                         backgroundColor: color + "0.2)",
//                         borderColor: color + "1)",
//                         borderWidth: 1,
//                         fill: true,
//                         tension: 0.3, // Membuat garis lebih mulus
//                     },
//                 ],
//             },
//             options: {
//                 responsive: true,
//                 plugins: {
//                     legend: { display: false },
//                 },
//                 scales: {
//                     x: {
//                         display: false, // Sembunyikan label di sumbu x
//                     },
//                     y: {
//                         display: false, // Sembunyikan label di sumbu y
//                         beginAtZero: true,
//                     },
//                 },
//             },
//         });
//     }

//     // Buat grafik untuk temperature
//     const temperatureCtx = document
//         .getElementById("temperatureChart")
//         .getContext("2d");
//     createChart(
//         temperatureCtx,
//         "Temperature",
//         temperatureLabels,
//         temperatureValues,
//         "rgba(255, 99, 132, "
//     );

//     // Buat grafik untuk humidity
//     const humidityCtx = document
//         .getElementById("humidityChart")
//         .getContext("2d");
//     createChart(
//         humidityCtx,
//         "Humidity",
//         humidityLabels,
//         humidityValues,
//         "rgba(54, 162, 235, "
//     );

//     // Buat grafik untuk light intensity
//     const lightIntensityCtx = document
//         .getElementById("lightIntensityChart")
//         .getContext("2d");
//     createChart(
//         lightIntensityCtx,
//         "Light Intensity",
//         lightIntensityLabels,
//         lightIntensityValues,
//         "rgba(255, 206, 86, "
//     );
// }
