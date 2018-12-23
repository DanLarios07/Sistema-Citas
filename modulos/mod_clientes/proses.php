
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo_cliente  = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cliente']));
            $primerNombre  = mysqli_real_escape_string($mysqli, trim($_POST['primerNombre']));
            $segundoNombre  = mysqli_real_escape_string($mysqli, trim($_POST['segundoNombre']));
            $primerApellido = mysqli_real_escape_string($mysqli, trim($_POST['primerApellido']));
            $segundoApellido = mysqli_real_escape_string($mysqli, trim($_POST['segundoApellido']));
            $telefono = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));

            $created_user = $_SESSION['id_user'];

  
            $query = mysqli_query($mysqli, "INSERT INTO clientes(codigo_cliente,primerNombre,segundoNombre,primerApellido,segundoApellido,telefono,created_user,updated_user) 
                                            VALUES('$codigo_cliente','$primerNombre','$segundoNombre','$primerApellido','$segundoApellido','$telefono','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=mod_clientes&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo_cliente'])) {
        
                $codigo_cliente  = mysqli_real_escape_string($mysqli, trim($_POST['codigo_cliente']));
                $primerNombre  = mysqli_real_escape_string($mysqli, trim($_POST['primerNombre']));
                $segundoNombre  = mysqli_real_escape_string($mysqli, trim($_POST['segundoNombre']));
                $primerApellido = mysqli_real_escape_string($mysqli, trim($_POST['primerApellido']));
                $segundoApellido = mysqli_real_escape_string($mysqli, trim($_POST['segundoApellido']));
                $telefono = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE clientes SET  primerNombre       = '$primerNombre',
                                                                    segundoNombre       = '$segundoNombre',
                                                                    primerApellido       = '$primerApellido',
                                                                    segundoApellido       = '$segundoApellido',
                                                                    telefono          = '$telefono',
                                                                    updated_user    = '$updated_user'
                                                              WHERE codigo_cliente       = '$codigo_cliente'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=mod_clientes&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo_cliente = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM clientes WHERE codigo_cliente='$codigo_cliente'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=mod_clientes&alert=3");
            }
        }
    }       
}       
?>