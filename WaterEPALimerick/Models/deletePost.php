<?php

require('./../Config/db.php');
session_start();

 //Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');


if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM event WHERE id='$id'") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
      $_SESSION['message'] = "Report has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:./../Views/forums.php");
    
    
}