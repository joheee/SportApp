<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<title>Update Product | Sport App</title>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <form method="post" action="<?= route_to('admin.handleUpdate', $product['product_id']) ?>" class="card-body p-5 text-center" enctype="multipart/form-data">

          <h3 class="mb-5">Update Product</h3>
            <div class="form-outline mb-4">
              <input type="text" id="form2Example17" class="form-control form-control-lg" placeholder="name" name="name" value="<?= $product['name'] ?>">
            </div>
            <div class="form-outline mb-4">
              <input type="file" id="form2Example17" class="form-control form-control-lg" placeholder="image" name="image" value="<?= base_url('public/uploads/' . $product['image']) ?>">
            </div>
            <div class="form-outline mb-4">
              <input type="number" id="form2Example17" class="form-control form-control-lg" placeholder="price" name="price" value="<?= intval($product['price']) ?>">
            </div>
            <div class="form-outline mb-4">
              <input type="number" id="form2Example17" class="form-control form-control-lg" placeholder="ammount" name="ammount" value="<?= intval($product['ammount']) ?>">
            </div>

            <?php if (session()->has('error')) : ?>
              <div class="alert alert-danger">
                  <?= session('error') ?>
              </div>
            <?php endif ?>
            
            <button class="mb-4 btn btn-primary btn-lg btn-block" type="submit">Update Product</button>

            <p class="" style="color: #393f81;">Cancel update? <a href="<?= route_to('admin.dashboard') ?>" style="color: #508bfc;">Back to admin page</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
