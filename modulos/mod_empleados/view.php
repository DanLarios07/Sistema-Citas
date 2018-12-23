<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Empleados

    <a class="btn btn-primary btn-social pull-right" href="?module=form_mod_empleados&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar Empleado
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos del cliente han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del cliente modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del cliente
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">Codigo</th>
                <th class="center">Primer Nombre</th>
                <th class="center">Segundo Nombre</th>
                <th class="center">Primer Apellido</th>
                <th class="center">Segundo Apellido</th>
                <th class="center">Telefono</th>
                <th class="center">Identidad</th>
                <th class="center">Correo Electronico</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo_empleado,primerNombre_e,segundoNombre_e,primerApellido_e,segundoApellido_e,telefono_e,identidad,email FROM empleados ORDER BY codigo_empleado DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='80' class='center'>$data[codigo_empleado]</td>
                      <td width='130'>$data[primerNombre_e]</td>
                      <td width='130'>$data[segundoNombre_e]</td>
                      <td width='130'>$data[primerApellido_e]</td>
                      <td width='130'>$data[segundoApellido_e]</td>
                      <td width='100' class='center'>$data[telefono_e]</td>
                      <td width='150' class='center'>$data[identidad]</td>
                      <td width='100' class='center'>$data[email]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_mod_empleados&form=edit&id=$data[codigo_empleado]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" style="margin-right:5px" class="btn btn-danger btn-sm" href="modulos/mod_empleados/proses.php?act=delete&id=<?php echo $data['codigo_empleado'];?>" onclick="return confirm('esta seguro de eliminar a<?php echo $data['primerNombre_e']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content