<?php
include("./checkPath.php");
$path = "../root/";
$fileToSearch = $_POST["nameFileOrDirectory"];
setSearch($fileToSearch);
$files = glob($fileToSearch);
//print_r($files);
return getMatches($fileToSearch);
//First obtain all the repositories and files for each level from root folder
print_r("FILETOSEARCH".$fileToSearch);
// dirtree("../root/");
echo "<br>";echo "5";
// function dirtree($dir, $regex='', $ignoreEmpty=false, $fileToSearch, $_SESS)
// {
//     //session_start();
//     if (!$dir instanceof DirectoryIterator) {
//         $dir = new DirectoryIterator((string)$dir);
//     }
//     $dirs  = array();
//     $files = array();
//     $array = array();
//     // $_SESSION["matches"] = array();
//     foreach ($dir as $node) {
//         echo "<br>NODE: <br>";var_dump($node);echo "<br>";
//         if ($node->isDir() && !$node->isDot()) {
//             $tree = dirtree($node->getPathname(), $regex, $ignoreEmpty, $fileToSearch,$_SESSION["matches"]);
//             echo "tree";var_dump($tree);
//             echo "IGNORE<br>";
//             var_dump($ignoreEmpty);echo "<br";
//             if (!$ignoreEmpty || count($tree)) {
//                 //array_push($dirs, $node->getFilename());
//                 echo "ARRAY<br>";
//                 var_dump($_SESSION["matches"]);echo "5";
//                 echo "<br>";
//                 if($fileToSearch == $node->getFilename()){
//                     echo "AAAAAAA1<li>".$fileToSearch."</li>";
//                     //array_push($array, $fileToSearch);
//                     echo $node->getPathname();
//                     array_push($_SESSION["matches"], $fileToSearch);
//                     array_push($_SESSION["matches"], $node->getRealPath());
//                     echo "<br>";
//                     var_dump($_SESSION["matches"]);echo "7";
//                     echo "<br>";
//                     //return $_SESS;
//                 }
//             }
//         } elseif ($node->isFile()) {
//             $name = $node->getFilename();
//             if ('' == $regex || preg_match($regex, $name)) {
//                 array_push($files, $name);
//                 var_dump($_SESSION["matches"]);echo "6";
//                 if($fileToSearch == $name){
//                     echo "AAAAAAA<li>".$fileToSearch."</li>";
//                     //array_push($array, $fileToSearch);//metemos la coincidencia en el array
//                     echo "RUTA: ".$node->getPathname()."<br>";
//                     echo "RUTA: ".$node->getRealPath()."<br>";
//                     array_push($_SESSION["matches"], $fileToSearch);
//                     array_push($_SESSION["matches"], $node->getRealPath());
//                     var_dump($_SESSION["matches"]);
//                     //return $_SESS;$ignoreEmpty = true;
//                 }
//             }
//         }
//     }
//     asort($dirs);
//     sort($files);
//     echo"1<br>";
//     var_dump($_SESSION["matches"]);
//     echo "<br>2<br>";
//     return $_SESSION["matches"];
//     //header("Location: ../index.php");
// }

function getMatches($fileto){
    $_SESSION["matches"] = array();
    $var = dirtree1("../root/", $_SESSION["matches"], $fileto);
    print_r($var);
    header("Location: ../index.php");
}

function showMatches($fileToSearch){
    $arrayDir = dirtree("../root/", $regex='', $ignoreEmpty=false, $fileToSearch);
    print_r("HOLO");
    var_dump($arrayDir);
    print_r($fileToSearch);
    for($i = 0; $i < count($arrayDir); $i++){
        print_r("IMPRIMIENDO".$fileToSearch);
        var_dump($arrayDir[$i]);
        echo "<br>";
        if($fileToSearch == $arrayDir[$i]){
            echo "AAAAAAA<li>".$fileToSearch."</li>";
        }
    }
    return $arrayDir;
}



    function dirtree1($ruta, $_SESS, $fileto){
        // abrir un directorio y listarlo recursivo
        if (is_dir($ruta)) {
           if ($dh = opendir($ruta)) {
              while (($file = readdir($dh)) !== false) {
                print_r($_SESSION["matches"]);
                 //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
                 //mostraría tanto archivos como directorios
                 //echo "<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
                 if (is_dir($ruta . $file) && $file!="." && $file!=".."){
                    //solo si el archivo es un directorio, distinto que "." y ".."
                    echo "<br>Directorio: $ruta$file";
                    echo"<br>size ";var_dump(filesize($ruta . $file));
                    if($fileto == $file){
                        array_push($_SESSION["matches"], $file);
                        array_push($_SESSION["matches"], $ruta.$file);
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filectime($ruta . $file)));
                        array_push($_SESSION["matches"],date("F d Y H:i:s.",filemtime($ruta . $file)));
                        array_push($_SESSION["matches"],folderSize($ruta . $file . "/"));
                    }
                    dirtree1($ruta . $file . "/", $_SESS, $fileto);
                 }elseif(is_file($ruta . $file) && $file!="." && $file!=".."){
                     echo"<br>Fichero: $ruta$file";
                     var_dump(filesize($ruta . $file));
                     var_dump(date("F d Y H:i:s.",filemtime($ruta . $file)));
                     if($fileto == $file){
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
              //header("Location: ../index.php");
           closedir($dh);
           }
        }
        echo "<br>2";
        print_r($_SESSION["matches"]);echo"<br>1<br>";
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
                     echo "<br>Directorio: $ruta$file";
                     echo"<br>size ";var_dump(filesize($ruta . $file));
                     //if($fileto == $file){
                         $size = filesize($ruta . $file)+$size;echo"SIZe";var_dump($size);
                     //}
                     folderSize($ruta . $file . "/", $size);
                  }elseif(is_file($ruta . $file) && $file!="." && $file!=".."){
                      echo"<br>Fichero: $ruta$file";
                      var_dump(filesize($ruta . $file));
                      var_dump(date("F d Y H:i:s.",filemtime($ruta . $file)));
                      //if($fileto == $file){
                        $size = filesize($ruta . $file)+$size;echo"SIZe";var_dump($size);
                     //}
                      folderSize($ruta . $file . "/", $size);
                  }
               }
               echo"valor CALCULADO: $size";
               return $size;
               //header("Location: ../index.php");
            closedir($dh);
            }
         }
    }
?>

