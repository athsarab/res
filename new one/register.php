<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	<title>Restaurant Nairobi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script>
        // JavaScript validation for phone number
        function validatePhone() {
            var phoneInput = document.getElementById("phone");
            var phonePattern = /^\d{10}$/; // This pattern checks for exactly 10 digits

            if (!phonePattern.test(phoneInput.value)) {
                alert("Please enter a valid 10-digit phone number.");
                phoneInput.focus();
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
	<header>
    <div class="logo"><a href="#">Restaurant</a></div>
    <nav>
        <ul>
               <li><a href="index.html">Home</a></li>
           
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.php">login</a></li>
             <li><a href="register.html">Register</a></li>
            
        </ul>
    </div>
    </nav>
</header>
 <div id="page-container">
   <div id="content-wrap">
    <div class="container" style="background: linear-gradient(90deg, transparent, #03a34a);box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;  background: rgba(0,0,0,.4);width:500px;padding-top:10px;outline: none;">
  <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "INSERT into `users` (username, password, email)
                     VALUES ('$username', '" . md5($password) . "', '$email')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="POST">
        <h1 class="login-title" style="color:white;">Registration</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
        <input type="text" class="login-input" name="mobile" placeholder="mobile no" required />
        <input type="text" class="login-input" name="country" placeholder="country" required />
        <input type="password" class="login-input" name="password" placeholder="Password " style="width: 300px;height: 30px; border-radius: 4px; border:solid;"><br>
        <div class="g-recaptcha brochure__form__captcha" data-sitekey="6Ld-d2AiAAAAAO5-Jqkf44SCMy1aIzYqlNrDuEkp" style="margin-top:10px;"></div>
        <input type="submit" name="submit" value="Register" class="login-button" style="margin-left:10px; margin-top:13px; width:100px;font-size:13px;height:25px;"> 
               <form>
      <input type="button" style="margin-top:10px; height:27px; width:100px; margin-left:100px; " onclick="window.location.href='login.php';" value="Login" />
      <script>
      <input type="button" value="Submit" onclick="return confirm('Are you sure you want to submit ?')" />
</script>
    </form>

<?php
    }
?>
   
</script>
  </form>

    



</div>
  </form>
   </div>
<footer id="footer">
<p>At Restaurant Nairobi,Where We Strive For More</p>
</footer>
</body>
</html>