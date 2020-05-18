  <!--User Navigation-->

<nav class="navbar navbar-light navbar-expand-md" style="background-color:#0091EA;">
   <a class="navbar-brand" href="index.php" style="color: white; font-size: 2em; font-weight: 600;"><span style="color: greenyellow;">Limerick</span>Water</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar1">
       <ul class="navbar-nav mr-auto">
           
         <li class="nav-item">
                 <a class="nav-link" href="#" onclick="alert('This page is currently under construction')"  style="color: white">Monitoring</a>
          </li>
      
        <li class="nav-item">
          <a class="nav-link" href="profile.php" style="color: white"> User Home</a>

          <li class="nav-item">
              <a class="nav-link" href="logout.php" name="logout" style="color: white">
                  <span class="bold-signOut">Sign out: </span><?php echo $first_name.' '.$last_name; ?><i class="fas fa-sign-out-alt"></i></a>
        
        </li>
    </ul>
  </div>
</nav>