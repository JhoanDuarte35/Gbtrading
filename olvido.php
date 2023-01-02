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
    font-size: 21.27px;
}
</style>
</head>
<body>
	<header>
	<div class="logo-place"><img src="imagenes/gbtranding.png"></div>
    
   
	  </header>
	    <div class="main-content">
		<div class="content-page">
            
        <br><br><br><br><br>    
            <form action="servicios/recuperarClave.php" method="post">
            <h1>Recupera tu Clave</h1>
            <br></br>
                    <label>Correo</label>
                    <input type="email" name="email" required autocomplete="off"/>
                
                    
                    <button type="submit" class="button button-block miBtn mt-5" value="Recuperar Clave">Recuperar Clave</button>
                    

                    <a href="login.php">Volver</a>
                <br><br>
            </form>
        </div>
        </div>
    </div>