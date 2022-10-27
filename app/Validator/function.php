<?php

class Validator
{
    public $data;

    function is_decimal( $val )
    {
        return is_numeric( $val ) && floor( $val ) != $val;
    }

    public function check()
    {
        if (isset($_POST['save'])) {
            if (empty($p_name = $_POST['name']) || empty($price = $_POST['price']) || empty($id = $_POST['id'])) {
                $_SESSION['message'] = '<div class="alert alert-danger">Please fill all the fields</div>';
                header("Location: create.php");
            } 
            elseif ($this->is_decimal($id = $_POST['id'])) {
                $_SESSION['id'] = '<label class="label--desc text-danger">ID cannot be decimal</label>';
                header("Location: create.php");
            }
            elseif ($id = $_POST['id'] < 1) {
                $_SESSION['id'] = '<label class="label--desc text-danger">ID must be greater than 0</label>';
                header("Location: create.php");
            }

            elseif (preg_match("/[^0-9a-z\.\&\@\s]/i", $_POST['name'])) {
                $_SESSION['name'] = '<label class="label--desc text-danger"> allow only alphanumeric characters</label>';
                header("Location: create.php");
            }

            elseif ($_POST['price'] <= 0) {
                $_SESSION['price'] = '<label class="label--desc text-danger">Price must be greater than 0</label>';
                header("Location: create.php");
            }

            elseif ($_POST['price'] <= 1 || $_POST['price'] >= 100) {
                $_SESSION['price'] = '<label class="label--desc text-danger">price must be between 1 and 100</label>';
                header("Location: create.php");
            }

            elseif (!is_numeric($_POST['id'])) {
                $_SESSION['id'] = '<label class="label--desc text-danger">ID must be numeric</label>';
                header("Location: create.php");
            }

            elseif (!is_numeric($_POST['price'])) {
                $_SESSION['price'] = '<label class="label--desc text-danger">Price must be numeric</label>';
                header("Location: create.php");
            }

            else {
                header("Location: index.php");

            }
        }
    }
}
