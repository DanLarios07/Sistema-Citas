<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Clientes

    <a class="btn btn-primary btn-social pull-right" href="?module=form_mod_clientes&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar Cliente
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
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT codigo_cliente,primerNombre,segundoNombre,primerApellido,segundoApellido,telefono FROM clientes ORDER BY codigo_cliente DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='80' class='center'>$data[codigo_cliente]</td>
                      <td width='130'>$data[primerNombre]</td>
                      <td width='130'>$data[segundoNombre]</td>
                      <td width='130'>$data[primerApellido]</td>
                      <td width='130'>$data[segundoApellido]</td>
                      <td width='100' class='center'>$data[telefono]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_mod_clientes&form=edit&id=$data[codigo_cliente]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" style="margin-right:5px" class="btn btn-danger btn-sm" href="modulos/mod_clientes/proses.php?act=delete&id=<?php echo $data['codigo_cliente'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['nombre']; ?> ?');">
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