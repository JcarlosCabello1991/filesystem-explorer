<?php

/* 
$actualDir = dirname(__FILE__);

echo $actualDir;
 */



  $name = $_POST['nameFileOrDirectory'];
  $actualDir = "../root".$name;
  if (file_exists($actualDir)){
    echo "File already exists";
  } else {
    echo $name;
  }




/* mkdir("../Root", 0700); */
?>