const addMemberButton = document.querySelector(".new-member");
const popupContainer = document.querySelector(".add-member-popup");
const pageContainer = document.querySelector("body");
addMemberButton.addEventListener("click" , () => {
    popupContainer.classList.toggle("inactive_popup");
    pageContainer.style.opacity = 0.2;
    
    getData() ;

})
function getData() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const memberZone = document.querySelector(".membres");
            const response = xhr.response;
            memberZone.innerHTML = response;
           

        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/membres/getMembreWithActibs.php');
    xhr.send(data);
}