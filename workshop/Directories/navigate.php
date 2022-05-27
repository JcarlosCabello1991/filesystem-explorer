<?php
include("./checkPath.php");
print_r("nueva coor".$_GET["directory"]);
setPath($_GET["directory"], false);
print_r("ruta nueva".getPath());
if(isset($_SESSION["matches"])){
    unset($_SESSION["matches"]);
}
header("Location: ../index.php");
?>