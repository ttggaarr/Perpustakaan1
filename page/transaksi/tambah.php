<?php
$pinjam = date("d-m-Y");
$tuju_hari = mktime(0,0,0,date("n"),date("j")+365,date("Y"));
$kembali = date("d-m-Y", $tuju_hari);
?>

<div class="panel panel-default">
<div class="panel-heading">
    Tambah Data Transaksi
</div> 
<div class="panel-body">
    <div class="row">
    <div class="col-md-12">

    <form method="POST" action="#">

        <div class="form-group">
            <label> Judul Buku</label>
            <select class="form-control" name="judul">
                <option>== Pilih ==</option>
                <?php
                    $query = $koneksi->query("SELECT * FROM tb_buku ORDER by id_buku");
                    
                    while ($judul=$query->fetch_assoc()) {
                        echo "<option value='".$judul['id_buku'].".".$judul['judul']."'>".$judul['judul']."</option>";
                    }
                ?>
            </select>
        </div>  

        <div class="form-group">
            <label>NIM</label>
            <input class="form-control" type="text" name="nim" required />
        </div>

        <div class="form-group">
            <label>Nama</label>
            <input class="form-control" type="text" name="nama" required />
        </div>

        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input class="form-control" type="text" name="pinjam" value="<?php echo $pinjam; ?>" readonly />
        </div>

        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
        </div>

        <div>
            <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            <input type="reset" name="reset" value="Reset" class="btn btn-warning">
        </div>
    </div>

    </form>
    </div>
 </div>  
 </div>  
 </div>

<?php
if (isset($_POST['simpan'])) 
{
    $tgl_pinjam = $_POST['pinjam'];
    $tgl_kembali = $_POST['kembali'];

    $dapat_buku = $_POST['judul'];
    $pecah_buku = explode(".", $dapat_buku);
    $id_buku = $pecah_buku[0];
    $judul = $pecah_buku[1];

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];

    $query = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku = '$id_buku'");
    while ($hasil = $query->fetch_assoc()) {
        $sisa = $hasil['jumlah_buku'];

        $cek = $koneksi->query("SELECT * FROM tb_transaksi WHERE nim='$nim' AND id_buku='$id_buku'");
        $num1 = $cek->num_rows;

        if ($sisa == 0) {
            echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
        } elseif ($num1 > 0) {
            echo "<script>alert('Anda sudah meminjam buku yang sama');</script>";
            echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
        } else {
            $qt = $koneksi->query("INSERT INTO tb_transaksi (id_buku, judul, nim, nama, tgl_pinjam, tgl_kembali, status) VALUES ('$id_buku', '$judul', '$nim', '$nama', '$tgl_pinjam', '$tgl_kembali', 'Pinjam')");
            $qu = $koneksi->query("UPDATE tb_buku SET jumlah_buku = (jumlah_buku - 1) WHERE id_buku = '$id_buku'");

            if ($qt && $qu) {
                echo "<script>alert('Transaksi Sukses');</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
            } else {
                echo "<script>alert('Transaksi Gagal');</script>";
                echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
            }
        }
    }
}
?>
