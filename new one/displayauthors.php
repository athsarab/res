<html>
<head><title>Authors page</title></head>
<body>
	<h1>Authors Information</h1>
	<table border="1">
		<tr><th>Author ID</th><th>Author Name</th><th>Author Email</th><th>Author Address</th><th>Delete</th><th>Edit</th></tr>
	
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
	$sql='SELECT * FROM authortable';
	$queryresult=$pdo->query($sql);
}
catch(PDOException $e)
{
	echo "error querying data from the table";
}
foreach($queryresult as $row) 
{
?>
<tr><td><?php echo $row['authorid'] ?></td>
<td><?php echo $row['authorname']?></td>
<td><?php echo $row['authoremail']?></td>
<td><?php echo $row['authoraddress']?></td>
<td><button><a href="deleteauthors.php?did=<?php echo $row['authorid']?>">Delete</a></button></td>
<td><button><a href="editauthors.php?id=<?php echo $row['authorid']?>">Edit</a></button></td></tr>
<?php }?>
</table>
<button><a href="authors.html">Back</a></button>
</body>
</html>