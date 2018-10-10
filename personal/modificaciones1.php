<?php
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";



$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$d=$_POST['modi'];

$result=mysql_query("select * from personal where cod_persona=$d",$conexion);
if (mysql_errno($conexion)!=0)
 	{
   		echo "<h2><font color='white'>ERROR AL REALIZAR LA SENTENCIA SELECT</font>";
		exit();
 	}
	
$numero = mysql_num_rows($result);
if($numero==0)// le select no ha devuelto filas
{
	echo "<center><h2><font color='white'>NO EXISTE LA PERSONA: $d</font></center>";
	exit();
}	

$fila = mysql_fetch_array($result);

$persona=$fila['cod_persona'];
$nombre=$fila['nombre_per'];
$cargo=$fila['cargo'];
$jefe=$fila['jefe'];
$equi=$fila['cod_equipo'];

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>


<html>
<body background="../operaciones.jpg">
<center>
<form action="modificaciones11.php" method="post" target="inferior">
<table width="385" height="134" border="1" align="center">
<tr><td bgcolor="#FFCC33">

<input name="persona" type="hidden" value="<?php echo $persona; ?>" size=15 >

<p align="center">Nombre:
<input name="nombre" type="text" value="<?php echo $nombre; ?>" size=15 >

<p align="center">Cargo:
<input name="cargo" type="text" value="<?php echo $cargo; ?>" size=15 >

<p align="center">Jefe:
<input name="jefe" type="text" value="<?php echo $jefe; ?>" size=15 >

<p align="center">Codigo de equipo:
<input name="equi" type="text" value="<?php echo $equi; ?>" size=15 >

<p align="center">
<input type="hidden" name="dep" value="<?php echo $dep; ?>" >
<input type="submit" name="actualizar" value="Actualizar" />

</tr></td></table></form></center>
</body>
</html>

