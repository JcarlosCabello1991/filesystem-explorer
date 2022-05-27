<?php
include("./checkPath.php");
backFolder($_GET["directory"]);
if($_GET["directory"] == "./root"){
logOutSession();
}
header("Location: ../index.php");
?>