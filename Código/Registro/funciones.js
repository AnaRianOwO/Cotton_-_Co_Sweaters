// let TyC = document.querySelector(".TyC");
// let ventanaModal = document.querySelector(".contenedorModal");
// let modal = document.querySelector(".modal");
let checkbox = document.getElementById('checkbox');
let body = document.querySelector("body");
let aceptar = document.getElementById('aceptar');

// TyC.addEventListener('click',()=>{
//     console.log("owo");
//     ventanaModal.style.display= "flex";
// })

checkbox.addEventListener('click',()=>{
    let checkbox = document.getElementById('checkbox').checked;
    console.log("owo");
    if(checkbox) {
        aceptar.disabled = false;
    } else {
        aceptar.disabled = true;
    }
})

aceptar.addEventListener('click',()=>{
    let registrar = document.getElementById('btn_registrar');
    registrar.disabled = false;
    ventanaModal.style.display = "none";

})