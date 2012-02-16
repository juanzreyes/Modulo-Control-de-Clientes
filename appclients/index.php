<?php
@session_start();
 if(isset($_SESSION["usuario"])){}
	 else{
		 echo '<script type="text/javascript">
  window.location="login.php";
</script> ';}
		 include('config.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $nombre_app; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<meta name="Keywords" content="sistemas, aplicaciones, software, diseño grafico, web, clientes">
<meta name="Description" content="Sistema Test by Juanz" >

<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="css/estilo.css" >
 

</head>
<body>
 
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo">
    
 

<div id="recargado"> 

 <div id="textos3"> <h2><?php e( 'Modulo Control de Clientes') ?></h2></div>
 
    
     <div id="textos2">
    <h3><?php e( 'Destacado') ?>:</h3>
    -<?php e( 'En las busquedas, busqueda inteligente de los nombres de los Clientes') ?>.<br><br>
    
    -<?php e( 'Edicion y eliminacion de los Clientes, desde el listado y desde la busqueda') ?>.<br><br>
    
    -<?php e( 'Busqueda en listado, filtrado por todos los campos') ?>.<br><br>
    
    -<?php e( 'Sistema Ingles, Espa&ntilde;ol Automatico') ?>.<br><br>
    </div> 
    
    
    <div id="textos4"> <?php e( 'Contacto') ?>: tfcjuanz@gmail.com  
  <br>
     <?php e( 'Sitio') ?>: <a href="http://www.portafolioz.esmipc.com" target="_blank">www.portafolioz.esmipc.com</a>
  </div>
</div>
 </div>
 
 
</center>
 
</body>

</html>
 