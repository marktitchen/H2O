<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$orderdetailsid = "orderDetailsID";
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
    //$sql="SELECT shipping_details.shippingNo, orders.orderID, shipping_details.deliveryStatusID
    //FROM orders  INNER JOIN shipping_details on shipping_details.shippingNo = orders.orderID WHERE shippingNo = '".$q."'ORDER BY `shipping_details`.`shippingNo` ASC ";
    //$sql="INNER JOIN shipping_details on shipping_details.shippingNo = orders.orderID ORDER BY `shipping_details`.`shippingNo` ASC"
    //$result = mysqli_query($conn,$sql);

    mysqli_select_db($conn,"$dbname");
    $sql="SELECT order_details.orderDetailsID, orders.orderID, order_details.productID, order_details.qtySold, orders.userID
    FROM orders INNER JOIN order_details ON orders.orderID=order_details.orderID WHERE order_details.orderDetailsID = $q";
    $result = mysqli_query($conn,$sql);



echo"
<table>
<tr>
<th>orderDetailsID</th>
<th>orderID</th>
<th>productID</th>
<th>qtySold</th>
<th>User ID</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['orderDetailsID'] . "</td>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['productID'] . "</td>";
    echo "<td>" . $row['qtySold'] . "</td>";
    echo "<td>" . $row['userID'] . "</td>";
    echo "</tr>";
    
    $orderdetailsid = $row['orderDetailsID'];
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
