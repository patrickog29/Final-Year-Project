<?php
require('./../Config/db.php');

//Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');


$update = false;
$waterbody_name = '';
$waterbody_type = '';
$townland = '';
$description = '';
$latitude = '';
$longitude = '';

if (isset($_POST['save'])){
    $waterbody_name = $_POST['waterbody_name'];
    $waterbody_type = $_POST['waterbody_type'];
    $townland = $_POST['townland'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    
    
    $mysqli->query("INSERT INTO water_body (waterbody_name, waterbody_type, townland, description, latitude, longitude) "
            . "VALUES('$waterbody_name', '$waterbody_type', '$townland', '$description', '$latitude', '$longitude')") or
            die($mysqli->error);
        
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location:./../Views/testWater.php");
    
}

if (isset($_GET['delete'])){
    $waterbody_name = $_GET['delete'];
    $mysqli->query("DELETE FROM water_body WHERE waterbody_name='$waterbody_name'") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:./../Views/testWater.php");
}

if (isset($_GET['edit'])){
    $waterbody_name = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM water_body WHERE waterbody_name='$waterbody_name'") or die($mysqli->error);
    if ($result->num_rows){
        $row = $result->fetch_array();
         $waterbody_name = $row['waterbody_name'];
    $waterbody_type = $row['waterbody_type'];
    $townland = $row['townland'];
    $description = $row['description'];
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
    }
}

if (isset($_POST['update'])){
    $waterbody_name = $_POST['waterbody_name'];
    $waterbody_type = $_POST['waterbody_type'];
    $townland = $_POST['townland'];
    $description = $_POST['description'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    
    $mysqli->query("UPDATE water_body SET waterbody_type='$waterbody_type', townland='$townland', description='$description', latitude='$latitude', longitude='$longitude' WHERE waterbody_name= '$waterbody_name'") or
            die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location:./../Views/testWater.php');
}
 //Wrong password entered by user
        