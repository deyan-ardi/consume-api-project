<?php require_once '../app/Config/config.php'; ?>

<nav class="navbar navbar-dark navbar-expand-lg bg-custom-1">
    <div class="container">
        <a class="navbar-brand" href="#">App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['SCRIPT_NAME']) == "index.php" ? "active" : "" ?>" aria-current="page" href="<?= $config['base_url']; ?>/user/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= basename($_SERVER['SCRIPT_NAME']) == "create.php" ? "active" : "" ?>" href="<?= $config['base_url']; ?>/user/create.php">Create Data</a>
                </li>
            </ul>
        </div>
    </div>
</nav>