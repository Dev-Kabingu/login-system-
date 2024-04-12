
<?php
include ("./functions.php");

session_start();

if(isset($_POST['submit'])){
      // There's a typo here, 'emial' should be 'email'. This line sanitizes and escapes the email input.
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Sanitize and escape the password input to prevent SQL injection
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
$sql = mysqli_query($conn, "SELECT * FROM user_form WHERE email = '$email' AND userpassword = '$password'") or die('query failed');
    // $sql = "SELECT * FROM user_form WHERE email = '$email' AND userpassword = '$password'";
    // $result = mysqli_query($conn,$sql);
    //check if there are any rows returned by the query indicating that the user already exists
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($result);
        echo $_SESSION['user_id'] = $row['id'];    
       
    }else{
        $message[] = 'incorrect email or password!';

        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <h4>login now</h4>
    <!-- <input type="text" name="username" required placeholder="enter username" class="box"> -->
    <input type="email" name="email" required placeholder="enter email" class="box">
    <input type="password" name="password" required placeholder="enter password" class="box">
    <input type="submit" name="submit" value="login now" class="btn">
    <p>Don't have an account? <a href="register.php">register now</a></p>
</form>
</div>
    
</body>
</html>
