let id = document.querySelector(".id");
getData(Number(id.id))
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

