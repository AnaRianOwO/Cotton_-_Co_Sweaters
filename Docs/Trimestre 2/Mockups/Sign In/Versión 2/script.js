let form = document.querySelector('.form');
    let tapa = document.querySelector('.tapa');
    tapa.addEventListener('click', ()=>{
        tapa.classList.toggle('movimiento-tapa');
        form.classList.toggle('form-movimiento');
    });