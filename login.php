<?php
error_reporting(0);
ob_start();
session_start();

$koneksi = new mysqli("localhost", "root", "", "db_perpustakaan");

if (isset($_SESSION['admin']) || isset($_SESSION['user'])) {
    header("location:index.php");
} else {
?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>PERPUSTAKAAN</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <style>
            body {
                background-color: #f8f9fa;
            }

            .login-panel {
                margin-top: 25%;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
            }

            .panel-heading {
                text-align: center;
                font-size: 18px;
                font-weight: bold;
            }

            .panel-body {
                padding: 30px;
            }

            .input-group-addon {
                background-color: #007bff;
                color: #fff;
                border: 1px solid #007bff;
            }

            .btn-primary {
                background-color: #007bff;
                border: none;
            }

            .login-image {
                text-align: center;
                margin-bottom: 20px;
            }

            .login-image img {
                max-width: 150px;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <div class="row">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default login-panel">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <br /><br />
                            <h2> LOGIN</h2>
                            <br />
                        </div>
                        <div class="login-image">
                            <img src="images\Logo FP - Copy.png" alt="Login Image">
                        </div>
                        <div class="col-md-12">
                            <br /><br />
                            <h7> Masukan Username dan Password</h7>
                            <br />
                        </div>
                    </div>
                        <div class="panel-body">
                            <form role="form" method="POST">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                    <input type="text" class="form-control" placeholder="Your Username" name="nama" />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Your Password" name="pass" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" name="login" value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPTS - AT THE BOTTOM TO REDUCE THE LOAD TIME -->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>
    </body>

    </html>

    <?php

    if (isset($_POST['login'])) {

        $nama = $_POST['nama'];
        $pass = $_POST['pass'];

        // Periksa nilai $_POST['nama'] dan $_POST['pass'] untuk mencegah SQL Injection

        $nama = $koneksi->real_escape_string($nama);
        $pass = $koneksi->real_escape_string($pass);

        $ambil = $koneksi->query("SELECT * FROM tb_user WHERE username='$nama' AND password='$pass'");
        $data = $ambil->fetch_assoc();
        $ketemu = $ambil->num_rows;

        if ($ketemu >= 1) {

            session_start();

            $_SESSION['username'] = $data['username'];
            $_SESSION['pass'] = $data['password'];
            $_SESSION['level'] = $data['level'];

            if ($data['level'] == "admin") {
                $_SESSION['admin'] = $data['id'];
                header("location:index.php");
            } else if ($data['level'] == "user") {
                $_SESSION['user'] = $data['id'];
                header("location:index.php");
            }
        } else {
    ?>
            <script type="text/javascript">
                alert("Username dan Password Anda Salah");
            </script>
<?php
        }
    }
}
?>
