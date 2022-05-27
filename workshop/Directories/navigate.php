<?php
include("./checkPath.php");
setPath($_GET["directory"], false);
if(isset($_SESSION["matches"])){
    unset($_SESSION["matches"]);
}
header("Location: ../index.php");
?>