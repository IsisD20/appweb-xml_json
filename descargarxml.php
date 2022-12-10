<?php
//include("db.php");
$nombreArchiv="Productos_XML.xml";
if(file_exists($nombreArchiv)){
    // Define headers
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename=$nombreArchiv");
    header("Content-Type: application/zip");
    header("Content-Transfer-Encoding: binary");        
    // Read the file
    readfile($nombreArchiv);       
    exit;
}else
    echo 'El archivo no existe';    
?>