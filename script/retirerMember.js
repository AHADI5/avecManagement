let deleteButtons = document.querySelectorAll(".cell-dell");
const avecIdPag = parseInt(document.querySelector(".id").id)
deleteButtons.forEach(element => {
   element.addEventListener("click" , (ev) => {
     let parent = ev.currentTarget.parentNode;
   
     let id = parent.querySelector(".num");
     console.log(id);
     deleteMember(parseInt(id.innerHTML));
   }) 
});

function deleteMember(idMember) {
    data = new FormData() ;
    data.append("id_member", idMember);
   
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            if (xhr.response === "Deleted") {
                //updating liste
                // getMembers();
                getAvecMembers(avecIdPag);
                
            }
           
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/membres/deleteMember.php');
    xhr.send(data); 
}


function getAvecMembers(id_avec) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= () => {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let reponse = xhr.response;
            const memberZone  = document.querySelector(".membres-list");
            memberZone.innerHTML = reponse;
            let deleteButtons = document.querySelectorAll(".cell-dell");
          
            deleteButtons.forEach(element => {
            element.addEventListener("click" , (ev) => {
                let parent = ev.currentTarget.parentNode;
                let id = parent.querySelector(".num");
                console.log(id);
                deleteMember(parseInt(id.innerHTML));
            }) 
            });
                        
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/getMembersActions.php');
    xhr.send(data);
}