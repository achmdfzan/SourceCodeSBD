<div class="panel panel-default">
    <div class="panel-heading">Kategori Program MBKM</div>
    <div class="panel-body">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>No.</th>
                    <!-- <th>Deskripsi Program</th> -->
                    <th>Kategori Program</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($enters as $enter) : ?>
                    <tr>
                        <td><?= $no; ?>.</td>
                        <td><?= $enter["nama_kategori"]; ?></td>
                        <td><?= $enter["jumlah_mahasiswa"] ?></td>
                        <td><a href="ubah.php?id=<?= $enter["id_kategori"]; ?>"><span class="glyphicon glyphicon-edit" title="Edit Data"></span></a> | <a href="hapus.php?id=<?= $enter["id_kategori"]; ?>"><span class="glyphicon glyphicon-remove" title="Hapus Data" onclick="return confirm('Yakin?')"></span></a> | <a href="detail-mahasiswa.php?id=<?= $enter["id_kategori"]; ?>"><span class="glyphicon glyphicon-info-sign" title="List Mahasiswa"></span><span> List Mahasiswa</span></a></td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- <div class="text-center">
                            <a href="tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                        </div> -->
    </div>
</div>