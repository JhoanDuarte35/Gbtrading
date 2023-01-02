<?php
session_start();   
if (!isset($_SESSION['ID'])) {
    header("location: login.php");
} 
?>
<SCRIPT LANGUAGE="JavaScript">
//history.forward()
</SCRIPT>
<!DOCTYPE html>
<html>
<head>
	<title>GoldenBerry Trading</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
    <style type="text/css">

form{
    max-width: 400px;
    width: calc(100% - 40px);
    padding: 28px;
   background-color: #fff;
    border-radius: 5px;
    margin: auto;
}
form h3{
    margin: 5px 0;
    font-size: 15px;
    
}
form input{
    border-radius: 10px;
    padding: 7px 10px;
    width: calc(100% - 22px);
    text-align:center;
    font-size: 17px;
    margin-bottom: 10px;
}
form I input{
    border-radius: 10px;
    padding: 50px 100px;
    width: calc(100% - 22px);
    text-align:center;
    font-size: 17px;
    margin-bottom: 10px;
}
form button{
    padding: 15px 1px;
    width: calc(100%);
    font-size: 17px;
    margin: 20px 0;
    
}
form select{
    padding: 10px 5px;
    width: calc(68%);
    font-size: 17px;
    margin: 20px 0;
    
}
form p{
    margin: 0;
    margin-bottom: 1px;
    color: rgb(223, 4, 4);
    font-size: 14px;
}

</style>
</head>
<body>
<?php include("diseños/header.php"); ?>
	<div class="main-content">
		<div class="content-page"><br><br>  
        <form action="servicios/cambiocontra.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" REQUIRED name="ID" value="<?=$_SESSION['ID']?>" readonly>
                <center><h2>Cambio de Contraseña</h2></center><br>
                <h3>Contraseña Actual</h3>
                <input type="text" REQUIRED name="passact" placeholder="Contraseña Actual"
                <h3>Nueva Contraseña</h3>
                <input type="text" REQUIRED name="passnew" placeholder="Nueva Contraseña" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{12,50}$" title="La contraseña debe contener almenos 12 caracteres de longitud y contener al menos 1 carácter en mayúscula, 1 carácter en minúscula, 1 digito, un carácter especial." required></p>
                <?php
                date_default_timezone_set('America/Bogota');
                $fecha=date("Y-m-d H:i:s");
                ?>
                <input type="hidden" name="fecha" value="<?=$fecha?>" readonly>
                <button type="submit">Actualizar</button>
            </form>
			</div>
		</div>
	</div>
    <script type= "text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
    </script>
</body>
</html>