
<?php

$file_types=array();

$file_types['mp3']   ='audio/mpeg';
$file_types['mpeg']  ='video/mpeg';
$file_types['mpg']   ='video/mpeg';
$file_types['pdf']   ='application/pdf';
$file_types['pps']   ='application/vnd.ms-powerpoint';
$file_types['ppt']   ='application/vnd.ms-powerpoint';
$file_types['ps']    ='application/postscript';
$file = 'you.mp3';  
download($file,$file_types);    



function download($file_name,$file_types){

$file = $file_name;
$ext = end(explode('.',$file_name));
if($ext && array_key_exists($ext,$file_types)){
if (file_exists($file)) {
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($file));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
ob_clean();
flush();
readfile($file);
exit;
}
}
else {
die("this is not a downloadable file");
}




}


?>
<a href="force_download.php?file=ok.txt"> download ok.txt</a>
?>

