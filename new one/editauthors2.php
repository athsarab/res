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
	$sql='UPDATE authortable SET authorname=:author , authoremail=:email , authoraddress=:address WHERE authorid=:id';
	$info=$pdo->prepare($sql);
	$info->bindvalue(':author',$_POST['authorname']);
	$info->bindvalue(':id',$_POST['authorid']);
	$info->bindvalue(':email',$_POST['authoremail']);
	$info->bindvalue(':address',$_POST['authoraddress']);
	$info->execute();
}
catch (PDOException)
{
	echo "error updating Author";
}
echo '<script language="javascript">';
echo 'alert("Author successfully edited")';
echo '</script>';
echo "<script> location.href='displayauthors.php';</script>";
}
?>