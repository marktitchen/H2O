<?php
session_start();
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
if((!isset($_SESSION['user'])) || ($_SESSION['user']['accountCategory'] != "Customer"))
{
    
      header('Location: logIn.php');
      
        
    
    } else {
        
        $link = "logOut.php";
        $navlink = "Log Out";

$connect = mysqli_connect("localhost", "root", "", "h20");


if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="customer.php"</script>';
			}
		}
	}
}

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
  <a href="shop.php" class="active">Shop</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/water1.jpg" class="responsiveHeaderImage" width="600px" height="436px"> </div>
		<br />
		<div class="container">
			
			<br /><br />
			<?php
				$query = "SELECT * FROM products ORDER BY productID ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			
				<form method="post" action="customer.php?action=add&id=<?php echo $row["productID"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						
						<h4 class="text-info"><?php echo $row["productName"]; ?></h4>
						<h4 class="text-danger">£ <?php echo $row["sellPrice"]; ?></h4>
						<input type="text" name="quantity" value="1" class="form-control" />
						<input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>" />
						<input type="hidden" name="hidden_price" value="<?php echo $row["sellPrice"]; ?>" />
						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
					</div>
				</form>
			
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="10%">Product ID</th>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_id"]; ?></td>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>£ <?php echo $values["item_price"]; ?></td>
						<td>£ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="customer.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="4" align="right">Total</td>
						<td align="right">£ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                       
					</tr>

					<?php
					}
					
					?>
						
				</table>
				<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						?>
					<form action="functions.php" method="post">
						<input type="hidden" name="total" value="<?php echo $total; ?>" />
						
                        <button type="submit" name="userchoice" value="processorder" class="registerbtn">Process Order</button>
                    </form>
					<?php
					}
					?>
			</div>
		</div>
	</div>
	<br />

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
