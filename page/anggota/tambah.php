<?php
$tampil = array('jk' => ''); // Inisialisasi $tampil dengan nilai default untuk jenis kelamin

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Proses simpan data jika form disubmit
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tmpt_lahir = $_POST['tmpt_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $simpan = $_POST['simpan'];

    if ($simpan) {
        $sql = $koneksi->query("INSERT INTO tb_anggota (nim, nama, tempat_lahir, tgl_lahir, jk, kelas) VALUES ('$nim', '$nama', '$tmpt_lahir', '$tgl_lahir', '$jk', '$kelas')");

        if ($sql) {
            echo '<script type="text/javascript">';
            echo 'alert("Data Berhasil Disimpan");';
            echo 'window.location.href="?page=anggota";';
            echo '</script>';
        }
    }
}

// Mengambil data dari database untuk diubah
$nim = isset($_GET['nim']) ? $_GET['nim'] : null;
if ($nim) {
    $sql = $koneksi->query("SELECT * FROM tb_anggota WHERE nim = '$nim'");
    if ($sql->num_rows > 0) {
        $tampil = $sql->fetch_assoc(); // Mengisi variabel $tampil dengan data dari database
    }
}
?>

<script type="text/javascript">
    function validasi(form){
        // Validasi form
        // ...
    }
</script>

<div class="panel panel-default">
    <div class="panel-heading">
        Tambah Data Anggota
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control" name="nim" id="nim" value="<?php echo isset($tampil['nim']) ? $tampil['nim'] : ''; ?>" readonly />
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" name="nama" id="nama" value="<?php echo isset($tampil['nama']) ? $tampil['nama'] : ''; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input class="form-control" name="tmpt_lahir" id="tmpt_lahir" value="<?php echo isset($tampil['tempat_lahir']) ? $tampil['tempat_lahir'] : ''; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="date" name="tgl_lahir" id="tgl" value="<?php echo isset($tampil['tgl_lahir']) ? $tampil['tgl_lahir'] : ''; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br/>
                        <label class="radio-inline">
                            <input type="radio" value="l" name="jk" <?php echo (isset($tampil['jk']) && $tampil['jk'] == 'l') ? "checked" : ""; ?>/> Laki-laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" value="p" name="jk" <?php echo (isset($tampil['jk']) && $tampil['jk'] == 'p') ? "checked" : ""; ?>/> Perempuan
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <select class="form-control" name="kelas">
                            <option value="">== Pilih Kelas ==</option>
                            <option value="if1" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if1') ? "selected" : ""; ?>>IF 1</option>
                            <option value="if2" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if2') ? "selected" : ""; ?>>IF 2</option>
                            <option value="if3" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if3') ? "selected" : ""; ?>>IF 3</option>
                            <option value="if4" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if4') ? "selected" : ""; ?>>IF 4</option>
                            <option value="if5" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if5') ? "selected" : ""; ?>>IF 5</option>
                            <option value="if6" <?php echo (isset($tampil['kelas']) && $tampil['kelas'] == 'if6') ? "selected" : ""; ?>>IF 6</option>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
