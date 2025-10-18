<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<div class="text-center mb-4">
  <h2 class="fw-bold" style="letter-spacing:.5px;">Account Login</h2>
  <div class="divider my-3">
    <span><?php $h=(int)date('G'); echo $h<12?'Welcome!':($h<18?'Welcome!':'Welcome!'); ?></span>
  </div>
  </div>

<form method="post" action="<?= site_url('login') ?>" class="mb-3">
  <?= csrf_field() ?>

  <div class="mb-3">
    <label class="form-label">Email</label>
    <div class="input-group input-group-lg">
      <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
      <input type="email" name="email" class="form-control" placeholder="you@example.com" value="<?= old('email') ?>" required>
    </div>
  </div>

  <div class="mb-2">
    <label class="form-label">Password</label>
    <div class="input-group input-group-lg">
      <span class="input-group-text bg-light"><i class="bi bi-lock"></i></span>
      <input type="password" name="password" class="form-control" placeholder="••••••••" required>
    </div>
  </div>

  <button class="btn btn-brand btn-lg w-100" type="submit">
    <i class="bi bi-box-arrow-in-right me-1"></i> Log in
  </button>
</form>


<?= $this->endSection() ?>
