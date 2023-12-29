
getAllCredits()
function getAllCredits() {
   
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let listeCredits = document.querySelector(".liste-credits");
            const response = xhr.response;
            listeCredits.innerHTML = response;
           

        } else {
            console.log("request failed");
        }
    }
    xhr.open('GET', '../controllers/Credits/getEmprunts.php');
    xhr.send(null);
}
