<html>
<head></head>

<body background="../operaciones.jpg">>

<?php
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$carrera=$_POST['carrera'];
$premio=$_POST['premio'];
$fecha=$_POST['fecha'];
$km=$_POST['km'];
$tipo=$_POST['tipo'];
$dura=$_POST['dura'];
$circu=$_POST['circu'];


$result=mysql_query("insert into carreras values($carrera,upper('$premio'),upper('$fecha'),upper('$km'),('$tipo'),upper('$dura'),upper('$circu'))",$conexion);
if (mysql_errno($conexion)==0)
 {
   echo "<h2><center><font color='white'>Carrera insertada</font></center>";
 }
else
 {
   if (mysql_errno($conexion)==1062)
    echo "<h2>CLAVE DUPLICADA, No se ha podido insertar!";
    else {
				$numeERROR=mysql_errno($conexion);
				$descripcionERROR=mysql_error($conexion);
				echo "Nº de error: $numeERROR <br> Descripcion: $descripcionERROR";

		} 
 } 


mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>

</body>
</html>
