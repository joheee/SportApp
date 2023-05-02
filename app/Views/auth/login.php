<?= $this->extend('template/layout') ?>

<?= $this->section('content') ?>
<title>Sign In | Sport App</title>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <form method="post" action="<?= route_to('guest.handleLogin') ?>" class="card-body p-5 text-center">

            <h3 class="mb-5">Sign In</h3>

            <div class="form-outline mb-4">
              <input type="email" id="form2Example17" class="form-control form-control-lg" placeholder="email" name="email">
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example27" class="form-control form-control-lg" placeholder="password" name="password"/>
            </div>

            <?php if (session()->has('error')) : ?>
              <div class="alert alert-danger">
                  <?= session('error') ?>
              </div>
            <?php endif ?>
            
            <button class="mb-4 btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <p class="" style="color: #393f81;">Don't have an account? <a href="<?= route_to('guest.register') ?>" style="color: #508bfc;">Sign up here</a></p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?>
