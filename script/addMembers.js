const addMemberButton = document.querySelector(".new-member");
const popupContainer = document.querySelector(".add-member");
const pageContainer = document.querySelector("body");
const closeButton = document.querySelector(".close-popup");

const id_avec =document.querySelector(".page-level>.id");
addMemberButton.addEventListener("click" , () => {
  
   
    popupContainer.classList.toggle("inactive_popup");
  
    getData() ;

})

// // when clik outiside the box , close the popup
window.onclick = (event) => {
    if (event.target == popupContainer) {
      popupContainer.classList.toggle("inactive_popup");
    }
  }

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
                    // console.log(id_membre);
                    // console.log();
                    sendData(parseInt(id_avec.id),id_membre);
                    getAvecMembers(parseInt(id_avec.id));
                })
                
            });
           

        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../controllers/membres/getMembreWithActibs.php');
    xhr.send(null);
}

//Adding members to avec created
function sendData(id_avec, id_membre) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    data.append("id_member", id_membre);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
           
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/addMember.php');
    xhr.send(data);
}

//getting Avec Members 
function getAvecMembers(id_avec) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let reponse = xhr.response;
            const memberZone  = document.querySelector(".membres-list");
            memberZone.innerHTML = reponse;
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/getMembers.php');
    xhr.send(data);
}



