
<?php
include ("./functions.php");

if(isset($_POST['submit'])){
    // Sanitize and escape the username input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
      // There's a typo here, 'emial' should be 'email'. This line sanitizes and escapes the email input.
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Sanitize and escape the password input to prevent SQL injection
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Sanitize and escape the 'confirm password' input and encrypt it using MD5. There's a typo here, '$_POSt' should be '$_POST'.
    //The md5() function in PHP is a cryptographic hash function that takes an input (in this case, the 'confirm password' field) and produces a 32-character hexadecimal hash.
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $sql = "SELECT * FROM user_form WHERE email = '$email' AND userpassword = '$password'";
    $result = mysqli_query($conn,$sql);
    //check if there are any rows returned by the query indicating that the user already exists
    if(mysqli_num_rows($result) > 0){
        $message[] ='user already exist';    
       
    }else{
       $sql = "INSERT INTO user_form (username,email,userpassword) VALUES('$username','$email','$password')";
       $result = mysqli_query($conn,$sql);
        $message[] = 'registered successfully!';

        header("Location: login.php");      
    }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- message displayed if user already exist -->
<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message" onclick="this.remove();">
            <h4>'.$message.'</h4>
        </div>';
    }
}
?>
<!-- registration form -->

<div class="form_container">

<form action="" method="post">
    <h4>register now</h4>
    <input type="text" name="username" required placeholder="enter username" class="box">
    <input type="email" name="email" required placeholder="enter email" class="box">
    <input type="password" name="password" required placeholder="enter password" class="box">
    <input type="password" name="cpassword" required placeholder="confirm paaword" class="box">
    <input type="submit" name="submit" value="register now" class="btn">
    <p>already have an account? <a href="login.php">login now</a></p>
</form>
</div>
    
</body>
</html>
