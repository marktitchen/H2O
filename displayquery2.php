<?php
session_start();

if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] != "Admin"))
{
    
      header('Location: logIn.php');
      
        
    
    } else {
        
        $link = "logOut.php";
        $navlink = "Log Out";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>H20 Only</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="1.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="pictures/icon.jpeg" type="image/gif" sizes="16x16">
</head>
<body>


<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getquery2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<div class="topnav" id="myTopnav">
    <a href="index.php"> Home</a>
    <a href="displayquery2.php"class="active"> Query 2</a>
    <a href="administrator.php"> Back to Admin</a>
    <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/water1.jpg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<div class="container">

<h1> Query 2 - Shopping Cart Query </h1>
<br>

<form>
<select name="q" onchange="showUser(this.value)">
  <option value="">Select a Order Details ID:</option>
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
    
    mysqli_select_db($conn,"$dbname");
    $sql="SELECT order_details.orderDetailsID, orders.orderID, order_details.productID, order_details.qtySold, orders.userID
    FROM orders INNER JOIN order_details ON orders.orderID=order_details.orderID";
     
    $result = mysqli_query($conn,$sql);
        echo $sql;
    while($row = mysqli_fetch_array($result)) { 
        echo "<option value=" . $row['orderDetailsID'].">".$row['orderDetailsID']."</option>";
        
    }
   
  ?>
  
  </select>
</form>
<br>
<div id="txtHint"><b>User info will be listed here...</b></div>

<br><br>

</div>

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>

</body>
</html>


<?php
  }
?>