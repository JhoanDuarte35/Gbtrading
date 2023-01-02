<?php
include('_conexion.php');

$ID = $_POST['ID'];


$sqlcontra="SELECT * FROM login WHERE ID = '$ID'";
$resultado=mysqli_query($con, $sqlcontra);
    if($resultado){
        $row=mysqli_fetch_array($resultado);
        $count=mysqli_num_rows($resultado);
        if($count!=0){
            $passact = $_POST['passact'];
            $pass2= $row['pass1'];
            $pass3= $row['pass2'];
            $pass4= $row['pass3'];
            $encri3=sha1($passact);
            if($row['pass1']!=$encri3){
                echo "<script>alert('*** Error en la contraseña actual ***');
                window.location='../setting.php';
                </script>";
            }else{
                $passnew=$_POST['passnew'];
                $encri4=sha1($passnew);
                if($encri4!=$pass4 and $encri4!=$pass2 and $encri4!=$pass3){
                    $cambiocont="UPDATE login SET ID = '$ID', pass1 = '$encri4', pass2 = '$pass2',pass3 = '$pass3',token = 'NULL' WHERE ID ='$ID'";
                $respu=mysqli_query($con,$cambiocont);
                    if($respu == 1){
                        $camconuser="UPDATE usuario SET contraseña = '$encri4' WHERE ID ='$ID'";
                        $respu2=mysqli_query($con,$camconuser);
                        echo $respu2;
                        echo "<script>alert('*** Se actualizo su contraseña exitosamente ***');
                        window.location='../login.php';
                    </script>";
                    }else{
                        echo $respu;
                        /*echo "<script>alert('*** No se actualizo su contraseña***');
                        window.location='../register.php';
                        </script>";*/
                    }
                 }else{
                    echo "<script>alert('***Su contraseña ya fue usada anteriormente***');
                    window.location='../setting.php';
                    </script>";
                 }
                
                
            
            }
        }
    }

?>