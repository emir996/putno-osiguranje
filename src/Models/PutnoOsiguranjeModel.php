<?php 
namespace src\Models;
use src\DbConnector\DbConn;

class PutnoOsiguranjeModel extends DbConn {

    private $tabelaNosilacOsiguranja = 'nosilac_osiguranja';
    private $tabelaDodatnaLicaNaPolisi = 'dodatna_lica_na_polisi';

    public function unesiPodatkeUBazu($podaci){
        
        $ime = $podaci["ime"];
        $prezime = $podaci["prezime"];
        $datumRodjenja = $podaci["datum_rodjenja"];
        $brojPasosa = $podaci["broj_pasosa"];
        $telefon = $podaci["telefon"];
        $email = $podaci["email"];
        $datumPutovanja = $podaci["datum_putovanja"];
        $datumIsteka = $podaci["datum_isteka_ps"];
        $vrstaPolise = 0;
        
        if($podaci["vrsta_polise"] == 2){
            $vrstaPolise = 1;
        }

        $sql = "INSERT INTO $this->tabelaNosilacOsiguranja(ime,prezime,datum_rodjenja,broj_pasosa,telefon,email,datum_putovanja,datum_isteka_putnog_osiguranja, broj_dana, individualno_grupno, poslato) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$ime, $prezime, $datumRodjenja, $brojPasosa, $telefon, $email, $datumPutovanja, $datumIsteka, 10, $vrstaPolise, date('m.d.Y')]);

        //dobijanje poslednjeg id-a lastInsertId() NE RADI NE ZNAM STO!
        $query = "SELECT id FROM $this->tabelaNosilacOsiguranja ORDER BY id DESC LIMIT 1";
        $exec = $this->connect()->query($query);
        $lastId = $exec->fetchColumn();
        
        //kreirati lica za grupni odabir polise osiguranja ako postoje
        if($podaci["grupni_broj_lica"] > 0 && $podaci["vrsta_polise"] == 2){
            $this->unesiGrupnaLica($lastId, $podaci);
        }

        return true;
    }

    public function unesiGrupnaLica($idNosiocaGrupe, $potrebniPodaci){
        
        for($i = 1; $potrebniPodaci["grupni_broj_lica"] >= $i; $i++){
            $sql = "INSERT INTO $this->tabelaDodatnaLicaNaPolisi(nosilac_osiguranja_id, dodatno_ime, dodatno_prezime, dodatno_broj_telefona, dodatno_broj_pasosa) VALUES (?, ?, ?, ?, ?)";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$idNosiocaGrupe, $potrebniPodaci["dodatno_ime$i"], $potrebniPodaci["dodatno_prezime$i"], $potrebniPodaci["dodatno_broj_telefona$i"], $potrebniPodaci["dodatno_broj_pasosa$i"]]);

        }

    }

    public function dobijanjeNosiocaOsiguranja(){
        
        $podaci = [];

        $sql = "SELECT nosilac_osiguranja.*, dodatna_lica_na_polisi.*, GROUP_CONCAT(dodatna_lica_na_polisi.dodatno_ime SEPARATOR ', ') as sva_imena_lica,
        GROUP_CONCAT(dodatna_lica_na_polisi.dodatno_prezime SEPARATOR ', ') as sva_prezimena_lica,
        GROUP_CONCAT(dodatna_lica_na_polisi.dodatno_broj_telefona SEPARATOR ', ') as svi_brojevi_telefona,
        GROUP_CONCAT(dodatna_lica_na_polisi.dodatno_broj_pasosa SEPARATOR ', ') as svi_brojevi_pasosa
        FROM nosilac_osiguranja
        LEFT JOIN dodatna_lica_na_polisi ON nosilac_osiguranja.id = dodatna_lica_na_polisi.nosilac_osiguranja_id
        WHERE nosilac_osiguranja.id = dodatna_lica_na_polisi.nosilac_osiguranja_id";

        // $sql = "SELECT ime, prezime, datum_rodjenja, broj_pasosa, telefon, email, datum_putovanja, datum_isteka_putnog_osiguranja, broj_dana, individualno_grupno, dodatno_ime, dodatno_prezime, dodatno_broj_telefona, dodatno_broj_pasosa
        // FROM nosilac_osiguranja 
        // JOIN dodatna_lica_na_polisi
        // ON dodatna_lica_na_polisi.nosilac_osiguranja_id = nosilac_osiguranja.id 
        // ";

        // $sql = "SELECT * FROM $this->tabelaNosilacOsiguranja";

        $stmt = $this->connect()->query($sql);
        
        while($row = $stmt->fetch()){
            $podaci[] = $row;
        }

        return $podaci;
    }
}