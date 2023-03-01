<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">  
<style>
table, th, td {border: 1px solid black;}  
input[type=text], select, textarea {
  width: 100%;
  padding: 12px 20px;
  border: 2px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  float: left;
  margin-top: 6px;
  height: 150px;
  box-sizing: border-box;
  font-size: 16px;
  resize: none;}
</style>

<body>
<h1>Smith Johnson</h1>
<h3>Inventory</h3>

<form method = "post">
  <textarea id="querybox" name="querybox" placeholder="Search Product ID here..." style="height:50px"></textarea><br>
  <input type="submit" name = "runquery" value="Search">
  <input type="submit" value="Clear" onclick="javascript:eraseText();">
</form>

<script>
function eraseText() {
    document.getElementById("querybox").value = "";
    window.location.reload(true);}
</script>
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

if(array_key_exists('runquery', $_POST)){
  $nom = $_POST['querybox'];

  $sql = "SELECT * FROM inventory WHERE ProductID = '$nom'";
  $result = mysqli_query($conn, $sql);

  if ($result->num_rows > 0) {
      echo "<br>". "Search results:"."<br>";
      echo "". "Number of rows retrieved: " . $result->num_rows . "<br>";
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
}
$sqls = "SELECT * FROM inventory";
$results = mysqli_query($conn, $sqls);
if ($results->num_rows > 0) {
  echo "<br><br>". "Full list of Inventory:"."<br>";
  echo "". "Number of rows retrieved: " . $results->num_rows . "<br>";
  while($rand = mysqli_fetch_assoc($results)){
      $resultset[]=$rand;
  }
  $htmls = "<table><tr><th>".implode('</th><th>',array_keys($resultset[0])).'</th></tr>';
  foreach($resultset as $set){
      $htmls .= "<tr><td>".implode('</td><td>',$set).'</td></tr>';
  }
  print $htmls.'</table>';} 
else {echo "No results";}

// Close connection
mysqli_close($conn);
?>
<br>
<a href="newinventory.php">Click here to add new inventory</a>
<br><br>
<a href="updateinventory.php">Click here to update inventory</a>
<br><br>
<a href="index.php">Click here to go back to Home</a>
</body>
</html>