<?php 

require './vendor/autoload.php';

$pages = [
    'index' => 'public/index.php',
    'pregled-polisa' => 'public/pregled-polisa.php',
    '404' => 'public/404.php'
];

//provera i ucitavanje glavne stranice
if(!isset($_GET['page'])){
    require 'public/index.php';
} else {

    if(array_key_exists(strtolower($_GET['page']), $pages)){
        require $pages[$_GET['page']];
    } else {
        require $pages['404'];
    }
}






