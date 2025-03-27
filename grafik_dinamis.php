<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Jumlah Mahasiswa per Jurusan</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

</head>
<body>

    <h1>Grafik Jumlah Mahasiswa per Jurusan</h1>
    <canvas id="myChart"></canvas>
    <br>
    <button onclick="downloadPDF()">Download PDF</button>

    <script>
        <?php
        // Koneksi ke database
        $host = "localhost";
        $user = "root"; // Sesuaikan dengan user database kamu
        $pass = ""; // Jika ada password, isi di sini
        $db = "sql_dump"; // Sesuaikan dengan nama database kamu

        $koneksi = new mysqli($host, $user, $pass, $db);
        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Ambil data jumlah mahasiswa berdasarkan jurusan
        $query = "SELECT jurusan, COUNT(*) AS jumlah FROM mahasiswa GROUP BY jurusan";
        $result = $koneksi->query($query);

        // Siapkan array untuk Chart.js
        $jurusan = [];
        $jumlah = [];

        while ($data = $result->fetch_assoc()) {
            $jurusan[] = $data['jurusan'];
            $jumlah[] = $data['jumlah'];
        }
        ?>

        // Data untuk Chart.js
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($jurusan); ?>,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: <?php echo json_encode($jumlah); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)',
                        'rgba(75, 192, 192, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Fungsi untuk download PDF
        function downloadPDF() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();

            // Ambil elemen canvas
            const canvas = document.getElementById("myChart");
            const imgData = canvas.toDataURL("image/png");

            // Tambahkan gambar ke PDF
            pdf.addImage(imgData, "PNG", 10, 20, 180, 100);

            // Simpan PDF
            pdf.save("chart.pdf");
        }
    </script>

</body>
</html>
