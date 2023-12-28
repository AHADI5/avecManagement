let id = document.querySelector(".id");
getData(Number(id.id));
// getAvecMembers(parseInt(id.id));
function getData(id) {
    data  = new FormData() ;
    data.append('id_avec' ,id)
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const infoZone = document.querySelector(".informations-avec");
            const response = xhr.response;
           infoZone.innerHTML = response;
           

        } else {
            console.log("request failed");
        }
    }
    xhr.open('POST', '../controllers/avec/getAvecIdInfo.php');
    xhr.send(data);
}


function getAvecMembers(id_avec) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let reponse = xhr.response;
            const memberZone  = document.querySelector(".members");
            memberZone.innerHTML = reponse;
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/getMembers.php');
    xhr.send(data);
}
