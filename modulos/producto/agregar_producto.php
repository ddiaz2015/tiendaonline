<section class="col-md-12">
<ul class="breadcrumb" style="margin-top: -14px; margin-left: -30px; margin-right: -30px">
  <a href="?mod=productos"><i class="fa fa-archive"></i> Ir a productos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="?mod=crear_marca"><i class="fa fa-tags"></i> Ir a tipo marcas</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
  <a href="?mod=tipo_producto"><i class="fa fa-list"></i> Ir a tipo de productos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
</ul>
</section>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar producto</h3>
      <div class="box-tools pull-right">
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body">
      <form role="form" method="POST" name="frmProducto" onsubmit="return false" id="frmProducto" autocomplete="off" enctype="multipart/form-data" onsubmit="return false">
      <input type="hidden" id="txtId" name="txtId">
        <!-- Date dd/mm/yyyy -->
        <div class="form-group">
          <label>Nombre Producto</label>
          <input class="form-control" id="txtNombrreProducto" name="txtNombrreProducto" placeholder="Escriba el nombre del producto" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>        
          <div class="form-group">
          <label>Marca: </label>
          <select class="form-control" name="txtMarca" id="txtMarca" placeholder="Seleccione una marca" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo" >                   
          </select>
         </div>
         <div class="form-group">
          <label>Tipo de producto: </label>
          <select class="form-control" name="txtTipo" id="txtTipo" placeholder="Seleccione un tipo" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo" >                   
          </select>
         </div>
         <div class="form-group">
          <label>Costo unitario: </label>
          <input type="number" min="0" class="form-control" id="txtCostoUnitario" name="txtCostoUnitario" placeholder="Escriba el costo" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
         <div class="form-group">
	        <label>Exento IVA:</label>
	        <select name="txtIva" id="txtIva" class="form-control" placeholder="Seleccione un tipo" required="true">
	          <option value="">Selecione un tipo</option>
	          <option value="Si">Si</option>
	          <option value="No">No</option>
	        </select>
         </div>
         <div class="form-group">
          <label>Proveedor: </label>
          <select class="form-control" name="txtProveedor" id="txtProveedor" placeholder="Seleccione un proveedor" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo" >                   
          </select>
         </div> 
         <div class="form-group">
          <label>Descripci&oacute;n: </label>
         <textarea class="form-control" name="txtdescripcion" id="txtdescripcion" placeholder="ingrese descripcion" style="width: 99%;" data-validation="required" data-validation-error-msg="rellene este campo"  ></textarea>
         </div>
          <div class="form-group">
          <label>Imagen</label>
          <input class="form-control" type="file"  class="form-control file"  name="txtArchivo[]" id="txtArchivo" multiple="true" placeholder="Escriba el nombre del producto" data-validation="required" data-validation-error-msg="rellene este campo">
        </div>
         
        <!-- /.form group -->
        <!-- Date dd/mm/yyyy -->
        <div class="box-footer">
          <button type="button" onclick='location.href="?mod=nuevo_producto"' class="btn btn-movil btn-danger">Cancelar</button>
          <button type="submit" id="guardar" name="guardar" class="btn btn-primary pull-right">Guardar</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>