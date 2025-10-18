<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<h4>Add Student</h4>
<form method="post" action="/admin/students/create" class="mt-3">
  <?= csrf_field() ?>
  <div class="row">
    <div class="col-md-4 mb-3">
      <label class="form-label">Student ID</label>
      <input type="text" name="student_id" value="<?= old('student_id') ?>" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" value="<?= old('name') ?>" class="form-control" required>
    </div>
    <div class="col-md-4 mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="<?= old('email') ?>" class="form-control" required>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-3">
      <label class="form-label">Course</label>
      <input type="text" name="course" value="<?= old('course') ?>" class="form-control" required>
    </div>
    <div class="col-md-6 mb-3">
      <label class="form-label">Year Level</label>
      <input type="number" name="year_level" value="<?= old('year_level') ?>" class="form-control" required>
    </div>
  </div>
  <a href="/admin/students" class="btn btn-secondary">Back</a>
  <button class="btn btn-success" type="submit">Save</button>
</form>
<?= $this->endSection() ?>
