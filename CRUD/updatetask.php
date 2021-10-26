<?php
require "config.php";
$idtask = $_GET['idtask'];
if(isset($_POST['submit'])){
    $task=$_POST['task'];
    $priority=$_POST['priority'];
    $sql = "UPDATE tasks SET Nametask='$task', Priority='$priority' WHERE task_ID=$idtask";
    if ($conn->query($sql) === TRUE) {
        header("location: ../index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

} 
?>