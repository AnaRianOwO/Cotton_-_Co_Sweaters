let car = document.querySelector('#carrito');
let slider = document.querySelector('.slider-lateral');

car.addEventListener('click',()=>{
    slider.classList.toggle("apagar")
});

function search_persona() {
    let input = document.getElementById('searchbar').value;
    input=input.toLowerCase();
    let x = document.getElementsByClassName('animals');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";                 
        }
    }
}