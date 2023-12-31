const addMemberButton = document.querySelector(".new-member");
const popupContainer = document.querySelector(".add-member");
const closeButton = document.querySelector(".close-popup");
const saveButton = document.querySelector(".save");


// when save button is clicked , then close the popup 

saveButton.addEventListener("click" , () => {
    popupContainer.classList.add("inactive_popup");

})


const id_avec =document.querySelector(".page-level>.id");
addMemberButton.addEventListener("click" , () => {
    popupContainer.classList.toggle("inactive_popup");
    getEpa() ;
})

// // when clik outiside the box , close the popup
window.onclick = (event) => {
    if (event.target == popupContainer) {
      popupContainer.classList.toggle("inactive_popup");
    }
  }

//closing popup 

closeButton.addEventListener("click" , () => {
    popupContainer.classList.add("inactive_popup");
} )



//Getting Members , and adding listeners to those buttons
function getEpa() {
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= () => {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            const memberZone = document.querySelector(".membres");
            const response = xhr.response;
            memberZone.innerHTML = response;
            //Checking Whether the member Exists 
            let members = document.querySelectorAll("tr");
            for (let index = 0; index < members.length; index++) {
                const element = members[index];
                let idTotest =  element.querySelector('#id_membre');
                if (idTotest != null) {
                    //Calling test method 
                    testId((parseInt(idTotest.innerHTML)) , (idArray) =>{
                        if (idArray.includes(parseInt(idTotest.innerHTML))) {
                           //Hiding member if he exists 
                            idTotest.parentNode.style.display = "None";
                        } 
                    })
                   
                    
                }
                
            }
            console.log(members);
            let membersToadd = document.querySelectorAll(".cell-act");
            membersToadd.forEach(element => {
                element.addEventListener("click" , (ev) => {
                    let parent= (ev.currentTarget).parentNode;
                    let id = parent.querySelector("#id_membre");
                    let id_membre = parseInt(id.innerHTML);
                    // console.log(id_membre);
                    // console.log();
                    checkMember(id_membre,parseInt(id_avec.id), (Exists) =>{
                        console.log(Exists);
                    });
                    sendData(parseInt(id_avec.id),id_membre);
                    // getAvecMembers(parseInt(id_avec.id));
                  
                })
                
            });
           

        } else {
            console.log("request failed");
        }

    }

    xhr.open('GET', '../controllers/membres/getMembreWithActibs.php');
    xhr.send(null);
}

//Adding members to avec created
function sendData(id_avec, id_membre) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    data.append("id_member", id_membre);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= function() {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
           
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/addMember.php');
    xhr.send(data);
}

//getting Avec Members 
function getAvecMembers(id_avec) {
    data = new FormData() ;
    data.append("id_avec", id_avec);
    xhr = new XMLHttpRequest();
    xhr.onreadystatechange= () => {
        if((xhr.readyState===4)&& (xhr.status===200)){
            console.log("response",xhr.response,"end Answer");
            let reponse = xhr.response;
            const memberZone  = document.querySelector("membres-list");
            memberZone.innerHTML = reponse;
        } else {
            console.log("request failed");
        }

    }

    xhr.open('POST', '../controllers/avecMember/getMembers.php');
    xhr.send(data);
}

function checkMember(idMember,idAvec, callback) {
    var data = new FormData();
    data.append("id_member", idMember);
    data.append("id_avec",idAvec);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);
                    callback(response.Exists);
                   
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("Request failed with status:", xhr.status);
            }
        }
    };

    xhr.open('POST', '../controllers/avecMember/addMember.php');
    xhr.send(data);
    
}

function testId(idMember, callback) {
    var data = new FormData();
    data.append("id_member", idMember);
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                try {
                    var response = JSON.parse(xhr.responseText);
                    console.log("Response:", response);

                    callback(response);
                   
                } catch (error) {
                    console.error("Error parsing JSON:", error);
                }
            } else {
                console.error("Request failed with status:", xhr.status);
            }
        }
    };

    xhr.open('POST', '../controllers/avecMember/membersAvecId.php');
    xhr.send(data);

    
}

function desactivateButton () {

}

function activateButton() {
    
}
