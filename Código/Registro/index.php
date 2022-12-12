<html>

</html>
<?php

include("../DB/db.php");
$sqlCiudad = "SELECT * FROM ciudad ORDER BY nameCiudad ASC";
$resultadoCiudad = mysqli_query($DB, $sqlCiudad);

$sqlEstado = "SELECT * FROM estado";
$resultadoEstado = mysqli_query($DB, $sqlEstado);

include "registrar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://media.discordapp.net/attachments/1015677011961860167/1015677294016208906/Logo.png">
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
    <script src="https://kit.fontawesome.com/be71717483.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <title>Registro</title>
</head>
<body>

    

                <form action="registrar.php" method="POST" class="form" id="registro">
                    <!-- ponerle un div a cada campo, por fa ana del futuro x'd -->
                    <center><h2>Registro</h2></center>
                    <div class="content-select" id="selectDOCTYPE">
                        <select name="docType" id="docType" class="content-select" oninvalid="this.setCustomValidity(' Por favor selecciona tu tipo de documento')">
                            <option value="">Seleccione tipo de documento</option>
                            <option value="Cedula de ciudadania">Cédula de ciudadanía</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Cedula de extranjeria">Cédula de extranjería</option>
                        </select>
                        <i></i>
                    </div>  
                    
                    <div class="grupo-validar" id="grupo-idUsuario">
                        <input type="number" class="" name="idUsuario" placeholder="Número de documento" oninvalid="this.setCustomValidity(' Por favor introduce tu número de documento')">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El número de documento no puede tener letras o símbolos (8-15).</p>
                    </div>
                    
                    <div class="nombre-completo">
                        <div class="grupo-validar" id="grupo-Name">
                            <input type="text" class="" name="Name" placeholder="Nombre" oninvalid="this.setCustomValidity(' Por favor introduce tu nombre')">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El nombre no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-secondName">
                            <input type="text" class="" name="secondName" placeholder="Segundo nombre">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El nombre no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-surname">
                            <input type="text" class="" name="surname" placeholder="Apellido" oninvalid="this.setCustomValidity(' Por favor introduce tu apellido')" >
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El apellido no puede contener símbolos o números (1-20).</p>
                        </div>

                        <div class="grupo-validar" id="grupo-secondSurname">
                            <input type="text" class="" name="secondSurname" placeholder="Segundo apellido">
                            <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                            <p class="error">El apellido no puede contener símbolos o números (1-20).</p>
                        </div>
                    </div>
               
                    <div class="content-select">
                        <select name="idCiudad" id="idCiudad" class="content-select">
                            <option value="">Seleccione su ciudad</option>
                                <?php while($row = $resultadoCiudad->fetch_assoc())
                                    {
                                        echo "<option value=".$row['idCiudad'].">".$row['nameCiudad']."</option>";
                                    }
                                ?>
                        </select>
                        <i></i>
                    </div>

                    <div class="grupo-validar" id="grupo-indicativo">
                        <input type="text" class="" name="indicativo" placeholder="Indicativo del celular">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El indicativo debe contener un símbolo "+" y un número.</p>
                    </div>

                    <div class="grupo-validar" id="grupo-phone">
                        <input type="number" class="" name="phone" placeholder="Celular">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El celular no puede contener letras o símbolos. (10-15)</p>
                    </div>

                    <div class="grupo-validar" id="grupo-direccion">
                        <input type="text" class="" name="direccion" placeholder="Dirrección">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">Introduzca correctamente su dirección.</p>
                    </div>

                    <div class="grupo-validar" id="grupo-correo">
                        <input type="email" id="correo" name="correo" placeholder="Correo electrónico">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">El correo debe tener nombre de usuarios, símbolo de @, organización (gmail, hotmail, etc.) y tipo (.com, .edu, .org, etc.).</p>
                    </div>

                    <div class="grupo-validar" id="grupo-pass">
                        <input type="password" id="Pass" name="pass" placeholder="Contraseña">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">La contraseña debe tener al menos 10 carácteres y menos de 12.</p>
                    </div>

                    <div class="grupo-validar last" id="grupo-pass2">
                        <input type="password" id="Pass2" name="pass2" placeholder="Confirmar contraseña">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">Las contraseñas deben coincidir.</p>
                    </div>
                    
                    <input type="checkbox" name="checkbox" id="checkbox" class="checkbox" required><center>Acepta los <a href="#" class="TyC" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>términos y condiciones</a> antes de terminar</center>
                    <p><center><a href="../Ingreso/index.php">¿Ya tienes cuenta?</a></center></p>
                    

                    <center><input type="submit" class="TyC btn btn-primary" name="btn_registrar" id="btn_registrar" value="Registrar" disabled></center>
                </form>
                <div class="tapa" id="tapa">
                    <h1>Cotton & Co Sweaters</h1>
                </div>


            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Terminos y Condiciones</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                            <p>Esta página es operada por <b>Cotton & Co Sweaters.</b></p>
                            <p>Los términos y condiciones establecen las reglas bajo las cuales su persona puede usar la pagina web y los servicios que contiene.
                            Esta página le ofrece a los visitantes la facilidad de realizar compras contra entrega a través de la aplicación.
                            Al acceder o usar la página web de nuestro servicio, usted aprueba que haya leído, entendido y aceptado a estar sujeto a estos términos:</p>

                            <h3>ARTÍCULO 1. OBJETO.</h3>
                            <p>Los presentes términos y condiciones (en adelante "Términos y Condiciones") del uso del portal web de Cotton & Co Sweaters (en adelante "Cotton")
                            tienen el propósito de informar sobre el acceso y uso del sitio web, al acceder admite haber leído y aceptado los presentes Términos y Condiciones, así como a cumplirlos las leyes y reglamentos aplicables. 
                            </p>

                            <p>En el caso de que no desee aceptar o se encuentre en desacuerdo con los Términos y Condiciones, deberá abandonar el sitio web inmediatamente.</p>

                            <p>A continuación se establecen los Términos y Condiciones aplicables a este sitio web.</p>
                            
                            <h3>ARTÍCULO 2. DEFINICIONES.</h3>

                            <p><b>Usuario:</b> Persona natural que accede al sistema pero aún no ha creado una cuenta.</p>
                            <p><b>Contra entrega:</b> Medio de pago en donde se paga el producto cuando este llega a la dirección del cliente.</p>
                            <p><b>Cliente:</b> Persona natural que accede al sistema después de crear una cuenta con sus datos personales.</p>
                            <p><b>Datos personales:</b> Datos que hacen parte de la identidad de una persona.</p>


                            <h3>ARTÍCULO 3. REQUISITOS PARA CREAR UNA CUENTA.</h3>
                            
                            <p>Para utilizar la página web, los usuarios deben de tener 18 años o ser mayores de edad en su jurisdicción,
                            poseer la autoridad legal, el derecho y la libertad para participar en estos Términos y Condiciones como un acuerdo vinculante.
                            No tiene permitido usar esta página web o recibir servicios si hacer esto está prohibido en su país según cualquier ley o regulación aplicable a su caso.</p>
                            <h4>3.1. Datos necesarios para crear una cuenta.</h4>
                            <ul>
                            <li><b>Tipo y número de documento:</b> Se pide principalmente para tener un número único para cada usuario.</li>
                            <li><b>Nombres y apellidos:</b> Se necesita para la diferenciación del usuario en el sistema.</li>
                            <li><b>Teléfono e indicativo:</b> Medio de comunicación con el cliente para resolución de problemas.</li>
                            <li><b>Correo electrónico:</b> Medio de comunicación con el cliente, además de ser necesario para la recuperación de la cuenta si es necesario.</li>
                            <li><b>Contraseña:</b> Se necesita crear una contraseña segura para poder crear una cuenta en el sistema.</li>
                            <li><b>Ciudad y dirección:</b> Estos datos permiten que se realice la contra entrega de los productos, deben ser suministrados exactamente para evitar confusiones.</li>
                            </ul>

                            <h4>3.2. Uso de su correo electrónico.</h4>
                            <p>La página de Cotton utilizará su correo electrónico para:
                            (i) Enviar correos electrónicos para la recuperación de la contraseña en caso de pérdida, olvido o seguridad,
                            (ii) Comunicación con la empresa en caso de presentarse algún inconveniente y
                            (iii) Identificación en la página para evitar que se repitan los correos electrónicos.</p>

                            <h3>ARTÍCULO 4. DERECHOS DE LOS USUARIOS.</h3>

                            <p>Los usuarios del sitio web tienen derecho a acceder a su información, a rectificarla y modificarla, a través del sistema.</p>

                            <p>De acuerdo con la ley 1581 de 2012 en el <em>Artículo 8. Derechos de los titulares</em>, usted como titular tiene derecho a: (i) Conocer, actualizar y rectificar sus datos personales frente a los Responsables del Tratamiento.
                            (ii) Solicitar prueba de la autorización otorgada al Responsable o el Encargado del Tratamiento.
                            (iii) Ser informado por el Responsable del Tratamiento o el Encargado del Tratamiento, previa solicitud, respecto del uso que le han dado a sus datos personales.
                            (iv) Presentar ante la Superintendencia de Industria y Comercio quejas por infracciones a lo dispuesto en la presente ley y las demás normas que la modifiquen, adicionen o complementen.
                            (v) Revocar la autorización y/o solicitar la supresión del dato cuando en el Tratamiento no se respeten los principios, derechos y garantías constitucionales y legales.
                            (vi) Acceder de forma gratuita a sus datos personales que hayan sido objeto del tratamiento.</p>

                            <p>Cotton solicitará consentimiento del cliente al momento de necesitar los datos proporcionados por el titular.</p>
                            
                            <h3>ARTÍCULO 5. TRATAMIENTO DE SUS DATOS PERSONALES</h3>

                            <p>Cotton almacenará de manera segura y tratará la información suministrada por los titulares de manera adecuada, se tomarán las medidas de precaución para proteger su información contra pérdida, abuso, adulteración, acceso o uso no autorizado o fraudulento.
                            Para acceder a funcionalidades como realizar compras es necesario que nos facilite sus datos personales, al proporcionar dicha información nos garantiza que sus datos son reales y veraces.</p>

                            <p>Si desea modificar sus datos personales a través del sistema, puede ejecutar dicha acción. Si el dato a cambiar es el tipo de documento y/o número de documento, deberá contactar con el soporte del sistema, encontrado en el <em>ARTÍCULO 15. ATENCIÓN AL CLIENTE</em> del presente documento.</p>

                            <h3>ARTÍCULO 6. MODIFICACIÓN DE DATOS PERSONALES.</h3>

                            <p>Cotton no podrá eliminar ni modificar los datos que se hayan ingresado al sistema sin previo aveiso del titular de los datos.
                            Por parte del usuario, puede solicitar a los administradores del sistema a editar los datos que requieran ser modificados a través de un crreo eléctronico a la dirección de <a href="mailto:cottoncosweattt@gmail.com">cottoncosweattt@gmail.com</a>.</p>
                        
                            <h3>ARTÍCULO 7. SUSPENDER O CANCELAR LA CUENTA.</h3>

                            <p>Cotton podrá terminar o suspender de manera permanente o temporal tu acceso al servicio sin previo aviso si esta incumple alguna norma pospuesta en el presente documento y/o alguna ley o regulación aplicable.
                            Por parte del usuario se puede solicitar que se cancele la cuenta, si se ha realizado una compra y no se ha realizado el proceso de contraentrega se procederá a contactar con el cliente para acordar el pedido.</p>
                            
                            <h3>ARTÍCULO 8. TÉRMINOS COMERCIALES.</h3>

                            <p>Al realizar un pedido a través del sistema web accedes a: (i) Ser responsable de leer las características completas del artículo antes de comprometerte a comprarlo.
                            (ii) Celebrar un contrato legalmente vinculante para comprar los artículos y completar el proceso de check-out.
                            </p>

                            <p>Los precios cobrados en los artículos de Cotton se enumeran en el catálogo del sitio web. Se reserva el derecho de cambiar los precios para los productos que se muestran en cualquier momento y de corregir los errores de precios que puedan ocurrir inadvertidamente.
                            Las tarifas adicionales como el IVA se añadirá al precio a los productos y se especificará en la factura de compra.
                            </p>

                            <h3>ARTÍCULO 9. DEVOLUCIONES Y REEMBOLSOS.</h3>

                            <p>En caso de que se necesite realizar una devolución de un producto se debe tener en cuenta el estado del mismo.
                            Si está en buen estado simplemente tendrá que devolverlo con los accesorios y el recibo original dentro de 14 días posteriores a la fecha en que se recibió el producto y se realizará un reembolso basado en el método de pago original.
                            </p>

                            <p>Si el producto no está en buen estado o está alterado a su versión original, el reembolso no se podrá efectuar.</p>

                            <h3>ARTÍCULO 10. GARANTÍAS.</h3>

                            <p>Cuando recibimos un producto en mal estado de un producto de nuestra marca, se llegará a un acuerdo o se reemplazará el producto, dentro de un tiempo razonable</p>
                            <p>El cliente tendrá derecho a un reembolso cuando sea devuelto el producto, la emoresa se encargara de el renvolso y el cliente solo de devolver dicho producto</p>
                            
                            <h3>ARTÍCULO 11. CAMBIO DE OFERTA DE LOS SERVICIOS.</h3>

                            <p>La empresa Cotton puede cambiar los servicios sin previo aviso, dejar de proporcionar servicios o beneficios que se ofrecen, puede suspender de manera permanente o temporal algunos servicios.</p>
                            
                            <h3>ARTÍCULO 12. INDEMNIZACIÓN.</h3>

                            <p>Usted autoriza indemnizar y eximir de responsabilidad a Cotton de cualquier demanda, pérdida, responsabilidad, reclamación o gasto (incluidos los honorarios de abogados) que terceros realicen en su contra como consecuencia de, o derivado de, o en relación con su uso de la página web o cualquiera de los servicios ofrecidos en la página web.</p>

                            <h3>ARTÍCULO 13. LIMITACIÓN DE RESPONSABILIDAD.</h3>

                            <p>En ningún caso, Cotton es responsable de daños indirectos, punitivos, incidentales, especiales, consecuentes o ejemplares, entre otros; que surjan de o estén relacionadas con el empleo o la imposibilidad de utilizar el servicio.</p>
                            <p>En la máxima medida permitida por la ley aplicable, Cotton no asume responsabilidad alguna por (i)errores o inexactitudes de contenido; (ii) lesiones personales o daños a la propiedad, de cualquier naturaleza que sean, como resultado de su acceso o utilización de nuestros servicios; y (iii) cualquier acceso no autorizado o uso de los servidores seguros y/o toda la información almacenada en los mismos.</p>
                            
                            <h3>ARTÍCULO 14. PREFERENCIA DE LEY Y RESOLUCIÓN DE DISPUTAS.</h3>

                            <p>Estos términos, los derechos y recursos provistos aquí y todos y cada uno de los reclamos y disputas relacionados con este y/o los servicios, se regirán, interpretarán y aplicarán en todos los aspectos única y exclusivamente de conformidad con las leyes sustantivas internas de Colombia, sin respeto a sus principios de conflictos de leyes.</p>
                            <p>Todos los reclamos y disputas se presentarán y usted acepta que sean decididos exclusivamente por un tribunal de jurisdicción competente ubicado en Bogotá D.C.</p>

                            <h3>ARTÍCULO 15. DERECHOS DE AUTOR.</h3>

                            <p>El servicio y todos los materiales incluidos o transferidos, incluyendo, sin limitación, software, imágenes, texto, gráficos, logotipos, patentes, marcas registradas, marcas de servicio, derechos de autor, fotografías y todos los Derechos de Propiedad Intelectual relacionados con ellos, son la propiedad exclusiva de Cotton.</p>
                            <p>Salvo que se indique explícitamente en este documento, no se considerará que nada en estos Términos crea una licencia en o bajo ninguno de dichos Derechos de Propiedad Intelectual, y usted acepta no vender, licenciar, alquilar, modificar, distribuir, copiar, reproducir, transmitir, exhibir públicamente, realizar públicamente, publicar, adaptar, editar o crear trabajos derivados de los mismos.</p>

                            <h3>ARTÍCULO 16. ATENCIÓN AL CLIENTE.</h3>

                            <p>Para ponerse en contacto con nuestro servicio al Cliente, utilice cualquiera de las opciones siguientes:</p>
                            <ol>
                            <li>Diríjase al apartado de "Contáctanos"</li>
                            <li>Envíe un mensaje al siguiente correo: <a href="mailto:cottoncosweattt@gmail.com">cottoncosweattt@gmail.com</a></li>
                            </ol>

                            <h3>ARTÍCULO 17. FECHA DE VIGENCIA.</h3>

                            <p>El siguiente documento tiene como última revisión el 16 de noviembre del 2022.</p>

                            <h3>ARTÍCULO 18. DERECHO A CAMBIAR Y MODIFICAR LOS TÉRMINOS.</h3>

                            <p>Cotton se reserva el derecho de modificar estos términos de vez en cuando a nuestra entera discreción. Por lo tanto, debe revisar estas páginas periódicamente. Cuando cambiemos los Términos le haremos saber que se han efectuado cambios.</p>
                            <p>El uso continuo de la página web o nuestro servicio después de dicho cambio constituye la aceptación  de los nuevos Términos. Si no acepta alguno de estos términos o cualquier versión futura de los términos, no podrá usar o acceder a la página web o al servicio.</p>
                            
                            <!-- <a href="#owo">owo</a> -->
                            <!-- <h2 id="owo">OWO</h2> -->
                            <input type="checkbox" name="checkbox" id="checkbox" required> <p> He leído y aceptado los términos y condiciones</p>
                            <button type="button" name="aceptar" id="aceptar" disabled data-bs-dismiss="modal">Aceptar</button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="banner_img">
                <img src="ropa.png" alt="">
            </div>


            <div class="burbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

<script src="funciones.js"></script>
<script>
    let btn = document.getElementById('btn_registrar');

    btn.addEventListener('click', function(e){
        let pass = document.getElementById('Pass').value;
        let correo = document.getElementById('correo').value;
        if(pass.length < 8){
            Swal.fire({
                title: 'Caracteres insuficientes',
                text: 'La contraseña debe tener por lo menos 8 caracteres o mas',
                icon: 'warning',
                confirmButtonText: 'Quiero arreglarlo',
            })
            .then(resultado => {
                if (resultado.value) {
                    
                }
            });
            e.preventDefault();
        }
    });
</script>
</html>