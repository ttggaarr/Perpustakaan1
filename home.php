<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di Amikom Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #B660CD;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .card {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 20px;
            text-align: center;
            width: 200px;
        }
        .card h3 {
            margin: 0;
            padding: 0;
        }
        .info {
            display: flex;
            justify-content: space-between;
        }
        .info .box {
            background-color: #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 22%;
            text-align: center;
        }
        .info .box h2 {
            margin: 0;
            color: black;
        }
        .table-container {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .chart {
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Selamat Datang di Amikom Book</h1>
    </div>
    <div class="info">
        <div class="box" style="background-color: #EE82EE;">
            <h2>5</h2>
            <p>Jumlah Buku</p>
        </div>
        <div class="box" style="background-color: #BA55D3;">
            <h2>18</h2>
            <p>Jumlah Peminjaman</p>
        </div>
        <div class="box" style="background-color: #9B59B6;">
            <h2>3</h2>
            <p>Jumlah Anggota</p>
        </div>
        <div class="box" style="background-color: #DDA0DD;">
            <h2>2</h2>
            <p>Jumlah Pengguna</p>
        </div>
    </div>
    <div class="container">
        <div class="table-container">
            <h3>Transaksi Peminjaman Baru</h3>
            <table>
                <thead>
                    <tr>
                        <th>Siswa</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Waktu</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tidak ada data tersedia</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="chart">
            <h3>Grafik Peminjaman</h3>
            <!-- Anda dapat menggunakan library chart.js atau lainnya untuk menampilkan grafik -->
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="table-container">
        <h3>Log Aktivitas</h3>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Aktivitas</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Admin</td>
                    <td>Berhasil Login</td>
                    <td>2018-04-11</td>
                    <td>21:47:57</td>
                </tr>
                <tr>
                    <td>Amon</td>
                    <td>Berhasil Logout</td>
                    <td>2018-04-11</td>
                    <td>21:50:15</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['16 February 2018', '05 March 2018', '16 March 2018'],
                datasets: [{
                    label: 'Jumlah Peminjaman',
                    data: [12, 19, 3],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
