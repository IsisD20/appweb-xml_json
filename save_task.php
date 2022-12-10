<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];

  //aqui ya se esta almacenando los datos 
  $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarea guardada satisfactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: tareas.php');

}

?>
