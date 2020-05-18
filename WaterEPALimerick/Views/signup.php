<?php 
/* sign up and log in */
require './../Config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if  (isset($_POST['register'])) { //user registering
        
        require './../Models/register.php';
        
    } 
}
?>

<!--######################################################################################################################--->
                                        
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
    

<!--######################################################################################################################--->
                                       
                                            <!--JS Script-->   
      
  <script>
          
          /*Matching Confirm Password JQuery*/
      
           
       $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();
            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });              
        </script>
</head>
                                        
<body>
    <div class="container">
 <!--######################################################################################################################--->
                                        <!--Navigation-->
            <nav class="navbar navbar-light navbar-expand-md" style="background-color:#0091EA;">
               <a class="navbar-brand" href="index.php" style="color: white; font-size: 2em; font-weight: 600;"><span style="color: greenyellow;">Limerick</span>Water</a>


                  <div class="collapse navbar-collapse" id="navbar1">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item">
                          <a class="nav-link" href="#" onclick="alert('This page is currently under construction')"  style="color: white">Monitoring</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#" onclick="alert('This page is currently under construction')" style="color: white">News</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="index.php" style="color: white">Home</a>
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
                <h2 class="active"> Register Account</h2>
      
                <form action="signup.php" method="post" autocomplete="off" name="registration" onSubmit= "return formValidation()">

                    <input type="text" required autocomplete="off" id="firstName" class="form-control" name="firstname" placeholder="Insert First Name" 
                           pattern="([a-zA-Z]{3,30}\s*)+" title="Your name (no special characters, diacritics are okay)">
                     <br>
                    <input type="text" required autocomplete="off" id="lastName" class="form-control" name="lastname" placeholder="Insert Surname" 
                           pattern="(^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$)" title="Your last name (no special characters, diacritics are okay)">
                     <br>    
                    <input type="email" required autocomplete="off" id="email" class="form-control" name="email" placeholder="Insert Email"
                           pattern="^(([-\w\d]+)(\.[-\w\d]+)*@([-\w\d]+)(\.[-\w\d]+)*(\.([a-zA-Z]{2,5}|[\d]{1,3})){1,2})$" 
                           title="Email address required using '@' symbol">
                     <br>  
                    <input type="password" required autocomplete="off" id="txtPassword" class="form-control" name="password" placeholder="Create Password" 
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                    <br>
                    <input type="password" id="txtConfirmPassword" class="form-control" name="con-password" placeholder="Confirm Password" 
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must match Password" required="required">
                    <br>
                    <input type="submit" name="register" id="btnSubmit" class="fadeIn fourth" value="Register">

               </form>
                    <div id="formFooter">
                        <a class="underlineHover" href="../index.php">Homepage</a>
                    </div>
             </div>
         </div>
       </div>
   </section>
    
      
<!--######################################################################################################################--->
                                        
                                                <!--Footer-->


   <footer class="page-footer font-small blue pt-4">
       <form>
       <h5>Sign up for Our Monthly Newsletter!</h5>
            <ul class="list-unstyled list-inline text-center py-2">
                  <li class="list-inline-item">
                      <input type="text" required autocomplete="off" id="NL-email" class="form-control" name="NLemail" placeholder="Insert Email...">
                  </li>
                  <li class="list-inline-item">
                      <input type="submit" name="submit" value="Submit" onclick="ValidateEmail(document.form1.text1)" />
                  </li>
             </ul>
       </form>
        
        
          
    

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
                  We present data of each water body with monitoring sampling status over the
                  course of three years. This includes water quality grades which are drawn from EPA physicalchemical parameters sampling results with 
                  the water body’s final assigned grade.
                </p>

        </div>
            
            <!-- Grid column -->
            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
                <div class="col-md-3 mb-md-0 mb-3">

                  <!-- Links -->
                  <h5 class="text-uppercase">Useful Links</h5>

                    <ul class="list-unstyled">
                         <li>
                            <a href="#" onclick="alert('This page is currently under construction')">Monitoring</a>
                        </li>
                        <li>
                           <a href="#" onclick="alert('This page is currently under construction')" >News</a>
                        </li>
                        <li>
                           <a href="index.php">Home </a>
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
           </ul>

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
                      <i class="fab fa-twitter"></i>
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
              <div class="footer-copyright text-center py-3">© 2020 Copyright: limerickWater.com
              </div>
              <!-- Copyright -->


        </footer>
<!--######################################################################################################################--->
    

    
    
     </div>
   </body>
</html>       
          