<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Student Portal • Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    .brand-panel { background:#0b0b8b; }
    .brand-panel .logo { width: 120px; height: 120px; border-radius:50%; background:rgba(255,255,255,.15); display:inline-flex; align-items:center; justify-content:center; font-size:36px; }
    .divider { display:flex; align-items:center; }
    .divider::before, .divider::after { content:""; flex:1; border-top:1px solid #dee2e6; }
    .divider span { margin: 0 .75rem; color:#6c757d; font-size:.9rem; }
    .btn-brand { background:#0b0b8b; border-color:#0b0b8b; }
    .btn-brand:hover { background:#0a0a7a; border-color:#0a0a7a; }
  </style>
</head>
<body>
  <div class="container-fluid p-0">
    <div class="row g-0 min-vh-100">
      <div class="col-lg-5 col-xl-4 d-none d-lg-flex align-items-center justify-content-center text-white brand-panel">
        <div class="text-center px-4">
          <div class="logo"><img src="https://rmmc.edu.ph/public/images/high_quality_logo.png" alt="School Logo" style="width: 80px; height: 80px; object-fit: contain;"></div>
          <div class="h3 fw-bold mb-1">Student Portal</div>
          <div class="lead">Ramon Magsaysay Memorial College</div>
        </div>
      </div>
      <div class="col-12 col-lg-7 col-xl-8 d-flex align-items-center justify-content-center">
        <div class="w-100 px-4" style="max-width: 440px;">
          <?= $this->renderSection('content') ?>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
