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
    
        update(montant,idAvec,idMember, (amountRemains) =>{
            let creditContainer = parent.querySelector(".creditNumber");
            creditContainer.innerHTML = amountRemains + " USD";

        } );
        payBack(idMember,Credit,idAvec,dateRem,montant);
        // console.log(`idMember ${idMember},idAvec ${idAvec},montant ${montant},Credit${Credit},dateRem ${dateRem}`)
    })
})


function payBack (idMembre, idCredit,idAvec,dateRemboursement, amount) {
    data = new FormData() ;
    data.append("idMembre", idMembre);
    data.append("idCredit", idCredit);
    data.append("idAvec", idAvec);
    data.append("dateRemboursement", dateRemboursement);
    data.append("amount", amount);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
         
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/remboursement/rembourser.php');
    xhr.send(data);
}


function update(newAmount,idAvec,idMember, callback) {
    var data = new FormData();
    data.append("montant", newAmount);
    data.append("id_membre",idMember);
    data.append("id_avec",idAvec);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);
                    // console.log("Amount :", response.Montant);
                    callback(response.Montant)

                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("Request failed with status:", xhr.status);
            }
        }
    };


    xhr.open('POST', '../controllers/Credits/payCredit.php');
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

console.log(dateRemb());