<html>
<head> <title>CONSULTA 2</title></head>

<body background="../consulta.jpg">

<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");
// echo "<br><h2><b><center>CONEXIÓN REALIZADA CORRECTAMENTE.</center></b></h2></br>";
mysql_select_db("carreras",$conexion) or die("<br><h2><b><center>CONEXIÓN A LA BD NO REALIZADA.</center></b></h2></br>");
// echo "<br><h2><b><center>*** CONEXIÓN A LA BASE DE DATOS REALIZADA ***.</center></b></h2></br>";

$result=mysql_query("select carreras.premio, circuitos.direccion
from carreras, circuitos
where carreras.cod_circuito in (select cod_circuito
											   from circuitos
											 	 where cod_circuito=(select codigo_cir	
					  															   from paises
					    															 where transitabilidad='no'))
and carreras.cod_circuito=circuitos.cod_circuito;",$conexion);

echo "<center><h2><b><font color='white'>Premio y la direccion del circuito de las carreras que estan organizadas en paises que tienen circuitos no transitables.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Premio</b></td>
	<td ><b>Direccion</b></td></tr>";


while ($fila=mysql_fetch_array($result))
{
	echo"<tr bgcolor='#FFFFF99'>";
	echo"<td>$fila[0]</td>";
	echo"<td>$fila[1]</td>";
	echo"</tr>";
}

echo"</table></center>";

$numero=mysql_num_rows($result);

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
//echo "<br><h2><b><center>CONEXIÓN CERRADA CORRECTAMENTE.</center></b></h2></br>";
	
?>

</body>
</html>
