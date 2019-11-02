<?php
/**
 * https://github.com/egin10
 * Get Selma UB News
 * base_url     : https://selma.ub.ac.id/category/
 * paginate_url : https://selma.ub.ac.id/category/{category}/page/{num}/
 * 
 * MIT
 */

date_default_timezone_set("Asia/Jakarta");
require_once(__DIR__."/core.php");

//config
$core = new Core;
$base_url = "https://selma.ub.ac.id/category/berita/";
if(isset($_GET['category'])){
    if(isset($_GET['page'])){
        $base_url = $base_url.strtolower($_GET['category'])."/page/".$_GET['page']."/";
    }else{
        $base_url = $base_url.strtolower($_GET['category'])."/";
    }
}else{
    echo json_encode(['msg' => 'Category not found!']);
}

//init
$ch_url = curl_init($base_url);
curl_setopt_array($ch_url, [CURLOPT_RETURNTRANSFER => true]);
$get_url = curl_exec($ch_url);

//proccess
$hasil = $core->getBerita($get_url);

//parse to json
if(isse($_GET['page']) > $hasil['pages']['lastPage']){
    echo json_encode(['msg' => 'Page not found!']);
}else{
    echo json_encode($hasil);
}

curl_close($ch_url);
unset($getData);