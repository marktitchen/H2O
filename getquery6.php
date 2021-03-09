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
    //$sql="SELECT orders.orderID, customers.customerName, payment_type.paymentMethod, shopping_method.shopMethod
    //FROM (((orders
    //INNER JOIN customers on orders.customerID = customers.customerID)
    //INNER join payment_type on orders.paymentTypeID = payment_type.paymentTypeID)
    //INNER join shopping_method on orders.paymentTypeID = shopping_method.methodID)";
    //$result = mysqli_query($conn,$sql);


    $sql="SELECT orders.orderID, customers.customerName, payment_type.paymentMethod, shopping_method.shopMethod
    FROM (((orders
    INNER JOIN customers on orders.userID = customers.userID)
    INNER join payment_type on orders.paymentTypeID = payment_type.paymentTypeID)
    INNER join shopping_method on orders.paymentTypeID = shopping_method.methodID)
    WHERE orders.orderID = $q";
    $result = mysqli_query($conn,$sql);



echo"
<table>
<tr>
<th>orderID</th>
<th>Customer Name</th>
<th>Payment Method</th>
<th>Shop Method </th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['orderID'] . "</td>";
    echo "<td>" . $row['customerName'] . "</td>";
    echo "<td>" . $row['paymentMethod'] . "</td>";
    echo "<td>" . $row['shopMethod'] . "</td>";
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
