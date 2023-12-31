let grantCredits = document.querySelectorAll(".accorder");
let messageContainer = document.querySelector(".message");
let grantCreditButton = document.querySelectorAll(".grantButton");
let avecVerifParam = Number(document.querySelector(".id").id);

for (let index = 0; index < grantCreditButton.length; index++) {
    const element =Number((grantCreditButton[index].parentNode).id) ;
    // console.log(element,avecVerifParam);
    verifyPreviousCredit(element, avecVerifParam , (Status) => {
        if (Status === 1 || Status === 2 ) {
            console.log("Payed",grantCreditButton[index].parentNode.parentNode);
            
        } else {
            (grantCreditButton[index].parentNode.parentNode).style.display = "none";
          
      
        }

    });
   
}

grantCreditButton.forEach(element  => {
    element.addEventListener("click", (ev) =>{
   
        let par = ev.currentTarget.parentNode;
        let parent = par.parentNode;
        let interestRate = Number(document.querySelector("#tauxIn").innerHTML)
       
        let idAvec = Number(document.querySelector(".id").id);
        let dateCr = dateCredit();
        const id = parent.querySelector(".num");
        let idMember = Number(id.id);
        let amount = Number(parent.querySelector("#montant").value);
        getEpargneTotal(idMember,(amountSaved) =>{

            //Checking wether the amount is equal to three times the total amount Saved 
            if (amount === (3*amountSaved)) {
                console.log(idAvec,dateCr, amount)
                //Taking interest On credit 
                let interet = amount*interestRate/100
                let amountTogrant = amount  - (interet);
               
                // let warningBox = document.querySelector(".mess");

                //Granting Credit 
                grantCredit(idAvec,amountTogrant,idMember,dateCr);
                parent.style.display = "none";
                
             
                messageContainer.innerHTML = `
                Credit accordé  : ${amount} USD
                `
                messageContainer.classList.remove("hidden-message");
                messageContainer.classList.add("shown-message-success");
                setTimeout(() => {
                    messageContainer.classList.add("hidden-message");
                    messageContainer.classList.add("shown-message-success");
                }, 2000);

                //Grating Credit
              


            } else {
                messageContainer.innerHTML = `
                Credit Refusé : ${amount} USD, Montant Suggere ${3*amountSaved}
                `
                messageContainer.classList.remove("hidden-message");
                messageContainer.classList.add("shown-message-failure");
                setTimeout(() => {
                    messageContainer.classList.add("hidden-message");
                    messageContainer.classList.remove("shown-message-failure");
                }, 2000);
            }

        });
            
    })

})

function verifyPreviousCredit(idMember , idAvec  , callback) {
    var data = new FormData();
    data.append("id_membre", idMember);
    data.append("id_avec",idAvec);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);
                    callback(response.Status);
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

    xhr.open('POST', '../controllers/Credits/empruntsByid.php');
    xhr.send(data);
}



function getEpargneTotal(idMember, callback) {
    data = new FormData() ;
    data.append("idMember", idMember);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            amountSaved = Number(xhr.response);
            callback(amountSaved);
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/epargnes/amountSaved.php');
    xhr.send(data);
}



function dateCredit() {
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

    function grantCredit(id_avec, montant, id_membre, date) {
        // Créer un objet FormData pour envoyer les données
        var data = new FormData();
        data.append('idAvec', id_avec);
        data.append('montant', montant);
        data.append('idMembre', id_membre);
        data.append('dateCredit', date);
    
        // Créer une nouvelle requête XMLHttpRequest
        var xhr = new XMLHttpRequest();
    
        // Définir la fonction à exécuter lorsque l'état de la requête change
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("response", xhr.response, "end Answer");
                const messageConfirm = xhr.response;
    
                // Traiter la réponse comme nécessaire
            } else {
                console.log("request failed");
            }
        };
    
        // Ouvrir la requête avec la méthode POST et l'URL du serveur
        xhr.open('POST', '../controllers/Credits/emprunter.php');
    
        // Envoyer les données avec la requête
        xhr.send(data);
    }
    
function updateSolde(id_avec, amount) {
      // Créer un objet FormData pour envoyer les données
      var data = new FormData();
      data.append('idAvec', id_avec);
      data.append('montant', montant);
      
  
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
    
    
    

// function activateButton(idMember) {
//     let accorderButtons = document.querySelectorAll(".grantButton");
//     accorderButtons.forEach(button =>{
       
//         if (Number((button.parentNode).id) === idMember) {
//             button.classList.remove("desactivated");
//             button.classList.add("activated");
//             button.desabled = true;
//             button.innerHTML = `Accorder`;
//         }
//     })
    
// }

// function dasactivateButton (idMember) {
//     let accorderButtons = document.querySelectorAll(".grantButton");
//     accorderButtons.forEach(button =>{
       
//         if (Number((button.parentNode).id) === idMember) {
//             button.classList.add("desactivated");
//             button.desabled = false;
//             button.innerHTML = `Credit en cours`;
//         }
//     })

// }


    