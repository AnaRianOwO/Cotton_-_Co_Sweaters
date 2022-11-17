function añadir(){
    arriba.classList.add('content1');
    abajo.classList.add('content2');
};
function quitar(){
    arriba.classList.remove('content1');
    abajo.classList.remove('content2');
}
let carta = document.querySelector('.card');
let arriba = document.querySelector('.content-superior');
let abajo = document.querySelector('.content-inferior');


carta.addEventListener('mouseover', añadir);
carta.addEventListener('mouseout', quitar);
