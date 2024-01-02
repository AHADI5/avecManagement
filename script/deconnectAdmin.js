
let deconnection = document.querySelector(".log-out");
console.log(deconnection);
deconnection.addEventListener("click" , () => {
    console.log("click");
    logout() ;
})

function logout() {
   
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
    xhr.open('GET', '../controllers/login/logout.php');
    xhr.send(null);
}