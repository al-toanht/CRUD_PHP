<?php 
require_once "config.php";
if(isset($_POST['submit'])){
    $task= $_POST['task'];
    $priority = $_POST['priority'];
    $sql = "INSERT INTO tasks (Nametask, Priority)
    VALUES ('$task','$priority')";

if ($conn->query($sql) === TRUE) {
    header('location:../index.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>