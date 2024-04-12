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
	$sql='DELETE FROM recipetable WHERE recipeid=:id';
	$result=$pdo->prepare($sql);
	$result->bindvalue(':id',$_GET['dd']);
	$result->execute();
}
catch (PDOException $e)
{
	echo"error deleting the Recipe";
}
echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='displayrecipes.php';</script>";
?>