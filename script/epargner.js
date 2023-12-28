let deleteButtons = document.querySelectorAll(".cell-dell");

deleteButtons.forEach(element => {
   element.addEventListener("click" , (ev) => {
     let parent = ev.currentTarget.parentNode;
   
     let id = parent.querySelector(".num");
     console.log(id);
     deleteMember(parseInt(id.innerHTML));
   }) 
});
