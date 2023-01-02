<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>GoldenBerry Trading</title>
    <meta charset="utf-8">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">

body,html{
    height: 1000px;
    margin: 0;
    padding: 0;
    background-color: #fefefe;
}

form{
    max-width: 400px;
    width: calc(100% - 40px);
    padding: 10px;
   background-color: #fff;
    border-radius: 5px;
    margin: auto;
}
form h3{
    margin: 20px 0;
}
form input{
    padding: 7px 10px;
    width: calc(100% - 22px);
    font-size: 17px;
    margin-bottom: 10px;
}
form button{
    padding: 15px 15px;
    width: calc(100%);
    font-size: 17px;
    margin: 20px 0;
    
}
form p{
    margin: 0;
    margin-bottom: 1px;
    color: rgb(223, 4, 4);
    font-size: 14px;
}
form a{
    color:#ff7600;
    font-size: 18px;
}
</style>
</head>
<body>
	<header>
        <!--Aun no funciona y hay problema con el capcha del login-->
		<div class="logo-place"><img src="imagenes/gbtranding.png"></div>
	</header>
	<div class="main-content">
		<div class="content-page">
        <br><br><br><br><br>    
			<form action="servicios/login.php" method="POST">
                <h3>INGRESAR</h3>
                <input type="text" name="email" placeholder="Correo">
                <div class="contei">
                <input type="password" class="passw" id="contraseña" name="contraseña" placeholder="Contraseña">
                <img src="imagenes/Show.png" alt="" class="icon" id="Eye">
                </div>
                <?php
                    if(isset($_GET['e'])){
                        switch($_GET['e']){
                            case '1':
                                echo '<p>Error de conexión</p>';
                                break;
                            case '2':
                                echo '<p>Email incorrecto</p>';
                                break;
                            case '3':
                                echo '<p>Contraseña incorrecta</p>';
                                break; 
                            default:
                                break;
                        }
                    }
                ?>  
                <div class="mb-4 mx-auto">
                    <div class="h-captcha" data-sitekey="fa9b6173-c15d-48ef-8980-00f9594ad271"></div>
                </div>
                <button type="submit">Ingresar</button>
                <a href="olvido.php">¿Olvidó su contraseña?</a>
            </form>
            
            <form action="register.php" method="POST">
                <button type="submit">Registrate</button>
            </form>
            <br><br><br><br><br><br><br>
		</div>
	</div>
    <script src="js/main-scripts.js"></script>
</body>
</html>