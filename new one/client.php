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
            <li><a href="index.html">Home</a></li>
            <li><a href="pictures.html">Gallery</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="client.php">Client</a></li>
             <li><a href="register.php">Register</a></li>
            <li><a href="login-user.php">Admin</a></li>
        </ul>
    </div>
    </nav>
</header>
 
<body>
    <div id="page-container">
   <div id="content-wrap">
    <form action="search.php" method="post">
        <label >Search Recipe by Name/Category/Author</label>
        <input type="text" name="searchvalue" style="width:200px;">
        <input type="submit" name="search" value="Search" style="margin-left:20px;">
    </form>
    <h1 style="text-align: center;color: white;">Recipes Table</h1>
    <table border="1" style="background: linear-gradient(90deg, transparent, #03a34a);box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;  background: rgba(0,0,0,.5);color: white;">
        <tr><th>Recipe Id</th><th>Recipe Name</th><th>Category Name</th><th>Author Name</th><th>Ingredients</th><th>Prep Method</th><th>Prep Time</th><th>Cooking Time</th><th>Servings</th><th>Image Name</th><br></tr>



<?php
try
{
    $pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
}
catch (PDOException $e)
{
    echo "error connecting to database";

}
try
{
    $sql='SELECT * FROM recipetable ORDER BY rand() LIMIT 4';
    $queryresult=$pdo->query($sql);
}
catch(PDOException $e)
{
    echo "error querying data from the table";
}
foreach($queryresult as $row) 
{
?>
<tr><td><?php echo $row['recipeid'] ?></td>
<td><?php echo $row['recipename']?></td>
<td><?php echo $row['categoryname']?></td>
<td><?php echo $row['author']?></td>
<td><?php echo $row['ingredients']?></td>
<td><?php echo $row['prepmethod']?></td>
<td><?php echo $row['preptime']?></td>
<td><?php echo $row['cookingtime']?></td>
<td><?php echo $row['servings']?></td>
<td><img src="recipeimages/<?php echo $row['imagename'];?>"width="80%" height="70%"></td></tr>
        <?php }?>
            </table>
</body>
</html>
</div>
<footer id="footer">
<p>At Restaurant Nairobi,Where We Strive For More</p>
</footer>

</html>