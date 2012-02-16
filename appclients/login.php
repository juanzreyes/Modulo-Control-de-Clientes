 <?php
@session_start();	
@include('config.php');
$idioma=substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2);
if($idioma=="es"){
		$_SESSION["lenguaje"]="es";
		}
		else if($idioma=="en"){
		$_SESSION["lenguaje"]="en";
		}?> 
<p id="izquierda"><?php e( 'Idioma') ?>: <?PHP echo $_SESSION["lenguaje"];?></p>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nombre_app; ?></title>
<link rel="stylesheet" type="text/css" href="css/estilo.css" >
<style type="text/css">
body {
	background-color: #333;
}
</style>
</head>

<body>
 
<center>
<div id="login">

<h2><?php e( 'Ingrese al Sistema') ?></h2>
<form method="post" name="formz">
<table>
<th><?php e( 'Usuario') ?>:</th>
<th><input type="text" name="usuario"/></th><tr>

<th><?php e( 'Contrase&ntilde;a') ?>:</th>
<th><input type="password" name="password"/></th><tr>
<th><?php e( 'Idioma') ?>:</th><th align="left"><select name="lenguaje">><option value="<?php echo $_SESSION["lenguaje"]; ?>"><?php e( 'Defecto') ?> </option><option value="es"><?php e( 'Espa&ntilde;ol') ?> </option><option value="en">English</option></select></th><tr>
<th></th>
<th ><a href="#" onclick="document.formz.submit()" class="button left big"  title="<?php e( 'Entrar') ?>"  ><img src="iconos/admin.png" border="0" width="35"><br /><?php e( 'Entrar') ?></a></th>

</table>
</form>
 
<?php

if(isset($_POST['usuario'])){
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$lenguaje=$_POST['lenguaje'];
$consulta=mysql_query("SELECT * FROM admin WHERE usuario='$usuario'");
$comprueba= mysql_fetch_array($consulta);
if (empty($usuario) or empty($password))
	{
		?>
		<?php e( 'Usuario y contrase&ntilde;a son requeridos para entrar')?><br>
		
		<?php
	}
	else
	{
if ($comprueba['password']==$password){
	
	  $_SESSION["usuario"] = $usuario;
	    $_SESSION["clave"] = $password;
		 $_SESSION["lenguaje"] = $lenguaje;

 echo '<script type="text/javascript">
  
	window.location="index.php";
</script> ';

}
	else
	{
		?>
		<?php e( 'Contraseño Incorrecta Vuelva a intentarlo') ?> <br>
		
		<?php
		}
	}

}
?>
<br /> 
</div>
</center>
</body>
</html>