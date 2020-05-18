<?php 
/* Main page with two forms: sign up and log in */
require('./../Config/db.php');
require('./../Config/config.php');
session_start();

//Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');
?>
<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Water Quality of Surface Water Co.Limerick">
        <meta name="keywords" content="Water Quality, Rivers, Lakes, Limerick, Surface Water">
        <meta name="author" content="Patrick O Grady">
    <title>Limerick Water</title>
    
     
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../CSS/admin-user-stylesheet.css">
   

        
          
    </head>
      <body class="container">
<!--######################################################################################################################--->
                                        
                                          <!--Navigation-->
        
 <?php include('Navigations-Footers/Admin-Navigation.php'); ?>
                                          
                                          
 <!--######################################################################################################################--->
 <div class="container">     
          <a href="profileAdmin.php" class="btn btn-default">Back</a>
        <div id="map"></div> 
            </div>
      
         <?php
            $result = $mysqli->query("SELECT * FROM water_body") or die($mysqli->error);
            //pre_r($result);
            ?>
        <?php require_once ('./../Models/waterProcess.php'); ?>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
      
        
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Town land</th>
                            <th>Description</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th colspan="2">Option</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['waterbody_name']; ?></td>
                        <td><?php echo $row['waterbody_type']; ?></td>
                        <td><?php echo $row['townland']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['latitude']; ?></td>
                        <td><?php echo $row['longitude']; ?></td>
                        <td>
                            <a href="testWater.php?edit=<?php echo $row['waterbody_name']; ?>"
                               class="btn btn-info">Edit</a>
                               <a href="./../Models/waterProcess.php?delete=<?php echo $row['waterbody_name']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>
            <?php
            
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        
        <div class="row justify-content-center">
            <form action="./../Models/waterProcess.php" method="POST">
            <div>
            <label>Name</label>
            <input type="text" name="waterbody_name" class="form-control" 
                   value="<?php echo $waterbody_name; ?>" pattern="(^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$)">
            </div>
            <div class="form-group">
            <label>Water body Type</label>
            <input type="text" name="waterbody_type" 
                   value="<?php echo $waterbody_type; ?>" class="form-control" pattern="(^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$)">
            </div>
             <div class="form-group">
            <label>Town land</label>
            <input type="text" name="townland" 
                   value="<?php echo $townland; ?>" class="form-control" pattern="(^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$)">

                <div class="form-group">
                <label class="col-md-4 control-label" for="textarea">Summary</label>
                <div class="col-md-4">                     
                  <textarea  id="textarea" rows="7" cols="70" name="description"></textarea>
                </div>
              </div>
            <div class="form-group">
            <label>Latitude</label>
            <input type="text" name="latitude" 
                   value="<?php echo $latitude; ?>" class="form-control" pattern="^-?([1-8]?[0-9]\.{1}\d{1,6}$|90\.{1}0{1,6}$)">
            </div>
            <div class="form-group">
            <label>Longitude</label>
            <input type="text" name="longitude" 
                   value="<?php echo $longitude; ?>" class="form-control" pattern="^-?([1-8]?[0-9]\.{1}\d{1,6}$|90\.{1}0{1,6}$)">
            </div>
          </div>   
               
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
    
    <!--######################################################################################################################--->
                                        
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
        </div>
   </body>
        
        </html>
       
 