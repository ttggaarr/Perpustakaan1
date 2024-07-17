<?php

$id = isset($_GET['id']) ? $_GET['id'] : '';
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$tgl_kembali = isset($_GET['tgl_kembali']) ? $_GET['tgl_kembali'] : '';
$lambat = isset($_GET['lambat']) ? $_GET['lambat'] : '';

if ($lambat > 7) {
    ?>
    <script type="text/javascript">
        alert("Buku yang dipinjam tidak dapat diperpanjang, karena sudah melewati tanggal kembali, kembalikan buku kemudian baru bisa pinjam kembali ");
        window.location.href = "?page=transaksi";
    </script>
    <?php
} else {

    $pecah = explode("-", $tgl_kembali);
    $hari = (int)$pecah[0]; // Konversi ke integer
    $next_7_hari = mktime(0, 0, 0, $pecah[1], $hari + 7, $pecah[2]);
    $hari_next = date("d-m-Y", $next_7_hari);

    $update = $koneksi->query("update tb_transaksi set tgl_kembali='$hari_next' where id='$id'");

    if ($update) {
        ?>
        <script type="text/javascript">
            alert("Berhasil Diperpanjang");
            window.location.href = "?page=transaksi";
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert("Gagal Diperpanjang");
            window.location.href = "?page=transaksi";
        </script>
        <?php
    }
}

?>
