
<body background="../operaciones.jpg">
<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$n=$_POST['persona'];
$a=$_POST['nombre'];
$b=$_POST['cargo'];
$c=$_POST['jefe'];
$d=$_POST['equi'];

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$result=mysql_query("update personal set cod_persona='$n',nombre_per='$a',cargo='$b',jefe='$c',
						 cod_equipo='$d' where cod_persona='$n'",$conexion);
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
