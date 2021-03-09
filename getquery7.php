<!DOCTYPE html>
<html>
<head>

<?php
$q = $_GET['q'];
$shippingno = "shippingNo";
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
    $sql="SELECT shipping_details.shippingNo, shippers.shipperID, delivery_status.deliveryStatus
    FROM ((shipping_details
    INNER JOIN shippers on shipping_details.shippingNo = shippers.shipperID)
    INNER join delivery_status on shipping_details.shippingNo = delivery_status.deliveryStatusID)
    WHERE shipping_details.shippingNo = $q";
    $result = mysqli_query($conn,$sql);

   
echo"
<table>
<tr>
<th>Shipping No</th>
<th>Shipper ID</th>
<th>Delivery Status</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['shippingNo'] . "</td>";
    echo "<td>" . $row['shipperID'] . "</td>";
    echo "<td>" . $row['deliveryStatus'] . "</td>";
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
