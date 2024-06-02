<?php
    $nim = isset($_GET['id']) ? $_GET['id'] : null;
    $tampil = null; // Inisialisasi variabel $tampil
    if ($nim) {
        $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE nim = '$nim'");
        if ($sql->num_rows > 0) {
            $tampil = $sql->fetch_assoc();
            $jkl = $tampil['jk'];
            $kelas = $tampil['kelas'];
        }
    }
?>

<div class="panel panel-default">
    <div class="panel-heading">
        Ubah Data
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" value="<?php echo $tampil ? $tampil['nim'] : ''; ?>" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" value="<?php echo $tampil ? $tampil['nama'] : ''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil ? $tampil['tempat_lahir'] : ''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil ? $tampil['tgl_lahir'] : ''; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label class="checkbox-inline">
                            <input type="radio" value="l" name="jk" <?php echo ($tampil && $jkl == 'l') ? "checked" : ""; ?>/> Laki-laki
                        </label>
                        <label class="checkbox-inline">
                            <input type="radio" value="p" name="jk" <?php echo ($tampil && $jkl == 'p') ? "checked" : ""; ?>/> Perempuan
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="if1" <?php echo ($tampil && $kelas == 'if1') ? "selected" : ""; ?>>IF 1</option>
                            <option value="if2" <?php echo ($tampil && $kelas == 'if2') ? "selected" : ""; ?>>IF 2</option>
                            <option value="if3" <?php echo ($tampil && $kelas == 'if3') ? "selected" : ""; ?>>IF 3</option>
                            <option value="if4" <?php echo ($tampil && $kelas == 'if4') ? "selected" : ""; ?>>IF 4</option>
                            <option value="if5" <?php echo ($tampil && $kelas == 'if5') ? "selected" : ""; ?>>IF 5</option>
                            <option value="if6" <?php echo ($tampil && $kelas == 'if6') ? "selected" : ""; ?>>IF 6</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tmpt_lahir = $_POST['tmpt_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $jk = $_POST['jk'];
        $kelas = $_POST['kelas'];

        $sql = $koneksi->query("UPDATE tb_anggota SET nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', kelas='$kelas' WHERE nim='$nim'");
        if ($sql) {
            ?>
            <script type="text/javascript">
                alert("Data Berhasil Diubah");
                window.location.href = "?page=anggota";
            </script>
            <?php
        }
    }
?>
