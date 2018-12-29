<section class="content-header">
  <h1 style="color:white;">
    <i class="fa fa-folder-o icon-title" style="color:white;"></i> Datos de Citas

    <a class="btn btn-purple btn-social pull-right" href="?module=form_mod_citas&form=add" title="agregar" data-toggle="tooltip" style="color:white;">
      <i class="fa fa-plus"></i> Agregar Cita
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
             Nuevos datos de la cita han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos de la cita modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos de la cita
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center">Nombre Cliente</th>
                <th class="center"># Telefono Cliente</th>
				        <th class="center">Observacion</th>
                <th class="center">Servicio</th>
                <th class="center">Estado De Cita</th>
                <th class="center">Opciones</th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT a.estado_cita, a.codigo_cita,a.fecha, a.hora, a.codigo_cliente,a.observacion,a.servicio,b.codigo_cliente,b.primerNombre,b.segundoNombre,b.primerApellido,
                                            b.segundoApellido,b.telefono ,c.codigo_empleado,c.primerNombre_e,c.segundoNombre_e,c.primerApellido_e,c.segundoApellido_e
                                            FROM clientes as b INNER JOIN citas as a ON b.codigo_cliente=a.codigo_cliente
                                            INNER JOIN empleados as c ON a.codigo_empleado=c.codigo_empleado ORDER BY codigo_cita DESC")
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              $fecha         = $data['fecha'];
              $exp             = explode('-',$fecha);
              $fecha2   = $exp[2]."-".$exp[1]."-".$exp[0];

             
              echo "<tr>
                      <td width='15' class='center'>$no</td>
                      <td width='80' class='center'>$data[fecha]</td>
                      <td width='80' class='center'>$data[hora]</td>
                      <td width='200' class='center'>$data[primerNombre] $data[segundoNombre] $data[primerApellido] $data[segundoApellido]</td>
                      <td width='80' class='center'>$data[telefono]</td>
                      <td width='100' align='right'>$data[observacion]</td>
                      <td width='120' class='center'>$data[servicio]</td>
                      <td width='80' class='center'>$data[estado_cita]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_mod_citas&form=edit&id=$data[codigo_cita]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" style="margin-right:5px" class="btn btn-danger btn-sm" href="modulos/mod_citas/proses.php?act=delete&id=<?php echo $data['codigo_cita'];?>" onclick="return confirm('Esta seguro de eliminar la Cita <?php echo $data['estado_cita']; ?> ?');">
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