<?php

include('_conexion.php');


$data = [
    'secret' => '0xc0Dc3a86E0eC26C9E900346FdFF37fCa7ABD9224',
    'response' => $_POST['h-captcha-response']
];

$verify = curl_init();
curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
curl_setopt($verify, CURLOPT_POST, true);
curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($verify);
$responseData = json_decode($response);

if ($responseData->success){

    $ID = $_POST["ID"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $contraseña = $_POST["contraseña"];
    $tipo = $_POST["tipo"];

    $encri=sha1($contraseña);
//consulta para validar si un usuario ya existe
$validar = "SELECT * FROM usuario WHERE ID = '$ID' || email='$email' ";
$validando = $con->query($validar);
if($validando->num_rows > 0){
    echo "<script>alert('*** La cc y/o el email ya están registrados ***');
    window.location='../register.php';
    </script>";
}else {
    $sql="INSERT INTO usuario(ID,nombre,apellido,telefono,email,contraseña) VALUES ('$ID','$nombre','$apellido','$telefono','$email','$encri')";
    $result=mysqli_query($con,$sql);
    if($result == 1){
        $sql = "INSERT INTO tipou(ID,tipo) VALUES ('$ID','$tipo')";
        $result2=mysqli_query($con,$sql);
        //tabla login
        //Generando clave aleatoria
        $logitudPass = 12;
        $miPassword  = substr( md5(microtime()), 1, $logitudPass);
        $clave       = $miPassword;

        $sqlpass = "INSERT INTO login(ID,pass1,pass2,pass3,token) VALUES ('$ID','$encri', 'NULL', 'NULL', '$clave')";
        $result5=mysqli_query($con,$sqlpass);
        echo "<script>alert('*** Se registró exitosamente ***');
        window.location='../login.php';
    </script>";

    

    }else{
        echo "<script>alert('*** No se registró ***');
    window.location='../register.php';
    </script>";
    }
}   
}else{
    echo "<script>alert('*** Error en el Captcha ***');
    window.location='../register.php';
    </script>";
}

//función para encriptar la contraseña

/*function hashpassword($contraseña){
    
    return $hash;
    }

$pass_hash=hashpassword($contraseña);*/

?>

