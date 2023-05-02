<?= $this->extend('template/customerLayout') ?>

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

    <div class="container card p-5">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Stock</th>
                <th scope="col">Product Price</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($products)) { ?>
                    <?php foreach($products as $p) { ?>
                        <tr>
                            <td><?= $p['product_id'] ?></td>
                            <td><?= $p['name'] ?></td>
                            <td>
                                <img src="<?= base_url('public/uploads/' . $p['image']) ?>" alt="Uploaded Image" style="max-width: 100px;">
                            </td>
                            <td><?= $p['ammount'] ?></td>
                            <td><?= $p['price'] ?></td>
                            <td class="row gap-2">
                                <a class="col-auto btn btn-info"  href="<?= route_to('admin.update', $p['product_id']) ?>">buy</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
