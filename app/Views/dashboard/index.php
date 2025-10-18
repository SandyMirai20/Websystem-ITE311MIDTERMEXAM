<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="p-4 bg-light rounded">
  <h3 class="mb-1">Welcome, <?= esc($user['name']) ?>!</h3>
  <p class="mb-0">Email: <?= esc($user['email']) ?> | Role: <?= esc(ucfirst($user['role'])) ?></p>
</div>

<div class="row mt-4">
  <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="/profile">Profile</a></div>
  <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="/courses">Courses</a></div>
  <div class="col-md-3"><a class="btn btn-outline-primary w-100" href="/grades">Grades</a></div>
  <div class="col-md-3"><a class="btn btn-outline-danger w-100" href="/logout">Logout</a></div>
</div>
<?= $this->endSection() ?>
