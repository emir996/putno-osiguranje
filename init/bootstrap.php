<?php
//ovde se ucitavaju sve klase sa bekenda aplikacije pomocu psr-4 autoloadera
require_once './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

