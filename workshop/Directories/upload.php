<?php
include("./checkPath.php");
$button = $_POST["submit"];

$nombre_archivo = $_FILES['fileSelected']['name'];
$tipo_archivo = $_FILES["fileSelected"]["type"];
$tamaño_archivo = $_FILES["fileSelected"]["size"];

$pathFolder = ".".checkPath();
$path = $pathFolder."/".$nombre_archivo;

var_dump("nombre: ".$nombre_archivo);
echo "<br>";
var_dump(" tipo: ".$tipo_archivo);
echo "<br>";
$pathTmp = $pathFolder."/".basename($_FILES["fileSelected"]["name"]);
strtolower(pathinfo($pathFolder."/".$nombre_archivo, PATHINFO_EXTENSION));
move_uploaded_file($_FILES["fileSelected"]["tmp_name"], $pathTmp);
header("Location: ../index.php");

?>