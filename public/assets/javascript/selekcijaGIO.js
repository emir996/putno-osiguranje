window.addEventListener('DOMContentLoaded', (event) => {

    //selektori za html elemente
    const polje_za_dodatna_lica = document.getElementById('grupno_lice')
    const odabir_vrste_polise = document.getElementById('vrsta_polise')
    const dodavanje_novih_lica = document.getElementById('nova_lica')
    const broj_dodatnih_lica = document.getElementById('grupni_broj_lica')

    let brojac = 0

    //iskljucivanje dugmeta za dodavanje novih lica
    dodavanje_novih_lica.hidden = true;

    // event handler koji se aktivira kada se klikne na selekciju vrste polise osiguranja 
    odabir_vrste_polise.addEventListener('change', (e)=>{

        //pritiskom selekcije za grupnu polisu
        if(e.target.value == 2){
            //prikazuje se dugme za dodavanje novih lica i generisu polja
            dodavanje_novih_lica.hidden = false
            brojac++;
            polje_za_dodatna_lica.innerHTML += generisiDodatnaPolja(brojac)
            broj_dodatnih_lica.value = brojac

        } else {

            //ovde ako se klikne opet na individualnu selekciju gasi se dugme za dodavanje i polja se resetuju i brisu iz forme
            dodavanje_novih_lica.hidden = true
            polje_za_dodatna_lica.innerHTML = ""
            brojac = 0
            broj_dodatnih_lica.value = 0

        }

    })
    //generisanje dodatnih polja za grupno osiguranje
    dodavanje_novih_lica.addEventListener('click', (event)=>{
        brojac+=1

        broj_dodatnih_lica.value = brojac
        let prekid = document.createElement("BR")


        let kreiraj_label_za_dodatno_ime = document.createElement("LABEL")
        kreiraj_label_za_dodatno_ime.htmlFor = "dodatno_ime" + brojac
        kreiraj_label_za_dodatno_ime.innerHTML = "Ime " + brojac + ": "


        let kreiraj_dodatno_ime = document.createElement("INPUT")
        kreiraj_dodatno_ime.id = "dodatno_ime" + brojac
        kreiraj_dodatno_ime.name = "dodatno_ime" + brojac
        kreiraj_dodatno_ime.type = "text"
        kreiraj_dodatno_ime.classList.add("dodatno_ime")


        polje_za_dodatna_lica.append(kreiraj_label_za_dodatno_ime)
        polje_za_dodatna_lica.append(kreiraj_dodatno_ime)
        polje_za_dodatna_lica.appendChild(prekid)


        let kreiraj_label_za_dodatno_prezime = document.createElement("LABEL")
        kreiraj_label_za_dodatno_prezime.htmlFor = "dodatno_prezime" + brojac
        kreiraj_label_za_dodatno_prezime.innerHTML = "Prezime " + brojac + ": "


        let kreiraj_dodatno_prezime = document.createElement("INPUT")
        kreiraj_dodatno_prezime.id = "dodatno_prezime" + brojac
        kreiraj_dodatno_prezime.name = "dodatno_prezime" + brojac
        kreiraj_dodatno_prezime.type = "text"
        kreiraj_dodatno_ime.classList.add("dodatno_prezime")
        

        polje_za_dodatna_lica.append(kreiraj_label_za_dodatno_prezime)
        polje_za_dodatna_lica.append(kreiraj_dodatno_prezime)
        polje_za_dodatna_lica.appendChild(prekid)


        let kreiraj_label_za_dodatno_broj_telefona = document.createElement("LABEL")
        kreiraj_label_za_dodatno_broj_telefona.htmlFor = "dodatno_broj_telefona" + brojac
        kreiraj_label_za_dodatno_broj_telefona.innerHTML = "Broj telefona " + brojac + ": "


        let kreiraj_dodatno_broj_telefona = document.createElement("INPUT")
        kreiraj_dodatno_broj_telefona.id = "dodatno_broj_telefona" + brojac
        kreiraj_dodatno_broj_telefona.name = "dodatno_broj_telefona" + brojac
        kreiraj_dodatno_broj_telefona.type = "text"
        kreiraj_dodatno_ime.classList.add("dodatno_broj_telefona")


        polje_za_dodatna_lica.append(kreiraj_label_za_dodatno_broj_telefona)
        polje_za_dodatna_lica.append(kreiraj_dodatno_broj_telefona)
        polje_za_dodatna_lica.appendChild(prekid)


        let kreiraj_label_za_dodatno_broj_pasosa = document.createElement("LABEL")
        kreiraj_label_za_dodatno_broj_pasosa.htmlFor = "dodatno_broj_pasosa" + brojac
        kreiraj_label_za_dodatno_broj_pasosa.innerHTML = "Broj pasosa " + brojac + ": "


        let kreiraj_dodatno_broj_pasosa = document.createElement("INPUT")
        kreiraj_dodatno_broj_pasosa.id = "dodatno_broj_pasosa" + brojac
        kreiraj_dodatno_broj_pasosa.name = "dodatno_broj_pasosa" + brojac
        kreiraj_dodatno_broj_pasosa.type = "text"
        kreiraj_dodatno_ime.classList.add("dodatno_broj_telefona")


        polje_za_dodatna_lica.append(kreiraj_label_za_dodatno_broj_pasosa)
        polje_za_dodatna_lica.append(kreiraj_dodatno_broj_pasosa)
        polje_za_dodatna_lica.appendChild(prekid)

    })
    
// funkcija za kreiranje inputa za dodatna lica
    function generisiDodatnaPolja(broj){
        return `
            <label for="dodatno_ime${broj}">Ime ${broj}: </label>
            <input type="text" class="dodatno_ime" name="dodatno_ime${broj}" id="dodatno_ime${broj}" /><br/>
            
            <label for="dodatno_prezime${broj}">Prezime ${broj}: </label>
            <input type="text" class="dodatno_prezime" name="dodatno_prezime${broj}" id="dodatno_prezime${broj}" /><br/>
        
            <label for="dodatno_broj_telefona${broj}">Broj Telefona ${broj}: </label>
            <input type="text" class="dodatno_broj_telefona" name="dodatno_broj_telefona${broj}" id="dodatno_broj_telefona${broj}" /><br/>

            <label for="dodatno_broj_pasosa${broj}">Broj Pasosa ${broj}: </label>
            <input type="text" class="dodatno_broj_pasosa" name="dodatno_broj_pasosa${broj}" id="dodatno_broj_pasosa${broj}" /><br/>
        `
    }

});



