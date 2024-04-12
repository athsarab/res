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
$sql='SELECT * FROM authortable WHERE authorid=:id';
$value=$pdo->prepare($sql);
$value->bindvalue(':id',$_GET['id']);
$value->execute();
}
catch (PDOException $e)
{
	echo "error querying the author";
}
foreach($value as $row)
{
	?>
	<form action="editauthors2.php" method="post">
		Author ID
		<input type="text" name="authorid" value="<?php echo $row['authorid'];?>"><br>
	     Author Name
	<input type="text" name="authorname" value="<?php echo $row['authorname'];?>"><br>
	  Author Email
	<input type="text" name="authoremail" value="<?php echo $row['authoremail'];?>"><br>
	  Author Address
	<input type="text" name="authoraddress" value="<?php echo $row['authoraddress'];?>"><br>
	<input type="submit" name="Update" value="Update">
</form>
<?php 

}
?>