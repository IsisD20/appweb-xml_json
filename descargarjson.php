<?php
    $nombreArch="tareas.json";
    if(file_exists($nombreArch)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$nombreArch");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");        
        // Read the file
        readfile($nombreArch);       
        exit;
    }else
        echo 'El archivo no existe';    
?>