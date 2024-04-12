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
	$sql='DELETE FROM authortable WHERE authorid=:id';
	$result=$pdo->prepare($sql);
	$result->bindvalue(':id',$_GET['did']);
	$result->execute();
}
catch (PDOException $e)
{
	echo"error deleting the Author";
}
echo '<script language="javascript">';
echo 'alert("Successfully Deleted")';
echo '</script>';
echo "<script> location.href='displayauthors.php';</script>";
?>