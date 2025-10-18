<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-4">
  <div class="card border-0 shadow-sm mb-4 bg-primary text-white">
    <div class="card-body text-center">
      <h4 class="mb-0"><?= esc($name ?? 'Student') ?></h4>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= $gpa ?? '0.00' ?></div>
          <div class="small text-muted">GPA</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= $current_courses ?? '0' ?></div>
          <div class="small text-muted">Courses</div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= $credits_earned ?? '0' ?></div>
          <div class="small text-muted">Credits</div>
        </div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Today's Schedule</h5>
    </div>
    <div class="card-body">
      <?php if (!empty($today_schedule)): ?>
        <?php foreach ($today_schedule as $class): ?>
          <div class="mb-3">
            <div class="fw-bold"><?= esc($class['course_name']) ?></div>
            <div class="small text-muted">
              <?= $class['time'] ?> • <?= esc($class['location']) ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="text-muted">No classes today</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="d-grid gap-2">
    <a href="/student/courses" class="btn btn-primary">My Courses</a>
    <a href="/student/grades" class="btn btn-outline-primary">View Grades</a>
    <a href="/student/schedule" class="btn btn-outline-primary">Class Schedule</a>
  </div>
</div>
<?= $this->endSection() ?>
