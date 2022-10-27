<?php
require_once '../app/Config/config.php';
session_start();
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
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" name="save">
                        <div class="form-row">
                            <div class="name">Product id</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="id">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Product Name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Price</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="number" name="price">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
    </div>
    <!-- End contact Section  -->
    <?php require_once 'components/_script.php' ?>
</body>

</html>