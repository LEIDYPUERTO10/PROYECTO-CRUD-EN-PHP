<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Pagina Informacion</title>
<link rel="stylesheet" type="text/css" href="../Css/Estilo_Pagina.css" />
</head>



<body background="../Imagenes/fondoPantalla.jpg">
	<div id=regresar>
		<center>
			<a style="" href="../index.php"><img src="../Imagenes/Regresar.png"
				border="0" height="80" width="100" /></a></br> 
		</center>
	</div>

	<div id="imagenEscudo">
		<img class="simboloEscudo" src="../Imagenes/escudo.png">
	</div>

<?php
include ("../conexion.php");
?>

	<div id="datos1" >		
<?php

$var = "";
$var1 = "";
$var2 = "";
$var3 = "";
$var4 = "";
$var5 = "";
$var6 = "";
$var7 = "";
$var8 = "";
$var9 = "";
$var10 = "";
$var11 = "";
$var12 = "";
$var13 = "";
$var14 = "";

$sql = "select * from personas";
$cs = mysql_query ( $sql, $cn );
echo "
<table border='3'>
<tr>
<td>Num Documento</td>
<td>Nombre</td>
<td>Apellido</td>
<td>Telefono</td>
<td>Direccion</td>
<td>Tipo Documento</td>
<td>Tipo Persona</td>
<td>Tipo Padre</td>
<td>Cod Estudiante</td>
<td>Fecha Nac Niño</td>
<td>Especialidad</td>
<td>Grado</td>
<td>Lugar</td>
<td>Carrera</td>
<td>Dependencia</td>
</tr>";

while ( $resul = mysql_fetch_array ( $cs ) ) {
	$var = $resul [0];
	$var1 = $resul [1];
	$var2 = $resul [2];
	$var3 = $resul [3];
	$var4 = $resul [4];
	$var5 = $resul [5];
	$var6 = $resul [6];
	$var7 = $resul [7];
	$var8 = $resul [8];
	$var9 = $resul [9];
	$var10 = $resul [10];
	$var11 = $resul [11];
	$var12 = $resul [12];
	$var13 = $resul [13];
	$var14 = $resul [14];
	
	$var18 = "";
	$var19 = "";
	$var20 = "";
	$var21 = "";
	$var22 = "";
	$var23 = "";
	$var24 = "";
	$var25 = "";
	
	if ($var5 != null) {
		
		if ($var5 == 'RC') {
			
			$var23 = "Registro Civil";
		}
		if ($var5 == 'CC') {
			
			$var23 = "Cedula de Ciudadania";
		}
		
		if ($var5 == 'CE') {
			
			$var23 = "Cedula  Extranjera";
		}
		if ($var5 == 'TI') {
			
			$var23 = "Tarjeta de Identidad";
		}
	}
	
	if ($var6 != null) {
		if ($var6 == 'D') {
			
			$var24 = "Docente";
		}
		if ($var6 == 'P') {
			
			$var24 = "Padre";
		}
		if ($var6 == 'N') {
			
			$var24 = "Niño";
		}
	}
	if ($var6 == 'P') {
		
		if ($var7 == 'E') {
			
			$var25 = "Estudiante";
		}
		
		if ($var7 == 'D') {
			
			$var25 = "Docente";
		}
		
		if ($var7 == 'A') {
			
			$var25 = "Administrativo";
		}
	}
	
	if ($var10 != null && $var6 == 'D') {
		$sql1 = "select nombre_especialidad from especialidades where id_especialidad='$var10'";
		$cs1 = mysql_query ( $sql1, $cn );
		while ( $valor = mysql_fetch_array ( $cs1 ) ) {
			$var18 = $valor [0];
		}
	}
	
	if ($var11 != null && $var6 == 'N') {
		$sql1 = "select nombre_grado from grados where id_grado='$var11'";
		$cs1 = mysql_query ( $sql1, $cn );
		while ( $valor = mysql_fetch_array ( $cs1 ) ) {
			$var19 = $valor [0];
		}
	}
	
	if ($var12 != null) {
		$sql1 = "select nombre_lugar from lugares where id_lugar='$var12'";
		$cs1 = mysql_query ( $sql1, $cn );
		while ( $valor = mysql_fetch_array ( $cs1 ) ) {
			$var20 = $valor [0];
		}
	}
	if ($var13 != null && $var7 == 'E') {
		$sql1 = "select nombre_carrera from carreras where id_carrera='$var13'";
		$cs1 = mysql_query ( $sql1, $cn );
		while ( $valor = mysql_fetch_array ( $cs1 ) ) {
			$var21 = $valor [0];
		}
	}
	
	if ($var14 != null && $var7 == 'A') {
		$sql1 = "select nombre_dependencia from dependencias where id_dependencia='$var14'";
		$cs1 = mysql_query ( $sql1, $cn );
		while ( $valor = mysql_fetch_array ( $cs1 ) ) {
			$var22 = $valor [0];
		}
	}
	
	echo "<tr>
<td>$var</td>
<td>$var1</td>
<td>$var2</td>
<td>$var3</td>
<td>$var4</td>
<td>$var23</td>
<td>$var24</td>
<td>$var25</td>
<td>$var8</td>
<td>$var9</td>
<td>$var18</td>
<td>$var19</td>
<td>$var20</td>
<td>$var21</td>
<td>$var22</td>
</tr>";
}
echo "</table>";
?>
	
</div>

</body>
</html>