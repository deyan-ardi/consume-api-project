<?php
namespace app\services;
require_once '../app/Config/config.php';

class connectToApiServices
{
    public $base;
    public function __construct()
    {
        $this->base= "https://titan.csit.rmit.edu.au/~e103884/wp/.services/";
    }

    public function api()
    {
        $curl_handle = curl_init();
        // $url = $config['api_url'];
        $url = $this->base.".orders/";

        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);
        $order_data = $response_data;

        return $order_data;
    }

    public function detail($id)
    {
        $curl_handle = curl_init();

        // $url = $config['api_url'];
        $url = $this->base.".orders/?id=".$id;

        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        $curl_data = curl_exec($curl_handle);
        curl_close($curl_handle);
        $response_data = json_decode($curl_data);
        $order_data = $response_data;
        // $order_data = array_slice($order_data, 0, 1);

        return $order_data;
    }
}
