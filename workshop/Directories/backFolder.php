<?php
include("./checkPath.php");
print_r("ruta ".$_GET["directory"]);
backFolder($_GET["directory"]);
if($_GET["directory"] == "./root"){
logOutSession();
}
header("Location: ../index.php");
?>