<?php 
include 'inc/navigacija.php';
?>


<div id="putno_osiguranje" class="forma_za_prijavu_p_o">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="nova_prijava">
    <div class="form-control">
        <div id="error"></div>
        <label for="name">Ime *</label>
        <input type="text" id="ime" name="ime"/>
        <label for="name">Prezime *</label>
        <input type="text" id="prezime" name="prezime"/><br><br/>
        <label for="datum_rodjenja">Datum Rodjenja *</label>
        <input type="text" id="datum_rodjenja" name="datum_rodjenja" placeholder="dan.mesec.godina" /><br/><br/>
        <label for="datum_rodjenja">Broj Pasosa *</label>
        <input type="text" id="broj_pasosa" name="broj_pasosa"/><br/><br/>
        <label for="telefon">Telefon </label>
        <input type="text" id="telefon" name="telefon" placeholder="XXX-XXX-XXXX"/><br/><br/> 
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" placeholder="example@mail.com"/><br/><br/>
        <label for="datum_putovanja">Datum Putovanja *</label>
        <input type="text" id="datum_putovanja" name="datum_putovanja" placeholder="dan.mesec.godina" autocomplete="off" />
        <label for="datum_isteka_ps1">Do <strong>10 dana</strong>:</label>
        <input type="text" id="datum_isteka_ps1" disabled/>
        <input type="hidden" id="datum_isteka_ps" name="datum_isteka_ps"/><br/><br/>
        <label for="vrsta_polise">Odabir vrste polise osiguranja: </label>
        <select id="vrsta_polise" name="vrsta_polise">
            <option value="1">Individualno</option>
            <option value="2">Grupno</option>
        </select><br/><br/>
        <div id="grupno_lice">
        
        </div><br/>
        <input type="hidden" name="grupni_broj_lica" id="grupni_broj_lica" value="0"/>
        <button id="nova_lica" type="button" name="nova_lica">Dodaj novo lice</button><br/>
        <button name="podnesi_prijavu" type="submit">Prijavi se</button>
        </div>
    </form>
</div>






<script src="public/assets/javascript/selekcijaGIO.js"></script>
<script src="public/assets/javascript/datetimepicker.js"></script>
<!-- <script src="public/assets/javascript/validacija.js"></script> -->
<?php 
    include 'inc/futer.php';
?>
