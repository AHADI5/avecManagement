let register = document.querySelectorAll(".enregistrer");
let dateZone = document.querySelector(".date-zone");
dateZone.innerHTML = getDate();
register.forEach(element => {
   element.addEventListener("click" , (ev) => {
     let parent = ev.currentTarget.parentNode;
     const id = parent.querySelector(".num");
     let idMember = Number(id.innerHTML)
     let idAvec = Number(document.querySelector(".id").id);
     let parts = Number(parent.querySelector("#parts").value);
     let social = Number(parent.querySelector("#social").value);
     let part_value = Number(document.querySelector(".part").id);
    
     let amount = parts * part_value; // le montant eparngne
     let date = getDate();

     console.log(idMember,idAvec,parts,social, part_value, amount, date);
    
     
   }) 
});

function Epargner(id_avec, id_membre, montant, parts, date) {
    data  = new FormData() ;
    data.append('id_avec' , id_avec);
    data.append('')
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const response = xhr.response;
            let execution = new Function(response);
            execution();

        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/epargnes/epargnesRediredtion.php');
    xhr.send(data);
}

function social(id_avec, id_membre, montant, parts) {
    
}

function getDate() {
const currentDate = new Date();
    // Obtenir les composants de la date
const year = currentDate.getFullYear();
const month = (`0${currentDate.getMonth() + 1}`).slice(-2); // Les mois commencent à 0, donc ajouter 1 et formater avec deux chiffres
const day = (`0${currentDate.getDate()}`).slice(-2);
const hours = (`0${currentDate.getHours()}`).slice(-2);
const minutes = (`0${currentDate.getMinutes()}`).slice(-2);
const seconds = (`0${currentDate.getSeconds()}`).slice(-2);

// Construire la chaîne de format DATETIME
const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
return formattedDateTime;
    
}

