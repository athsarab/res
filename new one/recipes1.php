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
exit;
}
if(isset($_POST['send']))
	//acknowledges whether the button has been clicked or not 
{
try
{
$sql='INSERT INTO authortable SET authorid=NULL,authorname=:author,authoremail=:email,authoraddress=:address';
$f=$pdo->prepare($sql);
$f->bindvalue(':author',$_POST['authorname']);
//bind value brings together two values , author is referred to as a container and authorname is the textbox name
$f->bindvalue(':email',$_POST['authoremail']);
$f->bindvalue(':address',$_POST['authoraddress']);
$f->execute();
}
catch (PDOException $e)
{
	echo "Author Not Saved,Try Again";

}
echo "Author successfully saved";
}
?>
