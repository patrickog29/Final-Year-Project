<?php 
/* Main page with two forms: sign up and log in */
require('./../Config/db.php');
require('./../Config/config.php');
session_start();

 //Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');

         
            $result = $mysqli->query("SELECT * FROM parameters") or die($mysqli->error);
            //pre_r($result);
            
         require_once ('./../Models/resultsProcess.php'); 
         
       
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

  <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
            <div>     
          <a href="profileAdmin.php" class="btn btn-default">Admin Home</a>
            </div>
      
        
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Waterbody</th>
                            <th>DO (mg/L)</th>
                            <th>pH</th>
                            <th>NO-<sub>3</sub> (mg/L)</th>
                            <th>Alkalinity (mg/L)</th>
                            <th>NH<sub>3+</sub> (mg/L)</th>
                            <th>BOD (mg/L)</th>
                            <th>Phosphate (mg/L)</th>
                            <th>SS (mg/L)</th>
                            <th>Sample Date</th>
                            <th>Q-Score</th>


                            <th colspan="2">Option</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['waterbody_name']; ?></td>
                        <td><?php echo $row['DO']; ?></td>
                        <td><?php echo $row['pH']; ?></td>
                        <td><?php echo $row['nitrate']; ?></td>
                        <td><?php echo $row['alkalinity']; ?></td>
                        <td><?php echo $row['NH3']; ?></td>
                        <td><?php echo $row['BOD']; ?></td>
                        <td><?php echo $row['phosphate']; ?></td>
                        <td><?php echo $row['SS']; ?></td>
                        <td><?php echo $row['sample_date']; ?></td>
                        <td><?php echo $row['q']; ?></td>
                        
                        
                        <td>
                            <a href="viewResults.php?edit=<?php echo $row['id']; ?>"
                               class="btn btn-info">Edit</a>
                               <a href="./../Models/resultsProcess.php?delete=<?php echo $row['id']; ?>"
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
            <form action="./../Models/resultsProcess.php" method="POST">
            <div>
            <label>Waterbody Name</label>
            <input type="text" name="waterbody_name" class="form-control" 
                   value="<?php echo $waterbody_name; ?>" placeholder="Enter waterbody name">
            </div>
            <div class="form-group">
            <label>DO (mg/L)</label>
            <input type="text" name="DO" 
                   value="<?php echo $DO; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
             <div class="form-group">
            <label>pH</label>
            <input type="text" name="pH" 
                   value="<?php echo $pH; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
             <div class="form-group">
            <label>Nitrate - NO-<sub>3</sub>(mg/L)</label>
            <input type="text" name="nitrate" 
                   value="<?php echo $nitrate; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
            <div class="form-group">
            <label>Alkalinity (mg/L)</label>
            <input type="text" name="alkalinity" 
                   value="<?php echo $alkalinity; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
            <div class="form-group">
            <label>Ammonia - NH<sub>3</sub> (mg/L)</label>
            <input type="text" name="NH3" 
                   value="<?php echo $NH3; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
            <div class="form-group">
            <label>Biochemical Dissolved Oxygen - BOD(mg/L)</label>
            <input type="text" name="BOD" 
                   value="<?php echo $BOD; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
            <div class="form-group">
            <label>Phosphate (mg/L)</label>
            <input type="text" name="phosphate" 
                   value="<?php echo $phosphate; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            </div>
            <div class="form-group">
            <label>Suspended Solids - SS (mg/L)</label>
            <input type="text" name="SS" 
                   value="<?php echo $SS; ?>" class="form-control" pattern="^(([0-9]*)|(([0-9]*)\.([0-9]*)))$">
            
           </div>
           
            <div class="form-group">
            <label>Q score</label>
            <input type="text" name="q" 
                   value="<?php echo $q; ?>" class="form-control">
            </div>
                
            <div class="form-group">
            <label>Sample Date</label>
            <input type="text" name="sample_date"
                   value="<?php echo $sample_date; ?>" class="form-control" placeholder="Enter YYYY-MM-DD">
            </div>
          
       
            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
 
<!--######################################################################################################################--->
                                        
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
    
   </body>
        
</html>
       