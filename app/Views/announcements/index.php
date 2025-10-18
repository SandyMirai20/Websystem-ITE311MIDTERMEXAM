<?php $this->extend('layouts/main'); ?>

<?php $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Announcements</h1>
            <?php if (session()->get('role') === 'admin'): ?>
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Add Announcement
                </a>
            <?php endif; ?>
        </div>

        <?php if (empty($announcements)): ?>
            <div class="alert alert-info">
                <i class="bi bi-info-circle me-2"></i>
                No announcements available at the moment.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($announcements as $announcement): ?>
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title text-primary">
                                    <?= esc($announcement['title']) ?>
                                </h5>
                                <p class="card-text">
                                    <?= esc($announcement['content']) ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>
                                        Posted on: <?= date('F j, Y, g:i', strtotime($announcement['created_at'])) ?>
                                    </small>
                                    <?php if (session()->get('role') === 'admin'): ?>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-outline-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $this->endSection(); ?>
