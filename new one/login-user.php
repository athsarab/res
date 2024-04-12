<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Nairobi</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://css.gg/log-in.css' rel='stylesheet'>
</head>
    
<body>
<header>
    <div class="logo"><a href="#">Restaurant</a></div>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
         
        </ul>
    </div>
    </nav>
</header>

 <div id="page-container">
   <div id="content-wrap">
    <div class="container" style="background: linear-gradient(90deg, transparent, #03a34a);box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;  background: rgba(0,0,0,.4);width:500px;padding-top:10px;outline: none;">
  
                      <div class="login-box">
  <h2 style="color:white;"> Admin Login</h2>
   <form action="adminlogin.php" method="post" enctype="multipart/form-data" name="adminloginform">

    <div class="user-box">
      <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required data-error="Please enter your Username">
    </div>
    <div class="user-box">
    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required data-error="Please enter your Password">
     
  <select class="form-control" name="role">
                        <option value="contentadmin">Content Admin</option>
                        <option value="accountadmin">Account Admin</option>
                        <option value="siteadmin">Site Admin</option>
                      </select>

    </div>
                        
                       <button style=" width:20px; height: 30px;float: left; margin-left:200px; margin-top:10px;" class="btn btn-primary mt-2 btn-sm" type="Submit" name="login" onclick="return validatelogin();"><i class="gg-log-in" ></i></button>


  </form>
</div>

  
            </div>
        </div>
    </div>
    <footer id="footer">
<p>At Restaurant Nairobi,Where We Strive For More</p>
</footer>
</body>
</html>