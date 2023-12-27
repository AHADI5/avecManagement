let deleteButtons = document.querySelectorAll(".cell-dell");

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
                
                console.log("Succeed");
                
            }
           
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/membres/deleteMember.php');
    xhr.send(data); 
}

