<form action="registrar.php" method="POST" class="form" id="registro">
                    <center><h2>Registro</h2></center>
                    <div class="content-select" id="selectDOCTYPE">
                        <select name="docType" id="docType" class="content-select" oninvalid="this.setCustomValidity(' Por favor selecciona tu tipo de documento')">
                            <option value="">Seleccione tipo de documento</option>
                            <option value="CC">Cédula de ciudadanía</option>
                            <option value="PP">Pasaporte</option>
                            <option value="CE">Cédula de extranjería</option>
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
                        <p class="error">La contraseña debe tener al menos 8 carácteres y menos de 12.</p>
                    </div>

                    <div class="grupo-validar last" id="grupo-pass2">
                        <input type="password" id="Pass2" name="pass2" placeholder="Confirmar contraseña">
                        <i class="validacion-icono fa-solid fa-circle-xmark"></i>
                        <p class="error">Las contraseñas deben coincidir.</p>
                    </div>
                    
                    <input type="checkbox" name="checkbox" id="checbox" class="checkbox" required><center>Acepta los <a href="#" class="TyC" data-bs-toggle="modal" data-bs-target="#staticBackdrop" disabled>términos y condiciones</a> antes de terminar</center>
                    <p><center><a href="../Ingreso/index.php">¿Ya tienes cuenta?</a></center></p>
                    

                    <center><input type="submit" class="TyC btn btn-primary" name="btn_registrar" id="btn_registrar" value="Registrar" disabled></center>
                </form>