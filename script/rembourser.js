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
                        let montantCredit = Number(parent.querySelector(".creditNumber").id)
                        console.log(idMember, idAvec, montant, montantCredit);
                    })
                })
            } else {
                console.log("request failed");
            }
        }
        xhr.open('POST', '../controllers/Credits/empruntsAvec.php');
        xhr.send(data);

    
   }



function rembouser() {
    
}