<html>
<head> <title>consulta 4</title></head>

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

$result=mysql_query("select nombre_per,cargo
from personal
where cod_equipo in (select cod_equipo
		     		 from equipos
		    		 where cod_carrera in (select cod_carrera
					 					   from carreras
					 					   where cod_circuito in (select cod_circuito
																  from circuitos
								 								  where cod_circuito in (select codigo_cir
																						 from paises
																						 where transitabilidad='no'))))
and jefe is not null;",$conexion);

echo "<center><h2><b><font color='white'>Sacar los miembros del equipo y el cargo del que el jefe no sea null que corrio en un cirtuito no transitable.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Nombre persona</b></td>
	<td ><b>Cargo</b></td></tr>";


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
