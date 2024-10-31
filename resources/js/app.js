// resources/js/app.js

document.addEventListener("DOMContentLoaded", function () {
    // Menambahkan animasi fade-in ke konten utama dan footer saat dimuat
    const mainContent = document.querySelector(".main-content");
    const footer = document.querySelector(".footer");

    mainContent.style.opacity = "0";
    footer.style.opacity = "0";
    mainContent.style.transition = "opacity 1.5s ease-in-out";
    footer.style.transition = "opacity 1.5s ease-in-out";

    setTimeout(() => {
        mainContent.style.opacity = "1";
        footer.style.opacity = "1";
    }, 100);

    // Efek hover pada teks konten utama
    mainContent.addEventListener("mouseover", (event) => {
        if (event.target.tagName === "P") {
            event.target.style.transition = "color 0.3s ease";
            event.target.style.color = "#007bff"; // Warna teks saat hover
        }
    });

    mainContent.addEventListener("mouseout", (event) => {
        if (event.target.tagName === "P") {
            event.target.style.color = ""; // Kembali ke warna default
        }
    });

    // Efek bouncing pada footer saat di-scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            footer.style.transform = "translateY(-5px)";
            footer.style.transition = "transform 0.2s ease";
        } else {
            footer.style.transform = "translateY(0)";
        }
    });
    // resources/js/app.js

    function showNotification(message) {
        const notification = document.getElementById("notification");
        notification.textContent = message;
        notification.classList.add("show");

        // Menghilangkan notifikasi setelah 3 detik
        setTimeout(() => {
            notification.classList.remove("show");
        }, 3000);
    }

    // Contoh pemanggilan notifikasi saat data baru masuk
    function simulateNewData() {
        // Fungsi ini hanya simulasi, Anda bisa memanggil showNotification() saat data benar-benar masuk
        showNotification("Data baru telah masuk!");
    }

    // Simulasi data masuk setiap 5 detik (bisa diubah sesuai kebutuhan)
    setInterval(simulateNewData, 5000);
});
