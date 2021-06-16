<?php 
include 'inc/navigacija.php';
$podaciZaDobijanjeOsiguranja = new \src\PutnoOsiguranje;

?>

<table>
  <tr>
    <th>Datum unosa polise</th>
    <th>Ime i prezime nosioca</th>
    <th>Datum rodjenja</th>
    <th>Broj pasosa</th>
    <th>Email</th>
    <th>Datum Putovanja od</th>
    <th>Datum Putovanja do</th>
    <th>Broj dana</th>
    <th>Individualno/Grupno osiguranje</th>
    <th>Akcije</th>
  </tr>
  <?php 
    $podaci = $podaciZaDobijanjeOsiguranja->dobaviPodatkeZaOsiguranje(); 
    foreach($podaci as $podatak){
  ?>
    <tr>
        <td><?php echo $podatak["poslato"]; ?></td>
        <td><?php echo $podatak["ime"] . " " . $podatak["prezime"];  ?></td>
        <td><?php echo $podatak["datum_rodjenja"];?></td>
        <td><?php echo $podatak["broj_pasosa"];?></td>
        <td><?php echo $podatak["email"];?></td>
        <td><?php echo $podatak["datum_putovanja"];?></td>
        <td><?php echo $podatak["datum_isteka_putnog_osiguranja"];?></td>
        <td><?php echo $podatak["broj_dana"];?></td>
        <td><?php echo ($podatak["individualno_grupno"] == 1) ? "Ima Grupno" : "Nema Grupno"; ?></td>
        <td><?php
            if($podatak["individualno_grupno"] == 1){
                ?><button id="toggle" type="button">Pogledaj</button>
                  <div class="dodatna_polja">
                      <small class="dodatna_polja_lica"><?php echo "imena: " . $podatak["sva_imena_lica"] . "<br/>"; ?></small>
                      <small class="dodatna_polja_lica"><?php echo "prezimena : " . $podatak["sva_prezimena_lica"] . "<br/>"; ?></small>
                      <small class="dodatna_polja_lica"><?php echo "brojevi : " . $podatak["svi_brojevi_telefona"] . "<br/>"; ?></small>
                      <small class="dodatna_polja_lica"><?php echo "brojevi pasosa : " . $podatak["svi_brojevi_pasosa"] . "<br/>"; ?></small>
                  </div>
                <?php
            }
        ?></td>
    </tr>

  <?php } ?>
</table>


<script src="public/assets/javascript/dobijanjeGrupnihLica.js"></script>
<?php 
    include 'inc/futer.php';
?>