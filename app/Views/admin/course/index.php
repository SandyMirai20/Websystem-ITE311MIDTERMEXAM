<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-3">
  <h4>Students</h4>
  <a class="btn btn-primary" href="/admin/students/create">Add Student</a>
</div>
<div class="table-responsive">
  <table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Year</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($students as $s): ?>
      <tr>
        <td><?= esc($s['id']) ?></td>
        <td><?= esc($s['student_id']) ?></td>
        <td><?= esc($s['name']) ?></td>
        <td><?= esc($s['email']) ?></td>
        <td><?= esc($s['course']) ?></td>
        <td><?= esc($s['year_level']) ?></td>
        <td>
          <a class="btn btn-sm btn-warning" href="/admin/students/edit/<?= $s['id'] ?>">Edit</a>
          <a class="btn btn-sm btn-danger" href="/admin/students/delete/<?= $s['id'] ?>" onclick="return confirm('Delete student?')">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
<?= $this->endSection() ?>
