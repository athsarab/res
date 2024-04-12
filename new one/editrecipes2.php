<?php
try
{
	$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
}
catch (PDOException $e)
{
	echo "error connecting to database";

}
if (isset($_POST['Update'])){
	try 
	{
	
	$sql='UPDATE recipetable SET recipename=:name,categoryname=:category,author=:aauthor,ingredients=:ingre,prepmethod=:prepmeth,preptime=:r_prep,cookingtime=:cooktime,servings=:serving,imagename=:image WHERE recipeid=id';
$mydata=$pdo->prepare($sql);
$mydata->bindvalue(':name',$_POST['recipename']);
$mydata->bindvalue(':category',$_POST['categoryname']);
$mydata->bindvalue(':aauthor',$_POST['author']);
$mydata->bindvalue(':ingre',$_POST['ingredients']);
$mydata->bindvalue(':id',$_POST['recipeid']);
$mydata->bindvalue(':prepmeth',$_POST['prepmethod']);
$mydata->bindvalue(':r_prep',$_POST['preptime']);
$mydata->bindvalue(':cooktime',$_POST['cookingtime']);
$mydata->bindvalue(':serving',$_POST['servings']);
$mydata->bindvalue(':image',$_FILES['imagename']["name"]);
$mydata->execute();
$target_folder="recipeimages/";
$target_file=$target_folder.basename($_FILES["imagename"]["name"]);
move_uploaded_file($_FILES["imagename"]["tmp_name"],$target_file);
}
catch (PDOException)
{
	echo "error updating recipe";
}
echo '<script language="javascript">';
echo 'alert("Recipe successfully edited")';
echo '</script>';
echo "<script> location.href='displayrecipes.php';</script>";
}
?>