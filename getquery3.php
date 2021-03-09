<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$orderid = "orderID";
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
    $sql="SELECT orders.orderID, customers.customerName, orders.orderDate
    FROM orders
    INNER JOIN customers ON orders.userID=customers.userID WHERE orders.orderID = $q";
    $result = mysqli_query($conn,$sql);



echo"
<table>
<tr>
<th>Order ID</th>
<th>Customer Name</th>
<th>Order Date</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "<td>" . $row['orderDate'] . "</td>";
    echo "</tr>";
    
    $orderid = $row['orderID'];
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
