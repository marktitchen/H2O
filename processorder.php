<?php
session_start();

if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] != "Customer"))
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

<div class="topnav" id="myTopnav">
  <a href="index.php"> Home</a>
  <a href="processorder.php" class="active"> Process Order</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/water1.jpg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<h2> Process Order </h2>

<?php
if(isset($_GET['orderid'])){
    $orderId = $_GET['orderid'];
    $price = $_GET['price'];
   
}

?>


<h2> Your order has been placed: Order Id = <?php echo $orderId; ?> Price = <?php echo $price; ?> </h2>




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

