<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/a8609ee1f0.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>File System</title>
</head>
<body>
<div class="container">
<div class="row" id="body__container--flex">
    <div class="col-md-3">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <div class="file-manager">
                    <div class="buttons__container--aside">
                        <form action="./Directories/create-directory.php" method="POST" class="form__input">
                            <input name="nameFileOrDirectory" class="input__search" placeholder="root/">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass color__folder"></i></button>
                        </form>
                        <div class="container__icons--folder">
                            <!-- <a href="#"><i class="fa-solid fa-circle-plus color__folder" id="openDialog"></i></a> -->
                            <button type="button" id="button__create--folder" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-solid fa-circle-plus"></i>
                            </button>
                            <a href="#"><i class="fa-solid fa-trash-can color__folder"></i></a>
                            <a href="#"><i class="fa-solid fa-pen color__folder"></i></a>
                        </div>
                    </div>
                    <dialog class="dialog__container" id = "dialog" width=200px close>
                        <form action="./sendNewDirectory.php" method="POST">
                            <input name="NameDirectory" placeholder="DirectoryName">
                            <button type="submit">Add</button>
                        </form>
                    </dialog>
                    <div class="hr-line-dashed"></div>
                    <button class="btn btn-primary btn-block">Upload Files</button>
                    <div class="hr-line-dashed"></div>
                    <h5>Folders</h5>
                    <ul class="folder-list" style="padding: 0">
                        <?php
                            $path = "./root";
                            
                            $countDirectories = count(scandir($path));
                            for($i = 2; $i < $countDirectories; $i++){
                        ?>
                                <li><a href=""><i class="fa fa-folde'"></i><?php echo scandir($path)[$i]; ?></a></li>
                        <?php
                            }
                        ?>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
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
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>