<?php
  print_r("hola");
  include("./checkPath.php");
  $path = checkPath();

  print_r("añadir aqui ".$path);
  $name = $_POST['nameFileOrDirectory'];
  print_r("nombre".$name);
  
  $newPath = ".".$path."/".$name;
  print_r("PATH COMPLETA ".$newPath);
  if (file_exists($newPath)){
    header("Location: ../index.php");
    echo "File already exists";
  } else {
    print_r("Creando dir: ".mkdir($newPath, 0700));
    header("Location: ../index.php");
    echo "Directory succesfully created)";
  }
?>