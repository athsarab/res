<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Nairobi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
    <div class="logo"><a href="#">Restaurant</a></div>
    <nav>
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="login-user.php">Admin Login</a></li>
        </ul>
    </nav>
</header>
 <div id="page-container">
   <div id="content-wrap">
    <div class="container" style="background: linear-gradient(90deg, transparent, #03a34a);box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;  background: rgba(0,0,0,.4);width:500px;padding-top:10px;outline: none;">
  <?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Set cookie for the username
            setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie set to expire in 30 days
            // Redirect to user dashboard page
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title" style="color:white;">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password" style="width:300px; height:25px; "><br>
        <input type="submit" value="Login" name="submit" class="login-button" style="margin-left: 200px; margin-top:10px; width:100px; height:25px; font-size:16px;">
    </form>
<?php
    }
?>
</div>
   </div>
<footer id="footer">
<p>At Restaurant Nairobi,Where We Strive For More</p>
</footer>
</body>
</html>
