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

  
      //Create Query
	$query = 'SELECT * FROM event';

	// Get Result
	$result = mysqli_query($mysqli, $query);

	// Fetch Data
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <meta name="description" content="Affordable and professional web design">
	  <meta name="keywords" content="web design, affordable web design, professional web design">
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
    
 
    
    <style>
        .forumWording {
            color:#0d0d0d;
            line-height:3em;
        }
        .forumParagraph {
            font-weight: 600;
            line-height:2em;
        }
    </style>
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
           <h5 class="card-header">Latest Reports</h5>
           <div class="card-body">

           <div>     
            <a href="profileAdmin.php" class="btn btn-default">Back</a>
           </div>

                    <div class="container">
                        <h1>Posts</h1>
                        <?php foreach(array_reverse($posts) as $post) : ?>   <!--array set out each page to ID-->
                    <div class="card bg-light" style="margin-bottom: 1em;">
                        <div class="card-body" style="background-color: #5fbae9;">
                           <h5>Report Type:&nbsp;<span class="forumWording"><?php echo $post['type']; ?></span></h5>

                            <p><span class="forumParagraph">Post:&nbsp;</span><?php echo $post['time']; ?></p>

                            <p><span class="forumParagraph">Location:&nbsp;</span><?php echo $post['waterbody_name']; ?></p>

                            <p><span class="forumParagraph">Posted By:&nbsp;</span><?php echo $post['userEmail']; ?></p>

                            <a class="btn btn-default" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id']; ?>">Read</a>
                              <!--Delete button for admin use only-->
                            <a class="btn btn-danger" href="../Models/deletePost.php?delete=<?php echo $post['id']; ?>">Delete Report</a>
                   </div>
                       </div>

                <?php endforeach; ?>
                        <!--End of Array-->
           </div>
         </div>

      
<!--######################################################################################################################--->
                                        
<?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
        </div>
    </div>
</body>
</html>