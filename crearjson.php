<?php
/*
* Convertir datos de la tabla en JSON
$con = new mysqli("localhost","root","","sistemafranky");
if($con){
	$sql = "SELECT * from task";
	$query = $con->query($sql);
	$data = array();
	while($r = $query->fetch_assoc()){
		$data[] = $r;
	}
	echo json_encode(array("tareas"=>$data));
}
?>
*/
$cn = mysqli_connect("localhost","root","", "sistemafranky");

mysqli_select_db($cn,"oswa_inv");
$sql = "SELECT * FROM task";

$query = "SELECT * FROM task";
$result = mysqli_query($cn, $sql);  
      
    $usuarios= mysql_JSON($result);   
    //Creamos el JSON   
    $json_string = json_encode($usuarios, JSON_UNESCAPED_UNICODE);
    //echo $json_string;

    
    $nombreArch="tareas.json";
    $archivo = fopen($nombreArch,"w+");
    fwrite($archivo,$json_string);
    fclose($archivo);
    
    echo '<script language="javascript">';
    echo 'alert("Archivo creado exitósamente");';
    echo 'window.location="tareas.php";';
    echo '</script>';
    
    function mysql_JSON($result)
    {
        $usuarios = array(); //creamos un array
        while($row = mysqli_fetch_array($result)) 
        { 	
            $id=$row['id'];
            $titulo=$row['title'];            
            $descripcion= $row['description'] ;
            $creado=$row['created_at'];            
            $usuarios[] = array('id'=> $id, 'title'=> $titulo, 'desciption'=> $descripcion,
                                'created_at'=> $creado);
        }
        return $usuarios;	
    }    
?>
