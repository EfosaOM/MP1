<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
</style>

<body>
<h1>Smith Johnson</h1>
<h3>Update customer</h3>

<form action="updatecustomer.php" method="post">
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

<br>

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
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert customer data into database
    $sql = "UPDATE customer SET C_Name = '$name', C_Address = '$address', C_Phone = '$phone', C_Email = '$email' WHERE C_Name = '$name';";
    
    if (mysqli_query($conn, $sql)) {
        echo "Customer record updated!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


$sql = "SELECT * FROM customer";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    echo "<br><br>". "Number of rows retrieved: " . $result->num_rows . "<br>";
    while($rand = mysqli_fetch_assoc($result)){
        $resultset[]=$rand;
    }
    $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
    foreach($resultset as $set){
        $htmls .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
    }
    print $htmls.'</table>';
    } 
else {echo "No results";}

// Close database connection
mysqli_close($conn);
?>


<a href="customer.php">Back to Customers page</a>

</body>
</html>