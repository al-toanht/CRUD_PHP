<?php 
require "config.php";
$idtask=$_GET['idtask'];
try {
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $delete="DELETE FROM tasks WHERE task_ID=$idtask";
    $conn->exec($delete);
    header("location:../index.php");
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>