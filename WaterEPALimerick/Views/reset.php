<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require '../Config/db.php';
session_start();


require_once ('./../Models/reset-Option.php');
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
        <script src="../js/index.js"></script>
          
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
        <!-- Scripts for Footer-->

            <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
                    <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">           
                    <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">

             <!-- Script for NavBar collapse!!! -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    

       
        <script>
          
          /*Matching Confirm Password */
      
           
         $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
        </script>
</head>
    
<!--######################################################################################################################--->
      

                                        
<body>
    <div class="container">
 <!--######################################################################################################################--->
                                          <!--Navigation-->

        
        <nav class="navbar navbar-light navbar-expand-md" style="background-color:#0091EA;">
           <a class="navbar-brand" href="../index.php" style="color: white; font-size: 2em; font-weight: 600;"><span style="color: greenyellow;">Limerick</span>Water</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
                    <span class="navbar-toggler-icon"></span>
                 </button>
             <div class="collapse navbar-collapse" id="navbar1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="monitoring.html" onclick="alert('This page is currently under construction')"  style="color: white">Monitoring</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#" onclick="alert('This page is currently under construction')" style="color: white">News</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="../index.php" style="color: white">Home</a>
                    </li>
                </ul>
          </div>
        </nav>

 <!--####################################################################################################################################--->                                                
                                                    <!--Section--> 
    <section id="showcase">
      <div class="container">
        <div class="wrapper fadeInDown">
         <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Confirmation Email Sent!</h2><br><br>

                <!-- This input field is needed, to get the email of the user -->

                <form action="../Models/reset_password.php" method="post">
      

              
                     <input type="password" required name="newpassword" id="txtConfirmPassword" autocomplete="off" class="form-control" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                     <br>
                     <input type="password" required name="confirmpassword" autocomplete="off" id="txtPassword" class="form-control" placeholder="Create Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                
                            <!-- This input field is needed, to get the email of the user -->
                     <input type="hidden" name="email" value="<?= $email ?>">    
                     <input type="hidden" name="hash" value="<?= $hash ?>">
             
                     <input type="submit" id="btnSubmit" class="fadeIn fourth"\>
             </form>
     
            
          <div id="formFooter">
                <a class="underlineHover" href="../index.php">Homepage</a>
          </div>
      </div>
    </div>
   </div>
  </section>
    
        

        
            
 <!--#################################################################################################################################--->

                                                <!-- Footer -->
        
<footer class="page-footer font-small blue pt-4">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: limerickwater.com
  </div>
  <!-- Copyright -->

        </footer>
    </div>
<!-- End Footer -->
    
    <!--##################################################################################################--->
    
    
    
   </body>
</html>      