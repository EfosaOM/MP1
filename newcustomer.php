<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  

<body>
<h1>Smith Johnson</h1>
<h3>Add new customer</h3>

<form action="newcustomer.php" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" id="firstname" name="firstname" required><br><br>

  <label for="lastname">Last Name:</label>
  <input type="text" id="lastname" name="lastname" required><br><br>  

  <label for="address">Address:</label>
  <input type="address" id="address" name="address" required><br><br>

  <label for="city">City:</label>
  <input type="city" id="city" name="city" required><br><br>

  <label for="state">State:</label>
  <input type="state" id="state" name="state" required><br><br>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required><br><br>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required><br><br>

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
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);

    // Insert customer data into database
    $sql = "INSERT INTO customer (C_FirstName, C_LastName, C_Address, C_City, C_State, C_Phone, C_Email) VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$phone', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "New customer added!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
// Close database connection
mysqli_close($conn);
?>

<br><br>
<a href="customer.php">Back to Customers page</a>

</body>
</html>