<?php
    require_once("./Directories/checkPath.php");
    $path = checkPath();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<<<<<<< HEAD
=======

>>>>>>> buttons
    <script src="../assets/js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/a8609ee1f0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/main.css">
    <title>File System</title>
</head>

<body>
    <div class="container">
        <div class="ro" id="body__container--flex">
            <div class="col-md-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <div class="buttons__container--aside" id="buttons__container--aside">
                                <form action="./Directories/search.php" method="POST" class="form__input">
                                    <!--./Directories/search.php -->
                                    <input name="nameFileOrDirectory" class="input__search" placeholder="root/">
                                    <button type="submit" name="submitSearch" id="buttonPrueba"><i
                                            class="fa-solid fa-magnifying-glass color__folder"></i></button>
                                </form>
                                <div class="container__icons--folder">
                                    <button type="button" id="button__create--folder" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fa-solid fa-circle-plus color__folder"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal2">Upload Files</button>
                            <div class="hr-line-dashed"></div>
                            <h5><?php print_r($path); ?> <a
                                    href="<?php echo "./Directories/backFolder.php?directory=".$path?>"><i
                                        class="fa-solid fa-circle-left color__folder"></i></a></h5>
                            <ul class="folder-list" style="padding: 0">
                                <?php
                            $countDirectories = count(scandir($path));
                            $pathDir = "../root/"; 
                            for($i = 2; $i < $countDirectories; $i++){
                                if(is_dir($path."/".scandir($path)[$i])){
                                    echo "<br>";print_r($path."/".scandir($path)[$i]);
                        ?>
                                <li><a
                                        href=" <?php echo "./Directories/navigate.php?directory=".scandir($path)[$i] ?>"><?php echo scandir($path)[$i]; ?></a><a
                                        href="<?php echo "./Directories/delete.php?path=".$pathDir.scandir($path)[$i];?>"><i
                                            id="<?php echo scandir($path)[$i] ?>"
                                            class="fa-solid fa-trash-can color__folder" data="trash"></i></a>
                                    <button type="button" id="button__delete--folder" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                        <i id="<?php echo "./Directories/modify.php?path=".$pathDir.scandir($path)[$i]  ?>"
                                            class="fa-solid fa-pen color__folder"
                                            data-value="<?php echo "./Directories/delete.php?path=".$pathDir.scandir($path)[$i] ?>"></i>
                                    </button>
                                </li>
                                <?php
                                }
                            }
                        ?>
                            </ul>
<<<<<<< HEAD

=======
>>>>>>> buttons
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                    if(isset($_SESSION["matches"])){
                        if(count($_SESSION["matches"])!=0){
                        for($j=0; $j < count($_SESSION["matches"]); $j+=5){
                        ?>
                        <div class="file-box">
                            <div class="file">
                                <?php
                                if(!is_dir(substr($_SESSION["matches"][$j+1],1))){
                                ?>
                                <a href="<?php echo substr($_SESSION["matches"][$j+1],1) ?>">
                                    <?php
                                }
                                else{
                                    ?>
                                    <a
                                        href="<?php echo "./Directories/navigate.php?directory=".substr($_SESSION["matches"][$j],0) ?>">
                                        <?php
                                }
                                ?>
                                        <!-- aqui ponemos el enlace para navegar por los directorios -->
                                        <span class="corner"></span>
                                        <div class="icon">
                                            <img src="<?php echo getLogo(pathinfo($_SESSION["matches"][0], PATHINFO_EXTENSION))?>"
                                                class="icon-img">
                                        </div>
                                        <div class="file-name">

                                            <?php 
                            echo substr($_SESSION["matches"][$j], 0, 10)."<br>";
                            if($_SESSION["matches"][$j+2] === $_SESSION["matches"][$j+3]){
                                echo "<br>Creation: ".$_SESSION["matches"][$j+2];
                            }else{
                                echo "<br>Modified: ".$_SESSION["matches"][$j+3];
                            }
                            $size = $_SESSION["matches"][$j+4];
                            $bytes = number_format($size / 1024, 2);
                            if ($size >= 1048576)
                            {
                                $bytes = number_format($size / 1048576, 2) . ' MB';
                                echo "<br>".$bytes."MB";
                            }
                            else if ($size >= 1024)
                            {
                                echo "<br>".$bytes."KB";
                            }                                    
                        ?>
                                            <br>
                                            <a
                                                href="<?php echo "./Directories/delete.php?path=".$_SESSION["matches"][$j+1];?>"><i
                                                    id="<?php echo $_SESSION["matches"][$j+1]."1" ?>"
                                                    class="fa-solid fa-trash-can color__folder" data="trash"></i></a>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                    }else{
                        
                    }
                }else{
                    $countDirectories = count(scandir($path));
                    $pathDir = "../root/"; 
                        for($i = 2; $i < $countDirectories; $i++){
                            if(!is_dir($path."/".scandir($path)[$i])){
                    ?>
                    <div class="file-box">
                        <div class="file">
                            <a href="<?php echo "./root/".scandir($path)[$i] ?>">
                                <!-- //Aqui se ven los archivos por defecto del nivel 1 de root -->
                                <span class="corner"></span>
                                <div class="icon">
                                    <img src="<?php echo getLogo(pathinfo(scandir($path)[$i], PATHINFO_EXTENSION))?>"
                                        class="icon-img">
                                </div>
                                <div class="file-name">

                                    <?php 
                                      echo substr(scandir($path)[$i], 0, 10); 
                                      if((date("F d Y H:i:s.",filectime($path."/".scandir($path)[$i]))) === (date("F d Y H:i:s.",filemtime($path."/".scandir($path)[$i])))){
                                        echo "<br>Creation: ".date("F d Y H:i:s.",filectime($path."/".scandir($path)[$i]));
                                      }else{
                                        echo "<br>Modified: ".date("F d Y H:i:s.",filemtime($path."/".scandir($path)[$i]));
                                      }
                                      $size = filesize($path."/".scandir($path)[$i]);
                                      $bytes = number_format($size / 1024, 2);
                                      if ($size >= 1048576)
                                        {
                                            $bytes = number_format($size / 1048576, 2);
                                            echo "<br>".$bytes."MB";
                                        }
                                        else if ($size >= 1024)
                                        {
                                            echo "<br>".$bytes."KB";
                                        }                                    
                                ?>
<<<<<<< HEAD
                                <br>
                                <a href="<?php echo "./Directories/delete.php?path=".$pathDir.scandir($path)[$i];?>"><i id="<?php echo scandir($path)[$i]."1" ?>" class="fa-solid fa-trash-can color__folder" data="trash"></i></a>
                                
                            </div>

                        </div>
                        <?php
=======
                                    <br>
                                    <a
                                        href="<?php echo "./Directories/delete.php?path=".$pathDir.scandir($path)[$i];?>"><i
                                            id="<?php echo scandir($path)[$i]."1" ?>"
                                            class="fa-solid fa-trash-can color__folder" data="trash"></i></a>

                                </div>
                            </a>
                        </div>

                    </div>
                    <?php
>>>>>>> buttons
                        }
                    }
                }
                ?>
                </div>
<<<<<<< HEAD
                
                <!-- <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/87CEFA/000000">
                            </div>
                            <div class="file-name">
                                Italy street.jpg
                                <br>
                                <small>Added: Jan 6, 2014</small>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/FF7F50/000000">
                            </div>
                            <div class="file-name">
                                My feel.png
                                <br>
                                <small>Added: Jan 7, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="file-name">
                                Michal Jackson.mp3
                                <br>
                                <small>Added: Jan 22, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/FFB6C1/000000">
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br>
                                <small>Added: Fab 11, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="img-responsive fa fa-film"></i>
                            </div>
                            <div class="file-name">
                                Monica's birthday.mpg4
                                <br>
                                <small>Added: Fab 18, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <a href="#">
                        <div class="file">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="file-name">
                                Annual report 2014.xls
                                <br>
                                <small>Added: Fab 22, 2014</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br>
                                <small>Added: Jan 11, 2014</small>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/4169E1/000000">
                            </div>
                            <div class="file-name">
                                Italy street.jpg
                                <br>
                                <small>Added: Jan 6, 2014</small>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/EE82EE/000000">
                            </div>
                            <div class="file-name">
                                My feel.png
                                <br>
                                <small>Added: Jan 7, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="file-name">
                                Michal Jackson.mp3
                                <br>
                                <small>Added: Jan 22, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/008080/000000">
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br>
                                <small>Added: Fab 11, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="img-responsive fa fa-film"></i>
                            </div>
                            <div class="file-name">
                                Monica's birthday.mpg4
                                <br>
                                <small>Added: Fab 18, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <a href="#">
                        <div class="file">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="file-name">
                                Annual report 2014.xls
                                <br>
                                <small>Added: Fab 22, 2014</small>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-file"></i>
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br>
                                <small>Added: Jan 11, 2014</small>
                            </div>
                        </a>
                    </div>

                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/40E0D0/000000">
                            </div>
                            <div class="file-name">
                                Italy street.jpg
                                <br>
                                <small>Added: Jan 6, 2014</small>
                            </div>
                        </a>

                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/FF6347/000000">
                            </div>
                            <div class="file-name">
                                My feel.png
                                <br>
                                <small>Added: Jan 7, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-music"></i>
                            </div>
                            <div class="file-name">
                                Michal Jackson.mp3
                                <br>
                                <small>Added: Jan 22, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive" src="https://via.placeholder.com/400x300/6A5ACD/000000">
                            </div>
                            <div class="file-name">
                                Document_2014.doc
                                <br>
                                <small>Added: Fab 11, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <div class="file">
                        <a href="#">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="img-responsive fa fa-film"></i>
                            </div>
                            <div class="file-name">
                                Monica's birthday.mpg4
                                <br>
                                <small>Added: Fab 18, 2014</small>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="file-box">
                    <a href="#">
                        <div class="file">
                            <span class="corner"></span>

                            <div class="icon">
                                <i class="fa fa-bar-chart-o"></i>
                            </div>
                            <div class="file-name">
                                Annual report 2014.xls
                                <br>
                                <small>Added: Fab 22, 2014</small>
                            </div>
                        </div>
                    </a>
                </div> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
=======
            </div>
        </div>
    </div>
    </div>
    </div>
>>>>>>> buttons
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Directory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./Directories/create-directory.php" method="POST">
                    <input name="nameFileOrDirectory" placeholder="/root/">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modify directory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./Directories/modify.php" method="GET" id="form-modify">
                    <input id="oldPath" name="oldPath" placeholder="/root/" display="none">
                    <input name="pathtoModify" placeholder="/root/" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select your file</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="./Directories/upload.php" method="POST" id="form-modify" enctype="multipart/form-data">
                    <input type="file" name="fileSelected" placeholder="select a file">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Send</button>

                </form>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

>>>>>>> buttons
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>