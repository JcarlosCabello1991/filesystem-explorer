<?php
  print_r("hola");


  $name = $_POST['nameFileOrDirectory'];
  $actualDir = "../root/".$name;
  if (file_exists($actualDir)){
    header("Location: ../index.php");
    echo "File already exists";
  } else {
    mkdir($actualDir, 0700);
    header("Location: ../index.php");
    echo "Directory succesfully created)";
  }
?>