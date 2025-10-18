<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="row justify-content-center">
  <div class="col-md-7">
    <div class="card">
      <div class="card-header">Register</div>
      <div class="card-body">
        <form method="post" action="/register">
          <?= csrf_field() ?>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="pass_confirm" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-select">
              <option value="student" <?= old('role')==='student'?'selected':'' ?>>Student</option>
              <option value="admin" <?= old('role')==='admin'?'selected':'' ?>>Admin</option>
            </select>
          </div>
          <div class="border rounded p-3 mb-3">
            <div class="mb-2 fw-bold">Student Details (if Role = Student)</div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Student ID</label>
                <input type="text" name="student_id" class="form-control" value="<?= old('student_id') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Course</label>
                <input type="text" name="course" class="form-control" value="<?= old('course') ?>">
              </div>
              <div class="col-md-4 mb-3">
                <label class="form-label">Year Level</label>
                <input type="number" name="year_level" class="form-control" value="<?= old('year_level') ?>">
              </div>
            </div>
          </div>
          <button class="btn btn-success w-100" type="submit">Register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
