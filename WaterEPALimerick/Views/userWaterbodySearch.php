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

  
      //Create Query
	$query = ('CALL getFullwaterbodyinfo()');

	// Get Result
	$result = mysqli_query($mysqli, $query);

	// Fetch Data
	$userPosts = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
     
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../CSS/admin-user-stylesheet.css">
        <link rel="stylesheet" href="../CSS/waterbodySearch-SS.css">
   
    
    
    <script>
               
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
        
     </head>
    
    <!--######################################################################################################################--->
  
    <body>
    
    <div class="container">  
        
<!--######################################################################################################################--->

                                          <!--Navigation-->
        
        <?php include('Navigations-Footers/user-Navigation.php'); ?>
 <!--######################################################################################################################--->

            <div class="card">
             <h5 class="card-header">Upload Report</h5>
             <div class="card-body">
            <div>     
                     <a href="profile.php" class="btn btn-default">User Home</a>
            </div>
                 <br> 
                 <p>Hover over markers to identify water body information</p>
             <div id="map"></div>
             
             
             <script>
    function initMap(){
      // Map options
      var options = {
        zoom:8,
        center:{lat:52.676682,lng:-8.756993}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Listen for click on map
      google.maps.event.addListener(map, 'click', function(event){
        // Add marker
        addMarker({coords:event.latLng});
      });

      /*
      // Add marker
      var marker = new google.maps.Marker({
        position:{lat:42.4668,lng:-70.9495},
        map:map,
        icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
      });
        

      var infoWindow = new google.maps.InfoWindow({
        content:'<h1>Lynn MA</h1>'
      });

      marker.addListener('click', function(){
        infoWindow.open(map, marker);
      });
      */
     var infoWindow;
     var latlang;
     var markers = [];
 
     
     
<?php foreach($userPosts as $userPost) : ?>
      // Array of markers
   latlang = {  lat: <?php echo $userPost['latitude']; ?>,
                   lng:  <?php echo $userPost['longitude']; ?> }
   name = "Ennis ";
    river = "<?php echo $userPost['waterbody_name']; ?>" + "\n" + "<?php echo $userPost['q']; ?>" + "\n" + "<?php echo $userPost['waterbody_type']; ?>" + "\n" + "<?php echo $userPost['townland']; ?>" ;
         
       // infoWindow = new google.maps.InfoWindow({
    //        content:name
      //   });
          
        var marker = new google.maps.Marker({
             position:latlang,
             title: river,
             map: map 
 });
          // marker.showInfoWindow();
        // marker.addListener('click', function(){
          //            infoWindow.open(map, marker);
           //         });
                     markers.push(marker)
   <?php endforeach; ?> 
   
     

      // Add Marker Function
  //    function addMarker(props){
  //      var marker = new google.maps.Marker({
  //        position:props.coords,
  //        map:map,
          //icon:props.iconImage
   //     });

        // Check for customicon
  //      if(props.marker){
          // Set icon image
  //        marker.setIcon(props.marker);
  //      }

        // Check content
  /*      if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });

          marker.addListener('click', function(){
            infoWindow.open(map, marker);
          });
        }
      }
    }   */ }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzETYNDViwrAb1wi66-Tba-eSYhe5gWHc&callback=initMap">
    </script>
 <!--Section-->

        <div class="container">
        <h1>Listing</h1>
        
        <div class="form-group has-search">
            <span class="fa fa-search form-control-feedback" style=" text-align:center;"></span>
            <input style="width:40%; margin:auto;" type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by name">
        </div>
        <table id="myTable">
            <?php foreach(array_reverse($userPosts) as $userPost) : ?>

            <div class="row" style="margin-bottom: 1em;">
          
            <tr>
                <td>
            <div class="col" style="background-color: whitesmoke; display:inline-block;">
                <h5>Water body Name:&nbsp;<span class="forumWording"><?php echo $userPost['waterbody_name']; ?></span></h5>

                <p><span class="forumParagraph">Location:&nbsp;</span><?php echo $userPost['townland']; ?></p>
                <p><span class="forumParagraph">Water body Type:&nbsp;</span><?php echo $userPost['waterbody_type']; ?></p>
                <p><span class="forumParagraph">Sample Carried out:&nbsp;</span><?php echo $userPost['sample_date']; ?></p>
                
                </div>
                <div class="col" style="background-color: whitesmoke; display:inline-block; padding-top: 1em;">
                    <h5>Description</h5>
                    <p class="description"><?php echo $userPost['description']; ?></p>
                     <a class="btn btn-default" href="<?php echo ROOT_URL;?>userWaterbodyPage.php?id=<?php echo $userPost['id']; ?>">View Results</a>
                </div>
                    </div>
                  </td>
               </tr>
             <?php endforeach; ?>
            </table> 
          </div>
<!--######################################################################################################################--->
                         <!--Footer-->               
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
       </div>

      </body>
      </html>
    