
<body background="../operaciones.jpg">
<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$n=$_POST['equipo'];
$a=$_POST['nombre'];
$b=$_POST['carr'];

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$result=mysql_query("update equipos set cod_equipo='$n',nombre_equi='$a',
						 cod_carrera='$b' where cod_equipo='$n'",$conexion);
$filas=mysql_affected_rows($conexion);

if(mysql_errno($conexion)==0)
{
	echo "<center><h2><b><font color='white'> FILAS MODIFICADAS: $filas</font></b></h2></center>";
}
else
{
	$numeroERROR = mysql_errno($conexion);
	$descripcionERROR=mysql_error($conexion);
	echo "<h2><b>Nº de error: $numeroERROR * Descripcion: $descripcionERROR</b></h2>";
	
}


mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>
</body>
