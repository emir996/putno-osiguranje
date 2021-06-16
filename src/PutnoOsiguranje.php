<?php

namespace src;
use src\Helpers\ValidatorPo;
use src\Models\PutnoOsiguranjeModel;

class PutnoOsiguranje {

    private $podaciNosiocaOsiguranja;

    public function __construct($podaci = null){
        $this->podaciNosiocaOsiguranja = $podaci;
    }

    public function obradaPodatakaZaPutnoOs(){
        $validator = new ValidatorPo();

        if($validator->validacija($this->podaciNosiocaOsiguranja)){

            $putnoOsiguranjeModel = new PutnoOsiguranjeModel();

            if($putnoOsiguranjeModel->unesiPodatkeUBazu($this->podaciNosiocaOsiguranja)){
                echo "Uspesno ste se prijavili za putno osiguranje";
            }

        }
    }

    public function dobaviPodatkeZaOsiguranje(){
        $putnoOsiguranjeModel = new PutnoOsiguranjeModel();

        $podaciSvihPrijavaZaPOsiguranje = $putnoOsiguranjeModel->dobijanjeNosiocaOsiguranja();

        return $podaciSvihPrijavaZaPOsiguranje;
    }




}