<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Smith Johnson</h1>
<h3>Add new product</h3>

<form action="newproduct.php" method="post">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required><br><br>

  <label for="description">Description:</label>
  <input type="description" id="description" name="description" required><br><br>

  <label for="type">Type:</label>
  <input type="type" id="type" name="type" required><br><br>

  <label for="price">Price:</label>
  <input type="price" id="price" name="price" required><br><br>

  <input type="submit" name="submit" value="Submit">
</form>

<br><br>

<?php
// database credentials
$servername = "MYSQL5031.site4now.net";
$username = "a951e5_efosaom";
$password = "z5bJkCKp4KZ8x@h";
$dbname = "db_a951e5_efosaom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(array_key_exists('submit', $_POST)) {
    // Get values submitted through form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    // Insert customer data into database
    $sql = "INSERT INTO product (P_Name, P_Description, P_Type, P_Price) VALUES ('$name', '$description', '$type', '$price')";
    if (mysqli_query($conn, $sql)) {
        echo "New product added!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
// Close database connection
mysqli_close($conn);
?>

<br><br>
<a href="product.php">Back to Products page</a>

</body>
</html>