 <?php  

if ($_GET['form']=='add') { ?> 
<!-- ESTA PARTE SON LOS BREADCRUMBS -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Empleado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=mod_empleados">  </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_empleados/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo_empleado,6) as codigo_empleado FROM empleados
                                                ORDER BY codigo_empleado DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo_empleado    = $data_id['codigo_empleado']+1;
              } else {
                  $codigo_empleado = 1;
              }


              $buat_id   = str_pad($codigo_empleado, 6, "0", STR_PAD_LEFT);
              $codigo_empleado = "E$buat_id";
              ?>
<!---------------------------- FORMA DE AGREGAR CLIENTE  --------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo de Empleado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_empleado" value="<?php echo $codigo_empleado; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerNombre_e" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoNombre_e" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerApellido_e" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoApellido_e" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono_e" autocomplete="off" maxlength="8" onKeyPress="return goodchars(event,'0123456789',this)" require>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Identidad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="identidad" autocomplete="off" maxlength="15" onKeyPress="return goodchars(event,'0123456789-',this)" require>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Correo Electronico</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" required>
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=mod_empleados" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT codigo_empleado,primerNombre_e,segundoNombre_e,primerApellido_e,segundoApellido_e,telefono_e,identidad,email FROM empleados WHERE codigo_empleado='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Cliente
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=mod_empleados"> Empleados </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_empleados/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo de Empleado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_empleado" value="<?php echo $data['codigo_empleado']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerNombre_e" autocomplete="off" value="<?php echo $data['primerNombre_e']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoNombre_e" autocomplete="off" value="<?php echo $data['segundoNombre_e']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerApellido_e" autocomplete="off" value="<?php echo $data['primerApellido_e']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoApellido_e" autocomplete="off" value="<?php echo $data['segundoApellido_e']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono_e" autocomplete="off" maxlength="8" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telefono_e']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Identidad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="identidad" autocomplete="off" maxlength="15" onKeyPress="return goodchars(event,'0123456789-',this)" value="<?php echo $data['identidad']; ?>" required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Correo Electronico</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="email" autocomplete="off" value="<?php echo $data['email']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=mod_empleados" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>