var registro = document.getElementById('registro');
var inputs = document.querySelectorAll('#registro input');

const expresiones = {
	nomYApe: /^[a-zA-ZÀ-ÿ\s]{1,20}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{8,12}$/, // 8 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	num: /^\d{8,15}$/, // 10 a 15 numeros.
    tel: /^\d{10,15}$/,
    direccion: /^[a-zA-ZÁ-ÿ\s]+[0-9]+[a-zA-ZÁ-ÿ\s]+[(#)(No.)(N°)(numero)\]+[0-9]+[a-zA-ZÁ-ÿ\s]+[0-9]+$/, //dirección xd
    indicativo: /^\++\d{2,5}$/ // valida símbolo "+" y max 3 numeros
}

// console.log(registro.offsetHeight)
const ajusteTapa = () => {
    let tapa = document.getElementById("tapa");
    tapa.style.height = registro.offsetHeight;
}

const campos = {
    idUsuario: false,
    Name: false,
    surname: false,
    indicativo: false,
    phone: false,
    direccion: false,
    correo: false,
    pass: false
}

const validarRegistro = (e) => {
    switch (e.target.name) {
        case "idUsuario":
            validarCampo(expresiones.num, e.target, e.target.name);
            ajusteTapa();
        break;
        
        case "Name":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
            ajusteTapa()
        break;

        case "secondName":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
            ajusteTapa();
        break;

        case "surname":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
            ajusteTapa();
        break;

        case "secondSurname":
            validarCampo(expresiones.nomYApe, e.target, e.target.name);
            ajusteTapa();
        break;

        case "indicativo":
            validarCampo(expresiones.indicativo, e.target, e.target.name);
            ajusteTapa();
        break;

        case "phone":
            validarCampo(expresiones.tel, e.target, e.target.name);
            ajusteTapa();
        break;

        case "direccion":
            validarCampo(expresiones.direccion, e.target, e.target.name);
            ajusteTapa();
        break;

        case "correo":
            validarCampo(expresiones.correo, e.target, e.target.name);
            ajusteTapa();
        break;

        case "pass":
            validarCampo(expresiones.password, e.target, e.target.name);
            confirmarContrasenas();
            ajusteTapa();
        break;

        case "pass2":
            confirmarContrasenas();
            ajusteTapa();
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
        campos[campo] = true;
    } else {
        document.getElementById(`grupo-${campo}`).classList.add('grupo-validar-incorrecto');
        document.getElementById(`grupo-${campo}`).classList.remove('grupo-validar-correcto');
        document.querySelector(`#grupo-${campo} i`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo-${campo} i`).classList.remove('fa-check');
        document.querySelector(`#grupo-${campo} .error`).classList.add('error-activo');
        campos[campo] = false;
    }
}

const confirmarContrasenas = () => {
    const inputPassword1 = document.getElementById('Pass');
    const inputPassword2 = document.getElementById('Pass2');

    if(inputPassword1.value !== inputPassword2.value) {
        document.getElementById(`grupo-pass2`).classList.add('grupo-validar-incorrecto');
        document.getElementById(`grupo-pass2`).classList.remove('grupo-validar-correcto');
        document.querySelector(`#grupo-pass2 i`).classList.add('fa-circle-xmark');
        document.querySelector(`#grupo-pass2 i`).classList.remove('fa-check');
        document.querySelector(`#grupo-pass2 .error`).classList.add('error-activo');
        campos['pass'] = false;
    } else {
        document.getElementById(`grupo-pass2`).classList.remove('grupo-validar-incorrecto');
        document.getElementById(`grupo-pass2`).classList.add('grupo-validar-correcto');
        document.querySelector(`#grupo-pass2 i`).classList.remove('fa-circle-xmark');
        document.querySelector(`#grupo-pass2 i`).classList.add('fa-check');
        document.querySelector(`#grupo-pass2 .error`).classList.remove('error-activo');
        campos['pass'] = true;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarRegistro);
    input.addEventListener('blur', validarRegistro);
    
})

registro.addEventListener('submit', (e) => {
    var ciudad = document.getElementById('docType').value;
    var docType = document.getElementById('idCiudad').value;
    if (campos.idUsuario && campos.Name && campos.correo && campos.direccion && campos.indicativo && campos.pass && campos.phone && campos.secondName && campos.surname && ciudad!=='' && docType!=='') {
        console.log("por fin owo");
    } else {
        e.preventDefault();
        Swal
            .fire({
                title: 'Ha ocurrido un error',
                text: 'Por favor verifique su información, que esté completa y correcta',
                icon: 'error',
                confirmButtonText: 'Entendido'
            })
    }
})

// funciones Términos y condiciones uwu

var checkbox = document.getElementById('checkbox');
var body = document.querySelector("body");
var aceptar = document.getElementById('aceptar');
var registrar = document.getElementById('btn_registrar');


checkbox.addEventListener('click',()=>{
    let checkbox = document.getElementById('checkbox').checked;
    if(checkbox) {
        aceptar.disabled = false;
        registrar.disabled = false;
    } else {
        aceptar.disabled = true;
        registrar.disabled = true;
    }
})

aceptar.addEventListener('click',()=>{
    let registrar = document.getElementById('btn_registrar');
    registrar.disabled = false;
})