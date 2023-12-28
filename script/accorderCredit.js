let grantCredits = document.querySelectorAll(".accorder");
let messageContainer = document.querySelector(".message");

grantCredits.forEach(element  => {
    element.addEventListener("click", (ev) =>{
   
        let parent = ev.currentTarget.parentNode;
        let idAvec = Number(document.querySelector(".id").id);
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

function date(params) {
    
}

function grantCredit() {
    
}