<?php
function checkPath(){
    session_start();
    if(isset($_SESSION["currentDirectory"])){
        $_SESSION["search"] = getSearch();
        return getPath();
    }else{
        $_SESSION["currentDirectory"] = "./root";
        $_SESSION["search"] = "";
        return $_SESSION["currentDirectory"];
    }
}

function setPath($directory, $bool){
    session_start();
    print_r("entrando".$directory);
    if(!$bool){
        if(isset($_SESSION["currentDirectory"])){  
            print_r("no hay sesion".$_GET["directory"]);
            $_SESSION["currentDirectory"] = $_SESSION["currentDirectory"]."/".$directory;
        }else{
            $_SESSION["currentDirectory"] = "./root";
        }
    }else{
        if(isset($_SESSION["currentDirectory"])){  
            print_r("no hay sesion".$directory);
            $_SESSION["currentDirectory"]="";
            for($i = 0; $i < count(explode("/",$directory))-1; $i++){
                if($i == 0){
                    $_SESSION["currentDirectory"] = $_SESSION["currentDirectory"].explode("/",$directory)[$i];
                }else{
                    $_SESSION["currentDirectory"] = $_SESSION["currentDirectory"]."/".explode("/",$directory)[$i];
                }
                echo "desmigando".explode("/",$directory)[$i]."<br>";
                echo $_SESSION["currentDirectory"];
            }
            echo("ruta atras".$_SESSION["currentDirectory"]);
        }else{
            $_SESSION["currentDirectory"] = "./root";
        }
    }
}

function getPath(){
    //session_start();
    return $_SESSION["currentDirectory"];
}

function backFolder($path){
    if(count(explode("/", $path))>= 3){
        setPath($path, true);
    }
    print_r(explode("/",$path));
    print_r(dirname($_SESSION["currentDirectory"]));
    print_r("Current directory ".$_SESSION["currentDirectory"]);
}

function setPathBack($directory){
    session_start();
    if(isset($_SESSION["currentDirectory"])){  
        print_r("no hay sesion".$directory);
        for($i = 0; $i < count(explode("/",$directory))-1; $i++){
            $_SESSION["currentDirectory"] = $_SESSION["currentDirectory"]."/".explode("/",$directory)[$i];
        }
        print_r("ruta atras".$_SESSION["currentDirectory"]);
    }else{
        $_SESSION["currentDirectory"] = "./root";
    }
}

function logOutSession(){
    session_start();
    unset($_SESSION);
    if(ini_get("session.use_cookies")){
        $params = session_get_cookie_params();
        setcookie(session_name(),
        '',
        time()-42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]);
    }
    session_destroy();
    header("Location:./index.php");
}

function setSearch($value){    
    session_start();
    if(isset($_SESSION["fileToSearch"])){
        $_SESSION["fileToSearch"] = $value;
    }else{
        $_SESSION["fileToSearch"] = "";
    }
}

function getSearch(){
    return $_SESSION["search"];
}

function checkSearch(){
    if(isset($_SESSION["search"])){
        return getSearch();
    }else{
        $_SESSION["search"] = "";
        return $_SESSION["search"];
    }
}

function getLogo($type){
    switch($type){
        case "doc":
            return "./logos/doc.png";
        case "excell":
            return "./logos/excell.jpg";
        case "exe":
            return "./logos/exe.png";          
        case "jpg":
            return "./logos/jpg.png";
            
        case "mp3":
            return "./logos/mp3.png";

        case "mp4":
            return "./logos/mp4.jpg";

        case "odt":
            return "./logos/odt.png";

        case "pdf":
            return "./logos/pdf.png";
            
        case "png":
            return "./logos/png.png";

        case "ppt":
            return "./logos/ppt.png";

        case "rar":
            return "./logos/rar.png";

        case "svg":
            return "./logos/svg.png";

        case "txt":
            return "./logos/txt.png";

        case "zip":        
            return "./logos/zip.png";

        default:
            return "./logos/folder.png";
    }
}

function chartsSize($ruta, $ext, $size=0){
    // abrir un directorio y listarlo recursivo
    if (is_dir($ruta)) {
       if ($dh = opendir($ruta)) {
          while (($file = readdir($dh)) !== false) {
            //print_r($_SESSION["matches"]);
             //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
             //mostraría tanto archivos como directorios
             if (is_dir($ruta . $file) && $file!="." && $file!=".."){
                //solo si el archivo es un directorio, distinto que "." y ".."
                if(isset($_SESSION["size"])){
                    $_SESSION["size"] = filesize($ruta . $file)+$_SESSION["size"];
                }else{
                    $_SESSION["size"] = filesize($ruta . $file);
                }
                chartsSize($ruta . $file . "/", $ext, $_SESSION["size"]);
             }elseif(is_file($ruta . $file) && $file!="." && $file!=".."){
                 if($ext == pathinfo($ruta .$file, PATHINFO_EXTENSION)){
                    if(isset($_SESSION["size"])){
                        $_SESSION["size"] = filesize($ruta . $file)+$_SESSION["size"];
                    }else{
                        $_SESSION["size"] = filesize($ruta . $file);
                    }
                }
                chartsSize($ruta . $file . "/", $ext, $size);
             }
        }
          $bytes = $_SESSION["size"];
          if ($bytes >= 1048576)
          {
            $bytes = ($_SESSION["size"] / 1024);
          }
          else if ($bytes >= 1024)
          {
            $bytes = ($_SESSION["size"] / 1024);
            $bytes = $bytes;
          }      
          return (($bytes/100000)*100);
       closedir($dh);
       }
    }
}
?>