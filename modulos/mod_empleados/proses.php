
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['codigo_empleado']));
            $primerNombre_e  = mysqli_real_escape_string($mysqli, trim($_POST['primerNombre_e']));
            $segundoNombre_e  = mysqli_real_escape_string($mysqli, trim($_POST['segundoNombre_e']));
            $primerApellido_e = mysqli_real_escape_string($mysqli, trim($_POST['primerApellido_e']));
            $segundoApellido_e = mysqli_real_escape_string($mysqli, trim($_POST['segundoApellido_e']));
            $telefono_e = mysqli_real_escape_string($mysqli, trim($_POST['telefono_e']));
            $identidad = mysqli_real_escape_string($mysqli, trim($_POST['identidad']));
            $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO empleados(codigo_empleado,primerNombre_e,segundoNombre_e,primerApellido_e,segundoApellido_e,telefono_e,identidad,email,created_user,updated_user) 
                                            VALUES('$codigo_empleado','$primerNombre_e','$segundoNombre_e','$primerApellido_e','$segundoApellido_e','$telefono_e','$identidad','$email','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=mod_empleados&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo_empleado'])) {
        
                $codigo_empleado  = mysqli_real_escape_string($mysqli, trim($_POST['codigo_empleado']));
                $primerNombre_e  = mysqli_real_escape_string($mysqli, trim($_POST['primerNombre_e']));
                $segundoNombre_e  = mysqli_real_escape_string($mysqli, trim($_POST['segundoNombre_e']));
                $primerApellido_e = mysqli_real_escape_string($mysqli, trim($_POST['primerApellido_e']));
                $segundoApellido_e = mysqli_real_escape_string($mysqli, trim($_POST['segundoApellido_e']));
                $telefono_e = mysqli_real_escape_string($mysqli, trim($_POST['telefono_e']));
                $identidad = mysqli_real_escape_string($mysqli, trim($_POST['identidad']));
                $email = mysqli_real_escape_string($mysqli, trim($_POST['email']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE empleados SET  primerNombre_e       = '$primerNombre_e',
                                                                    segundoNombre_e       = '$segundoNombre_e',
                                                                    primerApellido_e       = '$primerApellido_e',
                                                                    segundoApellido_e       = '$segundoApellido_e',
                                                                    telefono_e          = '$telefono_e',
                                                                    identidad           = '$identidad',
                                                                    email           =   '$email',
                                                                    updated_user    = '$updated_user'
                                                              WHERE codigo_empleado       = '$codigo_empleado'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=mod_empleados&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo_empleado = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM empleados WHERE codigo_empleado='$codigo_empleado'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=mod_empleados&alert=3");
            }
        }
    }       
}       
?>