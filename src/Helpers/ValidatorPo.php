<?php 

namespace src\Helpers;

class ValidatorPo {
    
    public $polja = [];
    public $grupniBrojLica;
    public $greska = [];

    public function validacija($podaci){
    
        $this->polja[] = $podaci;

        if(isset($_POST['grupni_broj_lica'])){
           $this->grupniBrojLica = $_POST['grupni_broj_lica'];
        }

        if($this->grupniBrojLica > 0 && $this->polja[0]['vrsta_polise'] == 2){
            for($i = 0; $this->grupniBrojLica > $i++;){
                $this->validacijaZaDodatnoIme($i);
                $this->validacijaZaDodatnoPrezime($i);
                $this->validacijaZaDodatnoBrojTelefona($i);
                $this->validacijaZaDodatnoBrojPasosa($i);

                if($this->grupniBrojLica > 1){

                    for($j = 1; $this->grupniBrojLica > $j; $j++){
                        
                        if($i !== $j){
                            // echo $i . "<br/>";
                            // echo $j . "<br/>";
                            $this->proveraZaUnosIstihPodatakaZaGrupnoOsiguranje($i, $j);
                            
                        }
                    }

                }
            }

            
        }

        $this->validacijaImena();
        $this->validacijaPrezimena();
        $this->validacijaDatumaRodjenja();
        $this->validacijaBrojaPasosa();
        $this->validacijaTelefona();
        $this->validacijaMejla();
        $this->validacijaDatumaPutovanja();
        
        if(count($this->greska) > 0){
            return false;
        }

        return true;
        
    }

    private function validacijaImena(){
        $ime = trim($this->polja[0]['ime']);

        if(empty($ime)){
            $this->greska[] = trigger_error('Ime ne moze biti prazno');
        }

        if(strlen($ime) < 3 || strlen($ime) > 50){
            $this->greska[] = trigger_error('Ime mora imati vise od 3 i manje od 50 karatkera');
        }
    }

    private function validacijaPrezimena(){
        $prezime = trim($this->polja[0]['prezime']);

        if(empty($prezime)){
            $this->greska[] = trigger_error('Prezime ne moze biti prazno');
        }

        if(strlen($prezime) < 3 || strlen($prezime) > 50){
            $this->greska[] = trigger_error('Prezime mora imati vise od 3 i manje od 50 karatkera');
        }
    }

    private function validacijaDatumaRodjenja(){
        $datumRodjenja = trim($this->polja[0]['datum_rodjenja']);

        if(empty($datumRodjenja)){
            $this->greska[] = trigger_error('Datum rodjenja ne moze biti prazan');
        }

        if(!preg_match("/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/",$datumRodjenja)){
            $this->greska[] = trigger_error('Molimo unesite ispravam format datuma rodjenja');
        }
    }

    private function validacijaBrojaPasosa(){
        $brojPasosa = trim($this->polja[0]['broj_pasosa']);

        if(empty($brojPasosa)){
            $this->greska[] = trigger_error('Broj pasosa ne moze biti prazan');
        }

        if(!preg_match("/^[0-9]{9}$/",$brojPasosa)){
            $this->greska[] = trigger_error('Molimo unesite ispravan format broja pasosa');
        }
        
    }

    private function validacijaTelefona(){
        $telefon = trim($this->polja[0]['telefon']);

        if(!empty($telefon)){
            if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$telefon)){
                $this->greska[] = trigger_error('Molimo unesite ispravan format broja telefona');
            }        
        }
    }

    private function validacijaMejla(){
        $mejl = trim($this->polja[0]['email']);

        if(empty($mejl)){
            $this->greska[] = trigger_error('Mejl ne moze biti prazan');
        }

        if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $mejl)){
            $this->greska[] = trigger_error('Molimo unesite ispravan format za mejl');
        }
    }

    private function validacijaDatumaPutovanja(){
        $datumPutovanja = trim($this->polja[0]['datum_putovanja']);
        $datumIstekaPutovanja = trim($this->polja[0]['datum_isteka_ps']);

        if(empty($datumPutovanja) || empty($datumIstekaPutovanja)){
            $this->greska[] = trigger_error('Datum putovanja ili datum isteka putnog osiguranja moraju biti popunjeni');
        }

        if(!preg_match("/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/", $datumPutovanja) && !preg_match("/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/", $datumIstekaPutovanja)){
            $this->greska[] = trigger_error('Datum putovanja ili datum isteka putnog osiguranja moraju imati ispravan format');
        }
    }

    private function validacijaZaDodatnoIme($selektor){

        $ime = trim($this->polja[0]["ime"]);

        $dodatnoIme = trim($this->polja[0]["dodatno_ime$selektor"]);

        if(empty($dodatnoIme)){
            $this->greska[] = trigger_error("Dodatno polje za ime ne moze ostati prazno, broj polja : $selektor");
        }

        if(!empty($dodatnoIme) && !empty($dodatnoPrezime)){
            if($dodatnoIme == $dodatnoIme){
                $this->greska[] = trigger_error("Ime nosioca osiguranja ne moze biti isto sa dodatnim imenom lica, broj polja : $selektor");
            }
        }
        

    }

    private function validacijaZaDodatnoPrezime($selektor){

        $prezime = trim($this->polja[0]["prezime"]);

        $dodatnoPrezime = trim($this->polja[0]["dodatno_prezime$selektor"]);

        if(empty($dodatnoPrezime)){
            $this->greska[] = trigger_error("Dodatno polje za prezime ne moze ostati prazno, broj polja : $selektor");
        }

        if(!empty($dodatnoPrezime) && !empty($prezime)){
            if($dodatnoPrezime == $prezime){
                $this->greska[] = trigger_error("Prezime nosioca osiguranja ne moze biti isto sa dodatnim prezimenom lica, broj polja: $selektor");
            }
        }
        
    }

    private function validacijaZaDodatnoBrojTelefona($selektor){

        $telefon = trim($this->polja[0]["telefon"]);

        $dodatnoBrojTelefona = trim($this->polja[0]["dodatno_broj_telefona$selektor"]);
        if(!empty($dodatnoBrojTelefona) && !empty($telefona)){

            if($dodatnoBrojTelefona == $telefon){
                $this->greska[] = trigger_error("Brojevi telefona ne mogu biti isti kao kod nosica osiguranja, broj polja : $selektor");
            }

            if(!preg_match("/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/",$dodatnoBrojTelefona)){
                $this->greska[] = trigger_error('Molimo unesite ispravan format dodatnog broja telefona');
            }
        }
        
    }

    private function validacijaZaDodatnoBrojPasosa($selektor){

        $brojPasosa = trim($this->polja[0]["broj_pasosa"]);

        $dodatnoBrojPasosa = trim($this->polja[0]["dodatno_broj_pasosa$selektor"]);

        if(empty($dodatnoBrojPasosa)){
            $this->greska[] = trigger_error("Dodatno polje za broj pasosa ne moze ostati prazno, broj polja : $selektor");
        }

        if(!preg_match("/^[0-9]{9}$/",$dodatnoBrojPasosa)){
            $this->greska[] = trigger_error("Molimo unesite ispravan format dodatnog broja pasosa, broj polja : $selektor");
        }

        if($dodatnoBrojPasosa == $brojPasosa){
            $this->greska[] = trigger_error("Prezime nosioca osiguranja ne moze biti isto sa dodatnim prezimenom lica, broj polja : $selektor");
        }
        
    }

    private function proveraZaUnosIstihPodatakaZaGrupnoOsiguranje($brojacPrvePetlje, $brojacDrugePetlje){
        if($this->polja[0]["dodatno_ime$brojacPrvePetlje"] == $this->polja[0]["dodatno_ime$brojacDrugePetlje"]){
            $this->greska[] = trigger_error("Dodatna imena ne mogu biti ista, broj polja : $brojacPrvePetlje");
        }

        if($this->polja[0]["dodatno_prezime$brojacPrvePetlje"] == $this->polja[0]["dodatno_prezime$brojacDrugePetlje"]){
            $this->greska[] = trigger_error("Dodatna prezimena ne mogu biti ista, broj polja : $brojacPrvePetlje");
        }

        if(!empty($this->polja[0]["dodatno_broj_telefona$brojacPrvePetlje"]) && $this->polja[0]["dodatno_broj_telefona$brojacDrugePetlje"]){

            if($this->polja[0]["dodatno_broj_telefona$brojacPrvePetlje"] == $this->polja[0]["dodatno_broj_telefona$brojacDrugePetlje"]){
                $this->greska[] = trigger_error("Dodatni brojevi telefona ne mogu biti isti, broj polja : $brojacPrvePetlje");
            }

        }

        if(!empty($this->polja[0]["dodatno_broj_pasosa$brojacPrvePetlje"]) && !empty($this->polja[0]["dodatno_broj_pasosa$brojacDrugePetlje"])){

            if($this->polja[0]["dodatno_broj_pasosa$brojacPrvePetlje"] == $this->polja[0]["dodatno_broj_pasosa$brojacDrugePetlje"]){
                $this->greska[] = trigger_error("Dodatni brojevi pasosa ne mogu biti ista, broj polja : $brojacPrvePetlje");
            }
        }
    }

    
}