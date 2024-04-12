<?php
try
{
$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');
//the above code connects php to my sql database
}
catch(PDOException $e)
//returns the message in echo if php fails to connect to the sql database
{
echo "error in connecting to the database";

}
if(isset($_POST['skicka']))
	//acknowledges whether the button has been clicked or not 
{
try
{
$sql='INSERT INTO recipetable SET recipeid=NULL,recipename=:name,categoryname=:category,author=:aauthor,ingredients=:ingre,prepmethod=:prepmeth,preptime=:r_prep,cookingtime=:cooktime,servings=:serving,imagename=:image';
$mydata=$pdo->prepare($sql);
$mydata->bindvalue(':name',$_POST['recipename']);
$mydata->bindvalue(':category',$_POST['categoryname']);
$mydata->bindvalue(':aauthor',$_POST['author']);
$mydata->bindvalue(':ingre',$_POST['ingredients']);
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
catch (PDOException $e)
{
	echo "Recipe Not Saved,Try Again";

}
   echo '<script language="javascript">';
echo 'alert("Recipe Successfully Sent")';
echo '</script>';
echo "<script> location.href='displayrecipes.php';</script>";
}
?>
