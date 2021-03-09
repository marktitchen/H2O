<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$shippingno = "shippingNo";
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
    $sql="SELECT shipping_details.shippingNo, orders.orderID, orders.employeeID, shipping_details.deliveryStatusID
    FROM (employees RIGHT JOIN (customers RIGHT JOIN orders ON customers.userID = orders.userID) 
    ON employees.employeeID = orders.employeeID) 
    RIGHT JOIN shipping_details ON orders.orderID = shipping_details.orderID WHERE shipping_details.shippingNo = $q";
    $result = mysqli_query($conn,$sql);




echo"
<table>
<tr>
<th>Shipping No</th>
<th>Order ID</th>
<th>Employee ID</th>
<th>Delivery Status</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['shippingNo'] . "</td>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['employeeID'] . "</td>";
    echo "<td>" . $row['deliveryStatusID'] . "</td>";
    echo "</tr>";
    
    $shippingno = $row['shippingNo'];
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
