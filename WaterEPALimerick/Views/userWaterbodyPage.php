<?php 
/* Main page with two forms: sign up and log in */
require('./../Config/db.php');
require('./../Config/config.php');
session_start();

//Controller for admin to ensure login is verified.
include ('../Controller/userController.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query = ('CALL getFullwaterbodyinfo()');

	$id = mysqli_real_escape_string($mysqli, $_GET['id']);

	// Create Query
	$que = 'SELECT * FROM parameters WHERE id = '.$id;
       
        
	// Get Result
	$result = mysqli_query($mysqli, $que);

	// Fetch Data
	$userPost = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($mysqli);
     
    ?> 

     
    

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Water Quality of Surface Water Co.Limerick">
        <meta name="keywords" content="Water Quality, Rivers, Lakes, Limerick, Surface Water">
        <meta name="author" content="Patrick O Grady">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../CSS/admin-user-stylesheet.css">
        <link rel="stylesheet" href="../CSS/waterbodySearch-SS.css">
   
    <style>
        .status {
            font-weight: 600;
        }
    </style>
    
    </head>
     
<!--######################################################################################################################--->
  
    <body>
    
    <div class="container">  
        
<!--######################################################################################################################--->
        
                                          <!--Navigation-->
        
<?php include('Navigations-Footers/user-Navigation.php'); ?>
                                          
 <!--######################################################################################################################--->

 
    <div class="card">
    <h5 class="card-header">Water body Search</h5>
    <div class="card-body">                                     
                                                  <!--Section-->

       <section>
        <div>     
         <a href="userWaterbodySearch.php" class="btn btn-default">Back</a>
        </div>
           <br>
        <h4>Final Water Quality Status:&nbsp;<span class="status"><?php echo $userPost['q']; ?></span></h4>

        <table class="table">
           <thead class="thead-dark">
             <tr>
               <th scope="col">Parameter</th>
               <th scope="col">EPA Standard Limit</th>
               <th scope="col">Sample Result</th>
             </tr>
           </thead>
           <tbody>
               <tr>
                   <td>Dissolved Oxygen</td>
                   <td>9 mg/L</td>
                   <td><?php echo $userPost['DO'];?></td>
               </tr>
               <tr>
                   <td>pH</td>
                   <td>5.5-9.0 mg/L</td>
                   <td><?php echo $userPost['DO'];?></td>
               </tr>
               <tr>
                   <td>Nitrite</td>
                   <td>0.05 mg/L</td>
                   <td><?php echo $userPost['nitrate'];?></td>
               </tr>
               <tr>
                   <td>Suspended Solids (SS)</td>
                   <td>50 mg/L</td>
                   <td><?php echo $userPost['SS'];?></td>
               </tr>
               <tr>
                   <td>Alkalinity</td>
                   <td>No Limit</td>
                   <td><?php echo $userPost['alkalinity'];?></td>
               </tr>
               <tr>
                   <td>Biochemical Oxygen Demand(BOD)</td>
                   <td>5 mg/L</td>
                   <td><?php echo $userPost['BOD'];?></td>
               </tr>
               <tr>
                   <td>Ammonia</td>
                   <td>1.5 mg/L</td>
                   <td><?php echo $userPost['NH3'];?></td>
               </tr>
               <tr>
                   <td>phosphate</td>
                   <td>0.7 mg/L</td>
                   <td><?php echo $userPost['phosphate'];?></td>
               </tr>
           </tbody>
          </table>
      
  
  </body>
</html>
   