<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 Data Transaksi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Terlambat</th>
                                <th width="21%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                $no = 1;
                                $sql = $koneksi->query("SELECT * FROM tb_transaksi WHERE status='pinjam'");

                                while ($data = $sql->fetch_assoc()) {
                                    $id_buku = $data['id_buku'];
                                    $nim = $data['nim'];
                                    
                                    $jbuku = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku='$id_buku'");
                                    $jjbuku = $jbuku->fetch_assoc();

                                    $anggotaa = $koneksi->query("SELECT * FROM tb_anggota WHERE nim='$nim'");
                                    $show = $anggotaa->fetch_assoc();

                            ?>

                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $jjbuku['judul']; ?></td>
                                <td><?php echo $show['nim']; ?></td>
                                <td><?php echo $show['nama']; ?></td>
                                <td><?php echo $data['tgl_pinjam']; ?></td>
                                <td><?php echo $data['tgl_kembali']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td>
                                    <?php
                                    $tanggal_dateline = $data['tgl_kembali'];
                                    $tgl_kembali = date('Y-m-d');
                                    $lambat = terlambat($tanggal_dateline, $tgl_kembali);

                                    if ($lambat > 0) {
                                        echo "<font color='red'>$lambat hari</font>";
                                    } else {
                                        echo "$lambat hari";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>&judul=<?php echo $jjbuku['judul']; ?>" class="btn btn-info">Kembali</a>
                                    <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $jjbuku['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali']; ?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger">Perpanjang</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
