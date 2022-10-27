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
    <div class="container-fluid my-5  d-flex  justify-content-center">
        <div class="card card-1">
            <div class="card-header bg-white">
                <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                    <div class="col my-auto"> <h4 class="mb-0">Order Detail<span class="change-color"> #<?php echo $_GET['id'] ?></span> !</h4> </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row justify-content-between mb-3">
                    <div class="col-12"> <h5 class="color-1 mb-0 change-color">Receipt</h5></div>
                    <div class="col-12  ">
                        <?php
                        $id = $_GET['id'];
                        $data = $api->detail($id);
                        if ($data !== null) {
                            $cusName = $data->customerName;
                            $orderDate = $date->format($data->orderDate);
                            $deliveredDate = $date->format($data->deliveredDate);
                            $deliveryAddress = $data->deliveryAddress;
                            $products = count($data->products);
                            $date = !is_null($data->deliveredDate);
                        }
                        else {
                            $cusName = 'No Internet';
                            $orderDate = 'No Internet';
                            $deliveredDate = "No Internet";
                            $deliveryAddress = "No Internet";
                            $products = 0;
                            $date = !is_null($data);
                        }
                        echo '<div class="col-12"> <small>Customer Name : '.$cusName.'</small> </div>';
                        echo '<div class="col-md-12 "> <small>Order Date : '.$orderDate.'</small> </div>';
                        echo '<div class="col-12"> <small>Delivery Address : '.$deliveryAddress.'</small> </div>';
                        if ($date) {
                            echo '<div class="col-12"> <small>Delivered Date : '.$deliveredDate.'</small> </div>';
                        } else {
                            echo '<div class="col-12"> <small>Delivered Date : - </small> </div>';
                        }
                        
                        ?>
                    <div class="col-12 pt-3"> <h6 class="color-1 mb-0 change-color">Product</h6></div>
                
                    </div>
                </div>
                <?php
                $total = 0;
                
                for ($i=0; $i<$products ; $i++) { 
                    if ($data !== null) {
                        $name = $data->products[$i]->name;
                        $qty = $data->products[$i]->quantity;
                        $prices = $data->products[$i]->price;
                        $price = preg_replace("/[^0-9\.]/", "", $data->products[$i]->price);
                        $total += $price * $data->products[$i]->quantity;
                    }
                    else {
                        $name = 'No Internet';
                        $qty = 'No Internet';
                        $prices = "No Internet";
                        $total = "No Internet";
                    }

                    echo '<div class="row pb-4">';
                    echo '<div class="col">';
                    echo '<div class="card card-2">';
                    echo '<div class="card-body">';
                    echo '<div class="media">';
                    echo '<div class="media-body my-auto">';
                    echo '<div class="d-flex justify-content-between">';
                    echo '<div class="col my-auto"> <h6 class="mb-0">'.$name.'</h6>  </div>';
                    echo '<div class="col my-auto text-center"> <small>Qty : '.$qty.'</small></div>';
                    echo '<div class="col my-auto text-end"><h6 class="mb-0">'.$prices.'</h6> </div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr class="my-3 ">';
                    echo '<div class="row">';
                    echo '<div class="col-md-3"> <small> Status <span><i class=" ml-2 fa fa-refresh"  aria-hidden="true"></i></span></small> </div>';
                    echo '<div class="col mt-auto">';
                    if ($date) {
                        echo '<div class="my-auto"><small  class="text-right mr-sm-2">Delivered</small><span> <i  class="fa fa-check"></i></span> </div>';
                    } else {
                        echo '<div class="my-auto"><small  class="text-right mr-sm-2">Pending</small><span> <i  class="fa fa-spinner"></i></span> </div>';
                    }
                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <div class="card-footer">
                <div class="jumbotron-fluid">
                    <div class="row justify-content-between ">
                        <div class="col-auto my-auto "><h2 class="mb-0 font-weight-bold">TOTAL PAYMENT</h2></div>
                        <div class="col-auto my-auto ml-auto"><h1 class="display-3 ">$<?php echo $total ?></h1></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'components/_script.php' ?>
</body>

</html>