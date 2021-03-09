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

<div class="topnav" id="myTopnav">
<a href="index.php"> Home</a>
  <a href="administrator.php"class="active"> Admin</a>
  <a href="<?php echo $link; ?>"> <?php echo $navlink; ?> </a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
  <i class="fa fa-bars"></i> </a>
</div>

<div class="header"> <img src="pictures/water1.jpg" class="responsiveHeaderImage" width="600px" height="436px"> </div>

<div class="container"> 

<h1> Admin Dash Board </h1><br>

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 270px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>

<div class="gallery">
    <a href="displayuserid.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc">Display user id </div>
</div>
<div class="gallery">
    <a href="displayquery1.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 1 </div>
</div>
<div class="gallery">
    <a href="displayquery2.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 2 </div>
</div>
<div class="gallery">
    <a href="displayquery3.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 3 </div>
</div>
<div class="gallery">
    <a href="displayquery4.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 4 </div>
</div>
<div class="gallery">
    <a href="displayquery5.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 5 </div>
</div>
<div class="gallery">
    <a href="displayquery6.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 6 </div>
</div>
<div class="gallery">
    <a href="displayquery7.php"> <img src="pictures/graph.jpg" alt="Mike" style="width:100%"></a>
    <div class="desc"> Query 7 </div>
</div>
</div>

<br><br>

</body>
</html>


<?php
  }
?>
