 <?php  

if ($_GET['form']=='add') { ?> 
<!-- ESTA PARTE SON LOS BREADCRUMBS -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Cliente
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=mod_clientes">  </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_clientes/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo_cliente,6) as codigo_cliente FROM clientes
                                                ORDER BY codigo_cliente DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo_cliente    = $data_id['codigo_cliente']+1;
              } else {
                  $codigo_cliente = 1;
              }


              $buat_id   = str_pad($codigo_cliente, 6, "0", STR_PAD_LEFT);
              $codigo_cliente = "C$buat_id";
              ?>
<!---------------------------- FORMA DE AGREGAR CLIENTE  --------------------------------->
              <div class="form-group">
                <label class="col-sm-2 control-label">codigo_cliente</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_cliente" value="<?php echo $codigo_cliente; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerNombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoNombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerApellido" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoApellido" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" maxlength="8" onKeyPress="return goodchars(event,'0123456789',this)" require>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=mod_clientes" class="btn btn-default btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT codigo_cliente,primerNombre,segundoNombre,primerApellido,segundoApellido,telefono FROM clientes WHERE codigo_cliente='$_GET[id]'") 
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
      <li><a href="?module=mod_clientes"> Clientes </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_clientes/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">codigo_cliente</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_cliente" value="<?php echo $data['codigo_cliente']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerNombre" autocomplete="off" value="<?php echo $data['primerNombre']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoNombre" autocomplete="off" value="<?php echo $data['segundoNombre']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="primerApellido" autocomplete="off" value="<?php echo $data['primerApellido']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Apellido</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="segundoApellido" autocomplete="off" value="<?php echo $data['segundoApellido']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Telefono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" maxlength="8" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['telefono']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=mod_clientes" class="btn btn-default btn-reset">Cancelar</a>
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