<?php 
/* Main page with two forms: sign up and log in */
require('./../Config/db.php');
require('./../Config/config.php');
session_start();

//Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	// get ID
	$id = mysqli_real_escape_string($mysqli, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM event WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($mysqli, $query);

	// Fetch Data
	$post = mysqli_fetch_assoc($result);
	//var_dump($posts);

	// Free Result
	mysqli_free_result($result);

	// Close Connection
	mysqli_close($mysqli);
     
    ?> 

<!DOCTYPE html>
<html>
    <head>
        <title>Forum</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Water Quality of Surface Water Co.Limerick">
        <meta name="keywords" content="Water Quality, Rivers, Lakes, Limerick, Surface Water">
        <meta name="author" content="Patrick O Grady">
             <link rel="stylesheet" href="../CSS/indexStyleSheet.css">
    <link rel="stylesheet" href="../CSS/style.css"> 
    <link rel="stylesheet" href="../CSS/logged-in-Stylesheet.css">
    <link rel="stylesheet" href="../CSS/post-report-SS.css">
    
    
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
    <!-- Map Script-->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-I7gbeEdPqZ10vZ-JnEgCUV0rVccTbik&callback=initMap"></script>

    </head>
    
<!--######################################################################################################################--->
  
    <body>
    
    <div class="container">  
        
<!--######################################################################################################################--->
        
                                          <!--Navigation-->
        
 <?php include('Navigations-Footers/Admin-Navigation.php'); ?>
                                          
 <!--######################################################################################################################--->
                                        
                                          <!--Section-->
                                          
               <div class="card">
  <h5 class="card-header">Report Type:&nbsp;<span class="forumWording"><?php echo $post['type']; ?></h5>
  <div class="card-body">
      
        <div class="container">
            
            <p><span class="forumParagraph">Post:&nbsp;</span><?php echo $post['time']; ?></p>
            <p><span class="forumParagraph">Location:&nbsp;</span><?php echo $post['waterbody_name']; ?></p>
            <div>     
        <a href="<?php echo ROOT_URL; ?>forums.php" class="btn btn-default">Back</a>
        <div id="map"></div> 
            </div>
        
            
            
        <div class="card bg-light">
            <p><?php echo $post['summary']; ?></p>
            <div class="picUpload">
            <?php echo "<img style= max-height:700px;max-width:700px; src='./../imagesuploadedf/".$post['image']."'>" ?>
             </div>
            </div>
        </div>
        

  
  <script>
          function initMap(){
      // Map options
      var options = {
        zoom:9,
        center:{lat:<?php echo $post['latitude']; ?>,lng:<?php echo $post['longitude']; ?>}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Listen for click on map
    /*google.maps.event.addListener(map, 'click', function(event){
        // Add marker
       addMarker({coords:event.latLng});
      }); */

      
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });

      var infoWindow = new google.maps.InfoWindow({
        content:'<h3><?php echo $post['waterbody_name']; ?></h3>'
      });

       marker.addListener('click', function(){
       infoWindow.open(map, marker);
      }); 
      

      // Array of markers
      var markers = [
        {
          coords:{lat:<?php echo $post['latitude']; ?>,lng:<?php echo $post['longitude']; ?>},
          content:'<h1>Amesbury MA</h1>'
        }
      ];

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

     // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
         icon:props.iconImage
        });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

       // marker.addListener('click', function(){
    /*       infoWindow.open(map, marker);    
          });   */ 
        }
      }   
      }
  </script>
  
    
 <!--######################################################################################################################--->
                         <!--Footer-->               
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
         </div>
       </div>
    </div>
  </body>
</html>
   