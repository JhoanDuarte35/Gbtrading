<?php
include('_conexion.php');

$ID		    = $_REQUEST['ID'];
$password       = $_REQUEST['password'];
$encri2=sha1($password);
/*$updateClave    = ("UPDATE usuario SET contraseña='$password' WHERE ID='$id'");
$queryResult    = mysqli_query($con,$updateClave); */
$sqlcontra="SELECT * FROM login WHERE ID = '$ID'";
$resultado=mysqli_query($con, $sqlcontra);
    if($resultado){
            $row=mysqli_fetch_array($resultado);
            $count=mysqli_num_rows($resultado);
            $pass2= $row['pass1'];
            $pass3= $row['pass2'];
            $pass4= $row['pass3'];
                if($encri2!=$pass4 and $encri2!=$pass2 and $encri2!=$pass3){
                    $cambiocont="UPDATE login SET ID = '$ID', pass1 = '$encri2', pass2 = '$pass2',pass3 = '$pass3',token = 'NULL' WHERE ID ='$ID'";
                $respu=mysqli_query($con,$cambiocont);
                    if($respu == 1){
                        echo "<script>alert('*** Se actualizo su contraseña exitosamente ***');
                        window.location='../login.php';
                    </script>";
                        $camconuser="UPDATE usuario SET contraseña = '$encri2' WHERE ID ='$ID'";
                        $respu2=mysqli_query($con,$camconuser);
                        echo $respu2;
                        /*echo "<script>alert('*** Se actualizo su contraseña exitosamente ***');
                        window.location='../login.php';
                    </script>";*/
                    }else{
                        echo $respu;
                        /*echo "<script>alert('*** No se actualizo su contraseña***');
                        window.location='../register.php';
                        </script>";*/
                    }
                }
            }
?>