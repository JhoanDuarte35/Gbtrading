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
    font-size: 18px;
    
}
form input{

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
	<div class="main-content">
		<div class="content-page"><br><br>  
        <form action="servicios/updateclave.php" method="POST" enctype="multipart/form-data">

          <h3>Hola Bienvenido, escribe tu nueva clave aquí</h3>
          <hr>
          <form action="updateClave.php" action="POST">
            <input type="text" name="ID" value="<?php echo $_REQUEST['ID']; ?>" hidden="true">
            <div class="form-group mb-3">
                <label for="password"  style="float: left; font-weight:bold;">Nueva Clave</label>
                </div>
                <br></br>
                <div class="contei">
                <input type="password" id="contraseña" name="password" placeholder="Nueva Clave" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{12,50}$" title="La contraseña debe contener almenos 12 caracteres de longitud y contener al menos 1 carácter en mayúscula, 1 carácter en minúscula, 1 digito, un carácter especial." required></p>
                <img src="imagenes/Show.png" alt="" class="icon" id="Eye"></div>
                <progress class="bar"max="100" value="0" id="meter"></progress>
            
            
            <button type="submit" class="btn btn-primary  btn-block">Recuperar Ahora</button>
            
          </form>
        </div>
      </div>

    </div>

  </body>
  <script src="js/main-scripts.js"></script>
<script src="js/medidor.js"></script>
</html>


