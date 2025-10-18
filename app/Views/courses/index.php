<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h4>Courses</h4>
<div class="table-responsive mt-3">
  <table class="table table-striped table-bordered">
    <thead class="table-light">
      <tr>
        <th>Code</th><th>Name</th><th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($courses as $c): ?>
      <tr>
        <td><?= esc($c['code']) ?></td>
        <td><?= esc($c['name']) ?></td>
        <td><?= esc($c['description']) ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>
