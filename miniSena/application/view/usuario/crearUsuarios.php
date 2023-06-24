

<div class="container body">
	<div class="main_container">
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Registrar Usuarios</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Settings 1</a>
                                            <a class="dropdown-item" href="#">Settings 2</a>
                                        </div>
                                    </li>
                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form class="form-label-left input_mask" method="POST">

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <select name="selTipoDocumento" id="selTipoDocumento" class="form-control has-feedback-left">
                                            <option selected="selected">Seleccionar Documento</option>
                                            <?php foreach($tipoDocumentos as $value):?>
                                                <option value="<?php echo $value['idTipoDocumento'];?>"><?php echo $value['doc'];?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtDocumento"
                                            placeholder="Documento" name="txtDocumento">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtNombres"
                                            placeholder="Nombres" name="txtNombres">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Apellidos" name="txtApellidos">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>


                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="tel" class="form-control has-feedback-left" id="inputSuccess5" placeholder="Telefono" name="txtTelefono">
                                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-left" id="txtDireccion" placeholder="Escribir Direccion" name="txtDireccion">
                                        <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                                    </div>

                                    <div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 text-center">Fecha Nacimiento</label>
											<div class="col-md-9 col-sm-9 ">
												<input id="birthday" class="date-picker form-control" name="txtFechaNacimiento" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Correo Electronico </label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="email" class="form-control" placeholder="Escribir Correo" name="txtEmail">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Usuario</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="text" class="form-control"  placeholder="Escribir Usuario" name="txtUsuario">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center">Contraseña</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="password" class="form-control"  placeholder="Escribir Contraseña" name="txtClave" id="password1">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 text-center ">Confirmar Contraseña</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="txtClave" id="password2">
                                        </div>
                                    </div>

                                    <div class=" form-group row">
                                        <label for="" class="col-form-label col-md-3 col-sm-3 text-center">Roles</label>
                                        <div class="col-md-9 col-sm-9 ">
                                            <select name="selRoles" id="selRoles" class="form-control has-feedback-left">
                                                <option selected="selected">Seleccionar Rol</option>
                                                <?php foreach($roles as $value):?>
                                                    <option value="<?php echo $value['idRol'];?>"><?php echo $value['tipo'];?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="ln_solid"></div>
                                    <div class="form-group row">
                                        <div class="col-md-9 col-sm-9  offset-md-3">
                                            <a type="button" class="btn btn-danger" href="<?php echo URL; ?>usuarioController/principal">Cancel</a>
                                            <button class="btn btn-warning" type="reset" href="<?php echo URL; ?>usuarioController/registrarUsuario" >Restablecer</button>
                                            <button type="submit" class="btn btn-success" name="btnGuardar">Guardar</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    let password1, password2;

    password1 = document.getElementById('password1');
    password2 = document.getElementById('password2');

    password1.onchange = password2.onkeyup = passwordMatch;

    function passwordMatch(){
        if(password1.value !== password2.value){
            password2.setCustomValidity('Contraseña No Coincide');
        }else{
            password2.setCustomValidity("");
        }
    }


</script>