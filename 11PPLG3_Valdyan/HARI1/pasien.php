<html>
    <head>
        <title>My App | Halaman Utama</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container.fluid">
                    <a href="#" class="navbar-brand">My App</a>
                    <button class="navbar=toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggle-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link" aria-current="page">Pasien</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row mt-3">
                <div class="col-sm">
                    <h3>Tabel Pasien</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table table-striped table-hover tabel-sm">
                        <tr>
                            <th>No</th>
                            <th>ID Pasien</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        include 'koneksi.php';
                        $no = 1;
                        $hasil = $koneksi->query("SELECT * FROM pasien");
                        while ($row = $hasil->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['idPasien']; ?></td>
                            <td><?= $row['nmPasien']; ?></td>
                            <td><?= $row['jk']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td><a href="editpasien.php?edit=<?= $row['idPasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="javascript:void(0);" onclick="hapusData(<?= $no - 1; ?>)" class="btn btn-danger btn-sm">Hapus</a>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <script>
        function hapusData(no) {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = "koneksi.php?hapus=" + no;
            }
        }
    </script>
    </body>
</html>