<?php
    //$arch = $_GET['arch'];
    //include("config.php");
    $cn = mysqli_connect("localhost","root","", "sistemafranky");

    mysqli_select_db($cn,"oswa_inv");
    $sql = "SELECT * FROM task";
    
    $query = "SELECT * FROM task";
    $result = mysqli_query($cn, $sql);    

    $archXML= mysql_XML($result);
     //Creamos el XML
    $nombreArch="Productos_XML.xml";
    $archivo = fopen($nombreArch,"w+");
    fwrite($archivo,$archXML);
    fclose($archivo);
    
    echo '<script language="javascript">';
    echo 'alert("Archivo creado exitósamente");';
    echo 'window.location="tareas.php";';
    echo '</script>';

    function mysql_XML($result)
    {
        // creamos el documento XML			
        $contenido  = '<?xml version="1.0" encoding="utf8" ?>';	
        $contenido .= '<informacion>';	
        while ($row = mysqli_fetch_array($result)) {
            $contenido.="<tareas>";
            $contenido.="<id>".$row['id']."</id>";
            $contenido.="<titulo>".$row['title']."</titulo>";
            $contenido.="<descripcion>".$row['description'] ."</descripcion>";
            $contenido.="<creado>".$row['created_at']."</creado>";
            $contenido.="</tareas>";		
        }
        $contenido.='</informacion>';				
        return $contenido;
    }    
?>