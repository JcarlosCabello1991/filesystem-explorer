<?php
    $path = $_GET["path"];
    include("./checkPath.php");
    $path = ".".checkPath()."/".explode("/",$path)[count(explode("/",$path))-1];
    $name = explode("/", $path)[count(explode("/", $path))-1];
    $clean = explode("/", $path)[count(explode("/", $path))-2];
    echo $path."<br>".$name."<br>".$clean."<br>";
    if($clean == "trash"){
        if(is_dir($path)){
            print_r($path);
            rmdir($path);
            if(isset($_SESSION["matches"])){
                unset($_SESSION["matches"]);
            }
            header("Location: ../index.php");
        }elseif(!is_dir($path)){
            echo "archivo";
            unlink($path);
             if(isset($_SESSION["matches"])){
                unset($_SESSION["matches"]);
            }
            header("Location: ../index.php");
        }
    }else{
    if(is_dir($path)){
        print_r($path);
        rename($path, "../root/trash/".$name);
        if(isset($_SESSION["matches"])){
            unset($_SESSION["matches"]);
        }
        header("Location: ../index.php");
    }elseif(!is_dir($path)){
        echo "archivo";
         rename($path, "../root/trash/".$name);
         if(isset($_SESSION["matches"])){
            unset($_SESSION["matches"]);
        }
        header("Location: ../index.php");
    }
}
?>