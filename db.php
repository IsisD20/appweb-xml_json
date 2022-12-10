<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'sistemafranky'
) or die(mysqli_erro($mysqli));

?>