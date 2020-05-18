<?php
/* Displays user information and some useful messages */
session_start();


//Controller for admin to ensure login is verified.
include ('../Controller/userController.php');
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
    <link rel="stylesheet" href="../CSS/indexStyleSheet.css">
    <link rel="stylesheet" href="../CSS/style.css"> 
    <link rel="stylesheet" href="../CSS/logged-in-Stylesheet.css">
    
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
    </head>


    <body>
        <div class="container">
    
   <!--######################################################################################################################--->
                                        
                                          <!--Navigation-->
        
 <?php include('Navigations-Footers/user-Navigation.php'); ?>
                                          
                                          
 <!--######################################################################################################################--->  
    

      <section id="showcase">
      </section>



      <section class="mid-section">
             <h1>Water Quality Records</h1>
                <p>Implement and view information and results</p>
                 <input type="button" onclick="window.location.href = 'userWaterbodySearch.php';" id="btnSubmit" class="fadeIn fourth" value="View Records">
     </section>  
    <section class="mid-section">
            <h1>Reports</h1>
            <p>View and submit reports</p>
                <input type="button" onclick="window.location.href = 'userReport.php';" id="btnSubmit" class="fadeIn fourth" value="Submit a Report">
               <input type="button" onclick="window.location.href = 'UserForum.php';" id="btnSubmit" class="fadeIn fourth" value="View Reports">
        </section> 


<!--######################################################################################################################--->
                         <!--Footer-->               
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
                         
<!--######################################################################################################################--->
    </div>
    
</body>
</html>
