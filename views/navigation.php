<?php if (isset($_SESSION['user'])): ?>
    <nav class="navbar navbar-light bg-light">
        <a href="/../index.php" class="navbar-brand">Photoify</a>
        <a href=/views/profile.php><i class="fas fa-user"></i></a>
        <a class="nav-link" href="/app/users/logout.php">Log out</a>
    </nav>

<?php endif; ?>
<?= alert(); ?>
