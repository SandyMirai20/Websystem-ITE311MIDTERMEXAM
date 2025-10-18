<?php $session = session(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Portal - <?= $title ?? 'Dashboard' ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --primary-color: #0b0b8b;
      --primary-hover: #0a0a7a;
    }
    .navbar-dark.bg-primary {
      background-color: var(--primary-color) !important;
    }
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }
    .btn-primary:hover, .btn-primary:focus {
      background-color: var(--primary-hover);
      border-color: var(--primary-hover);
    }
    .nav-pills .nav-link.active {
      background-color: var(--primary-color);
    }
    .text-primary {
      color: var(--primary-color) !important;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="/dashboard">
      <img src="https://rmmc.edu.ph/public/images/high_quality_logo.png" alt="Logo" style="height: 30px; margin-right: 10px;">
      <span>RMMC</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <?php if ($session->get('isLoggedIn')): ?>
          <?php if ($session->get('role') === 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="/student/dashboard">Dashboard</a></li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
      <ul class="navbar-nav">
        <?php if ($session->get('isLoggedIn')): ?>
          <li class="nav-item"><span class="navbar-text me-3"><?php echo esc($session->get('name')); ?></span></li>
          <li class="nav-item"><a class="btn btn-outline-light btn-sm" href="<?= site_url('logout') ?>">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="btn btn-outline-light btn-sm me-2" href="<?= site_url('login') ?>">Login</a></li>
          <li class="nav-item"><a class="btn btn-primary btn-sm" href="<?= site_url('register') ?>">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('errors')): $errs = session()->getFlashdata('errors'); ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach ($errs as $e): ?><li><?= esc($e) ?></li><?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
  <?php endif; ?>

  <?= $this->renderSection('content') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
