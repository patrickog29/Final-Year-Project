 <!--#################################################################################################################################--->
                               <!-- PHP Code -->
<?php 
/* This page reset the password form, sends reset.php password hyperlink in email to user */
require './../Config/db.php';
session_start();

require_once ('./../Models/forgotPassword.php');
?>

 <!--#################################################################################################################################--->
   

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
         <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
    
    </head>

<!--######################################################################################################################--->
    
<body>
    <div class="container">
        
 <!--######################################################################################################################--->
                                                <!--Navigation-->
        
        <nav class="navbar navbar-light navbar-expand-md" style="background-color:#0091EA;">
   <a class="navbar-brand" href="index.php" style="color: white; font-size: 2em; font-weight: 600;"><span style="color: greenyellow;">Limerick</span>Water</a>
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

 <!--#################################################################################################################--->                                                
                                                    <!--Section-->
           <section id="showcase">
      <div class="container">
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> Forgottten Password</h2><br><br>
       <form action="forgot.php" method="post">
      <input type="text" class="form-control" required autocomplete="off" name="email" placeholder="Enter Email.." pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" 
        required="required" title="Email address required using '@' symbol"><br><br>
    <input type="submit" class="fadeIn fourth"><br>
    <p><a class="underlineHover" href="../index.php">Homepage</a></p>
    </form>
  </div>
          </div>
               </div>
          </section>
          
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

        
 <!--#################################################################################################################################--->

                                                <!-- Footer -->
        
<footer class="page-footer font-small blue pt-4">
<ul class="list-unstyled list-inline text-center py-2">
    <h5 class="mb-1">Sign up for Our Monthly Newsletter!</h5>
    <form name="form1" action="#">
    <li class="list-inline-item">
        <input type="text" required autocomplete="off" id="NL-email" class="form-control" name="NLemail" placeholder="Insert Email...">
    </li>
    <li class="list-inline-item">
        <input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.form1.text1)" />
    
     </form>
        
        
        
  </ul>
    

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5><a class="navbar-brand" href="#" style="color: white; font-size: 1.2em; font-weight: 600;"><span style="color: greenyellow;">Limerick</span>Water</a></h5>
        <p> Limerick Water provides information on water bodies throughout Co.Limerick with
            its assigned EPA annual water quality grade.
            We present data of each waterbody with monitoring sampling status over the
            course of three years. This includes water quality grades which are drawn from EPA physicalchemical parameters sampling results with the waterbody’s final assigned grade.</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Useful Links</h5>

        <ul class="list-unstyled">
            <li>
            <a href="monitoring.html">Monitoring</a>
          </li>
          <li>
            <a href="#" onclick="alert('This page is currently under construction')" >News</a>
          </li>
          <li>
            <a href="../index.php">Home </a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Contact</h5>

        <ul class="list-unstyled">
          <li>
          <i class="fas fa-home"></i> LIT, Moylish, Limerick
          </li>
         <li>
          <i class="fas fa-envelope"></i> info@example.com
         </li>
         <li>
          <i class="fas fa-phone mr-3"></i> + 091 483 37372
        </li>
         <li>
          
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->
    
         <div class="container">

    <!-- Social buttons -->
    <ul class="list-unstyled list-inline text-center">
      <li class="list-inline-item">
        <a class="btn-floating btn-fb mx-1" href="https://www.facebook.com/">
          <i class="fab fa-facebook-f"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-tw mx-1" href="https://www.linkedin.com/">
          <i class="fab fa-twitter"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-gplus mx-1" href="https://accounts.google.com/">
          <i class="fab fa-google-plus-g"> </i>
        </a>
      </li>
      <li class="list-inline-item">
        <a class="btn-floating btn-li mx-1" href="https://www.linkedin.com/">
          <i class="fab fa-linkedin-in"> </i>
        </a>
      </li>
    </ul>
    <!-- Social buttons -->
             
  </div>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: limerickwater.com
  </div>
  <!-- Copyright -->

        </footer>
    </div>
<!-- Footer -->
    
    <!--##################################################################################################--->
            
</body>

</html>
