getAllEpargnes()


function getAllEpargnes() {
   
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let epargnesZone = document.querySelector(".liste-epargnes-all");
            const response = xhr.response;
            epargnesZone.innerHTML = response;
           

        } else {
            console.log("request failed");
        }
    }
    xhr.open('GET', '../controllers/epargnes/getEpargnes.php');
    xhr.send(null);
}
