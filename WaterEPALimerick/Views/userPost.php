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

	// get ID
	$id = mysqli_real_escape_string($mysqli, $_GET['id']);

	// Create Query
	$query = 'SELECT * FROM event WHERE id = '.$id;

	// Get Result
	$result = mysqli_query($mysqli, $query);

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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Water Quality of Surface Water Co.Limerick">
        <meta name="keywords" content="Water Quality, Rivers, Lakes, Limerick, Surface Water">
        <meta name="author" content="Patrick O Grady">
    <title>Limerick Water</title>     
    <link rel="stylesheet" href="../CSS/logged-in-Stylesheet.css">
    <link rel="stylesheet" href="../CSS/post-report-SS.css">
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">

        <!--Google API Map-->
       <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-I7gbeEdPqZ10vZ-JnEgCUV0rVccTbik&callback=initMap"></script>
    </head>
    
<!--######################################################################################################################--->
  
    <body>
    
    <div class="container">  
        
<!--######################################################################################################################--->
        
                                          <!--Navigation-->
        
   <?php include('Navigations-Footers/user-Navigation.php'); ?>
                                          
 <!--######################################################################################################################--->
                                        
                                          <!--Section-->
                                          
   <div class="card">
        <h5 class="card-header">Report Type:&nbsp;<span class="forumWording"><?php echo $userPost['type']; ?></h5>
         <div class="card-body">

            <div class="container">
            
                <p><span class="forumParagraph">Post:&nbsp;</span><?php echo $userPost['time']; ?></p>
                <p><span class="forumParagraph">Location:&nbsp;</span><?php echo $userPost['waterbody_name']; ?></p>
            <div>     
                <a href="<?php echo ROOT_URL; ?>userForum.php" class="btn btn-default">Back</a>
        
         <!--Map-->       
      <div id="map"></div> 
            </div>
        
            
            
        <div class="card bg-light">
                <p><?php echo $userPost['summary']; ?></p>
                <div class="picUpload">
                <?php echo "<img style= max-height:700px;max-width:700px; src='./../imagesuploadedf/".$userPost['image']."'>" ?>
                 </div>
                </div>
        </div>
        
<!--######################################################################################################################--->
                                        
<?php include('Navigations-Footers/logged-in-footer.php'); ?>

<!--######################################################################################################################--->
  
  <script>
    function initMap(){
      // Map options
      var options = {
        zoom:9,
        center:{lat:<?php echo $userPost['latitude']; ?>,lng:<?php echo $userPost['longitude']; ?>}
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
        content:'<h3><?php echo $userPost['waterbody_name']; ?></h3>'
      });

       marker.addListener('click', function(){
       infoWindow.open(map, marker);
      }); 
      

      // Array of markers
      var markers = [
        {
          coords:{lat:<?php echo $userPost['latitude']; ?>,lng:<?php echo $userPost['longitude']; ?>},
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
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-I7gbeEdPqZ10vZ-JnEgCUV0rVccTbik&callback=initMap">
    </script>
      </div>
   </div>
    </div>
  </body>
</html>
   