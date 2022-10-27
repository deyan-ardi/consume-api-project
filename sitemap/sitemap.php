<?php 
//sitemap.php
$connect = mysqli_connect("localhost", "root", "", "testing");

$query = "SELECT page_url FROM page";

$result = mysqli_query($connect, $query);

$base_url = "http://localhost/tutorial/php-sitemap/";

header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

while($row = mysqli_fetch_array($result))
{
 echo '<url>' . PHP_EOL;
 echo '<loc>'.$base_url. $row["page_url"] .'/</loc>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
}

echo '</urlset>' . PHP_EOL;

?>