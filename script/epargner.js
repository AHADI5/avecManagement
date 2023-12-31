let register = document.querySelectorAll(".enregistrer");
console.log(register);
let dateZone = document.querySelector(".date-zone");
dateZone.innerHTML = getDate();
register.forEach(element => {
   element.addEventListener("click" , (ev) => {
     let parent = ev.currentTarget.parentNode;
     const id = parent.querySelector(".num");
     let idMember = Number(id.innerHTML)
     let idAvec = Number(document.querySelector(".id").id);
     let parts = Number(parent.querySelector("#parts").value);
     let socialAmount = Number(parent.querySelector("#social").value);
     let part_value = Number(document.querySelector(".part").id);
    
     let amount = parts * part_value; // le montant eparngne
     let date = getDate();
    

     //Saving 
    checkEpargne(idAvec,idMember, (dates) => {
        if (dates.includes(date.split(" ")[0])) {
            let warningBox = document.querySelector(".confirmation-message");
            warningBox.innerHTML = "Deja Contribuer Aujourd'ui !"; 
            warningBox.classList.add("shown-message-success");
            setTimeout(() =>{
                warningBox.classList.add("hidden-message");
            }, 2000); 
          
        } else {
            let warningBox = document.querySelector(".confirmation-message");
            warningBox.innerHTML = "Contribution Reusie !!"; 
            setTimeout(() =>{
                warningBox.classList.add("hidden-message");
            }, 2000); 
            Epargner(idAvec,idMember,amount,parts,date);
            social(idAvec,idMember,date,socialAmount);
            updateSolde(idAvec,amount);
        }
    });
    
    console.log("here are params :" ,idMember,idAvec,socialAmount, amount, date)
    
     
    

    //  console.log(idMember,idAvec,parts,social, part_value, amount, date);
    
     
   }) 
});

function Epargner(id_avec, id_membre, montant, parts, date) {
    data  = new FormData() ;
    data.append('idAvec' , id_avec);
    data.append('montant' ,montant);
    data.append('idMembres' , id_membre);
    data.append('date',date);
    data.append('parts',parts)
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const response = xhr.response;
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/epargnes/epargner.php');
    xhr.send(data);
}

function social(id_avec, id_membre,dateSocial, montant) {
    data  = new FormData() ;
    data.append('idAvec' , id_avec);
    data.append('amount' ,montant);
    data.append('idMembre' , id_membre);
    data.append('dateSocial',dateSocial);
   
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const response = xhr.response;
        } else {
            console.log("request failed");
        }

    }
    xhr.open('POST', '../controllers/Social/contribute.php');
    xhr.send(data);   
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

function updateSolde(id_avec, amount) {
    // Créer un objet FormData pour envoyer les données
    var data = new FormData();
    data.append('id_avec', id_avec);
    data.append('montant', amount);
    

    // Créer une nouvelle requête XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Définir la fonction à exécuter lorsque l'état de la requête change
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log("response", xhr.response, "end Answer");
            

            // Traiter la réponse comme nécessaire
        } else {
            console.log("request failed");
        }
    };

    // Ouvrir la requête avec la méthode POST et l'URL du serveur
    xhr.open('POST', '../controllers/avec/updateSolde.php');

    // Envoyer les données avec la requête
    xhr.send(data);
  
}

function checkEpargne(id_avec, id_member, callback) {
    var data = new FormData();
    data.append('id_avec', id_avec);
    data.append('id_membre', id_member);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);
                    console.log(response);
                    callback(response);
                    //Verifying Wether the member has a credit 
                    

                    //  If the amount is Zero the button is activated

            
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("Request failed with status:", xhr.status);
            }
        }
    };


    // Ouvrir la requête avec la méthode POST et l'URL du serveur
    xhr.open('POST', '../controllers/epargnes/getAvecEpargnes.php');

    // Envoyer les données avec la requête
    xhr.send(data);
    
}
