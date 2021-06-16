window.addEventListener('DOMContentLoaded', (e) => {
    //html elementi
    const forma = document.getElementById('nova_prijava')
    const ime = document.getElementById('ime')
    const prezime = document.getElementById('prezime')
    const datum_rodjenja = document.getElementById('datum_rodjenja')
    const broj_pasosa = document.getElementById('broj_pasosa')
    const telefon = document.getElementById('telefon')
    const email = document.getElementById('email')
    const datum_putovanja = document.getElementById('datum_putovanja')
    const datum_isteka_ps = document.getElementById('datum_isteka_ps')
    const errorElement = document.getElementById('error')
    const grupni_broj_lica = document.getElementById('grupni_broj_lica')

    //usled sabmitovanja forme pokreni validaciju
    forma.addEventListener('submit', (event)=>{
        let messages = ['Polja sa zvezdicama su obavezna']

        //validacija imena 
        if(ime.value === '' || ime.value == null){
            messages.push('Polje ime je obavezno')
        } else if(ime.value.length > 50){
            messages.push('Polje sa imenom je predugacko')
        }

        // validacija prezimena
        if(prezime.value === '' || prezime.value == null){
            messages.push('Polje prezime je obavezno')
        } else if(prezime.value.length > 50){
            messages.push('Polje sa prezimenom je predugacko')
        }

        //validacija i regex za ispravan datum rodjenja
        if(!proveraDatumaRodjenja(datum_rodjenja.value)){
            messages.push('Polje sa datumom rodjenja nije ispravno uneseno, pogledajte kako je potrebno napisati')
        }

        //validacija i regex za broj pasosa
        if(!proveraBrojaPasosa(broj_pasosa.value)){
            messages.push('Broj pasosa nije validan mora imati 9 brojeva')
        }

        //validacija i regex broja telefona
        if(!proveraTelefona(telefon.value)){
            messages.push('Polje sa brojem telefona nije ispravno')
        }

        //validacija i regex mejlova
        if(!proveraMejla(email.value)){
            messages.push('Email nije validan, pogledajte na polju primer kako je ispravno')
        }

        //validacija i regex za datum putovanja
        if(!proveraDatumaRodjenja(datum_putovanja.value)){
            messages.push('Nije pravilan format datuma putovanja')
        }
        
        //validacija i regex za datum isteka osiguranja
        if(!proveraDatumaRodjenja(datum_isteka_ps.value)){
            messages.push('Nije pravilan format datuma isteka putovanja')
        }

        //izvrsiti validaciju ako je dodato polje za grupna lica
        if(grupni_broj_lica.value > 0){



            for(let i = 1; grupni_broj_lica.value >= i; i++){

                //html elementi
                const dodatno_ime = document.getElementById("dodatno_ime"+i)
                const dodatno_prezime = document.getElementById("dodatno_prezime"+i)
                const dodatno_broj_telefona = document.getElementById("dodatno_broj_telefona"+i)
                const dodatno_broj_pasosa = document.getElementById("dodatno_broj_pasosa"+i)

                //provera da podnosioc ne moze da ima isti broj pasosa sa dodatnim licem
                if(broj_pasosa.value === dodatno_broj_pasosa.value){
                    messages.push('Broj pasosa nosioca putnog osiguranja ne moze biti isti sa dodatnim licem')
                }

                //validacija dodatnog imena
                if(dodatno_ime.value === ''){
                    messages.push('Ime za grupno lice mora biti popunjeno')
                }

                //validacija dodatnog prezimena
                if(dodatno_prezime.value === ''){
                    messages.push('Prezime za grupno lice mora biti popunjeno')
                }

                //validacija i regex dodatnog broja telefona
                if(!proveraTelefona(dodatno_broj_telefona.value)){
                    messages.push('Polje sa brojem telefona za grupno lice nije ispravno')
                }

                //validacija i regex dodatnog broja pasosa
                if(!proveraBrojaPasosa(dodatno_broj_pasosa.value)){
                    messages.push('Polje sa brojem pasosa za grupno lice nije ispravno')
                }

            }

        }
        //validacija ako dodatna polja na grupnoj polisi osiguranja imaju iste vrednosti i ako je dodato vise od jednog lica
        if(grupni_broj_lica.value > 1){
            console.log('uslo')
            for(let j = 1; grupni_broj_lica.value >= j; j++){
                
                for(let k = 1; grupni_broj_lica.value >= k; k++){
                    if(j !== k){
                        if(document.getElementById("dodatno_ime"+j).value == document.getElementById("dodatno_ime"+k).value){
                            
                            messages.push('Ista dodatna imena na grupnoj vrsti polise nisu dozvoljeni, broj imena: '+j)
                            
                        }
                        if(document.getElementById("dodatno_prezime"+j).value == document.getElementById("dodatno_prezime"+k).value){
                            
                            messages.push('Ista dodatna prezimena na grupnoj vrsti polise nisu dozvoljeni, broj prezimena: '+j)
                            
                        }
                        if(document.getElementById("dodatno_broj_telefona"+j).value == document.getElementById("dodatno_broj_telefona"+k).value){
                            
                            messages.push('Isti dodatni brojevi telefona na grupnoj vrsti polise nisu dozvoljeni, broj telefona: '+j)
                            
                        }
                        if(document.getElementById("dodatno_broj_pasosa"+j).value == document.getElementById("dodatno_broj_pasosa"+k).value){
                            
                            messages.push('Isti dodatni brojevi pasosa na grupnoj vrsti polise nisu dozvoljeni, broj pasosa: '+j)
                            
                        }
                    }
                }
            }
        }

        if(messages.length > 1){
            event.preventDefault()
            errorElement.innerText = messages.join(', \n')
        }
    })
    
    function proveraMejla(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email)
    }

    function proveraTelefona(broj){
        return /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(broj)
    }

    function proveraDatumaRodjenja(datum){
        return /^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/.test(datum)
    }

    function proveraBrojaPasosa(broj){
        return /^[0-9]{9}$/.test(broj)
    }
    

});