<?= $this->extend('template/customerLayout') ?>

<?= $this->section('inner-content') ?>
<title>Dashboard Admin | Sport App</title>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <span class="navbar-brand mb-0 h1">Your Transaction History</span>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('logged_user')['name'] ?></span>
            </a>
        </li>
    </ul>
</nav>

<div class="container-fluid">

    <div class="container card p-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Ammount</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Total Price per Product</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($transactions as $p) { ?>
                    <tr>
                        <td><?= $p->name ?></td>
                        <td><?= $p->price ?></td>
                        <td><?= $p->ammount ?></td>
                        <td><?= $p->transaction_date ?></td>
                        <td><?= $p->ammount * $p->price ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="mb-4">Total price : <?= $total[0]->total ?></div>

    </div>
</div>
<?= $this->endSection() ?>