<?= $this->include('layouts/header') ?>
<section class="intro"><div class="intro-copy"><p class="eyebrow">Your account</p><h1>Profile.</h1></div></section>
<section class="panel">
    <?php if ($user): ?>
        <div class="profile-head"><div class="avatar"><?= esc(strtoupper(substr($user['full_name'], 0, 1))) ?></div><div><h2><?= esc($user['full_name']) ?></h2><p>@<?= esc($user['username']) ?></p></div></div>
        <dl class="details"><div><dt>Email</dt><dd><?= esc($user['email']) ?></dd></div><div><dt>Member since</dt><dd><?= esc(date('F j, Y', strtotime($user['created_at']))) ?></dd></div></dl>
    <?php else: ?>
        <p class="empty">No profile is available.</p>
    <?php endif; ?>
</section>
<?= $this->include('layouts/footer') ?>
