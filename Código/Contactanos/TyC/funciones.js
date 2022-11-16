let TyC = document.querySelector(".TyC");
let ventanaModal = document.querySelector(".contenedorModal");
let modal = document.querySelector(".modal");
let checkbox = document.getElementById('checkbox');
let submit = document.getElementById('submit');

TyC.addEventListener('click',()=>{
    ventanaModal.style.display= "flex";
})

checkbox.addEventListener('click',()=>{
    let checkbox = document.getElementById('checkbox').checked;
    if(checkbox) {
        submit.disabled = false;
    } else {
        submit.disabled = true;
    }
})