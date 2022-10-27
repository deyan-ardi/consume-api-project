<?php
require_once '../app/Config/config.php';
require_once '../app/Validator/function.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $check = (new Validator())->check();
    die;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Header -->
    <?php require_once 'components/_header.php' ?>
</head>

<body>
    <?php require_once 'components/_navbar.php' ?>
    <div class="container col-md-6 pt-5">
    <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Add Product Form</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                    ?>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" name="save">
                        <div class="form-row">
                            <div class="name">Product id</div>
                            <div class="value">
                            <div class="input-group-desc">
                                <input class="input--style-5" type="text" name="id">
                                <?php
                                if (isset($_SESSION['id'])) {
                                    echo $_SESSION['id'];
                                    unset($_SESSION['id']);
                                }
                                ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Product Name</div>
                            <div class="value">
                            <div class="input-group-desc">
                                <input class="input--style-5" type="text" name="name">
                                <?php
                                if (isset($_SESSION['name'])) {
                                    echo $_SESSION['name'];
                                    unset($_SESSION['name']);
                                }
                                ?>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Price</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="price">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit" name="save">ADD</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- End contact Section  -->
    <?php require_once 'components/_script.php' ?>
</body>

</html>