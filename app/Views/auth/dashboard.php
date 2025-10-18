<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<?php
$isLoggedIn = (bool) session()->get('isLoggedIn');
$role       = session()->get('role') ?? 'student';
$name       = session()->get('name') ?? 'User';
?>

<?php if (! $isLoggedIn): ?>
  <div class="alert alert-warning">Please <a href="/login">login</a> to view the dashboard.</div>
<?php else: ?>
  <div class="p-4 bg-light rounded mb-4">
    <h3 class="mb-1">Welcome, <?= esc($name) ?>!</h3>
    <p class="mb-0">Role: <?= esc(ucfirst($role)) ?></p>
  </div>

  <?php
    $role = strtolower((string) $role);
    if ($role === 'admin') {
        echo view('admin/dashboard', ['name' => $name]);
    } else {
        echo view('student/dashboard', ['name' => $name]);
    }
  ?>
<?php endif; ?>

<?= $this->endSection() ?>
