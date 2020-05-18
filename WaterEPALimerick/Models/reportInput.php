<?php

if(isset($_POST['uploadfilesub'])) {
$waterbody_name = $_POST['waterbody'];
$summary = $_POST['description'];
$type = $_POST['reportType'];
$latitude = $_POST['lat'];
$longitude = $_POST['long'];
$email;

$time = date("Y-m-d H:i:s");

    $filename = $_FILES['uploadfile']['name'];
    $filetmpname = $_FILES['uploadfile']['tmp_name'];
    $folder = './../imagesuploadedf/';
    
    move_uploaded_file($filetmpname, $folder.$filename);

    $sql = "INSERT INTO event ( waterbody_name, summary, type, latitude, longitude, time, image, userEmail)  
             VALUES ('$waterbody_name','$summary','$type','$latitude', '$longitude','$time', '$filename', '$email');";
    
    $qry = mysqli_query($mysqli, $sql);
    if( $qry) {
echo "</br><h4>Report Submitted! Please refer to the Forum page to review.</h4> ";
}
else {
    echo "</br><h4>Report Not Submitted, Please review all fields</h4>";
}
}
