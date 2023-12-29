let idAv = Number(document.querySelector(".id").id);



getAvecCredit(idAv);
   function getAvecCredit(idAvecparam) {
        let data = new FormData();
        data.append("id_avec",idAvecparam);
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange= function() {
            if((xhr.readyState===4)&& (xhr.status===200)){
                console.log("response",xhr.response,"end Answer");
                let listeCreditsAvec = document.querySelector(".liste-creditsAvec");
                const response = xhr.response;
                listeCreditsAvec.innerHTML = response;
                let rembourser = document.querySelectorAll(".giveBack");
                rembourser.forEach(element =>{
                    element.addEventListener("click" , (ev) =>{
                        let parent = ev.currentTarget.parentNode;
                        const id = parent.querySelector(".num");
                        let idMember = Number(id.innerHTML);
                        let idAvec = Number(document.querySelector(".id").id);
                        let montant = Number(parent.querySelector("#montant").value);
                        let Credit = Number(parent.querySelector(".creditNumber").id);
                        let dateRem = dateRemb();
                        rembourser(idMember,Credit,idAvec,dateRem,montant);
                    })
                })
            } else {
                console.log("request failed");
            }
        }
        xhr.open('POST', '../controllers/Credits/empruntsAvec.php');
        xhr.send(data);

    
   }



function rembourser(idMembre, idCredit,idAvec,dateRemboursement, amount) {
    let data = new FormData() ;
    data.append("idMembre", idMembre);
    data.append("idCredit", idCredit);
    data.append("idAvec", idAvec);
    data.append("dateRemboursement", dateRemboursement);
    data.append("amount", amount);
    if((xhr.readyState===4)&& (xhr.status===200)){
        console.log("response",xhr.response,"end Answer");

    } else {
        console.log("request failed");
    }

    xhr.open('POST', '../controllers/remboursement/rembourser.php');
    xhr.send(data);
}

function update(newAmount) {
    let data = new FormData();
    data.append("amount", newAmount);
    if((xhr.readyState===4)&& (xhr.status===200)){
        console.log("response",xhr.response,"end Answer");

    } else {
        console.log("request failed");
    }

    xhr.open('POST', '../controllers/remboursement/rembourser.php');
    xhr.send(data);

}


    
function dateRemb() {
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
