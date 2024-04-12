<?php
try
{
$pdo=new PDO('mysql:host=localhost;dbname=wt','root','');

}
catch(PDOException $e)
{
echo "error in connecting to the database";
exit;
}
if(isset($_POST['send']))
{
try
{
$sql='INSERT INTO categorytable SET categoryid=NULL,categoryname=:cname';
$v=$pdo->prepare($sql);
$v->bindvalue(':cname',$_POST['category']);
$v->execute();
}
catch (PDOException $e)
{
	echo "error saving the info on the database";
}
echo "Category successfully saved";
}
?>
