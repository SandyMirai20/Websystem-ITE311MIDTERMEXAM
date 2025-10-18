<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container py-4">
  <div class="card border-0 shadow-sm mb-4 bg-primary text-white">
    <div class="card-body text-center">
      <h4 class="mb-0"><?= esc($name ?? 'Admin') ?></h4>
    </div>
  </div>

  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= number_format($stats['total_students'] ?? 0) ?></div>
          <div class="small text-muted">Students</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= number_format($stats['active_courses'] ?? 0) ?></div>
          <div class="small text-muted">Courses</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-primary"><?= number_format($stats['faculty_count'] ?? 0) ?></div>
          <div class="small text-muted">Faculty</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-0 shadow-sm">
        <div class="card-body text-center">
          <div class="text-success">Online</div>
          <div class="small text-muted">System</div>
        </div>
      </div>
    </div>
  </div>

  <div class="card border-0 shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
      <h5 class="mb-0">Recent Activity</h5>
    </div>
    <div class="card-body">
      <?php if (!empty($recent_activity)): ?>
        <?php foreach (array_slice($recent_activity, 0, 5) as $activity): ?>
          <div class="mb-3">
            <div class="mb-1"><?= esc($activity['description']) ?></div>
            <div class="small text-muted"><?= $activity['time_ago'] ?? 'Just now' ?> ago</div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="text-muted">No recent activity</div>
      <?php endif; ?>
    </div>
  </div>

  <div class="d-grid gap-2">
    <a href="/admin/students/add" class="btn btn-primary">Add Student</a>
    <a href="/admin/courses/create" class="btn btn-outline-primary">Create Course</a>
    <a href="/admin/enrollments" class="btn btn-outline-primary">Manage Enrollments</a>
  </div>
</div>
<?= $this->endSection() ?>
