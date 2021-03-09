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
  <a href="signup.php" class="active">Sign Up</a>
  <a href="logIn.php"> Log In</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/water1.jpg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

  <form action="functions.php" method="post">
    <div class="container">
      <h1>Sign Up </h1>
   
        <form action="functions.php" method="post">
          Business Name: <input type="text" name="customerName" /><br><br>
          First Name: <input type="text" name="fName" /><br><br>
          Last Name: <input type="text" name="lName" /><br><br>
          Address: <input type="text" name="customerAddress" /><br><br>
          Town: <input type="text" name="customerTown" /><br><br>
          Post Code: <input type="text" name="customerPostCode" /><br><br>
          Number: <input type="text" name="customerNumber" /><br><br>
          Email: <input type="text" name="userEmail" required/><br><br>
          Password: <input type="password" name="userPassword" required/><br><br>
        <button type="submit" name="userchoice" value="registercustomer" class="registerbtn">Sign Up</button>
    </div>
  </form>
</div>

</body>
</html>
