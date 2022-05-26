<?php
include("./checkPath.php");
print_r("ruta ".$_GET["directory"]);
backFolder($_GET["directory"]);
logOutSession();
header("Location: ../index.php");
?>