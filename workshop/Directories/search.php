<?php
include("./index.php");
$path = "../root/";
$fileToSearch = $_POST["nameFileOrDirectory"];
prueba($fileToSearch);
setSearch($fileToSearch);
$files = glob($fileToSearch);
//print_r($files);

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
    if (!$dir instanceof DirectoryIterator) {
        $dir = new DirectoryIterator((string)$dir);
    }
    $dirs  = array();
    $files = array();
    $array = array();
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
                    array_push($array, "AAAAAAA<li>".$fileToSearch."</li>");
                }
            }
        } elseif ($node->isFile()) {
            $name = $node->getFilename();
            if ('' == $regex || preg_match($regex, $name)) {
                array_push($files, $name);
                var_dump($dirs);
                if($fileToSearch == $name){
                    echo "AAAAAAA<li>".$fileToSearch."</li>";
                    array_push($array, "AAAAAAA<li>".$fileToSearch."</li>");
                }
            }
        }
    }
    asort($dirs);
    sort($files);
    echo "<br>";
    // array_push($array, $dirs);
    // array_push($array, $files);
    // var_dump(array_merge($dirs, $files));
    // $tree1 = array_merge($dirs, $files);
    // foreach ($array as $node) {
    //     var_dump($node);
    // }
    return $array;
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
    //return "<p>PRUEBA HOLA</p>";
    return $arrayDir;
    //header("Location: ../index.php");
}

// function showMatches($fileToSearch){
//     dirtree("../root/");
//     $files = glob($fileToSearch);
//     var_dump(glob($fileToSearch)); echo "<br>";

//     foreach ($files as $file) {

//         echo $file."<br>";

//     }

// }

// function searchFiles($path){
//     $arrayMatches = [];
//     $dir = new RecursiveDirectoryIterator(realpath($path), RecursiveDirectoryIterator::SKIP_DOTS);
//     $it = new RecursiveIteratorIterator($dir);

//     foreach($it as $file){
//         array_push($arrayMatches, $file->getRealPath());
//     }
//     var_dump($arrayMatches);
//     //return $arrayMatches;
// }
?>