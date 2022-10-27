<?php require_once '../app/Config/config.php'; ?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?= $config['base_url']; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?= $config['base_url']; ?>/assets/css/a3.css" rel="stylesheet">
<!-- <link href="<?= $config['base_url']; ?>/assets/css/copy.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<link rel="shortcut icon" href="<?= $config['base_url']; ?>/assets/img/favicon.ico" type="image/x-icon">
<?php
$page_name = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
if ($page_name == "index.php") {
    $page = "Home";
} else {
    $page = "Create Data";
}
?>
<title>App ~ <?= $page; ?></title>