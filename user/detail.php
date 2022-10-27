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
    <div class="container-fluid my-5  d-flex  justify-content-center">
        <div class="card card-1">
            <div class="card-header bg-white">
                <div class="media flex-sm-row flex-column-reverse justify-content-between  ">
                    <div class="col my-auto"> <h4 class="mb-0">Order Detail<span class="change-color"> #<?php echo $_GET['id']; ?></span> !</h4> </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-between mb-3">
                    <div class="col-12"> <h5 class="color-1 mb-0 change-color">Receipt</h5></div>
                    <div class="col-12  ">
                        <?php
                        $id = $_GET['id'];
                        $data = $api->detail($id);
                        echo '<div class="col-12"> <small>Customer Name : '.$data->customerName.'</small> </div>';
                        echo '<div class="col-md-12 "> <small>Order Date : '.$date->format($data->orderDate).'</small> </div>';
                        echo '<div class="col-12"> <small>Delivery Address : '.$data->deliveryAddress.'</small> </div>';
                        if (!is_null($data->deliveredDate)) {
                            echo '<div class="col-12"> <small>Delivered Date : '.$date->format($data->deliveredDate).'</small> </div>';
                        } else {
                            echo '<div class="col-12"> <small>Delivered Date : - </small> </div>';
                        }
                        
                        ?>
                    <div class="col-12 pt-3"> <h6 class="color-1 mb-0 change-color">Product</h6></div>
                
                    </div>
                </div>

                <?php
                for ($i=0; $i<count($data->products) ; $i++) { 
                    echo '<div class="row pb-4">';
                    echo '<div class="col">';
                    echo '<div class="card card-2">';
                    echo '<div class="card-body">';
                    echo '<div class="media">';
                    echo '<div class="media-body my-auto">';
                    echo '<div class="d-flex justify-content-between">';
                    echo '<div class="col my-auto"> <h6 class="mb-0">'.$data->products[$i]->name.'</h6>  </div>';
                    echo '<div class="col my-auto text-center"> <small>Qty : '.$data->products[$i]->quantity.'</small></div>';
                    echo '<div class="col my-auto text-end"><h6 class="mb-0">'.$data->products[$i]->price.'</h6> </div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<hr class="my-3 ">';
                    echo '<div class="row">';
                    echo '<div class="col-md-3"> <small> Status <span><i class=" ml-2 fa fa-refresh"  aria-hidden="true"></i></span></small> </div>';
                    echo '<div class="col mt-auto">';
                    if (is_null($data->deliveredDate)) {
                        echo '<div class="my-auto"><small  class="text-right mr-sm-2">Pending</small><span> <i  class="fa fa-spinner"></i></span> </div>';
                    } else {
                        echo '<div class="my-auto"><small  class="text-right mr-sm-2">Delivered</small><span> <i  class="fa fa-check"></i></span> </div>';
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
        </div>
    </div>
    </div>
    <?php require_once 'components/_script.php' ?>
</body>

</html>