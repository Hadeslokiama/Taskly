<?= $this->include('layouts/header') ?>
<section class="intro">
    <div class="intro-copy">
        <p class="eyebrow">Everything in one place</p>
        <h1>All tasks.</h1>
    </div>
    <p class="intro-note">A simple view of past, current, and upcoming work.</p>
</section>
<section class="task-grid" aria-label="All tasks">
    <?php if ($tasks === []): ?>
        <p class="empty">There are no tasks yet.</p>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <article class="task-card <?= $task['status'] === 'completed' ? 'completed' : '' ?>">
                <span class="task-dot" aria-hidden="true"></span>
                <div><h2 class="task-title"><?= esc($task['title']) ?></h2></div>
                <div class="task-meta"><span><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></span><span class="status"><?= esc($task['status']) ?></span></div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<?= $this->include('layouts/footer') ?>
