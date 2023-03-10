<?php

// este es el index 
session_start();
if (!isset($_SESSION['ID'])) {
    header("location: login.php");
}
?>
<SCRIPT LANGUAGE="JavaScript">
//history.forward() //para el no retorno a la pagina anterior
</SCRIPT>
<!DOCTYPE html>
<html>
<head>
	<title>GoldenBerry Trading</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
	
<?php include("diseños/header.php"); ?>

	<div class="main-content">
		<div class="content-page">
        <br><br><br><br>
			<div class="title-section">Productos destacados</div>
			<br><br><br><br><br><br>
			<div class="products-list" id="space-list">
				
			</div>
		</div>
	</div>
	<script type= "text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
        $.ajax({
            url: 'servicios/publicaciones/traerpubli.php',
            Type: 'POST',
            data:{},
            success:function(data){
                console.log(data); 
                let html='';
                for(var i = 0; i < data.datos.length; i++){
                    html+=
                      '<div class="product-box">'+
					'<a href="producto.php?p='+data.datos[i].codigo+'">'+
						'<div class="product">'+
							'<img src="imagenes/'+data.datos[i].imagen+'">'+
							'<div class="detail-title">'+data.datos[i].titulo+'</div>'+
							'<div class="detail-description">'+"Publicado en "+data.datos[i].fecha+'</div>'+
                            '<div class="detail-price">'+data.datos[i].cantidad+' kg</div>'+
                        '</div>'+
					'</a>'+
				'</div>';  
                    
                }
               document.getElementById("space-list").innerHTML=html; 
			    
            },
            error:function(err){
                console.error(err);
        }
    });
        });
   
    </script>
</body>
</html>