<?php
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";



$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$d=$_POST['modi'];

$result=mysql_query("select * from equipos where cod_equipo=$d",$conexion);
if (mysql_errno($conexion)!=0)
 	{
   		echo "<h2>ERROR AL REALIZAR LA SENTENCIA SELECT";
		exit();
 	}
	
$numero = mysql_num_rows($result);
if($numero==0)// le select no ha devuelto filas
{
	echo "<center><h2>NO EXISTE EL EQUIPO: $d</center>";
	exit();
}	

$fila = mysql_fetch_array($result);

$equipo=$fila['cod_equipo'];
$nombre=$fila['nombre_equi'];
$carr=$fila['cod_carrera'];

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>


<html>
<body background="../operaciones.jpg">
<center>
<form action="modificaciones11.php" method="post" target="inferior">
<table width="385" height="134" border="1" align="center">
<tr><td bgcolor="#FFCC33">

<input name="equipo" type="hidden" value="<?php echo $equipo; ?>" size=15 >

<p align="center">Nombre:
<input name="nombre" type="text" value="<?php echo $nombre; ?>" size=15 >

<p align="center">Codifo de carrera:
<input name="carr" type="text" value="<?php echo $carr; ?>" size=15 >

<p align="center">
<input type="hidden" name="dep" value="<?php echo $dep; ?>" >
<input type="submit" name="actualizar" value="Actualizar" />

</tr></td></table></form></center>
</body>
</html>

