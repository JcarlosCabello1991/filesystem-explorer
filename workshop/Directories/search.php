<?php
include("./checkPath.php");
$path = "../root/";
$fileToSearch = $_POST["nameFileOrDirectory"];
setSearch($fileToSearch);
$files = glob($fileToSearch);
//print_r($files);

//First obtain all the repositories and files for each level from root folder
print_r("FILETOSEARCH".$fileToSearch);
// dirtree("../root/");
echo "<br>";
showMatches($fileToSearch);
function dirtree($dir, $regex='', $ignoreEmpty=false)
{
    if (!$dir instanceof DirectoryIterator) {
        $dir = new DirectoryIterator((string)$dir);
    }
    $dirs  = array();
    $files = array();
    foreach ($dir as $node) {
        if ($node->isDir() && !$node->isDot()) {
            $tree = dirtree($node->getPathname(), $regex, $ignoreEmpty);
            if (!$ignoreEmpty || count($tree)) {
                $dirs[$node->getFilename()] = $tree;
            }
        } elseif ($node->isFile()) {
            $name = $node->getFilename();
            if ('' == $regex || preg_match($regex, $name)) {
                $files[] = $name;
            }
        }
    }
    asort($dirs);
    sort($files);
    echo "<br>";
    var_dump(array_merge($dirs, $files));
    return array_merge($dirs, $files);
}

function showMatches($fileToSearch){
    $arrayDir = dirtree("../root/");
    print_r("HOLO");
    var_dump($arrayDir);
    print_r($fileToSearch);
    for($i = 0; $i < count($arrayDir); $i++){
        print_r(array_keys($arrayDir)[$i]);
        if($fileToSearch == array_keys($arrayDir)[$i]){
            echo "1<li>".$fileToSearch."</li>";
        }
    }
    return "<p>PRUEBA HOLA</p>";
    //header("Location: ../index.php");
}
?>