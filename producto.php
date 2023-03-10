<?php
session_start();
if (!isset($_SESSION['ID'])) {
    header("location: login.php");
}
?>

</SCRIPT>
<!DOCTYPE html>
<html>
<head>
	<title>GoldenBerry Trading</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
		<?php include("diseños/header.php"); ?>
		<div class="container-all" id="modal"></div>
		</div>
		
	
	
	 
          
	<div class="main-content">
		<div class="content-page">
		<br><br><br><br><br><br>
        <section>
		    <div class="part1">
		        <img id="idimg" src="imagenes/produc/">
		    </div>
		    <div class="part2">
		        <h2 id="idtitle"> </h2>
		        <h1 id="idcantidad"> </h1>
		        <h3 id="iddescripcion"> </h3>
			  <form action="#modal" method="POST">
			  <button type="submit">Contactar</button>
			</form>
            </div>
		</section>
			<div class="title-section">Más productos</div>
			
			<div class="products-list" id="space-list">	
			</div>
		
		</div>
		
	</div>
	<script type= "text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript">
        
        var p= '<?php echo $_GET["p"];?>'; 
        
        $(document).ready(function(){
			$.ajax({
            url: 'servicios/publicaciones/traerpubli.php',
            Type: 'POST',
            data:{},
            success:function(data){
                console.log(data); 
                let html='';
                for(var i = 0; i < data.datos.length; i++){
                    if(data.datos[i].codigo==p){
                        document.getElementById("idimg").src="imagenes/"+data.datos[i].imagen;
                        document.getElementById("idtitle").innerHTML=data.datos[i].titulo;
                         document.getElementById("idcantidad").innerHTML=data.datos[i].cantidad + " kg";
                         document.getElementById("iddescripcion").innerHTML=data.datos[i].descrip;
                        
                    }
                    
                    html+=
                      '<div class="product-box">'+
					'<a href="producto.php?p='+data.datos[i].codigo+'">'+
						'<div class="product">'+
							'<img src="imagenes/'+data.datos[i].imagen+'">'+
							'<div class="detail-title">'+data.datos[i].titulo+'</div>'+
							'<div class="detail-description">'+data.datos[i].descrip+'</div>'+
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
		
		function open_log(){
			window.location.href="login.php";
		}

		var hola= '<?php echo $_GET["p"];?>'; 
        
        function enviarcod(hola){
          var cedulapro='';
             $.ajax({
                 
            url: 'servicios/traercedpro.php',
            Type: 'POST',
            data:{
                codigo:hola
            },
                 
            success:function(data){
                console.log(data); 
                var ced='';
              
                for(var i = 0; i < data.datos.length; i++){ 
                    
                 ced=data.datos[i].ID;   
             
                }
              
            
               
            }, 
            error:function(err){
                console.error(err);
        }
 
    });     
            cedulapro = '<?php echo $_SESSION['ID'];?>';
             console.log(cedulapro);    
            return cedulapro; 
        }
        
         $(document).ready(function(){
    		 var p= '<?php echo $_GET["p"];?>'; 
            var x= enviarcod(p);
           
             $.ajax({
            url: 'servicios/datosproduc.php',
            Type: 'POST',
            data:{
                ced:x
            },
            success:function(data){
                console.log(data); 
                let html='';
                for(var i = 0; i < data.datos.length; i++){ 
                    
                    html+=
                    '<div class="popup">'+
			        '<div class="img"></div>'+
			        '<div class="container-text">'+
			            '<h1>DATOS DE CONTACTO</h1><br>'+
			            '<p><h3>NOMBRE:</h3> '+data.datos[i].nombre+ ' ' +data.datos[i].apellido+'</p>'+
			            '<p><h3>TELEFONO:</h3> '+data.datos[i].telefono+'</p>'+
			            '<p><h3>E-MAIL:</h3> '+data.datos[i].email+'</p>'+
			        '</div>'+
			        '<a href="#" class="btn-close-popup">X</a>'+
					'<div class="container-boton">'+
						'<a href="https://wa.me/+57'+data.datos[i].telefono+'?&text=¡Buen Día, estoy interesado en tú publicación de uchuva! &target="_blank">'+
						'<img class="boton" src="imagenes/produc/icono.png" alt="">'+
						'</a>'+
      					'</div>'+
			        '</div>'; 
                    
                }
               document.getElementById("modal").innerHTML=html; 
			    
            },
            error:function(err){
                console.error(err);
        }
    });
         });
    </script>
</body>
</html>