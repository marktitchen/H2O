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
    //mysqli_select_db($conn,"$dbname");
    //$sql="SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
   // FROM Orders INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID";
    //$result = mysqli_query($conn,$sql);

    mysqli_select_db($conn,"$dbname");
    //$sql="SELECT orders.orderID, customers.customerName, orders.employeeID, shipping_details.shipperID
    //FROM (employees RIGHT JOIN (customers RIGHT JOIN orders ON customers.customerID = orders.customerID) 
    //ON employees.employeeID = orders.employeeID) RIGHT JOIN shipping_details ON orders.orderID = shipping_details.orderID";
    

    $sql="SELECT orders.orderID, customers.customerName, orders.employeeID, shipping_details.shipperID
    FROM (employees RIGHT JOIN (customers RIGHT JOIN orders ON customers.userID = orders.userID) 
    ON employees.employeeID = orders.employeeID) 
    RIGHT JOIN shipping_details ON orders.orderID = shipping_details.orderID WHERE orders.orderID = $q";
    $result = mysqli_query($conn,$sql);




echo"
<table>
<tr>
<th>orderID</th>
<th>Customer Name</th>
<th>Employee ID</th>
<th>Shipper ID</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "<td>" . $row['employeeID'] . "</td>";
    echo "<td>" . $row['shipperID'] . "</td>";
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
