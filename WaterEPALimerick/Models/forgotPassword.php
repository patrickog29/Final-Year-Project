<?php

// Checks if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: ../Views/error.php");
    }
    
    
    
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user through the array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Password Reset Link ( Water Quality Limerick )';
        $message_body = '
        Hello '.$first_name.',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/WaterEPALimerick/Views/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body, 'from: pxogrady@gmail.com');

        header("location: success.php");
  }
}