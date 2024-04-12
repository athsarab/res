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
$sql='SELECT * FROM recipetable WHERE recipeid=:id';
$value=$pdo->prepare($sql);
$value->bindvalue(':id',$_GET['id']);
$value->execute();
}
catch (PDOException $e)
{
	echo "error querying the recipe";
}
foreach($value as $row)
{
	?>
	<form action="editrecipes2.php" method="post">
		Recipe ID
		<input type="text" name="recipeid" value="<?php echo $row['recipeid'];?>"><br>
	     Recipe Name
	<input type="text" name="recipename" value="<?php echo $row['recipename']?>"><br>
	  Category Name
	<input type="text" name="categoryname" value="<?php echo $row['categoryname']?>"><br>
	  Author 
	<input type="text" name="author" value="<?php echo $row['author']?>"><br>
		Ingredients
	<input type="text" name="ingredients" value="<?php echo $row['ingredients']?>"><br>
	Prep Method 
	<input type="text" name="prepmethod" value="<?php echo $row['prepmethod']?>"><br>
	Prep Time 
	<input type="text" name="preptime" value="<?php echo $row['preptime']?>"><br>
	Cooking Time
	<input type="text" name="cookingtime" value="<?php echo $row['cookingtime']?>"><br>
	Servings
	<input type="text" name="servings" value="<?php echo $row['servings']?>"><br>
	Image Name
	<input type="text" name="imagename" value="<?php echo $row['imagename']?>"><br>
	<input type="submit" name="Update" value="Update">
</form>
<?php 

}
?>