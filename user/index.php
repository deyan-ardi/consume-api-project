<?php
require_once '../app/Config/config.php';
require_once '../app/Services/connectToApiServices.php';
require_once '../app/Services/generateDateFormatService.php';

use app\services\generateDateFormatService;

use app\services\connectToApiServices;

$api = new connectToApiServices;
$date = new generateDateFormatService;
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
    <div class="container">
        <div class="pt-4">
            <div class="h2 font-weight-bold">Order List</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Delivery Address</th>
                            <th scope="col">Delivered Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($api->api() !== null) {
                            foreach ($api->api() as $data) {
                                echo '<tr class="bg-blue">';
                                echo '<td class="pt-2">';
                                echo '<a href="' . $config['base_url'] . '/user/detail.php/?id=' . $data->orderID . '" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>';
                                echo '</td>';
                                echo '<td class="pt-2">' . $data->orderID;
                                echo '</td>';
                                echo '<td class="pt-2">' . $date->format($data->orderDate);
                                echo '</td>';
                                echo '<td class="pt-2">' . $data->customerName;
                                echo '</td>';
                                echo '<td class="pt-2">' . $data->deliveryAddress;
                                echo '</td>';
                                if (is_null($data->deliveredDate)) {
                                    echo '<td class="pt-2">----</i>';
                                    echo '</td>';
                                } else {
                                    echo '<td class="pt-2">' . $date->format($data->deliveredDate);
                                    echo '</td>';
                                }

                                echo '</tr>';
                                echo '<tr id="spacing-row">';
                                echo '<td></td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr class="">';
                            echo '<td class="pt-2">';
                            echo 'No Internet';
                            echo '</td>';
                            echo '<td class="pt-2">No Internet';
                            echo '</td>';
                            echo '<td class="pt-2">No Internet';
                            echo '</td>';
                            echo '<td class="pt-2">No Internet';
                            echo '</td>';
                            echo '<td class="pt-2">No Internet';
                            echo '</td>';
                            echo '<td class="pt-2">No Internet';
                            echo '</td>';
                            echo '</tr>';
                            echo '<tr id="spacing-row">';
                            echo '<td></td>';
                            echo '</tr>';
                        }


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once 'components/_script.php' ?>
</body>

</html>