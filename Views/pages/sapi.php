<?php session_start(); 
    $panel = 'true'
?>
<?php require '../layout/header.php'; 
    require '../../Models/SapiModel.php';
    $model = new SapiModel();
?>
<body>
    <?php
    if($_SESSION['user'] == 'owner'){?>
    <?php require '../layout/navbar.php'; ?>

    <!-- content -->
    <div class="d-flex p-2 justify-content-center">
        <div class="card my-4" style="width: 75rem;">
            <?php
            if(isset($_GET['edit'])){
                $id = $_GET['edit'];
                $row = $model->findSapi($id);
                ?>
                <!-- create form -->
                <div class="card-header">
                    <h4>Edit Sapi</h4>
                </div>
                <div class="card-body">
                    <form action="../../Controllers/DataSapi.php?act=edit&id=<?php echo $id; ?>" method="POST">
                        <!-- jenis kelamin -->
                        <div class="form-group my-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>
                        <!-- umur -->
                        <div class="form-group my-3">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" value="<?php echo $row['umur']; ?>" required>
                        </div>
                        <!-- status -->
                        <div class="form-group my-3">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option><?php echo $row['status']; ?></option>
                                <option value="Hidup">Hidup</option>
                                <option value="Mati">Mati</option>
                            </select>
                        </div>
                        <!-- kondisi -->
                        <div class="form-group my-3">
                            <label for="kondisi">Kondisi</label>
                            <select class="form-control" name="kondisi_sapi" id="kondisi_sapi" required>
                                <option><?php echo $row['kondisi_sapi']; ?></option>
                                <option value="Sehat">Sehat</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                        <!-- id owner -->
                        <div class="form-group my-3">
                            <label for="id_owner">ID Owner</label>
                            <input type="number" class="form-control" name="id_owner" id="id_owner" value="<?php echo $row['id_owner']; ?>" required>
                        </div>
                        <!-- submit -->
                        <div class="form-group my-3 float-end">
                            <button type="submit" class="btn btn-primary" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
                <?php
            } else if(isset($_GET['add'])){
                ?>
                <!-- create form -->
                <div class="card-header">
                    <h4>Tambah Sapi</h4>
                </div>
                <div class="card-body">
                    <form action="../../Controllers/DataSapi.php?act=add" method="POST">
                        <!-- jenis kelamin -->
                        <div class="form-group my-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="Jantan">Jantan</option>
                                <option value="Betina">Betina</option>
                            </select>
                        </div>
                        <!-- umur -->
                        <div class="form-group my-3">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" required>
                        </div>
                        <!-- status -->
                        <div class="form-group my-3">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="Hidup">Hidup</option>
                                <option value="Mati">Mati</option>
                            </select>
                        </div>
                        <!-- kondisi -->
                        <div class="form-group my-3">
                            <label for="kondisi">Kondisi</label>
                            <select class="form-control" name="kondisi_sapi" id="kondisi_sapi" required>
                                <option value="Sehat">Sehat</option>
                                <option value="Sakit">Sakit</option>
                            </select>
                        </div>
                        <!-- id owner -->
                        <div class="form-group my-3">
                            <label for="id_owner">ID Owner</label>
                            <input type="number" class="form-control" name="id_owner" id="id_owner" required>
                        </div>
                        <!-- submit -->
                        <div class="form-group my-3 float-end">
                            <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                        </div>
                    </form>
                </div>
                <?php
            }
            else { 
            ?>
            <img style="height:250px;" src="https://www.freewpheaders.com/wp-content/gallery/farm-animals-headers/red-black-angus-cattle-web-header.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title my-4 mx-4">Data Sapi
                    <a href="sapi.php?add=true" class="btn btn-primary float-end">Tambah Data</a>
                </h5>
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Status</th>
                            <th scope="col">Kondisi</th>
                            <th scope="col">ID Owner</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $data = $model->getAll();
                            $i = 1;
                            foreach($data as $row) {
                        ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row['jenis_kelamin']; ?></td>
                            <td><?php echo $row['umur']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['kondisi_sapi']; ?></td>
                            <!-- id owner -->
                            <td><?php echo $row['id_owner']?></td>
                            <td>
                                <a href="sapi.php?edit=<?php echo $row['id_sapi']; ?>" class="btn btn-warning">Edit</a>
                                <a href="../../Controllers/DataSapi.php?act=delete&id=<?php echo $row['id_sapi']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php
    }
    else if ($_SESSION['user'] == 'customer') {
        ?>
        <body class="bodybg">
            <div class="text-center mask" style="height:100%;background-color: rgba(0, 0,0,0); font-family: 'Roboto', sans-serif;">
            <?php require '../layout/navbar.php'; ?>
                <div class="d-flex justify-content-center align-items-center" style="height: 500px;">
                    <div class="card">
                        <img style="height:250px;" src="https://www.freewpheaders.com/wp-content/gallery/farm-animals-headers/red-black-angus-cattle-web-header.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $data = $model->getAll();
                                        $i = 1;
                                        foreach($data as $row) {
                                    ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo $i; ?></th>
                                        <td><?php echo $row['jenis_kelamin']; ?></td>
                                        <td><?php echo $row['umur']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['kondisi_sapi']; ?></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    <?php
    }
    ?>
    <?php require '../layout/footer.php'; ?>
</body>
    
