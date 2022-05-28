<?php
include("./checkPath.php");
$path = "../root/";
$fileToSearch = $_POST["nameFileOrDirectory"];
setSearch($fileToSearch);
$files = glob($fileToSearch);
return getMatches($fileToSearch);
//First obtain all the repositories and files for each level from root folder

function getMatches($fileto){
    $_SESSION["matches"] = array();
    $var = dirtree1("../root/", $_SESSION["matches"], $fileto);
    header("Location: ../index.php");
}

function dirtree1($ruta, $_SESS, $fileto){
        // abrir un directorio y listarlo recursivo
        if (is_dir($ruta)) {
           if ($dh = opendir($ruta)) {
              while (($file = readdir($dh)) !== false) {
                 //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                 //mostraría tanto archivos como directorios
                 //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
                 if (is_dir($ruta . $file) && $file!="." && $file!=".."){
                    //solo si el archivo es un directorio, distinto que "." y ".."
                    if($fileto == $file){
                        array_push($_SESSION["matches"], $file);
                        array_push($_SESSION["matches"], $ruta.$file);
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filectime($ruta . $file)));
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filemtime($ruta . $file)));
                        array_push($_SESSION["matches"],folderSize($ruta . $file . "/"));
                    }
                    dirtree1($ruta . $file . "/", $_SESS, $fileto);
                 }elseif(is_file($ruta . $file) && $file!="." && $file!=".."){
                     if($fileto == $file || $fileto == explode(".",$file)[count(explode(".",$file))-2]){
                        array_push($_SESSION["matches"], $file);
                        array_push($_SESSION["matches"], $ruta.$file);
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filectime($ruta . $file)));
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filemtime($ruta . $file)));
                        array_push($_SESSION["matches"],filesize($ruta . $file));
                    }
                     dirtree1($ruta . $file, $_SESSION["matches"], $fileto);
                 }
              }
              return $_SESSION["matches"];
           closedir($dh);
           }
        }
}

function folderSize($ruta, $size=0){
        if (is_dir($ruta)) {
            if ($dh = opendir($ruta)) {
               while (($file = readdir($dh)) !== false) {
                 print_r($_SESSION["matches"]);
                  //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                  //mostraría tanto archivos como directorios
                  //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
                  if (is_dir($ruta . $file) && $file!="." && $file!=".."){
                     //solo si el archivo es un directorio, distinto que "." y ".."
                    $size = filesize($ruta . $file)+$size;
                     folderSize($ruta . $file . "/", $size);
                  }elseif(is_file($ruta . $file) && $file!="." && $file!=".."){
                        $size = filesize($ruta . $file)+$size;
                      folderSize($ruta . $file . "/", $size);
                  }
               }
               return $size;
            closedir($dh);
            }
         }
    }
?>

