getAllsocial()


function getAllsocial() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let socialZone = document.querySelector(".liste-contributions");
            const response = xhr.response;
            socialZone.innerHTML = response;
           

        } else {
            console.log("request failed");
        }
    }
    xhr.open('GET', '../controllers/Social/getSocial.php');
    xhr.send(null);
}
