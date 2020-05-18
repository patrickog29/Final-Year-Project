<?php
/* User login process, identifies User to Admin checks if user exists and password is correct */

// Escapes email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: Views/error.php");
}



else { // Admin exists -- Admin will have a variable of = [2]
    $user = $result->fetch_assoc();
    
     if ( password_verify($_POST['password'], $user['password']) and ($user['admin'] == 2) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        
        // Provides session variable to ensure Admin is logged in
        $_SESSION['logged_in'] = true;
        

        header("location: Views/profileAdmin.php");
        
    }
    
    
    
    // User loggin -- User variable = [2]
    
    elseif ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
        
        // Identfies if user is logged in
        $_SESSION['user_logged_in'] = true;

        header("location: Views/profile.php");
      
    }
    
    
         //Wrong password entered by user
        
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: Views/error.php");
    }
}

