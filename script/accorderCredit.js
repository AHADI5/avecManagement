let grantCredits = document.querySelectorAll(".accorder");
let messageContainer = document.querySelector(".message");
let grantCreditButton = document.querySelectorAll(".accorder");

for (let index = 0; index < grantCreditButton.length; index++) {
    const element =Number(grantCreditButton[index].id) ;
    console.log(element);
    verifyPreviousCredit(element);
   
}

grantCredits.forEach(element  => {
    element.addEventListener("click", (ev) =>{
   
        let parent = ev.currentTarget.parentNode;
        let idAvec = Number(document.querySelector(".id").id);
        let dateCr = dateCredit();
        const id = parent.querySelector(".num");
        let idMember = Number(id.id);
        let amount = Number(parent.querySelector("#montant").value);
        getEpargneTotal(idMember,(amountSaved) =>{

            //Checking wether the amount is equal to three times the total amount Saved 
            if (amount === (3*amountSaved)) {
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
                grantCredit(idAvec,amount,idMember,dateCr)


            } else {
                messageContainer.innerHTML = `
                Credit Refusé : ${amount} USD
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

function verifyPreviousCredit(idMember) {
    var data = new FormData();
    data.append("id_member", idMember);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);
                    //Verifying Wether the member has a credit 
                    if (response.isEmpty) {
                        console.log("Empty");
                    } else {
                        console.log("Not Empty, id_member:", response.id_member);
                        let accorderButtons = document.querySelectorAll(".accorder");
                        accorderButtons.forEach(button =>{
                            if (Number(button.id) === idMember) {
                                
                                button.style.color = "red";
                                button.innerHTML = `Credit`;
                            }
                        })
                    }
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

function grantCredit(id_avec,montant,id_membre,date , callback) {
    data  = new FormData() ;
    data.append('idAvec' , id_avec);
    data.append('montant' ,montant);
    data.append('idMembre' , id_membre);
    data.append('dateCredit',date);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const messageConfirm = xhr.response;
           
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/Credits/emprunter.php');
    xhr.send(data);
    
}


    
    