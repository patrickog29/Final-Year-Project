  <?php
    require('../Config/db.php');
        session_start();
 
 //Controller for admin to ensure login is verified.
include ('../Controller/adminController.php');

    $result = mysqli_query($mysqli,"select * from users")
    
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
    
     
        <!--Button Onlick switch JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Font Awesome for icons (nav-bar) -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <!--over all styling-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.1/css/mdb.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="../CSS/admin-user-stylesheet.css">

    

 <!--######################################################################################################################--->
    
                                              <!--JS-->
  
     <!--Function set for Search Bar -->
    
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
    
    
    <!-- Function call set for Activate/Deactivate Status -->
    
        <script type="text/javascript">
    function admin_disactive_user(val, id){
            
    
               if(val==="1"){ 
              $('#str'+ id).html('User');
                      }
                 else {
              
                 $('#str' + id).html('Admin');
               }
    
     
               
        $.ajax({ 
            type:'post',
            url:'../Models/adminChange.php',
            data:{val:val,id:id},
            success: function(result){
         console.log(val + "test");
    //     $row['active']= result
          //      if(val===1){ 
         //       $('#str'+ id).html('active');
          //            }
          //       else {
          //       console.log(result + "else")
          //       $('#str' + id).html('deactive');
          //      }
                               
             }
        });
    }
    </script>
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
  <h5 class="card-header">Administrator Status</h5>
  <div class="card-body">
      
<div>     
     <a href="profileAdmin.php" class="btn btn-default">Back</a>
</div>
      
<div class="main">
    
  
  <!-- Search box -->
    
  <div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search by email..">
</div>
      </div>
      
      
      
      
   
  
<div class="table-responsive" id="myTable">
    <table class="table table">
        <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Admin Status</th>
            <th>Change Status</th>      
        </tr>
    
        <?php
        while($row=mysqli_fetch_assoc($result)) {
        
        ?>
        
        <tr>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td>
             <?php
                
                if($row['admin']==2)
                {
                    echo "<p id=str".$row['id'].">Admin</p>";
                }
                else {
                    echo "<p id=str".$row['id'].">User</p>";
                }
            
            ?>
            </td>
            <td>
             <select onchange="admin_disactive_user(this.value,<?php echo $row['id'];?>)">
                 <option value="2">Admin</option>
                 <option value="1">User</option>
                </select>
            </td>
        </tr>
    
        
    <?php
            
            
            
        }  ?>
    

    
    </table>

      </div>
      
        </div>
        </div>
<!--######################################################################################################################--->
                         <!--Footer-->               
 <?php include('Navigations-Footers/logged-in-footer.php'); ?>
<!--######################################################################################################################--->
        </div>
    </body>
</html>