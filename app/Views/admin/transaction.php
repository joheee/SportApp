<?= $this->extend('template/adminLayout') ?>

<?= $this->section('inner-content') ?>
<title>Transaction History | Sport App</title>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <span class="navbar-brand mb-0 h1">All Customer Transaction History</span>
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
    <div class="container card p-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Stock</th>
                <th scope="col">Product Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>testing</td>
                    <td>testing</td>
                    <td>testing</td>
                    <td>testing</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
