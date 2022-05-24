<?php
/* 
$actualDir = dirname(__FILE__);

echo $actualDir;
 */
  print_r("hola");


  $name = $_POST['nameFileOrDirectory'];
  $actualDir = "../root".$name;
  if (file_exists($actualDir)){
    //header("Location: ../index.php");
    echo "File already exists";
  } else {
    mkdir($actualDir, 0700);
    //header("Location: ../index.php");
    echo "Directory succesfully created)";
  }




/* mkdir("../Root", 0700); */
?>

<!-- <dialog class='dialog' width=200px open>
        <form action='./sendNewDirectory.php' method='POST'>
        <input name='NameDirectory' placeholder='DirectoryName>
        <button type='submit'>Add</button></form> -->