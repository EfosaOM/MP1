<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Smith Johnson</h1>
<h3>Add new order</h3>

<form action="neworders.php" method="post">
  <label for="customerid">CustomerID:</label>
  <input type="customerid" id="customerid" name="customerid" required><br><br>

  <label for="address">Address:</label>
  <input type="address" id="address" name="address" required><br><br>

  <label for="productid">ProductID:</label>
  <input type="productid" id="productid" name="productid" required><br><br>

  <label for="quantity">Quantity:</label>
  <input type="quantity" id="quantity" name="quantity" required><br><br>

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
    $customerid = mysqli_real_escape_string($conn, $_POST['customerid']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $productid = mysqli_real_escape_string($conn, $_POST['productid']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);

    // Insert customer data into database
    $sql = "INSERT INTO orders (CustomerID, O_Address) VALUES ('$customerid', '$address')";
    if (mysqli_query($conn, $sql)) {
        echo "New order added!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
// Close database connection
mysqli_close($conn);
?>

<br><br>
<a href="orders.php">Back to Orders page</a>

</body>
</html>