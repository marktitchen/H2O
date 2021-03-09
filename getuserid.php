<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$userid = "userID";
$customername = "customerName";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "h20";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($conn,"$dbname");
$sql="SELECT * FROM customers WHERE userID = '".$q."'";
$result = mysqli_query($conn,$sql);


echo"
<table>
<tr>
<th>User ID</th>
<th>Business Name</th>



</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['userID'] . "</td>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "</tr>";
    
    $userid = $row['userID'];
}
echo "</table>";
mysqli_close($conn);

?>


<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
</body>
</html>














