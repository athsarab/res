<html>
<head><title>Recipes page</title></head>
<body>
	<h1>Recipes Table</h1>
	<table border="1">
		<tr><th>Recipe Id</th><th>Recipe Name</th><th>Category Name</th><th>Author Name</th><th>Ingredients</th><th>Prep Method</th><th>Prep Time</th><th>Cooking Time</th><th>Servings</th><th>Image Name</th><th>Delete</th><th>Edit</th></tr>



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
	$sql='SELECT * FROM recipetable';
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
<td><?php echo $row['imagename']?></td>
<td><button><a href="deleterecipe.php?dd=<?php echo $row['recipeid']?>">Delete</a></button></td>
<td><button><a href="editrecipe.php?id=<?php echo $row['recipeid']?>">Edit</a></button></td></tr>

		<?php }?>
</table>
<button><a href="recipes.html">Back</a></button>

</body>
</html>