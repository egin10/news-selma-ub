<?php
/**
 * https://github.com/egin10
 * Get Selma UB News
 * url : https://selma.ub.ac.id/category/berita/
 * 
 * MIT
 */

date_default_timezone_set("Asia/Jakarta");
require_once(__DIR__."/core.php");

//config
$base_url = "https://selma.ub.ac.id/category/berita/";
$core = new Core;

//init
$ch_url = curl_init($base_url);
curl_setopt_array($ch_url, [CURLOPT_RETURNTRANSFER => true]);
$get_url = curl_exec($ch_url);

//proccess
$hasil = $core->getBerita($get_url);

print_r($hasil);

curl_close($ch_url);
unset($getData);