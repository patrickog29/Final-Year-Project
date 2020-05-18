<?php
require('./../Config/db.php');



$update = false;
$id = 0;
$waterbody_name = '';
$DO = '';
$pH =  '';
$nitrate = '';
$alkalinity = '';
$NH3 = '';
$BOD = '';
$phosphate = '';
$SS = '';
$q = '';
$sample_date = '';



if (isset($_POST['save'])){
    $waterbody_name = $_POST['waterbody_name'];
    $DO = $_POST['DO'];
    $pH = $_POST['pH'];
    $nitrate = $_POST['nitrate'];
    $alkalinity = $_POST['alkalinity'];
    $NH3 = $_POST['NH3'];
    $BOD = $_POST['BOD'];
    $phosphate = $_POST['phosphate'];
    $SS = $_POST['SS'];
    $sample_date = $_POST['sample_date'];
    $q = $_POST['q'];
    
    
    $mysqli->query("INSERT INTO parameters (waterbody_name, DO, pH, nitrate, alkalinity, NH3, BOD, phosphate, SS, sample_date, q ) "
            . "VALUES('$waterbody_name', '$DO', '$pH', '$nitrate', '$alkalinity', '$NH3', '$BOD', '$phosphate', '$SS', '$sample_date', '$q')") or
            die($mysqli->error);
        
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location:./../Views/viewResults.php");
    
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM parameters WHERE id='$id'") or die($mysqli->error);
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:./../Views/viewResults.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM parameters WHERE id='$id'") or die($mysqli->error);
    if ($result->num_rows){
        $row = $result->fetch_array();
            $waterbody_name = $row['waterbody_name'];
            $DO = $row['DO'];
            $pH =  $row['pH'];
            $nitrate = $row['nitrate'];
            $alkalinity = $row['alkalinity'];
            $NH3 = $row['NH3'];
            $BOD = $row['BOD'];
            $phosphate = $row['phosphate'];
            $SS = $row['SS'];
            $q = $row['q'];
            $sample_date = $row['sample_date'];
            
     
    }

}
if (isset($_POST['update'])){
            $id = $_POST['id'];
            $waterbody_name = $_POST['waterbody_name'];
            $DO = $_POST['DO'];
            $pH =  $_POST['pH'];
            $nitrate = $_POST['nitrate'];
            $alkalinity = $_POST['alkalinity'];
            $NH3 = $_POST['NH3'];
            $BOD = $_POST['BOD'];
            $phosphate = $_POST['phosphate'];
            $SS = $_POST['SS'];
            $q = $_POST['q'];
            $sample_date = $_POST['sample_date'];
            
            
    $mysqli->query("UPDATE parameters SET waterbody_name='$waterbody_name', DO='$DO', pH='$pH', nitrate='$nitrate', alkalinity='$alkalinity', NH3='$NH3', BOD='$BOD', phosphate='$phosphate', SS='$SS', q='$q', sample_date='$sample_date' WHERE id='$id'") or
            die($mysqli->error);
    
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header("location:./../Views/viewResults.php");
}