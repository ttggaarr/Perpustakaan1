<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

include "function.php";

if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PERPUSTAKAAN</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <style>
        .navbar-headline {
            background-color: white
        }
        .btn-rounded {
            border-radius: 10px; 
            height: 40px;
            font-size: 18px;
        }
        .navbar-header {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 15px; 
            height: 50px; 
            margin-left: 10px;
            margin-top: 10px;
        }
        .navbar-logo {
            height: 40px;
            margin-right: 10px;
        }
        .navbar-text {
            font-size: 24px;
            font-weight: bold;
            color: black;
            margin-left: 10px;
        }
        .navbar {
            height: 70px; 
            background-color: purple;
            border: none;
        }
        .navbar-{
            background-color: purple;
        }
        .navbar-side {
            border:none;
            background-color: #730b63;
            z-index: 1;
            position: absolute;
            width: 260px;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-to" data-toggle="collapse" data-target="#myNavbar"></button>
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <img src="images\Logo FP - Copy.png" alt="Logo" class="navbar-logo">
                <a class="navbar-text" href="index.php">PERPUSTAKAAN</a>
            </div>
            <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                <?php echo date('d-M-Y'); ?> &nbsp; 
                <a href="logout.php" class="btn btn-danger square-btn-adjust btn-rounded">Logout</a>
            </div>
        </nav>   

        <!-- /. NAV TOP  -->
        <nav class=" navbar-side navbar-custom" role="navigation">
            <div class="sidebar-collapse navbar-custom">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-laptop fa-2x"></i> Data Master<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="?page=lokasi"></i> Data Lokasi Buku</a></li>
                            <li><a href="?page=buku"></i> Data Buku</a></li>
                            <li><a href="?page=anggota"></i> Data Anggota</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=transaksi"><i class="fa fa-edit fa-2x"></i></i> Data Transaksi</a>
                    </li>
                    <?php if (isset($_SESSION['admin'])) { ?> 
                    <li>
                        <a href="?page=pengguna"><i class="fa fa-user fa-2x"></i></i> Data Pengguna</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar fa-2x"></i> Laporan<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="?page=buku&aksi=cetak"></i> Laporan Buku</a></li>
                            <li><a href="?page=anggota&aksi=cetak"></i> Laporan Anggota</a></li>
                            <li><a href="?page=transaksi&aksi=cetak"></i> Laporan Transaksi</a></li>
                        </ul>
                    </li>
                    <?php } ?>     
                </ul>
            </div>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : '';
                        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

                        if ($page == "buku") {
                            if ($aksi == "") {
                                include "page/buku/buku.php";
                            } elseif ($aksi== "tambah") {
                                include "page/buku/tambah.php";
                            } elseif ($aksi== "ubah") {
                                include "page/buku/ubah.php";
                            } elseif ($aksi== "hapus") {
                                include "page/buku/hapus.php";
                            } elseif ($aksi== "cetak") {
                                include "page/buku/form_laporan_buku.php";
                            }
                        } elseif ($page == "lokasi") {
                            if ($aksi == "") {
                                include "page/lokasi/lokasi.php";
                            } elseif ($aksi == "tambah") {
                                include "page/lokasi/tambah.php";
                            } elseif ($aksi == "ubah") {
                                include "page/lokasi/ubah.php";
                            } elseif ($aksi == "hapus") {
                                include "page/lokasi/hapus.php";
                            }
                        } elseif ($page == "anggota") {
                            if ($aksi == "") {
                                include "page/anggota/anggota.php";
                            } elseif ($aksi == "tambah") {
                                include "page/anggota/tambah.php";
                            } elseif ($aksi == "ubah") {
                                include "page/anggota/ubah.php";
                            } elseif ($aksi == "hapus") {
                                include "page/anggota/hapus.php";
                            } elseif ($aksi== "cetak") {
                                include "page/anggota/form_laporan_anggota.php";
                            }
                        } elseif ($page == "transaksi") {
                            if ($aksi == "") {
                                include "page/transaksi/transaksi.php";
                            } elseif ($aksi == "tambah") {
                                include "page/transaksi/tambah.php";
                            } elseif ($aksi == "kembali") {
                                include "page/transaksi/kembali.php";
                            } elseif ($aksi == "perpanjang") {
                                include "page/transaksi/perpanjang.php";
                            } elseif ($aksi== "cetak") {
                                include "page/transaksi/form_laporan_transaksi.php";
                            }
                        } elseif ($page == "pengguna") {
                            if ($aksi == "") {
                                include "page/pengguna/pengguna.php";
                            } elseif ($aksi == "tambah") {
                                include "page/pengguna/tambah.php";
                            } elseif ($aksi == "ubah") {
                                include "page/pengguna/ubah.php";
                            } elseif ($aksi == "hapus") {
                                include "page/pengguna/hapus.php";
                            }
                        } elseif ($page == "") {
                            include "home.php";
                        }
                        ?>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS AT THE BOTTOM TO REDUCE THE LOAD TIME -->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
</body>
</html>

<?php
} else {
    header("location:login.php");
}
?>
