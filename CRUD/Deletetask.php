<?php
require "config.php";
$idtask=$_GET['idtask'];
$delete="DELETE FROM tasks WHERE task_ID=$idtask";
if (mysqli_query($conn, $delete)) {
    header("location:../index.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
?>