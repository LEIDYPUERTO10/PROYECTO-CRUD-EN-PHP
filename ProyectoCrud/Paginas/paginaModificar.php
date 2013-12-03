<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Modificar Persona</title>
<link rel="stylesheet" type="text/css" href="../Css/Estilo_Pagina.css" />
</head>

<body background="../Imagenes/fondoPantalla.jpg">
	<div id=regresar>
		<center>
			<a style=""> <img src="../Imagenes/Regresar.png" border="0"
				height="80" width="100" /></a>
		</center>
	</div>

	<div id="imagenTitulo">
		<img class="simboloTitulo"
			src="../Imagenes/tituloActualizarInformacion.jpg">
	</div>
	<div id="imagenEscudo">
		<img class="simboloEscudo" src="../Imagenes/escudo.png">
	</div>
<?php
include ("conexion.php");
?>


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

if (isset ( $_POST ["btn1"] )) {
	$btn = $_POST ["btn1"];
	$bus = $_POST ["txtbus"];
	if ($btn == "Buscar") {
		
		$sql = "select * from personas where documento_identidad_persona='$bus'";
		$cs = mysql_query ( $sql, $cn );
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
		}
	}
	
	if ($btn == "Aplicar Cambios") {
		
		$doc = $_POST ["txtdoc"];
		$tel = $_POST ["txttel"];
		$dir = $_POST ["txtdir"];
		
		$sql = "update personas set telefono_movil_persona='$tel',direccion_persona='$dir' where documento_identidad_persona='$doc'";
		$cs = mysql_query ( $sql, $cn );
		echo "<script> alert('La Persona Se Actualizo Satisfactoriamente');</script>";
	}
}
?>



<div id=datos1>
		<form name="fm" action="" method="post">
			<center>
				<table border="3" bgcolor="#FFFFFF">

					<tr>
						<td>Buscar Por Documento De Identidad:</td>
						<td><input type="text" name="txtbus" /></td>
						<td><input type="submit" name="btn1" value="Buscar" /></td>
					</tr>
				</table>

				<table border="3" bgcolor="#FFFFFF">
					<tr>
						<td>Num documento:</td>
						<td><input type="text" name="txtdoc" value="<?php echo $var?>" /></td>
					</tr>

					<tr>
						<td>Nombre:</td>
						<td><input type="text" name="txtnom" value="<?php echo $var1?>"
							disabled /></td>
					</tr>

					<tr>
						<td>apellido</td>
						<td><input type="text" name="txtape" value="<?php echo $var2?>"
							disabled /></td>
					</tr>


					<tr>
						<td>Telefono:</td>
						<td><input type="text" name="txttel" value="<?php echo $var3?>" /></td>
					</tr>

					<tr>
						<td>Direccion:</td>
						<td><input type="text" name="txtdir" value="<?php echo $var4?>" /></td>
					</tr>

					<td>Tipo Documento:</td>
					<td><select name="cbodoc">
							<option><?php echo $var5?></option>
					</select></td>
					</tr>

					<td>Tipo Persona:</td>
					<td><select name="cboper">
							<option><?php echo $var6?></option>
					</select></td>
					</tr>


					<td>Tipo Padre:</td>
					<td><select name="cbopad">
							<option><?php echo $var7?></option>
					</select></td>
					</tr>

					<tr>
						<td>Cod Estudiante:</td>
						<td><input type="text" name="txtces" value="<?php echo $var8?>"
							disabled /></td>
					</tr>

					<tr>
						<td>Fecha Nacimiento Niño:</td>
						<td><input type="text" name="txtfec" value="<?php echo $var9?>"
							disabled /></td>
					</tr>

					<td>Especialidad:</td>
					<td><select name="cboesp">
							<option><?php echo $var10?></option>
					</select></td>
					</tr>
					<tr>

						<td>Grado:</td>
						<td><select name="cbogra">
								<option><?php echo $var11?></option>
						</select></td>
					</tr>
					<tr>

						<td>Lugar:</td>
						<td><select name="cbolug">
								<option><?php echo $var12?></option>
						</select></td>
					</tr>
					<tr>

						<td>Carrera:</td>
						<td><select name="cbocar">
								<option><?php echo $var13?></option>
						</select></td>
					</tr>
					<tr>

						<td>Dependencia:</td>
						<td><select name="cbodep">
								<option><?php echo $var14?></option>
						</select></td>
					</tr>
					<tr>
				
				</table>
		
		</form>
		<input type="submit" name="btn1" value="Aplicar Cambios" />

	</div>
</body>
</html>
