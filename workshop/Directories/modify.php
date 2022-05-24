<?php
    $oldPath = $_GET["oldPath"];
    $path = $_GET["pathtoModify"];
    print_r("oldPath".$oldPath);
    //Building the path with the new name directory
    $arrayPath = explode("/", $oldPath);
    $newPath = "";
    for($i = 0; $i < count($arrayPath)-1; $i++){
        $newPath = $newPath.$arrayPath[$i]."/";
    }
    $newPath = $newPath."/".$path;
    print_r("newPath".$newPath);
    print_r(rename(explode("=",$oldPath)[1],explode("=",$newPath)[1]));
    header("Location: ../index.php");
?>