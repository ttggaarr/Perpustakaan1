<?php
    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT * FROM tb_user WHERE id='$id'");
    $data = $sql->fetch_assoc();
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data Pengguna
    </div> 
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" value="<?php echo $data['username']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="pass" type="Password" id="pass" value="<?php echo $data['password']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input class="form-control" name="nama" id="nama" value="<?php echo $data['nama']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Level Akses</label>
                        <input class="form-control" name="level" id="pass" value="<?php echo $data['level']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Foto</label>
                        <label><img src='images/<?php echo $data['foto']; ?>' width="100" height="75"></label>
                    </div>

                    <div class="form-group">
                        <label>Ganti Foto</label>
                        <input type="file" name="foto" id="foto" />
                    </div>

                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $nama = $_POST['nama'];
    $foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];

    if (!empty($lokasi)) {
        $upload = move_uploaded_file($lokasi, "images/".$foto);
        $sql = $koneksi->query("UPDATE tb_user SET username='$username', password='$pass', nama='$nama', foto='$foto' WHERE id='$id'");
    } else {
        $sql = $koneksi->query("UPDATE tb_user SET username='$username', password='$pass', nama='$nama' WHERE id='$id'");
    }

    if ($sql) {
        ?>
        <script type="text/javascript">
            alert("Data Berhasil Diubah");
            window.location.href="?page=pengguna";
        </script>
        <?php
    }
}
?>
