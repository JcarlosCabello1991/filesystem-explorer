<?php
include("./checkPath.php");
print_r("nueva coor".$_GET["directory"]);
setPath($_GET["directory"], false);
print_r("ruta nueva".getPath());
header("Location: ../index.php");
?>