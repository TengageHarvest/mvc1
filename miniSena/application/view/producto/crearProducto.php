 
 
 <!-- Buscar en Gentelella las planillas de formularios-->

 <div class="right_col" role="main">
				<div class="">
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12">
							<div class="x_panel">
								<div class="x_title">
									<h2>Registrar Producto</h2>
									<ul class="nav navbar-right panel_toolbox">
										<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
										</li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
									<form class="form-label-left input_mask" method="post">

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nombre del Producto" name="txtNombreProducto">
											<span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
										</div>							
									
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="float" class="form-control has-feedback-left" id="inputSuccess2" placeholder="&nbsp &nbsp &nbsp Precio" name="txtPrecio">
											<span class="fa fa-money-bill form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="number" class="form-control has-feedback-left" id="inputSuccess3" placeholder="Cantidad" name="txtCantidad">
											<span class="fas fa-sort-numeric-up-alt form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="&nbsp &nbsp &nbsp Garantía" name="txtGarantia">
											<span class="fas fa-check-circle form-control-feedback left" aria-hidden="true"></span>
										</div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
										<input class="date-picker form-control has-feedback-left" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp Fecha Garantía" type="text" required="required" type="text" onclick="this.type='date'" onfocus="this.type='date'" onmouseover="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="txtFechaGarantia">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
												<span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
										</div>

                                        
										<div class="form-group row">
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control has-feedback-left" placeholder="Serie" name="txtSerie">
											</div>
										</div>


                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
											<select name="SelMarca" id="SelMarca" class="form-control has-feedback-left" id="SelMarca">
												<option selected="selected">&nbsp&nbsp&nbsp&nbsp&nbsp Seleccione Marca</option>
												<?php foreach($listarMarca as $value):?>
													<option value="<?php echo $value['idMarca'];?>"><?php echo $value['Nombres'];?></option>
												<?php endforeach; ?>
											</select>
                                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
										</div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
											<select name="SelCategoria" id="SelCategoria" class="form-control has-feedback-left" id="SelCategoria">
												<option selected="selected">&nbsp&nbsp&nbsp&nbsp&nbsp Seleccione Categoria</option>
												<?php foreach($listarCategoria as $value):?>
													<option value="<?php echo $value['idCategoria'];?>"><?php echo $value['Nombre'];?></option>
												<?php endforeach; ?>
											</select>
                                            <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
										</div>
                                        
										<div class="form-group row">
											<label class="col-form-label col-md-3 col-sm-3 ">Descripcion</label>
											<div class="col-md-9 col-sm-9 ">
												<input type="text" class="form-control has-feedback-left" placeholder="Descripción" name="txtDescripcion">
                                                <span class="fa fa-file-text-o form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>

										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-9 col-sm-9  offset-md-3">

												<a type="button" class="btn btn-danger" href="<?php echo URL; ?>productoController/principal">Cancelar</a>

												<button class="btn btn-warning" type="reset" href="<?php echo URL;?>productoController/crearProducto">Limpiar</button>

												<button type="submit" class="btn btn-success" name="btnGuardarP">Guardar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>
			<!-- /page content -->
