let agregar = document.getElementById("agregar");
agregar.addEventListener("click", agregarProducto)

let owo = document.getElementById("agregar").name;
function agregarProducto(owo) {
    let tabla, row, cell1, cell2, select, arrayProductos; //cell3, cell4, cell5, nombre, lugarcompra, cantidad, precio, subtotal, total;
    tabla = document.getElementById("tabla");
    select = document.getElementById("select");
    arrayProductos = document.getElementById("");
    console.log(select)
    row = tabla.insertRow(2);
    cell1 = row.insertCell(0);
    cell2 = row.insertCell(1);
    cell2.innerHTML = "owo";
    // cell3.innerHTML = cantidad;
    // cell4.innerHTML = precio;
    // cell5.innerHTML = subtotal;
    // document.getElementById("total").value = total;
    // document.getElementById("productos").value = "";
    // document.getElementById("lugar").value = "";
    // document.getElementById("precio").value = "";
    // document.getElementById("cantidad").value = "";
    // document.getElementById("subtotal").value = "";
}