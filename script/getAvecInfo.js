const avecConent = document.querySelectorAll(".avec-content");

avecConent.forEach(element => {
    element.addEventListener("click" , (ev) => {
        parent = ev.currentTarget;
        const avec =parent.querySelector(".avec");
        getData( parseInt(avec.id));
       
    })
});


function getData(id) {
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

    xhr.open('POST', '../controllers/avec/getAvecId.php');
    xhr.send(data);
}

