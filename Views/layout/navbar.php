<?php if ($_SESSION['user'] == 'owner' && isset($panel)){?>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
        <div class="container my-2">
<?php } else {?>
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg bg-transparent">
<?php }?>
        <i class="fa-solid fa-cow fa-xl text-white"></i>
        <a class="navbar-brand mx-2" href="#">T-COW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-3" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item mx-2">
                    <a href="<?= $baseurl ?>/Views/landing.php" class="nav-link" id="home" aria-current="page">Home</a>
                </li>
                <?php if($_SESSION['user'] == 'owner'){?>
                <li class="nav-item mx-2">
                    <a class="nav-link" id="sapi" href="<?= $baseurl ?>/Views/pages/sapi.php">Sapi</a>
                </li>
                <?php } ?>
                <li class="nav-item mx-2">
                    <a class="nav-link" id="produk" href="<?= $baseurl ?>/Views/pages/pupuk.php">Pupuk</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" id="produk" href="<?= $baseurl ?>/Views/pages/pesanan.php">Pesanan</a>
                </li>
            </ul>
            <a class="btn btn-primary" id="login" href="<?= $baseurl ?>/Views/landing.php?profile=true"><i class="fa fa-user"></i></a>&nbsp;
            <a class="btn btn-danger" id="login" href="<?= $baseurl ?>/Controllers/DataUser.php?act=logout">Logout</a>
        </div>
    </nav>
</div>


  