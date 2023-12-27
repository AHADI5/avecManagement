const addMemberButton = document.querySelector(".new-member");
const popupContainer = document.querySelector(".add-member-popup");
const pageContainer = document.querySelector("body");
const closeButton = document.querySelector(".close-popup");
addMemberButton.addEventListener("click" , () => {
    popupContainer.classList.toggle("inactive_popup");
    // pageContainer.style.opacity = 0.2;
    
    getData() ;

})

//closing popup 

closeButton.addEventListener("click" , () => {
    popupContainer.classList.add("inactive_popup");
} )

//Getting Members , and adding listeners to those buttons
function getData() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const memberZone = document.querySelector(".membres");
            const response = xhr.response;
            memberZone.innerHTML = response;

            let membersToadd = document.querySelectorAll(".cell-act");
            membersToadd.forEach(element => {
                element.addEventListener("click" , (ev) => {
                    let parent= (ev.currentTarget).parentNode;
                    let id = parent.querySelector("#id_membre");
                    let id_membre = parseInt(id.innerHTML);
                    console.log(id_membre);

                })
                
            });
           

        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/membres/getMembreWithActibs.php');
    xhr.send(data);
}

//Adding members to avec created
