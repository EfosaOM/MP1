<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
</style>

<body>
<h1>Smith Johnson</h1>
<h3>Update product</h3>

<form action="updateproduct.php" method="post">
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
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    // Insert product data into database
    $sql = "UPDATE product SET P_Name = '$name', P_Description = '$description', P_Type = '$type', P_Price = '$price' WHERE P_Name = '$name';";
    
    if (mysqli_query($conn, $sql)) {
        echo "Product record updated!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


$sql = "SELECT * FROM product";
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


<a href="product.php">Back to Products page</a>

</body>
</html>