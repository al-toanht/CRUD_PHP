<?php
require "config.php";
$idtask = $_GET['idtask'];
if(isset($_POST['submit'])){
    $task=$_POST['task'];
    $priority=$_POST['priority'];
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $sql = "UPDATE tasks SET Nametask='$task', Priority='$priority' WHERE task_ID=$idtask";
      
        $stmt = $conn->prepare($sql);
      
        $stmt->execute();
      
        header("location: ../index.php");

      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
    $conn=null;
} 
?>