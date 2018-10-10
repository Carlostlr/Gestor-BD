<html>
<head> <title>CONSULTA 6 </title></head>

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

$result=mysql_query("select tipo_prue, cod_carrera
from carreras
group by tipo_prue
having avg(premio) >= (select avg(premio)
			from carreras);",$conexion);

echo "<center><h2><b><font color='white'>Tipos de carreras y el codigo de carrera en los que el premio sea mayor o igual que la media de todos los premios.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Tipo</b></td>
	<td ><b>Codigo</b></td></tr>";


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
