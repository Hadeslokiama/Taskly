<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A focused task manager for getting today's work done.">
    <title><?= esc($title ?? 'Taskly') ?> · Taskly</title>
    <style>
        :root {
            --ink: #111111;
            --muted: #717171;
            --line: #e7e7e7;
            --paper: #ffffff;
            --surface: #f5f5f3;
            --accent: #d9ff61;
            --success: #dff5e7;
            --radius: 18px;
        }
        * { box-sizing: border-box; }
        body { margin: 0; color: var(--ink); background: var(--surface); font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }
        a { color: inherit; text-decoration: none; }
        .topbar { background: var(--ink); color: #fff; }
        .nav { display: flex; align-items: center; justify-content: space-between; gap: 24px; max-width: 1120px; min-height: 76px; margin: 0 auto; padding: 0 24px; }
        .brand { font-size: 1.25rem; font-weight: 800; letter-spacing: -.05em; }
        .brand span { color: var(--accent); }
        .nav-links { display: flex; gap: 6px; align-items: center; }
        .nav-links a { padding: 10px 13px; color: #bdbdbd; border-radius: 10px; font-size: .9rem; }
        .nav-links a:hover, .nav-links a:focus-visible, .nav-links a.active { color: #fff; background: #2a2a2a; }
        a:focus-visible { outline: 3px solid var(--accent); outline-offset: 3px; }
        main { max-width: 1120px; margin: 0 auto; padding: 64px 24px 88px; }
        .eyebrow { margin: 0 0 12px; color: var(--muted); font-size: .78rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        h1 { margin: 0; max-width: 700px; font-size: clamp(2.4rem, 6vw, 4.8rem); line-height: .98; letter-spacing: -.07em; }
        .intro { display: flex; align-items: end; justify-content: space-between; gap: 32px; margin-bottom: 48px; }
        .intro-copy { max-width: 700px; }
        .intro-note { max-width: 230px; margin: 0 0 5px; color: var(--muted); font-size: .94rem; line-height: 1.5; }
        .task-grid { display: grid; gap: 12px; }
        .task-card { display: grid; grid-template-columns: 12px 1fr auto; align-items: center; gap: 18px; padding: 20px 24px; background: var(--paper); border: 1px solid var(--line); border-radius: var(--radius); }
        .task-card.today { border-color: var(--ink); }
        .task-dot { width: 10px; height: 10px; border: 2px solid var(--ink); border-radius: 50%; }
        .task-card.completed .task-dot { background: var(--ink); }
        .task-card.completed .task-title { color: var(--muted); text-decoration: line-through; }
        .task-title { margin: 0; font-size: 1rem; font-weight: 700; }
        .task-meta { display: flex; align-items: center; gap: 12px; color: var(--muted); font-size: .82rem; }
        .status { padding: 7px 10px; border-radius: 999px; background: #f0f0f0; font-size: .72rem; font-weight: 700; text-transform: capitalize; }
        .completed .status { background: var(--success); color: #25613a; }
        .empty { padding: 44px; text-align: center; color: var(--muted); background: var(--paper); border: 1px dashed #cfcfcf; border-radius: var(--radius); }
        .panel { max-width: 680px; padding: 40px; background: var(--paper); border: 1px solid var(--line); border-radius: 24px; }
        .profile-head { display: flex; align-items: center; gap: 20px; margin-bottom: 36px; }
        .avatar { display: grid; place-items: center; width: 72px; height: 72px; color: #fff; background: var(--ink); border-radius: 22px; font-size: 1.5rem; font-weight: 800; }
        .profile-head h2 { margin: 0 0 5px; font-size: 1.5rem; letter-spacing: -.04em; }
        .profile-head p { margin: 0; color: var(--muted); }
        .details { display: grid; gap: 20px; margin: 0; }
        .details div { padding-top: 20px; border-top: 1px solid var(--line); }
        .details dt { margin-bottom: 6px; color: var(--muted); font-size: .78rem; font-weight: 700; text-transform: uppercase; letter-spacing: .06em; }
        .details dd { margin: 0; font-size: 1.05rem; font-weight: 650; }
        .about-copy { max-width: 640px; color: #414141; font-size: 1.15rem; line-height: 1.65; }
        .footer { max-width: 1120px; margin: 0 auto; padding: 0 24px 32px; color: var(--muted); font-size: .82rem; }
        @media (max-width: 680px) {
            .nav { align-items: flex-start; flex-direction: column; gap: 12px; padding-top: 18px; padding-bottom: 18px; }
            .nav-links { width: 100%; justify-content: space-between; }
            .nav-links a { padding: 8px 4px; font-size: .82rem; }
            main { padding-top: 44px; }
            .intro { display: block; margin-bottom: 32px; }
            .intro-note { margin-top: 20px; }
            .task-card { grid-template-columns: 12px 1fr; gap: 14px; padding: 18px; }
            .task-meta { grid-column: 2; }
            .panel { padding: 28px 22px; }
        }
        @media (prefers-reduced-motion: reduce) { * { scroll-behavior: auto !important; transition: none !important; } }
    </style>
</head>
<body>
    <header class="topbar">
        <nav class="nav" aria-label="Main navigation">
            <a class="brand" href="<?= base_url('/') ?>">task<span>ly</span></a>
            <div class="nav-links">
                <a class="<?= ($title ?? '') === 'Today' ? 'active' : '' ?>" href="<?= base_url('/') ?>">Today</a>
                <a class="<?= ($title ?? '') === 'All tasks' ? 'active' : '' ?>" href="<?= base_url('tasks') ?>">Tasks</a>
                <a class="<?= ($title ?? '') === 'Profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>">Profile</a>
                <a class="<?= ($title ?? '') === 'About' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
            </div>
        </nav>
    </header>
    <main>
