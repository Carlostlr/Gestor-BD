<html>
<head> </head>

<body background="../operaciones.jpg">

<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$d=$_POST['circuito'];
$b=$_POST['baja'];


$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);


if($b)// Se ha pulsado el boton para dar de baja
{
	$result=mysql_query("delete from circuitos where cod_circuito=$d",$conexion);
	
	$nfilas=mysql_affected_rows($conexion);
	if (mysql_errno($conexion)==0)
 	{
   		echo "<h2><font color='white'>NUMERO DE FILAS ELIMINADAS: $nfilas</font>";
 	}
	else
 	{
  		$numeERROR=mysql_errno($conexion);
		$descripcionERROR=mysql_error($conexion);
		echo "N� de error: $numeERROR <br> Descripcion: $descripcionERROR";

	} 
}

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXI�N");
	
	
?>

</body>
</html>
