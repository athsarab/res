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
	$sql='DELETE FROM categorytable WHERE categoryid=:id';
	$result=$pdo->prepare($sql);
	$result->bindvalue(':id',$_GET['deleteid']);
	$result->execute();
}
catch (PDOException $e)
{
	echo"error deleting the category";
}
echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='categoriesdisplay.php';</script>";
?>