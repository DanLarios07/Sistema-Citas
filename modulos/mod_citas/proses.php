
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo_cita = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cita']));
            
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha_a']));
            $exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $codigo_cliente       = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cliente']));
            $codigo_empleado      = mysqli_real_escape_string($mysqli, trim($_POST['codigo_empleado']));
            $observacion   = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));
            $created_user    = $_SESSION['id_user'];
            $estado_cita= mysqli_real_escape_string($mysqli, trim($_POST['estado_cita']));
            $servicio   = mysqli_real_escape_string($mysqli, trim($_POST['servicio']));

          
            $query = mysqli_query($mysqli, "INSERT INTO citas(codigo_cita,fecha,codigo_cliente,codigo_empleado,observacion,created_user,estado_cita,servicio) 
                                            VALUES('$codigo_cita','$fecha_a','$codigo_cliente','$codigo_empleado','$observacion','$created_user','$estado_cita','$servicio')")
                                            or die('Error: '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=mod_citas&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo_cita'])) {
        
                $codigo_cita = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cita']));
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha_a']));
            $exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];
            $codigo_cliente       = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cliente']));
            $codigo_empleado      = mysqli_real_escape_string($mysqli, trim($_POST['codigo_empleado']));
            $observacion   = mysqli_real_escape_string($mysqli, trim($_POST['observacion']));
            $estado_cita= mysqli_real_escape_string($mysqli, trim($_POST['estado_cita']));
            $servicio   = mysqli_real_escape_string($mysqli, trim($_POST['servicio']));


                $query = mysqli_query($mysqli, "UPDATE citas SET codigo_cita       = '$codigo_cita',
                                                                    fecha       = '$fecha_a',
                                                                    codigo_cliente       = '$codigo_cliente',
                                                                    codigo_empleado       = '$codigo_empleado',
                                                                    observacion          = '$observacion',
                                                                    estado_cita     = '$estado_cita',
                                                                    servicio        = '$servicio'
                                                              WHERE codigo_cita       = '$codigo_cita'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=mod_citas&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo_cita = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM citas WHERE codigo_cita='$codigo_cita'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=mod_citas&alert=3");
            }
        }
    }       
}       
?>