<?php 
/* Main page with two forms: sign up and log in */
require './../Config/db.php';
session_start();

//Controller for admin to ensure login is verified.
include ('../Controller/userController.php');

require_once ('./../Models/reportInput.php'); ?>
              


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Water Quality of Surface Water Co.Limerick">
        <meta name="keywords" content="Water Quality, Rivers, Lakes, Limerick, Surface Water">
        <meta name="author" content="Patrick O Grady">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  

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
    
    
  <body class="container">

<!--######################################################################################################################--->

 
                                                <!--Navigation-->
        
<?php include('Navigations-Footers/user-Navigation.php'); ?>
 

 <!--######################################################################################################################--->

                                                <!--Section-->


      <div class="card">
        <h5 class="card-header">Upload Report</h5>
        <div class="card-body">

            <div>     
                <a href="profile.php" class="btn btn-default">Back</a>
              <div id="map"></div> 
                  </div>


          <fieldset>


      <!-- Form Name -->
      <legend>Create Report</legend>

      <form action="" method="POST" enctype="multipart/form-data">

      <!-- Select Basic -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="selectbasic">Report Type</label>
        <div class="col-md-4">
          <select id="selectbasic" name="reportType"  class="form-control">
            <option value="Pollution">Pollution</option>
            <option value="Flora">Flora</option>
            <option value="Fuana">Fauna</option>
            <option value="Flooding">Flooding</option>
          </select>
        </div>
      </div>

      <!-- Search input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="searchinput">Water body Location</label>
        <div class="col-md-4">
          <input id="searchinput" type="search" name="waterbody" placeholder="Search by lake/river.." class="form-control input-md">
          <p class="help-block">Search by water body location</p>
        </div>
      </div>




      <div class="form-group">
        <label class="col-md-4 control-label" for="textinput">GPS Coordinates</label>  
        <div class="col-md-4">
            <input id="textinput" type="text" name="lat" placeholder="latitude" class="form-control input-md" pattern="^-?([1-8]?[0-9]\.{1}\d{1,6}$|90\.{1}0{1,6}$)">
        <input  id="textinput"  type="text" name="long" placeholder="Longitude" class="form-control input-md" pattern="^-?([1-8]?[0-9]\.{1}\d{1,6}$|90\.{1}0{1,6}$)">

        </div>
      </div>


      <!-- Textarea -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="textarea">Summary</label>
        <div class="col-md-4">                     
          <textarea class="form-control" id="textarea" name="description" title="A summary must of the report must be provided before submission" required="required"></textarea>
        </div>
      </div>



      <div class="form-group">
        <label class="col-md-4 control-label" for="filebutton">File Button</label>
        <div class="col-md-4">
          <input type="file" name="uploadfile">
        </div>
      </div>


      <div>
        <input type="submit" name="uploadfilesub" class="btn btn-primary" value="Submit">

      </div>

      </form>


      </fieldset>
            <script>
          $(document).ready(function(){
              $('#insert').click(function(){
              var image_name = $('#image').val();
              if(image_name === '')
              {
                  alert("Please Select Image");
                  return false;
              }
              else
              {
                  var extension = $('#image').val().split('.').pop().toLowerCase();
                  if(jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) === -1)
                  {
                       alert('Invalid Image File');
                       $('#image').val('');
                       return false;
                      
                  }
              }
          });
      });
       </script> 
        
   </div>
     
      

      
      
      
    
      <!--######################################################################################################################--->
                                        
                                                <!--Footer-->

<?php include('Navigations-Footers/logged-in-footer.php'); ?>
                                                
<!--######################################################################################################################--->
    
  </div>
</body>
</html>