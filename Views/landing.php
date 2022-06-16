<?php require 'layout/header.php';
    require '../Models/UserModel.php';
    $model = new UserModel();?>
<?php 
session_start(); 
$user = $_SESSION['data_user'];
?>
<body class="bodybg">
    <div style="height:100%;background-color: rgba(0, 0, 0, 0.6); font-family: 'Roboto', sans-serif;">
        <?php require 'layout/navbar.php' ?>
        <?php if(isset($_GET['profile'])){ 
          $id = $user['id_owner'] ?? $user['id_customer'];
          $row = $model->findAccount($id, $_SESSION['user']);
          ?>
            <div class="d-flex justify-content-center align-items-center " style="height: 500px;">
            <div class="card my-4" style="width: 75rem;">
                <div class="card-body">
                    <h3>Profile User</h3>
                  <div class="row" style="margin-top:5%;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Admin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['nama'] ?? $row['nama_customer']?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['jenis_kelamin'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['no_telepon'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary" href="landing.php?edit=true">Edit</a>
                    </div>
                  </div>
                </div>
            </div>
        <?php }else if(isset($_GET['edit'])){ 
          $id = $user['id_owner'] ?? $user['id_customer'];
          $row = $model->findAccount($id, $_SESSION['user']);
          ?>
            <div class="d-flex p-2 justify-content-center">
            <div class="card my-4" style="width: 75rem;">
            <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="../Controllers/DataUser.php?act=edit&type=<?= $_SESSION['user'] ?>" method="POST">
                        <!-- nama admin -->
                        <div class="form-group my-3">
                            <label for="nama">Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?? $row['nama_customer']; ?>" required>
                            <input type="hidden" value="<?= $user['id_owner'] ?? $user['id_customer'] ?>" name="id_user">
                        </div>
                        <!-- jenis_kelamin -->
                        <div class="form-group my-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <!-- no telepon -->
                        <div class="form-group my-3">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $row['no_telepon']; ?>" required>
                        </div>
                        <!-- email -->
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group my-3 float-end">
                            <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        <?php }else{ ?>
          <div class="d-flex justify-content-center align-items-center text-center mask" style="height: 500px;">
            <div class="text-white">
                <div class="subheading">Welcome to Our Work!</div>
                <div class="heading text-uppercase">Sistem Informasi “T-COW” </div>
                <div class="description">Pengelolaan dan Penjualan Bisnis Pupuk Bio Ternak Berbasis Web Oleh PPL AGRO D7</div>
                <?php if(isset($_SESSION['user'])){
                    if($_SESSION['user'] == 'owner') {?>
                    <a class="btn btn-primary btn-xl text-uppercase" href="pages/sapi.php">Check Data</a>
                <?php }else{ ?>
                    <a class="btn btn-primary btn-xl text-uppercase" href="pages/pupuk.php">Take Me In!</a>
                <?php 
                    }
                } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php require 'layout/footer.php' ?>
</body>