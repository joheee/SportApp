<?= $this->extend('template/adminLayout') ?>

<?= $this->section('inner-content') ?>
<title>Dashboard Admin | Sport App</title>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <span class="navbar-brand mb-0 h1">Sport Equipment</span>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
            </a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="insertClothes.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa-solid fa-shirt"></i> Insert New Clothes</a>
    </div>

    <div class="container card p-5">
        testing 
    </div>
</div>
<?= $this->endSection() ?>
