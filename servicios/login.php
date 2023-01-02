<?php
//1. Error de conexion
//2. Email invalido
//3. contraseña incorrecta
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

    $email=$_POST['email'];
    $sql="SELECT * FROM usuario WHERE email='$email'";
    $result=mysqli_query($con,$sql);
    if($result){
        $row=mysqli_fetch_array($result);
        $count=mysqli_num_rows($result);
        if($count!=0){  
            $contraseña=$_POST['contraseña'];
            $encri2=sha1($contraseña);
            if($row['contraseña']!=$encri2){
                
                header('location: ../login.php?e=3');            
            }else{
                session_start();
                $_SESSION['ID']=$row['ID'];
                $_SESSION['email']=$row['email'];
                $_SESSION['nombre']=$row['nombre'];
                $_SESSION['telefono']=$row['telefono'];
                header('location: ../');
            }
        }else{
            header('location: ../login.php?e=2');        
        }
    }else{
        header('location: ../login.php?e=1');    
    } 
}else{
    echo "<script>alert('*** Error en el Captcha ***');
    window.location='../login.php';
    </script>";
}


?>