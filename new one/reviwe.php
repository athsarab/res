<?php
// Check if the username cookie is set
if (!isset($_COOKIE['username'])) {
    // Redirect to some error page or login page
    header("Location: login.php");
    exit(); // Make sure to exit after redirection
}

// Proceed with your script if the cookie is set
$recipeid = $_COOKIE['_id'];
$username = $_COOKIE['username'];

// Include database connection
include_once 'db.php';

// Check if form is submitted for adding a new review
if (isset($_POST['submita'])) {
    // Get form data
    $rating = $_POST['rating'];
    $review = $_POST['reviewtarea'];
    $g_or_b = $_POST['g_or_b'];

    // Insert review into the database
    $query = "INSERT INTO Recipe_Review (Recipe_ID, Review_Poster, Recipe_Comment, Recipe_Rating, g_or_b)
              VALUES (?, ?, ?, ?, ?)";
    $statement = $con->prepare($query);
    $statement->bind_param('issds', $recipeid, $username, $review, $rating, $g_or_b);
    $result = $statement->execute();

    if ($result == FALSE) {
        echo 'Error inserting record.'; // If false bool is returned, there was an error inserting the record
    } else {
        // Redirect to the same page to avoid resubmission
        header("Location: ".$_SERVER['PHP_SELF']);
        exit(); // Exit script after redirection
    }
}

// Check if delete review form is submitted
if (isset($_POST['delete_review'])) {
    $delete_comment = $_POST['delete_comment'];

    // Delete review from the database
    $query = "DELETE FROM Recipe_Review WHERE Recipe_ID = ? AND Recipe_Comment = ?";
    $statement = $con->prepare($query);
    $statement->bind_param('is', $recipeid, $delete_comment);
    $statement->execute();

    // Redirect to the same page
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Fetch existing reviews from the database
$query = "SELECT Recipe_Comment, Recipe_Rating, g_or_b FROM Recipe_Review WHERE Recipe_ID = ?";
$statement = $con->prepare($query);
$statement->bind_param('i', $recipeid);
$statement->execute();
$statement->bind_result($existing_review, $existing_rating, $existing_g_or_b);
$reviews = [];
while ($statement->fetch()) {
    $reviews[] = ['comment' => $existing_review, 'rating' => $existing_rating, 'g_or_b' => $existing_g_or_b];
}
$statement->close();
$con->close();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>UniFoodie</title>
    <!-- Add your CSS and other head elements here -->
    <style>
        /* Add your custom CSS for buttons here */
        .btn {
            padding: 8px 12px;
            background-color: #03a34a;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }
        .btn:hover {
            background-color: #028a3d;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>UniFoodie</h1>
        <a href="homepage.php"><img style="float: left;" src=Logo.png></a>
        <a href="index.php"><button class="LogOutButton" style="float: right;" onclick="deleteAllCookies()">Log Out</button></a>
        <button class="LogOutButton" style="float: right; width: 100px;"><?php echo "Welcome " . $username . "!"; ?></button>
    </div>

    <div class="form-align">
        <div class="grid-container">
            <form name="reviewForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <label for="rating">Rating</label>
                <input type="number" steps="any" min="0" max="10" name="rating"><br><br>
                <label for="reviewtarea">Review</label>
                <textarea id="reviewtarea" rows="4" cols="50" name="reviewtarea"></textarea><br><br>
                <select id="Recipe_Type" name="g_or_b">
                    <option value="good">good comment</option>
                    <option value="bad">bad comment</option>
                </select><br><br>
                <label for="submita">Submit:</label>
                <button type="submit" name="submita">Add Review</button>
            </form>

            <!-- Display existing reviews -->
            <h2>Existing Reviews</h2>
            <?php if (!empty($reviews)): ?>
                <ul>
                <?php foreach ($reviews as $review): ?>
                    <li><?php echo $review['comment']; ?> - Rating: <?php echo $review['rating']; ?> - Type: <?php echo $review['g_or_b']; ?>
                        <button class="btn" onclick="editReview(<?php echo $recipeid; ?>, '<?php echo $review['comment']; ?>', <?php echo $review['rating']; ?>, '<?php echo $review['g_or_b']; ?>')">Edit</button>
                        <form style="display: inline;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <input type="hidden" name="delete_comment" value="<?php echo $review['comment']; ?>">
                            <button type="submit" name="delete_review" class="btn">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No reviews yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function editReview(recipeId, comment, rating, type) {
            // Implement your edit logic here, you can redirect to an edit page or show a modal
            alert("Edit review for recipe ID: " + recipeId + "\nComment: " + comment + "\nRating: " + rating + "\nType: " + type);
        }
    </script>
</body>

</html>
