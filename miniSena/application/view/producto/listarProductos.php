<!-- Begin Page Content -->
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Productos Registrados</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre de Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Garantia</th>
                        <th>Fecha de Garantia</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Serie</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre de Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Garantia</th>
                        <th>Fecha de Garantia</th>
                        <th>Descripción</th>
                        <th>Marca</th>
                        <th>Categoria</th>
                        <th>Serie</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </tfoot>
                <tbody>
                <?php foreach($listarProductos as $value):?>
                    <tr>
                        <td><?php echo $value['Nom_Producto']?></td>
                        <td><?php echo $value['Precio']?></td>
                        <td><?php echo $value['Cantidad']?></td>
                        <td><?php echo $value['Garantia']?></td>
                        <td><?php echo $value['Fecha_Garantia']?></td>
                        <td><?php echo $value['Descripcion']?></td>
                        <td><?php echo $value['Nombres']?></td>
                        <td><?php echo $value['Nombre']?></td>
                        <td><?php echo $value['Serie']?></td>
                        <td>
                            <?php if($value['Estado'] == 1):?>
                                <label class="label label-success">Activo</label>
                            <?php else: ?>
                                <label class="label label-danger">Inactivo</label>
                            <?php endif;?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-editar" title="Editar" onclick="datoProducto('<?php echo $value['idProducto'];?>')"><i class="fa fa-edit" name="btnEditarP"></i></button>

                            <button type="button" class="btn btn-warning btn-xs" title="Cambiar Estado" onclick="cambiarEstado('<?php echo $value['idProducto'];?>')" name="button"><i class="fa fa-refresh"></i></button>

                            <!-- <button type="button" class="btn btn-danger btn-xs" title="Eliminar" onclick="eliminarProducto('<?php echo $value['idProducto'];?>')" name="button"><i class="fa fa-trash"></i></button> -->
                        </td>
                    </tr>
                <?php endforeach ;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<div class="modal fade" id="modal-editar" aria-labelledby="myModalLabel" araia-hidden="true" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" class="">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Producto</h4>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-log-12">
                        <div class="x_content">
									<br />
									<form class="form-label-left input_mask" method="post">
                                        <input type="text" id="txtIdProducto" name="txtIdProducto" hidden>
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtNombreProducto" placeholder="Nombre del Producto" name="txtNombreProducto">
											<span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
										</div>							
									
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="float" class="form-control has-feedback-left" id="txtPrecio" placeholder="&nbsp &nbsp &nbsp Precio" name="txtPrecio">
											<span class="fa fa-money-bill form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="number" class="form-control has-feedback-left" id="txtCantidad" placeholder="Cantidad" name="txtCantidad">
											<span class="fas fa-sort-numeric-up-alt form-control-feedback left" aria-hidden="true"></span>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<input type="text" class="form-control has-feedback-left" id="txtGarantia" placeholder="&nbsp &nbsp &nbsp Garantía" name="txtGarantia">
											<span class="fas fa-check-circle form-control-feedback left" aria-hidden="true"></span>
										</div>

                                        <div class="col-md-6 col-sm-6  form-group has-feedback">
										<input class="date-picker form-control has-feedback-left" placeholder="&nbsp&nbsp&nbsp&nbsp&nbsp Fecha Garantía" type="text" required="required" type="text" onclick="this.type='date'" onfocus="this.type='date'" onmouseover="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" name="txtFechaGarantia" id="txtFechaGarantia">
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
												<input type="text" id="txtSerie" class="form-control has-feedback-left" placeholder="Serie" name="txtSerie">
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
												<input type="text" id="txtDescripcion" class="form-control has-feedback-left" placeholder="Descripción" name="txtDescripcion">
                                                <span class="fa fa-file-text-o form-control-feedback left" aria-hidden="true"></span>
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="form-group row">
											<div class="col-md-9 col-sm-9  offset-md-3">

												<a type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</a>

												<button type="submit" class="btn btn-success" name="btnEditarP">Actualizar</button>
											</div>
										</div>
									</form>
								</div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function datoProducto(id){
        $.ajax({
            url: url+"productoController/datoProducto",
            type:"POST",
            dataType:"json",
            data:{'id':id}
        }).done(function(respuesta){
            $.each(respuesta, function(index, value){
                $('#txtNombreProducto').val(value.Nom_Producto);
                $('#txtPrecio').val(value.Precio);
                $('#txtCantidad').val(value.Cantidad);
                $('#txtGarantia').val(value.Garantia);
                $('#txtFechaGarantia').val(value.Fecha_Garantia);
                $('#txtDescripcion').val(value.Descripcion);
                $('#SelMarca').val(value.idMarca);
                $('#SelCategoria').val(value.idCategoria);
                $('#txtSerie').val(value.Serie);
                $('#txtIdProducto').val(value.idProducto);
            })
        }).fail(function(error){
            console.log(Error)
        })
    }
</script>
<script>
    function cambiarEstado(id){
        Swal.fire({
            title: '¿Desea cambiar el estado del producto?',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Cambiar estado'
        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Estado Cambiado',
                    confirmButtonText: 'Ok'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: url + "productoController/cambiarEstado",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta !== 1){
                                window.location = url + "productoController/listarProductos";
                                window.reload();
                            }else{
                                Swal.fire('Error al cambiar el estado', '','error');
                            }
                        }).fail(function(error){
                            console.log(error);
                        })
                    }
                })
            }
        })
    }
</script>

<script>
    function eliminarUsuario(id){
        Swal.fire({
            title: '¿Desea eliminar el usuario?',
            icon: 'warning',
            showCancelButton:true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Eliminar'
        }).then((result)=>{
            if(result.isConfirmed){
                Swal.fire({
                    title: 'Usuario Eliminado',
                    confirmButtonText: 'Ok'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            type: "POST",
                            url: url + "usuarioController/eliminarUsuario",
                            data: {'id': id,}
                        }).done(function(respuesta){
                            if(respuesta == 1){
                                window.location = url + "usuarioController/listarUsuarios";
                                window.reload();
                            }else{
                                Swal.fire('Error al eliminar el usuario', '','error');
                            }
                        }).fail(function(error){
                            console.log(error);
                        })
                    }
                })
            }
        })
    }
</script>

