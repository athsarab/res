<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Restaurant Nairobi</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f2f2f2;
    }
    header {
        background-color: #333;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }
    .logo a {
        color: #fff;
        text-decoration: none;
        font-size: 24px;
        font-weight: bold;
    }
    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        text-align: center;
    }
    nav ul li {
        display: inline;
        margin: 0 10px;
    }
    nav ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 18px;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 15px 25px rgba(0,0,0,.6);
        border-radius: 10px;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #333;
        color: #fff;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    button {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 18px;
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    button:hover {
        background-color: #555;
    }
</style>
</head>
<body>
    <header>
        <div class="logo"><a href="#">Restaurant Nairobi</a></div>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="pictures.html">Gallery</a></li>
                <li><a href="chef.php">Chefs Details</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="client.php">Recipes</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login-user.php">Admin Login</a></li>
            </ul>
        </nav>
    </header>
    <table>
        <thead>
            <tr>
                <th>Author ID</th>
                <th>Author Name</th>
                <th>Author Email</th>
                <th>Author Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=wt', 'root', '');
            } catch (PDOException $e) {
                echo "Error connecting to database";
            }
            try {
                $sql = 'SELECT * FROM authortable';
                $queryresult = $pdo->query($sql);
            } catch(PDOException $e) {
                echo "Error querying data from the table";
            }
            foreach($queryresult as $row) {
            ?>
            <tr>
                <td><?php echo $row['authorid'] ?></td>
                <td><?php echo $row['authorname'] ?></td>
                <td><?php echo $row['authoremail'] ?></td>
                <td><?php echo $row['authoraddress'] ?></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
    <button><a href="authors.html">Back</a></button>
</body>
</html>
