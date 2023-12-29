let rembourserButton = document.querySelector(".rembourser");
rembourserButton.addEventListener("click", () =>{
    let id = document.querySelector(".id");
    remRedirection(id.id);
})

function remRedirection(id) {
    data  = new FormData() ;
    data.append('id_avec' , id);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const response = xhr.response;
            let execution = new Function(response);
            execution();

        } else {
            console.log("request failed");
        }

    }
    xhr.open('POST', '../controllers/remboursement/remRedirection.php');
    xhr.send(data);
}