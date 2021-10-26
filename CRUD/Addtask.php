<?php
require "config.php";
if(isset($_POST['submit'])){
    $task= $_POST['task'];
    $priority = $_POST['priority'];
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tasks (Nametask, Priority)
        VALUES ('$task','$priority')";
        $conn->exec($sql);
        header('location:../index.php');
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
}
?>