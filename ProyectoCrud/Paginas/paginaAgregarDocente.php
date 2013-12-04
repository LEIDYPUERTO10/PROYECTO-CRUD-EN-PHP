<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Formulario Docente</title>
<link rel="stylesheet" type="text/css" href="../Css/Estilo_Pagina.css" />
</head>

<body background="../Imagenes/fondoPantalla.jpg">
        <!--en esta parte se muestra el boton regresar el cual mediante un href:PaginaInicio nos
lleva a la pagina principal solo con un click-->
	<div id=regresar>
		<center>
			<a style="" href="../index.php"><img src="../Imagenes/Regresar.png"
				border="0" height="80" width="100" /></a></br>
		</center>
	</div>

        <div id="imagenTitulo">
                <img class="simboloTitulo" src="../Imagenes/tituloAgregarDocente.jpg">
        </div>
        <div id="imagenEscudo">
                <img class="simboloEscudo" src="../Imagenes/escudo.png">
        </div>
        
        <?php
include("../conexion.php");
?>

<?php
$var="";
$var1="";
$var2="";
$var3="";
$var4="";
$var5="";
$var6="";
$var7="";


if(isset($_POST["btn1"])){
        $btn=$_POST["btn1"];
        
                if($btn=="Agregar"){
                $docd=$_POST["txtdocd"];
                $nomd=$_POST["txtnomd"];
                $aped=$_POST["txtaped"];
                $dird=$_POST["txtdir"];
                $tper='D';
                $lug=$_POST["cbotlug"];
                $teld=$_POST["txtteld"];
                $tdocd=$_POST["cbottdd"];
                $espd=$_POST["cbotesp"];
                if($docd==""  || $nomd=="" || $aped==""   || $dird==""   || $espd==null  || $lug==null){
                echo "<script> alert('Por Favor Complete Todos Los Campos');</script>";        
                }else{
                $sql="insert into personas values ('$docd','$nomd','$aped','$teld','$dird','$tdocd','$tper',null,null,null,'$espd',null,'$lug',null,null)";
                $cs=mysql_query($sql,$cn);
                echo "<script> alert('La Persona Se Agrego Satisfactoriamente');</script>";
                }
                
                }
                
        }
        

$sql2="select id_lugar,nombre_lugar from lugares order by nombre_lugar asc";
$cs2=mysql_query($sql2,$cn);
$sql3="select id_especialidad,nombre_especialidad from especialidades order by nombre_especialidad asc";
$cs3=mysql_query($sql3,$cn);


?>

<div id=datos>
        
<form name="fad" action="" method="post" id="formulario">
<table border="3" bgcolor= "#FFFFFF">


<tr>
<td>Nombre Docente:</td>
<td><input type="text" name="txtnomd"  value="<?php echo $var?>"/></td>
</tr>

<tr>
<td>Apellido Docente: </td>
<td><input type="text" name="txtaped"  value="<?php echo $var1?>"/></td>
</tr>

<td>Tipo Documento:</td>
<td><select name="cbottdd" id="lista" onclick="activa(this.value)">
<option >TI</option>
<option >CC</option>
<option >CE</option>
<option <?php echo $var2?> >RC</option>
</select></td>
</tr>

<tr>
<td>Num Documento Docente:</td>
<td><input type="text" name="txtdocd" id="nombre"value="<?php echo $var3?>" /></td>
</tr>



<tr>
<td>Telefono Docente:</td>
<td><input type="text" name="txtteld"  value="<?php echo $var4?>"/></td>
</tr>



<tr>
<td>Direccion:</td>
<td><input type="text" name="txtdir"  value="<?php echo $var5?>"/></td>
</tr>


<td>Lugar:</td>
<td><select name="cbotlug" id="lista" onclick="activa(this.value)">
<option value="" <?php echo $var6?> >Selecione</option>
<?php
while($fila=mysql_fetch_row($cs2)){
    echo"<option value='".$fila['0']."'>".$fila[1]."</option>";
}
?>
</select></td>
</tr>



<td>Especialidad:</td>
<td><select name="cbotesp" id="lista" onclick="activa(this.value)">
<option value="" <?php echo $var7?> >Selecione</option>
<?php
while($fila=mysql_fetch_row($cs3)){
    echo"<option value='".$fila['0']."'>".$fila[1]."</option>";
}
?>
</select></td>
</tr>





</table>
<input type="submit" name="btn1"value="Agregar"/>
</form>        
</div>
</body>
</html>