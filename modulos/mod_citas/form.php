 <?php  

if ($_GET['form']=='add') { ?> 
<!-- ESTA PARTE SON LOS BREADCRUMBS -->
  <section class="content-header">
    <h1 style="color:white;">
      <i class="fa fa-edit icon-title"style="color:white;"></i> Agregar Cita
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_citas/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(codigo_cita,7) as codigo FROM citas
                                                ORDER BY codigo_cita DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

               $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                 
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }

             
              $tahun          = date("Y");
              $buat_id        = str_pad($codigo, 7, "0", STR_PAD_LEFT);
              $codigo_cita = "TM-$tahun-$buat_id";
              ?>

<!---------------------------- FORMA DE AGREGAR CITA  --------------------------------->
<div class="form-group">
                <label class="col-sm-2 control-label">Codigo de Cita </label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_cita" value="<?php echo $codigo_cita; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hora</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control time" name="hora" autocomplete="off" value="<?php echo $data['hora']; ?>" required>
                </div>
              </div>

              <div class="form-group">  
                <label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo_cliente" data-placeholder="-- Seleccionar Cliente --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>

                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_cliente, primerNombre, primerApellido, segundoApellido FROM clientes ORDER BY primerNombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_cliente]\"> $data_obat[codigo_cliente] | $data_obat[primerNombre] $data_obat[primerApellido] $data_obat[segundoApellido] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
                             
              <div class="form-group">  
                <label class="col-sm-2 control-label">Empleado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo_empleado" data-placeholder="-- Seleccionar Empleado --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>

                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_empleado, primerNombre_e, primerApellido_e, segundoApellido_e FROM empleados ORDER BY primerNombre_e ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_empleado]\"> $data_obat[codigo_empleado] | $data_obat[primerNombre_e] $data_obat[primerApellido_e] $data_obat[segundoApellido_e] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Observacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="observacion" autocomplete="off" >
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado de Cita</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado_cita" data-placeholder="-- Seleccionar estado --" required>
                    <option value=""></option>
                    <option value="Pendiente">Cita Pendiente</option>
                    <option value="Atendida">Cita Atendida</option>
                  </select>
                </div>
              </div>

              
              <div class="form-group">
                <label class="col-sm-2 control-label">Servicio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="servicio" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-purple btn-submit" name="Guardar" value="Guardar" style="color:white;">
                  <a href="?module=mod_citas" class="btn btn-default btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT c.codigo_cita, c.fecha, c.codigo_cliente, c.codigo_empleado, c.observacion, c.created_user, c.estado_cita, 
                                            e.primerNombre_e, e.primerApellido_e, e.segundoApellido_e, c.servicio, c.hora
                                      FROM citas c
                                      INNER JOIN empleados AS e ON e.codigo_empleado = c.codigo_empleado
                                      WHERE codigo_cita = '$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1 style="color:white;">
      <i class="fa fa-edit icon-title" style="color:white;"></i> Modificar Cita
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modulos/mod_citas/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">codigo_cita</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_cita" value="<?php echo $data['codigo_cita']; ?>" readonly required>
                </div>
              </div>

             <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha_a" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hora</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control time" name="hora" autocomplete="off" value="<?php echo $data['hora']; ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">  
                <label class="col-sm-2 control-label">Cliente</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo_cliente" value="<?php echo $data['codigo_cliente']; ?>" readonly required>
                  <!--<select type="text" class="form-control" name="codigo_cliente" value="<?php /* echo $data['codigo_cliente']; */?>" readonly required>
                    <option value=""></option>

                    <?php /*
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_cliente, primerNombre, primerApellido, segundoApellido FROM clientes ORDER BY primerNombre ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_cliente]\"> $data_obat[codigo_cliente] | $data_obat[primerNombre] $data_obat[primerApellido] $data_obat[segundoApellido] </option>";
                      }
                    */ ?>
                  </select> -->
                </div>
              </div>
              
              
              <div class="form-group">  
                <label class="col-sm-2 control-label">Empleado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="codigo_empleado" data-placeholder="-- SELECIONE UN EMPLEADO --" onchange="tampil_obat(this)" autocomplete="off"  required>
                    <option value=""></option>

                    <?php
                      $query_obat = mysqli_query($mysqli, "SELECT codigo_empleado, primerNombre_e, primerApellido_e, segundoApellido_e FROM empleados ORDER BY primerNombre_e ASC")
                                                            or die('error '.mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo"<option value=\"$data_obat[codigo_empleado]\"> $data_obat[codigo_empleado] | $data_obat[primerNombre_e] $data_obat[primerApellido_e] $data_obat[segundoApellido_e] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Observacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="observacion" value="<?php echo $data['observacion']; ?>">
                </div>
              </div>
			  
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado de Cita</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="estado_cita" value="<?php echo $data['estado_cita']; ?>" data-placeholder="-- SELECCIONE ESTADO DE CITA --" required>
                    <option value=""></option>
                    <option value="Pendiente">Cita Pendiente</option>
                    <option value="Atendida">Cita Atendida</option>
                  </select>
                </div>
              </div>

                            
              <div class="form-group">
                <label class="col-sm-2 control-label">Servicio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="jumlah_masuk" name="servicio" autocomplete="off" value="<?php echo $data['servicio']; ?>" required>
                </div>
              </div>


            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-purple btn-submit" name="Guardar" value="Guardar" style="color:white;">
                  <a href="?module=mod_citas" class="btn btn-default btn-reset">Cancelar</a>
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