<?php
<<<<<<< HEAD

=======
>>>>>>> buttons
/* 
$actualDir = dirname(__FILE__);

echo $actualDir;
 */
<<<<<<< HEAD

=======
  print_r("hola");
>>>>>>> buttons


  $name = $_POST['nameFileOrDirectory'];
  $actualDir = "../root".$name;
  if (file_exists($actualDir)){
<<<<<<< HEAD
    echo "File already exists";
  } else {
    echo $name;
=======
    //header("Location: ../index.php");
    echo "File already exists";
  } else {
    mkdir($actualDir, 0700);
    //header("Location: ../index.php");
    echo "Directory succesfully created)";
>>>>>>> buttons
  }




/* mkdir("../Root", 0700); */
<<<<<<< HEAD
?>
=======
?>

<!-- <dialog class='dialog' width=200px open>
        <form action='./sendNewDirectory.php' method='POST'>
        <input name='NameDirectory' placeholder='DirectoryName>
        <button type='submit'>Add</button></form> -->
>>>>>>> buttons
