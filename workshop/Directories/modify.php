<?php
include("./checkPath.php");
    $oldPath = $_GET["oldPath"];
    $path = $_GET["pathtoModify"];

    //Building the path with the new name directory
    $arrayPath = explode("/", $oldPath);
    $newPath = ".".checkPath()."/".$path;
    $newPath = $newPath;
    rename(".".checkPath()."/".explode("/",$oldPath)[count(explode("/",$oldPath))-1],$newPath);
    if(isset($_SESSION["matches"])){
        unset($_SESSION["matches"]);
    }
    header("Location: ../index.php");
?>