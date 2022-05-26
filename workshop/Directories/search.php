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
echo "<br>";
//showMatches($fileToSearch);
//searchFiles($path);
function show(){
    return "HOLA MUNDOOOOO";
}
function dirtree($dir, $regex='', $ignoreEmpty=false, $fileToSearch)
{
    //session_start();
    if (!$dir instanceof DirectoryIterator) {
        $dir = new DirectoryIterator((string)$dir);
    }
    $dirs  = array();
    $files = array();
    $array = array();
    $_SESSION["matches"] = array();
    foreach ($dir as $node) {
        if ($node->isDir() && !$node->isDot()) {
            $tree = dirtree($node->getPathname(), $regex, $ignoreEmpty, $fileToSearch);
            if (!$ignoreEmpty || count($tree)) {
                array_push($dirs, $node->getFilename());
                echo "ARRAY<br>";
                var_dump($dirs);
                echo "<br>";
                if($fileToSearch == $node->getFilename()){
                    echo "AAAAAAA<li>".$fileToSearch."</li>";
                    //array_push($array, $fileToSearch);
                    array_push($_SESSION["matches"], $fileToSearch);
                    var_dump($_SESSION["matches"]);
                }
            }
        } elseif ($node->isFile()) {
            $name = $node->getFilename();
            if ('' == $regex || preg_match($regex, $name)) {
                array_push($files, $name);
                var_dump($dirs);
                if($fileToSearch == $name){
                    echo "AAAAAAA<li>".$fileToSearch."</li>";
                    //array_push($array, $fileToSearch);//metemos la coincidencia en el array
                    array_push($_SESSION["matches"], $fileToSearch);
                    var_dump($_SESSION["matches"]);
                }
            }
        }
    }
    asort($dirs);
    sort($files);
    var_dump($_SESSION["matches"]);
    header("Location: ../index.php");
}

function getMatches($fileto){
    var_dump(dirtree("../root/", $regex='', $ignoreEmpty=false, $fileto));
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

function getFiles($arrayFiles){
    for($arrayFiles as $fil){
        return ""
    }
}
?>

<div class="file-box">
        <div class="file">
            <a href="#">
                <span class="corner"></span>

                <div class="icon">
                    <i class="fa fa-file"></i>
                </div>
                <div class="file-name">
                    
                    <?php echo scandir($path)[$i]; 
                          if((date("F d Y H:i:s.",filectime($path."/".scandir($path)[$i]))) === (date("F d Y H:i:s.",filemtime($path."/".scandir($path)[$i])))){
                            echo "<br>Creation: ".date("F d Y H:i:s.",filectime($path."/".scandir($path)[$i]));
                          }else{
                            echo "<br>Modified: ".date("F d Y H:i:s.",filemtime($path."/".scandir($path)[$i]));
                          }
                          $size = filesize($path."/".scandir($path)[$i]);
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
                    <a href="<?php echo "./Directories/delete.php?path=".$pathDir.scandir($path)[$i];?>"><i id="<?php echo scandir($path)[$i]."1" ?>" class="fa-solid fa-trash-can color__folder" data="trash"></i></a>
                    <small>Added: Jan 11, 2014</small>
                </div>
            </a>
        </div>

    </div>