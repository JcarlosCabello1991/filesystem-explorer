<?php
    $path = $_GET["path"];

    print_r($path);
    if(is_dir($path)){
        rmdir($path);
        header("Location: ../index.php");
    }else{
        echo "No such directory";
    }
?>