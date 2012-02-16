<?php
@session_start();
 if(isset($_SESSION["usuario"])){}
	 else{
		 echo '<script type="text/javascript">
  window.location="login.php";
</script> ';}
		 include('config.php');
?>

 
<html>
<head>
<title><?php echo $nombre_app; ?></title>
  
<link rel="stylesheet" type="text/css" href="css/estilo.css" > 
<script type='text/javascript' src='js/jquery.js'></script>
 <script type="text/javascript" src="js/jquery.maskedinput-1.3.js"></script>
 <script type="text/javascript" src="js/select_dependientes.js"></script>
      <script type="text/javascript">
	  jQuery(function($){
   $("#date").mask("99/99/9999");
   $("#phone").mask("(999) 999-9999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});

function cambiar () {
document.getElementById('imgavatar').src=document.getElementById('avatar').value;
}</script>
 <?php
function generaPaises()
{
	//include 'config.php';
 
	$consulta=mysql_query("SELECT id, opcion FROM lista_paises");
	 

	// Voy imprimiendo el primer select compuesto por los paises
	echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)'>";
	echo "<option value='0'>Elige</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option ' value='".$registro[0]."'>".$registro[1]."</option>";
	}
	echo "</select>";
}
?>

</head>
<body  >
  
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo"> 
<div id="recargado"> 

<?php
 
if(isset($_POST['nombre'])){
    if(mysql_query("INSERT INTO clientes (avatar, tipo_id, num_id, nombre, fecha_nac, sexo, pais, estado, ciudad) VALUES('$_POST[avatar]'
                 ,'$_POST[tipo_id]','$_POST[num_id]','$_POST[nombre]','$_POST[fecha_nac]','$_POST[sexo]','$_POST[paises]','$_POST[estados]','$_POST[ciudad]')")){
        
       echo "<h2>"; 
	  e( 'Nuevo Cliente Agregado');
	  echo "</h2><br>";
	   e( 'Ahora puede consultarlo en cualquier momento!'); 
        echo"<br>";
    }else{
        echo "  No se pudo almacenar el registro.<br>";
        echo mysql_error();
    }
}
else
{
?>

<h2><?php e( 'Ingreso de Nuevo Cliente')?></h2>
<p id="textos">
             
<form name="datos" method="post">
<table>
<th></th><th><img src="avatars/1.png" name="imgavatar" id="imgavatar" width="100"></th><tr>
<th align="right"><?php e( 'Avatar') ?>:</th><th align="left"> 
<select name="avatar" id="avatar" onChange="cambiar()">
  <option value="avatars/1.png"> <?php e( 'Dise&ntilde;ador') ?></option>
  <option  value="avatars/2.png"> <?php e( 'Estudiante Chica') ?></option>
  <option   value="avatars/3.png"> <?php e( 'Estudiante Chico') ?></option>
   <option   value="avatars/4.png"><?php e( 'Se&ntilde;ora') ?> </option>
      <option   value="avatars/5.png"><?php e( 'Doctora') ?></option>
         <option   value="avatars/6.png"> <?php e( 'Chica') ?></option>
            <option   value="avatars/7.png"> <?php e( 'Soldado') ?></option>
               <option   value="avatars/8.png"> <?php e( 'Anonimo') ?></option>
                  <option   value="avatars/9.png"> <?php e( 'Mujer Policia') ?></option>
                     <option   value="avatars/10.png"><?php e( 'Se&ntilde;or') ?> </option>

</select></th><tr>  
 <th align="right"><?php e( 'Tipo de Identificaci&oacute;n') ?>: </th><th align="left"> <input type="text" id="tipo_id" name="tipo_id"/></th><tr>
 	<th align="right"><?php e( 'Numero de Identificaci&oacute;n') ?>: </th><th align="left"><input type="text" id="num_id" name="num_id"/></th><tr>
 	<th align="right"><?php e( 'Nombre Completo') ?>:</th><th align="left"> <input type="text" id="nombre" name="nombre"/></th><tr>
 	<th align="right"><?php e( 'Fecha de Nacimiento') ?>:  </th><th align="left"><input type="text" id="date"   name="fecha_nac"/></th><tr>
 <th align="right"> <?php e( 'Sexo') ?>:</th>
 <th align="left"> <select id="sexo"  name="sexo">
   <option value="<?php e( 'Masculino')?>"><?php e( ' Masculino') ?></option>
   <option value="<?php e( 'Femenino')?>"> <?php e( 'Femenino') ?> </option>
   </select> </th><tr>
   <th align="right"> <?php e( 'Pais') ?>: </th>
   <th align="left"><?php generaPaises(); ?></th><tr>
   <th align="right"><?php e( 'Departamento/estado') ?>: </th>
   <th align="left"><label></label><label><select   name="estados" id="estados">
						<option value="0">Selecciona opci&oacute;n...</option>
					</select></label>
                    <input type="hidden" id="estadox">
				 </th><tr>
 <th align="right"> <?php e( ' Ciudad') ?> </th>
 <th align="left" ><input type="text" id="ciudad" name="ciudad"/></th><tr>
   <th></th>
<th >
<br />
<a href="#" onClick="document.datos.submit()" class="button left big"  title="<?php e( 'Agregar') ?>"  >
<img src="iconos/agregar2.png" border="0" width="35"><br /><?php e( 'Agregar Nuevo Cliente') ?></a></th>
    
   </table>

</form>
<?php }
?>
</p>
 
 
 </div>
 
</div>
 
</center>
 
</body>
</html>