<?= $this->include('layouts/header') ?>
<section class="intro">
    <div class="intro-copy">
        <p class="eyebrow">Your focus for today</p>
        <h1>Make room for what matters.</h1>
    </div>
    <p class="intro-note"><?= esc($today) ?><br><?= count($tasks) ?> <?= count($tasks) === 1 ? 'task' : 'tasks' ?> on your list</p>
</section>
<section class="task-grid" aria-label="Today's tasks">
    <?php if ($tasks === []): ?>
        <p class="empty">No tasks planned for today. Enjoy the extra space.</p>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <article class="task-card <?= $task['status'] === 'completed' ? 'completed' : '' ?>">
                <span class="task-dot" aria-hidden="true"></span>
                <h2 class="task-title"><?= esc($task['title']) ?></h2>
                <div class="task-meta"><span class="status"><?= esc($task['status']) ?></span></div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>
<?= $this->include('layouts/footer') ?>
