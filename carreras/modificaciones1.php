<?php
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";



$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$d=$_POST['modi'];

$result=mysql_query("select * from carreras where cod_carrera=$d",$conexion);
if (mysql_errno($conexion)!=0)
 	{
   		echo "<h2>ERROR AL REALIZAR LA SENTENCIA SELECT";
		exit();
 	}
	
$numero = mysql_num_rows($result);
if($numero==0)// le select no ha devuelto filas
{
	echo "<center><h2>NO EXISTE LA CARRERA: $d</center>";
	exit();
}	

$fila = mysql_fetch_array($result);

$carr=$fila['cod_carrera'];
$premio=$fila['premio'];
$fecha=$fila['fech_realiza'];
$km=$fila['km_a_recorrer'];
$tipo=$fila['tipo_prue'];
$duracion=$fila['duracion'];
$circuito=$fila['cod_circuito'];

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>


<html>
<body background="../operaciones.jpg">
<center>
<form action="modificaciones11.php" method="post" target="inferior">
<table width="385" height="134" border="1" align="center">
<tr><td bgcolor="#FFCC33">

<input name="carr" type="hidden" value="<?php echo $carr; ?>" size=15 >

<p align="center">Premio:
<input name="premio" type="text" value="<?php echo $premio; ?>" size=15 >

<p align="center">Fecha de realizacion:
<input name="fecha" type="text" value="<?php echo $fecha; ?>" size=15 >

<p align="center">Km:
<input name="km" type="text" value="<?php echo $km; ?>" size=15 >

<p align="center">Tipo de carrera:
<input name="tipo" type="text" value="<?php echo $tipo; ?>" size=15 >

<p align="center">Duracion:
<input name="duracion" type="text" value="<?php echo $duracion; ?>" size=15 >

<p align="center">Circuito:
<input name="circuito" type="text" value="<?php echo $circuito; ?>" size=15 >

<p align="center">
<input type="hidden" name="dep" value="<?php echo $dep; ?>" >
<input type="submit" name="actualizar" value="Actualizar" />

</tr></td></table></form></center>
</body>
</html>

