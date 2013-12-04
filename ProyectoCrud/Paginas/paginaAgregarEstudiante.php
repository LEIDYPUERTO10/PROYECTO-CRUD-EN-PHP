<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Formulario Estudiante</title>
<link rel="stylesheet" type="text/css" href="../Css/Estilo_Pagina.css" />
</head>

<body background="../Imagenes/fondoPantalla.jpg">
	<
	<!--en esta parte se muestra el boton regresar el cual mediante un href:PaginaInicio nos
lleva a la pagina principal solo con un click-->
	<div id=regresar>
		<center>
			<a style="" href="../index.php"><img src="../Imagenes/Regresar.png"
				border="0" height="80" width="100" /></a></br>
		</center>
	</div>


	<div id="imagenTitulo">
		<img class="simboloTitulo"
			src="../Imagenes/tituloAgregarEstudiante.jpg">
	</div>
	<div id="imagenEscudo">
		<img class="simboloEscudo" src="../Imagenes/escudo.png">
	</div>
	
	<?php
	include ("../conexion.php");
	?>
<script type="text/javascript"> 
function activa(v){
if(v=="Estudiante"){document.fan.dependencia.disabled = true;
		    document.fan.carrera.disabled = false;
		    document.fan.codigo.disabled = false;}
if(v=="Docente" || v=="Administrativo"){document.fan.dependencia.disabled = false;
		    document.fan.carrera.disabled = true;
		    document.fan.codigo.disabled = true;}

}
</script> 
<?php
if (isset ( $_POST ["btn1"] )) {
	$btn = $_POST ["btn1"];
	
	if ($btn == "Agregar") {
		$docn = $_POST ["txtdocn"];
		$nomn = $_POST ["txtnomn"];
		$apen = $_POST ["txtapen"];
		$dir = $_POST ["txtdir"];
		$tdocn = 'RC';
		$tpern = 'N';
		$gran = $_POST ["cbotgra"];
		$lug = $_POST ["cbotlug"];
		$fecn = $_POST ["txtfecn"];
		$docp = $_POST ["txtdocp"];
		$nomp = $_POST ["txtnomp"];
		$apep = $_POST ["txtapep"];
		$telp = $_POST ["txttelp"];
		$tperp = 'P';
		$tdocp = $_POST ["cbottdp"];
		$tpa = $_POST ["cbotpap"];
		
		if ($tpa == "Estudiante") {
			$codep = $_POST ["txtcodes"];
			$carp = $_POST ["cbotcar"];
			if ($docn == "" || $nomn == "" || $apen == "" || $dir == "" || $fecn == "" || $gran == null || $lug == null) {
				echo "<script> alert('Por Favor Complete Todos Los Campos');</script>";
			} else {
				$sql1 = "insert into personas values ('$docn','$nomn','$apen',null,'$dir','$tdocn','$tpern',null,null,'$fecn',null,'$gran','$lug',null,null)";
				$sql = "insert into personas values ('$docp','$nomp','$apep','$telp','$dir','$tdocp','$tperp','$tpa','$codep',null,null,null,'$lug','$carp',null)";
				$cs = mysql_query ( $sql, $cn );
				$cs1 = mysql_query ( $sql1, $cn );
				echo "<script> alert('La Persona Se Agrego Satisfactoriamente');</script>";
			}
		}
		
		if ($tpa == "Administrativo" || $tpa == "Docente") {
			$depp = $_POST ["cbotdep"];
			if ($docn == "" || $nomn == "" || $apen == "" || $dir == "" || $fecn == "" || $gran == null || $lug == null) {
				echo "<script> alert('Por Favor Complete Todos Los Campos');</script>";
			} else {
				$sql1 = "insert into personas values ('$docn','$nomn','$apen',null,'$dir','$tdocn','$tpern',null,null,'$fecn',null,'$gran','$lug',null,null)";
				$sql = "insert into personas values ('$docp','$nomp','$apep','$telp','$dir','$tdocp','$tperp','$tpa',null,null,null,null,'$lug',null,'$depp')";
				$cs = mysql_query ( $sql, $cn );
				$cs1 = mysql_query ( $sql1, $cn );
				echo "<script> alert('La Persona Se Agrego Satisfactoriamente');</script>";
			}
		}
	}
}

$sql2 = "select id_grado,nombre_grado from grados order by nombre_grado asc";
$cs2 = mysql_query ( $sql2, $cn );
$sql3 = "select id_lugar,nombre_lugar from lugares order by nombre_lugar asc";
$cs3 = mysql_query ( $sql3, $cn );
$sql4 = "select id_carrera,nombre_carrera from carreras order by nombre_carrera asc";
$cs4 = mysql_query ( $sql4, $cn );
$sql5 = "select id_dependencia,nombre_dependencia from dependencias order by nombre_dependencia asc";
$cs5 = mysql_query ( $sql5, $cn );
?>

	<div id=datos>
		<form name="fan" action="" method="post" id="formulario">
			<table border="3" bgcolor="#FFFFFF">

				<tr>
					<td>Num Documento Niño:</td>
					<td><input type="text" name="txtdocn" /></td>
				</tr>

				<tr>
					<td>Nombre Niño:</td>
					<td><input type="text" name="txtnomn" /></td>
				</tr>

				<tr>
					<td>Apellido Niño:</td>
					<td><input type="text" name="txtapen" /></td>
				</tr>

				<tr>
					<td>Fecha Nac. Niño:</td>
					<td><input type="text" name="txtfecn" value="AAAA-MM-DD" /></td>
				</tr>

				<td>Grado:</td>
				<td><select name="cbotgra" id="lista">
						<option>Selecione</option>
<?php
while ( $fila = mysql_fetch_row ( $cs2 ) ) {
	echo "<option value='" . $fila ['0'] . "'>" . $fila [1] . "</option>";
}
?>
</select></td>
				</tr>

				<td>Tipo Padre:</td>
				<td><select name="cbotpap" id="lista" onclick="activa(this.value)">
						<option Value="Estudiante">Estudiante</option>
						<option Value="Docente">Docente</option>
						<option Value="Administrativo">Administrativo</option>
				</select></td>
				</tr>

				<td>Tipo Documento:</td>
				<td><select name="cbottdp" id="lista">
						<option>TI</option>
						<option>CC</option>
						<option>CE</option>
						<option>RC</option>
				</select></td>
				</tr>

				<tr>
					<td>Num Documento Padre:</td>
					<td><input type="text" name="txtdocp" id="nd" /></td>
				</tr>

				<tr>
					<td>Nombre Padre:</td>
					<td><input type="text" name="txtnomp" /></td>
				</tr>

				<tr>
					<td>Apellido Padre:</td>
					<td><input type="text" name="txtapep" /></td>
				</tr>

				<tr>
					<td>Telefono Padre:</td>
					<td><input type="text" name="txttelp" /></td>
				</tr>

				<tr>
					<td>Direccion:</td>
					<td><input type="text" name="txtdir" /></td>
				</tr>

				<tr>
					<td>Cod. Estudiante</td>
					<td><input type="text" name="txtcodes" id="codigo" /></td>
				</tr>

				<td>Lugar:</td>
				<td><select name="cbotlug" id="lista"">
						<option value="">Selecione</option>
<?php
while ( $fila = mysql_fetch_row ( $cs3 ) ) {
	echo "<option value='" . $fila ['0'] . "'>" . $fila [1] . "</option>";
}
?>
</select></td>
				</tr>

				<td>Carrera:</td>
				<td><select name="cbotcar" id="carrera">
						<option value="">Selecione</option>
<?php
while ( $fila = mysql_fetch_row ( $cs4 ) ) {
	echo "<option value='" . $fila ['0'] . "'>" . $fila [1] . "</option>";
}
?>
</select></td>
				</tr>

				<td>Dependencia:</td>
				<td><select name="cbotdep" id="dependencia">
						<option value="">Selecione</option>
<?php
while($fila=mysql_fetch_row($cs5)){
    echo"<option value='".$fila['0']."'>".$fila[1]."</option>";
}
?>
</select></td>
				</tr>
			</table>
			<input type="submit" name="btn1" value="Agregar" />
		</form>
	</div>
</body>
</html>
