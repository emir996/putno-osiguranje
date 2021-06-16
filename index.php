<?php 

require_once 'init/bootstrap.php';
require_once 'init/requestHandler.php';

use src\PutnoOsiguranje;
use src\Helpers\ValidatorPo;


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['podnesi_prijavu'])){
    
    $putnoOsiguranje = new PutnoOsiguranje($_POST);
    
    $putnoOsiguranje->obradaPodatakaZaPutnoOs();

}



