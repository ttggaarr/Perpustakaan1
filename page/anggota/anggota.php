<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Anggota 
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="?page=anggota&aksi=tambah" class="btn btn-success" style="margin-top: 8px;">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tempat Lahir</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th width="19%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = $koneksi->query("SELECT * FROM tb_anggota");

                            if ($sql->num_rows > 0) {
                                while ($data = $sql->fetch_assoc()) {
                                    $jk = ($data['jk'] == 'l') ? "Laki-laki" : "Wanita";
                            ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo htmlspecialchars($data['nim']); ?></td>
                                        <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                        <td><?php echo htmlspecialchars($data['tempat_lahir']); ?></td>
                                        <td><?php echo htmlspecialchars($data['tgl_lahir']); ?></td>
                                        <td><?php echo htmlspecialchars($jk); ?></td>
                                        <td><?php echo htmlspecialchars($data['kelas']); ?></td>
                                        <td>
                                            <a href="?page=anggota&aksi=ubah&id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ubah</a>
                                            <a onclick="return confirm('Anda yakin ingin menghapus?')" href="?page=anggota&aksi=hapus&id=<?php echo $data['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='8'>Tidak ada data dalam tabel</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
