<?php
session_start();
$panel = 'true';
$user = $_SESSION['data_user'];
require '../layout/header.php';
require '../../Models/UserModel.php';
require '../../Models/PupukModel.php';
require '../../Models/PesananModel.php';
$model = new UserModel();
$pupukModel = new PupukModel();
$pesananModel = new PesananModel(); ?>

<body class="<?= $_SESSION['user'] == 'customer' ? 'bodybg' : ''; ?>">
    <?php require '../layout/navbar.php';
    if ($_SESSION['user'] == 'customer') {
        if (isset($_GET['add'])) {
            $id = $user['id_owner'] ?? $user['id_customer'];
            $row = $pupukModel->findPupuk($_GET['idpupuk']);
    ?>
            <div style="height:100%;background-color: rgba(0, 0, 0, 0.6); font-family: 'Roboto', sans-serif;">
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Tambah pesanan</h4>
                        </div>
                        <div class="card-body">
                            <form action="../../Controllers/DataPesanan.php?act=add" method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="nama">Nama Pupuk</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_pupuk'] ?>" disabled>
                                    <input type="hidden" value="<?= $user['id_owner'] ?? $user['id_customer'] ?>" name="id_user">
                                    <input type="hidden" value="<?= $_GET['idpupuk'] ?>" name="id_pupuk">
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Tanggal Produksi</label>
                                    <input type="date" class="form-control" value="<?= $row['tanggal_produksi'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Ukuran</label>
                                    <input type="text" class="form-control" value="<?= $row['ukuran'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Harga</label>
                                    <input type="number" class="form-control" value="<?= $row['harga'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" name="tgl_pengiriman" id="tgl_pengiriman" value="" required>
                                </div>
                                <div class="form-group my-3 float-end">
                                    <button type="submit" class="btn btn-primary" name="edit">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } elseif (isset($_GET['edit'])) {
            $row = $pesananModel->findPesanan($_GET['idpesanan']);
            ?>
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Edit pesanan</h4>
                        </div>
                        <div class="card-body">
                            <form action="../../Controllers/DataPesanan.php?act=edit" method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="nama">Nama Pupuk</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_pupuk'] ?>" disabled>
                                    <input type="hidden" value="<?= $row['id_pesanan'] ?>" name="id_pesanan">
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Tanggal Produksi</label>
                                    <input type="date" class="form-control" value="<?= $row['tanggal_produksi'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Ukuran</label>
                                    <input type="text" class="form-control" value="<?= $row['ukuran'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Harga</label>
                                    <input type="number" class="form-control" value="<?= $row['harga'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="<?= $row['jumlah'] ?>" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" name="tgl_pengiriman" id="tgl_pengiriman" value="<?= $row['tgl_pengiriman'] ?>" required>
                                </div>
                                <div class="form-group my-3 float-end">
                                    <button type="submit" class="btn btn-primary" name="edit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-body">
                            <h5 class="card-title my-4 mx-4">Data Pesanan</h5>
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Pupuk</th>
                                        <th scope="col">Ukuran</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pengiriman</th>
                                        <th scope="col">Pemesanan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data = $pesananModel->getPesananCust($user['id_customer']);
                                    $i = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?= $row['nama_pupuk'] ?></td>
                                            <td><?= $row['ukuran'] ?></td>
                                            <td><?= "Rp " . number_format($row['harga'], 2, ',', '.') ?></td>
                                            <td><?= $row['jumlah'] ?></td>
                                            <td><?= "Rp " . number_format($row['harga'] * $row['jumlah'], 2, ',', '.') ?></td>
                                            <td><?= $row['status'] ?></td>
                                            <td><?= $row['tgl_pengiriman'] ?></td>
                                            <td><?= $row['tgl_pemesanan'] ?></td>
                                            <td>
                                                <a href="<?= $row['status'] == 'pending' ? 'pesanan.php?edit&idpesanan=' . $row['id_pesanan'] : '#'; ?>" class="btn btn-warning <?= $row['status'] == 'pending' ? '' : 'disabled'; ?>">Edit</a>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        <?php } else { ?>
            <div class="d-flex p-2 justify-content-center">
                <div class="card my-4" style="width: 75rem;">
                    <!-- create form -->
                    <div class="card-body">
                        <h5 class="card-title my-4 mx-4">Data Pesanan
                            <a href="pesanan.php?add=true" class="btn btn-primary float-end">Tambah Data</a>
                        </h5>
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pupuk</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pengiriman</th>
                                    <th scope="col">Pemesanan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $data = $pesananModel->getAll();
                                $i = 1;
                                foreach ($data as $row) {
                                ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?= $row['nama_pupuk'] ?></td>
                                        <td><?= $row['ukuran'] ?></td>
                                        <td><?= "Rp " . number_format($row['harga'], 2, ',', '.') ?></td>
                                        <td><?= $row['jumlah'] ?></td>
                                        <td><?= "Rp " . number_format($row['harga'] * $row['jumlah'], 2, ',', '.') ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><?= $row['tgl_pengiriman'] ?></td>
                                        <td><?= $row['tgl_pemesanan'] ?></td>
                                        <td>
                                            <a href="pesanan.php?show&idpesanan=<?= $row['id_pesanan'] ?>" class="btn btn-primary">Show</a>
                                            <a href="<?= $row['status'] != 'complete' ? 'pesanan.php?edit&idpesanan=' . $row['id_pesanan'] : '#'; ?>" class="btn btn-warning <?= $row['status'] != 'complete' ? '' : 'disabled'; ?>">Update</a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php if (isset($_GET['edit'])) {
                $row = $pesananModel->findPesanan($_GET['idpesanan']);
            ?>
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Update pesanan</h4>
                        </div>
                        <div class="card-body">
                            <form action="../../Controllers/DataPesanan.php?act=editOwner" method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="nama">Nama Pupuk owner</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_pupuk'] ?>" disabled>
                                    <input type="hidden" value="<?= $row['id_pesanan'] ?>" name="id_pesanan">
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Tanggal Produksi</label>
                                    <input type="date" class="form-control" value="<?= $row['tanggal_produksi'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Ukuran</label>
                                    <input type="text" class="form-control" value="<?= $row['ukuran'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Harga</label>
                                    <input type="number" class="form-control" id="hargaEdit" value="<?= $row['harga'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" value="<?= $row['jumlah'] ?>" id="jmlEdit" name="jumlah" <?= $row['status'] != 'pending' ? 'readonly' : ''; ?> required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Total</label>
                                    <input type="number" class="form-control" id="totalEdit" value="<?= $row['harga'] * $row['jumlah'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" value="<?= $row['tgl_pengiriman'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pemesanan</label>
                                    <input type="date" class="form-control" value="<?= $row['tgl_pengiriman'] ?>" name="tgl_pemesanan" <?= $row['status'] != 'pending' ? 'readonly' : ''; ?> required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Status</label>
                                    <select class="form-select" aria-label="Default select example" name="status" require>
                                        <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="process" <?= $row['status'] == 'process' ? 'selected' : ''; ?>>Process</option>
                                        <option value="complete" <?= $row['status'] == 'complete' ? 'selected' : ''; ?>>Complete</option>
                                    </select>
                                </div>
                                <div class="form-group my-3 float-end">
                                    <button type="submit" class="btn btn-primary" name="edit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            <?php } else if (isset($_GET['show'])) {
                $row = $pesananModel->findPesanan($_GET['idpesanan']);
            ?>
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Detail pesanan</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="nama">Nama Pupuk</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_pupuk'] ?>" disabled>
                                    <input type="hidden" value="<?= $row['id_pesanan'] ?>" name="id_pesanan">
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Tanggal Produksi</label>
                                    <input type="date" class="form-control" value="<?= $row['tanggal_produksi'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Ukuran</label>
                                    <input type="text" class="form-control" value="<?= $row['ukuran'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Harga</label>
                                    <input type="number" class="form-control" value="<?= $row['harga'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" value="<?= $row['jumlah'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Total</label>
                                    <input type="number" class="form-control" value="<?= $row['harga'] * $row['jumlah'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" value="<?= $row['tgl_pengiriman'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Status</label>
                                    <input type="text" class="form-control" value="<?= $row['status'] ?>" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Detail pemesan</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="nama">Nama Customer</label>
                                    <input type="text" class="form-control" value="<?= $row['nama_customer'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="<?= $row['jenis_kelamin'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">No Telpon</label>
                                    <input type="text" class="form-control" value="<?= $row['no_telepon'] ?>" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Email</label>
                                    <input type="text" class="form-control" value="<?= $row['email'] ?>" disabled>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } else if (isset($_GET['add'])) {
                $dataPupuk = $pupukModel->getAll();
                $dataCustomer = $model->getAllCust();
            ?>
                <div class="d-flex p-2 justify-content-center">
                    <div class="card my-4" style="width: 75rem;">
                        <div class="card-header">
                            <h4>Tambah pesanan</h4>
                        </div>
                        <div class="card-body">
                            <form action="../../Controllers/DataPesanan.php?act=add" method="POST">
                                <!-- nama admin -->
                                <div class="form-group my-3">
                                    <label for="id_user">Customer</label>
                                    <select class="form-select" aria-label="Default select example" name="id_user" id="customerSelect" required>
                                        <option></option>
                                        <option value="baru">Customer baru</option>
                                        <?php
                                        foreach ($dataCustomer as $cust) {
                                        ?>
                                            <option value="<?= $cust['id_customer']; ?>"><?= $cust['nama_customer']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group my-3 newCust d-none">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama_cust" name="nama" >
                                </div>
                                <div class="form-group my-3 newCust d-none">
                                    <label for="nama">Jenis Kelamin</label>
                                    <input type="text" class="form-control" id="jk_cust" name="jk" >
                                </div>
                                <div class="form-group my-3 newCust d-none">
                                    <label for="nama">No Telpon</label>
                                    <input type="number" class="form-control" id="tlp_cust" name="telp" >
                                </div>
                                <div class="form-group my-3 newCust d-none">
                                    <label for="jumlah">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" >
                                </div>
                                <div class="form-group my-3 newCust d-none">
                                    <label for="jumlah">Password</label>
                                    <input type="text" class="form-control" id="pass" name="password" >
                                </div>

                                <div class="form-group my-3">
                                    <label for="nama">Pupuk</label>
                                    <select class="form-select" aria-label="Default select example" name="id_pupuk" id="idpupuk" required>
                                        <option></option>
                                        <?php
                                        foreach ($dataPupuk as $row) {
                                        ?>
                                            <option value="<?= $row['id_pupuk']; ?>"><?= $row['nama_pupuk']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Tanggal Produksi</label>
                                    <input type="date" class="form-control" id="tgl_produksi" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="nama">Harga</label>
                                    <input type="number" class="form-control" id="harga" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                                </div>
                                <div class="form-group my-3">
                                    <label for="total">Total</label>
                                    <input type="number" class="form-control" id="total" disabled>
                                </div>
                                <div class="form-group my-3">
                                    <label for="tgl_pengiriman">Tanggal Pengiriman</label>
                                    <input type="date" class="form-control" name="tgl_pengiriman" id="tgl_pengiriman" required>
                                </div>
                                <div class="form-group my-3 float-end">
                                    <button type="submit" class="btn btn-primary" name="edit">Pesan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php }
        } ?>
        </div>
        <?php require '../layout/footer.php' ?>
</body>
<script type="text/javascript" src="../../assets/jquery/jquery.min.js"></script>
<script>
    var data_pupuk = [];
    $(document).ready(function() {
        $('#idpupuk').change(function() {
            var id = $(this).val();
            loadData(id);
        });

        $('#customerSelect').change(function() {
            var value = $(this).val();

            if (value == 'baru') {
                $('.newCust').removeClass('d-none');
            } else {
                $('.newCust').addClass('d-none');
            }
        });

        $("#jumlah").keyup(function() {
            var total = $(this).val() * data_pupuk.harga;
            $('#total').val(total);
        });

        $("#jmlEdit").keyup(function() {
            var total = $(this).val() * $('#hargaEdit').val();
            $('#totalEdit').val(total);
        });
    });

    function loadData(id) {
        $.ajax({
            url: "http://localhost/TCow/Controllers/DataPupuk.php?act=getAjax&id=" + id,
            method: 'GET',
            dataType: 'JSON',
            success: function(response) {
                data_pupuk = response.data;
                $('#tgl_produksi').val(response.data.tanggal_produksi);
                $('#ukuran').val(response.data.ukuran);
                $('#harga').val(response.data.harga);
            },
            error: function(xhr) {
                console.log(response);
            }
        });
    };
</script>