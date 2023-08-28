
<?php
//Retrieve product names from database
$servername = "localhost:3316";
$username = "root";
$password = "";
$dbname = "cotizacion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT p_descripcion FROM productos";
$result = $conn->query($sql);

$productNames = array();
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $productNames[] = $row["p_descripcion"];
  }
} else {
  echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Add new row when button is clicked
      $("#add-row-btn").click(function() {
        var selectHtml = '<select name="name"><option value=""></option>';
        <?php foreach ($productNames as $name): ?>
          selectHtml += '<option value="<?php echo $name; ?>"><?php echo $name; ?></option>';
        <?php endforeach; ?>
        selectHtml += '</select>';

        var rowHtml = '<tr><td>' + selectHtml + '</td><td><input type="text" name="price"></td></tr>';
        $("#product-table tbody").append(rowHtml);
      });
    });
  </script>
</head>
<body>
  <button id="add-row-btn">Add row</button>
  <table border="2" id="product-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <!-- Table rows will be added dynamically -->
    </tbody>
  </table>
</body>
</html>
```