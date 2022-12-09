var registro = document.getElementById('registro');
var inputs = document.querySelectorAll('#registro input');
var select = document.querySelectorAll('#registro select');

const expresiones = {
	nomYApe: /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,12}$/, // 8 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	num: /^\d{10,15}$/, // 10 a 15 numeros.
    direccion: /^[a-zA-ZÁ-ÿ\s]+[0-9\s]+[a-zA-ZÁ-ÿ\s]+[#(No.)(N°)(numero)]+[0-9\s]+[a-zA-ZÁ-ÿ\s]+[0-9\s]+$/, //dirección xd
    indicativo: /^\++\d+$/ // valida símbolo "+" y max 3 numeros
}

const validarRegistro = (e) => {
    switch (e.target.name) {
        case "idUsuario":
            validarCampo(expresiones.num, e.target, e.target.name);
        break;
        
        case "name":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
        break;

        case "secondName":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
        break;

        case "surname":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
        break;

        case "secondSurname":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
        break;

        case "indicativo":
            validarCampo(expresiones.indicativo, e.target, e.target.name);
        break;

        case "phone":
            validarCampo(expresiones.num, e.target, e.target.name);
        break;

        case "direccion":
            validarCampo(expresiones.direccion, e.target, e.target.name);
        break;

        case "correo":
            validarCampo(expresiones.correo, e.target, e.target.name);
        break;

        case "pass":
            validarCampo(expresiones.password, e.target, e.target.name);
        break;
    }
};

const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)) {
        document.getElementById(`grupo-${campo}`).classList.remove('grupo-validar-incorrecto');
        document.getElementById(`grupo-${campo}`).classList.add('grupo-validar-correcto');
        document.querySelector(`#grupo-${campo} i`).classList.remove('fa-circle-xmark');
        document.querySelector(`#grupo-${campo} i`).classList.add('fa-check');
        document.querySelector(`#grupo-${campo} .error`).classList.remove('error-activo');
    } else {
        document.getElementById(`grupo-${campo}`).classList.add('grupo-validar-incorrecto');
        document.getElementById(`grupo-${campo}`).classList.remove('grupo-validar-correcto');
        document.querySelector(`#grupo-${campo} i`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo-${campo} i`).classList.remove('fa-check');
        document.querySelector(`#grupo-${campo} .error`).classList.add('error-activo');
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarRegistro);
    input.addEventListener('blur', validarRegistro);
    
})

registro.addEventListener('submit', (e) => {
    // e.preventDefault();
})

// funciones Términos y condiciones uwu

var checkbox = document.getElementById('checkbox');
var body = document.querySelector("body");
var aceptar = document.getElementById('aceptar');


checkbox.addEventListener('click',()=>{
    let checkbox = document.getElementById('checkbox').checked;
    if(checkbox) {
        aceptar.disabled = false;
    } else {
        aceptar.disabled = true;
    }
})

aceptar.addEventListener('click',()=>{
    let registrar = document.getElementById('btn_registrar');
    registrar.disabled = false;
})