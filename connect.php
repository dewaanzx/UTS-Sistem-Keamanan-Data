<?php
$HOSTNAME = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'skdform';
  $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

  if ($con) {
    echo "";
  }else {
    die(mysqli_error($con));
  }
?>