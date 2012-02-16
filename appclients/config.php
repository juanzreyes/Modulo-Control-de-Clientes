<?php
 ////No moficar nada de Aqui////
$lang = $_SESSION["lenguaje"];  
@header( 'Content-Type: text/html; charset=utf-8' );
 define( 'I18N_DEFAULT_DOMAIN', 'main' );
 require( 'classes/i18n.php' );
 I18n::LoadDomain( "locale/{$lang}.mo", 'main' );
 
 /////Configuracion de datos del Servidor//////////////////
$servidor='localhost';//Aqui cambiamos la direccion de nuestro servidor
$user='root'; //Usuario de acceso al servidor
$pass=''; //Contraseña de acceso a nuestro servidor
$base='app_clientes'; //Nombre de la base de Datos que aigamos Elegido
$link = mysql_connect($servidor,$user,$pass);
mysql_select_db ($base, $link) OR die ('<center>No se puede conectar a la Base de Datos</center>');

///////Extras////////
$nombre_app="Control de Clientes by Juanz";

function desconectar()
{
	mysql_close();
}
 

?>
 