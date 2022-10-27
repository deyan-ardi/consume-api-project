<?php
require_once '../app/Config/config.php';
require_once '../app/Services/connectToApiServices.php';

use app\services\connectToApiServices;

$api = new connectToApiServices;
$base_url = $config['base_url'];

// Make sure we send output in UTF-8  
header('Content-type: application/xml; charset=UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
echo '<url>';
echo '<loc>' . $base_url . '/user/index.php/</loc>';
echo '<lastmod>' . gmdate("Y-m-d") . 'T' . gmdate("H:m:s") . '+01:00</lastmod>';
echo '</url>';
echo '<url>';
echo '<loc>' . $base_url . '/user/create.php/</loc>';
echo '<lastmod>' . gmdate("Y-m-d") . 'T' . gmdate("H:m:s") . '+01:00</lastmod>';
echo '</url>';
foreach ($api->api() as $data) {
    echo '<url>';
    echo '<loc>' . $base_url . '/user/detail.php/?id=' . $data->orderID . '</loc>';
    echo '<lastmod>' . gmdate("Y-m-d") . 'T' . gmdate("H:m:s") . '+01:00</lastmod>';
    echo '</url>';
}

echo '</urlset>';
