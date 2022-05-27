<?php
function checkPath(){
    print_r("entro");
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
    // $ext = explode(".", $type)[count(explode(".", $type)-1)];
    // $result = $ext[1];
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
?>