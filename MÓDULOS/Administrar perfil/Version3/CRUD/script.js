let perfil = document.querySelector('#perfil'),formulario = document.querySelector('#formulario'),
    pedidos = document.querySelector('#pedidos'),
    favoritos = document.querySelector('#favoritos');




perfil.addEventListener('click', ()=>{
    formulario.classList.remove('apagar');
});

pedidos.addEventListener('click', ()=>{
    formulario.classList.add('apagar');
});
favoritos.addEventListener('click', ()=>{
    formulario.classList.add('apagar');
});




// VALIDAR DATOS

let nombre = document.getElementById('nombre');
let apellido = document.getElementById('apellido');
let email = document.getElementById('email');
let documento = document.getElementById('documento');
let btnValidar = document.getElementById('btnValidar');
let changeDate = document.getElementById('btnCambiar');

changeDate.addEventListener('click', (e)=>{
    ventana.classList.remove('apagar');
    e.preventDefault();
});

btnValidar.addEventListener('click', (e)=>{
    btnValidar.classList.add('apagar1');
    changeDate.classList.remove('apagar');
    nombre.disabled = true;
    apellido.disabled = true;
    email.disabled = true;
    documento.disabled = true;
    e.preventDefault();
});


// VENTANA MODAL

let btnSi = document.getElementById('btn_si');
let btnNo = document.getElementById('btn_no');
let ventana = document.querySelector('.ventana-modal');

btnSi.addEventListener('click', (e)=>{
    ventana.classList.add('apagar');
    btnValidar.classList.remove('apagar1');
    changeDate.classList.add('apagar');
    console.log('Se ha establecido correctamente');
    nombre.disabled = false;
    apellido.disabled = false;
    email.disabled = false;
    documento.disabled = false;
    e.preventDefault();
});
btnNo.addEventListener('click', (e)=>{
    ventana.classList.add('apagar');
    btnValidar.classList.add('apagar1');
    changeDate.classList.remove('apagar');
    // nombre.disabled = true;
    // apellido.disabled = true;
    // email.disabled = true;
    // documento.disabled = true;
    e.preventDefault();
});