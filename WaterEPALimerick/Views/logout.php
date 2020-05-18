<?php
/* Log out process, Session variables diactivated*/
session_start();
session_unset();
session_destroy(); 
?>

<!--######################################################################################################################--->
                                                 
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
    <link rel="stylesheet" href="../CSS/indexCSS.css">
    <link rel="stylesheet" href="../CSS/indexStyleSheet.css">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
 <!-- Scripts for Footer-->

            <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
            <!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
            <!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
            <!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
      
     <!-- Script for NavBar collapse!!! -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
   
</head>
 <!--######################################################################################################################--->

                                          <!--CSS Internal-->
<style>
    #showcase {
    min-height: 500px;
    background: url('../img/lake-mountain.jpg') no-repeat 0 -470px;
                                 /*Image LICENSE
    -- <a href="https://pixabay.com/users/KlausHausmann-1332067/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1477940">Klaus Hausmann</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1477940">Pixabay</a> */
}
    </style>

<!--########################################################################################################################-->
    
    
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
<!--   <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="monitoring.html" onclick="alert('This page is currently under construction')"  style="color: white">Monitoring</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="alert('This page is currently under construction')" style="color: white">News</a>
        </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color: white">Home</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="test.php" style="color: white">Registered Users</a>
      </li>
    </ul>   -->
  </div>
</nav>
 <!--######################################################################################################################--->
                                        
                                          <!--Section-->
        <section id="showcase">
      <div class="container">
        <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active">You have Successfully Signed out!</h2>
    <div class="form">

              
          <p><?= 'You can log back in on the Homepage'; ?></p>
        
    <div id="formFooter">  
        <p><a class="underlineHover" href="../index.php">Homepage</a></p>
        </div>
      </div>

    </div>
     </div>        
           </div>
    </section>
<!--######################################################################################################################--->
           
                                              <!--Footer-->
             
   <footer class="page-footer font-small blue pt-4">                                             
               <div class="footer-copyright text-center py-3">© 2020 Copyright: limerickwater.com
  </div>
  <!-- Copyright -->
        
             </footer>
        </div>
<!--######################################################################################################################--->
</body>
</html>
