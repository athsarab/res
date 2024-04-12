<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
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
            
       <li><a href="home.php">Home</a></li>
            <li><a href="pictures.html">Gallery</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="client.php">Client</a></li>
            <li><a href="recipes.html">Recipes</a></li>
            <li><a href="login.php" onclick="return alert('User Successfully Logged out')">Logout</a></li>
        </ul>
    </div>
    </nav>
</header>
 <body>
<div id="page-container">
   <div id="content-wrap">
    <div class="container" style="background: linear-gradient(90deg, transparent, #03a34a);box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;  background: rgba(0,0,0,.4);">
    <div class="form">
        <p style="color:white;font-size:20px;">Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p style="color:white;font-size:30px;">You are now in the user dashboard page.</p>
    </div>



</div>
  </form>
   </div>
<footer id="footer">
<p>At Restaurant Nairobi,Where We Strive For More</p>
</footer>
</body>
</html>
