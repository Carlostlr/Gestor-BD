<?php
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";



$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$d=$_POST['modi'];

$result=mysql_query("select * from paises where codigo_pais=$d",$conexion);
if (mysql_errno($conexion)!=0)
 	{
   		echo "<h2><font color='white'>ERROR AL REALIZAR LA SENTENCIA SELECT</font>";
		exit();
 	}
	
$numero = mysql_num_rows($result);
if($numero==0)// le select no ha devuelto filas
{
	echo "<center><h2><font color='white'>NO EXISTE EL PAIS: $d</font></center>";
	exit();
}	

$fila = mysql_fetch_array($result);

$pais=$fila[codigo_pais];
$nombre=$fila[nombre];
$trans=$fila[transitabilidad];
$cir=$fila[codigo_cir];

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>


<html>
<body background="../operaciones.jpg">
<center>
<form action="modificaciones11.php" method="post" target="inferior">
<table width="385" height="134" border="1" align="center">
<tr><td bgcolor="#FFCC33">

<input name="pais" type="hidden" value="<?php echo $pais; ?>" size=15 >

<p align="center">Nombre:
<input name="nombre" type="text" value="<?php echo $nombre; ?>" size=15 >

<p align="center">Transitabilidad:
<input name="trans" type="text" value="<?php echo $trans; ?>" size=15 >

<p align="center">Circuito:
<input name="cir" type="text" value="<?php echo $cir; ?>" size=15 >

<p align="center">
<input type="hidden" name="dep" value="<?php echo $dep; ?>" >
<input type="submit" name="actualizar" value="Actualizar" />

</tr></td></table></form></center>
</body>
</html>

