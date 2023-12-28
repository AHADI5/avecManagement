let grantCredits = document.querySelectorAll(".accorder");
grantCredits.forEach(element  => {
    element.addEventListener("click", (ev) =>{
        let parent = ev.currentTarget.parentNode;
        let idAvec = Number(document.querySelector(".id").id);
        const id = parent.querySelector(".num");
        let idMember = Number(id.id);
        let amount = Number(parent.querySelector("#montant").value);
        console.log(amount, idMember, idAvec);       
    })

})

function accorderCredit(dateCredit, deadline , idMember,idAvec, montant) {
    
}

function getEpargne(idMember) {
    
}