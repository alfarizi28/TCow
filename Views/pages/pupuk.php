<?php session_start();
$panel = 'true'
?>
<?php require '../layout/header.php';
require '../../Models/PupukModel.php';
$model = new PupukModel();
?>

<body>
    <?php
    if ($_SESSION['user'] == 'owner') { ?>
        <?php require '../layout/navbar.php'; ?>

        <!-- content -->
        <div class="d-flex p-2 justify-content-center">
            <div class="card my-4" style="width: 75rem;">
                <?php
                if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $row = $model->findPupuk($id);
                ?>
                    <!-- create form -->
                    <div class="card-header">
                        <h4>Edit Pupuk</h4>
                    </div>
                    <div class="card-body">
                        <form action="../../Controllers/DataPupuk.php?act=edit&id=<?php echo $id; ?>" method="POST">
                            <!-- nama -->
                            <div class="form-group my-3">
                                <label for="nama_pupuk">Nama pupuk</label>
                                <input type="text" class="form-control" name="nama_pupuk" id="nama_pupuk" value="<?php echo $row['nama_pupuk']; ?>" required>
                            </div>
                            <!-- tanggal produksi -->
                            <div class="form-group my-3">
                                <label for="tanggal_produksi">Tanggal Produksi</label>
                                <input type="date" class="form-control" name="tanggal_produksi" id="tanggal_produksi" value="<?php echo $row['tanggal_produksi']; ?>" required>
                            </div>
                            <!-- ukuran -->
                            <div class="form-group my-3">
                                <label for="ukuran">Ukuran</label>
                                <input type="text" class="form-control" name="ukuran" id="ukuran" value="<?php echo $row['ukuran']; ?>" required>
                            </div>
                            <!-- harga -->
                            <div class="form-group my-3">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" value="<?php echo $row['harga']; ?>" required>
                            </div>
                            <!-- stock -->
                            <div class="form-group my-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $row['stock']; ?>" required>
                            </div>
                            <!-- submit -->
                            <div class="form-group my-3 float-end">
                                <button type="submit" class="btn btn-primary" name="add">Simpan</button>
                            </div>
                        </form>
                    </div>
                <?php
                } else if (isset($_GET['add'])) {
                ?>
                    <!-- create form -->
                    <div class="card-header">
                        <h4>Tambah Pupuk</h4>
                    </div>
                    <div class="card-body">
                        <form action="../../Controllers/DataPupuk.php?act=add" method="POST">
                            <!-- nama -->
                            <div class="form-group my-3">
                                <label for="nama_pupuk">Nama Pupuk</label>
                                <input type="text" class="form-control" name="nama_pupuk" id="nama_pupuk" required>
                            </div>
                            <!-- tanggal produksi -->
                            <div class="form-group my-3">
                                <label for="tanggal_produksi">Tanggal Produksi</label>
                                <input type="date" class="form-control" name="tanggal_produksi" id="tanggal_produksi" required>
                            </div>
                            <!-- ukuran -->
                            <div class="form-group my-3">
                                <label for="ukuran">Ukuran</label>
                                <input type="text" class="form-control" name="ukuran" id="ukuran" required>
                            </div>
                            <!-- harga -->
                            <div class="form-group my-3">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" name="harga" id="harga" required>
                            </div>
                            <!-- stock -->
                            <div class="form-group my-3">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" name="stock" id="stock" required>
                            </div>
                            <!-- submit -->
                            <div class="form-group my-3 float-end">
                                <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                            </div>
                        </form>
                    </div>
                <?php
                } else {
                ?>
                    <img style="height:250px;" src="https://berkeluarga.id/media/2021/12/Hunian_Jenis-Pupuk-Organik_Envato-1200x675.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title my-4 mx-4">Data Pupuk
                            <a href="pupuk.php?add=true" class="btn btn-primary float-end">Tambah Data</a>
                        </h5>
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pupuk</th>
                                    <th scope="col">Tanggal Produksi</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = $model->getAll();
                                $i = 1;
                                foreach ($data as $row) {
                                ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $row['nama_pupuk']; ?></td>
                                        <td><?php echo $row['tanggal_produksi']; ?></td>
                                        <td><?php echo $row['ukuran']; ?></td>
                                        <td><?php echo $row['harga']; ?></td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td>
                                            <a href="pupuk.php?edit=<?php echo $row['id_pupuk']; ?>" class="btn btn-warning">Edit</a>
                                            <a href="../../Controllers/DataPupuk.php?act=delete&id=<?php echo $row['id_pupuk']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
    } else if ($_SESSION['user'] == 'customer') {
    ?>

        <body class="bodybg">
            <div class="text-center mask" style="height:100%;background-color: rgba(0, 0,0,0); font-family: 'Roboto', sans-serif;">
                <?php require '../layout/navbar.php'; ?>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3" style="margin: 75px 250px 100px 250px">
                        <?php
                        $data = $model->getAll();
                        $i = 1;
                        foreach ($data as $row) {
                        ?>
                            <div class="col">
                                <div class="card">
                                    <img src="../img/pupuk_16x9.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <h5 class="font-weight-semibold mb-2"> <?= $row['nama_pupuk']; ?> </h5> <span class="text-muted" style="font-size: smaller;">PUPUK UKURAN: <?= $row['ukuran']; ?></span><br><span class="text-muted" style="font-size: smaller;">TANGGAL PRODUKSI: <?= $row['tanggal_produksi']; ?></span>
                                        </div>
                                        <h3 class="mb-0 font-weight-semibold">Rp <?= number_format($row['harga'], 2, ',', '.'); ?></h3>
                                        <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                                        <br>
                                        <a href="pesanan.php?add&idpupuk=<?= $row['id_pupuk'] ?>" class="btn btn-primary"><i class="fa fa-cart-plus mr-2"></i> Beli</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </body>
    <?php
    }
    ?>
    <?php require '../layout/footer.php'; ?>
</body>