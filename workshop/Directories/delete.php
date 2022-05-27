<?php
    $path = $_GET["path"];
    include("./checkPath.php");
    $path = ".".checkPath()."/".explode("/",$path)[count(explode("/",$path))-1];
    if(is_dir($path)){
        print_r($path);
        rmdir($path);
        if(isset($_SESSION["matches"])){
            unset($_SESSION["matches"]);
        }
        header("Location: ../index.php");
    }else{
        echo "No such directory";
    }
?>