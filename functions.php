<?php
session_start();


function registerCustomer() {

    include("connect.php");
    
    if(isset($_POST)){
        $useremail = $_POST['userEmail'];
        $userpassword = $_POST['userPassword'];   
        $customername = $_POST['customerName'];
        $customeraddress = $_POST['customerAddress'];
        $customertown= $_POST['customerTown'];
        $customerpostcode= $_POST['customerPostCode'];
        $customernumber= $_POST['customerNumber'];
    }
    
    $sql = "INSERT INTO tbl_login (userPassword, userEmail)
    VALUES ('$userpassword', '$useremail')";

    
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);

        $_SESSION['user']['userID'] = $last_id;
        
        $sql2 = "INSERT INTO customers (userID, customerName, customerAddress, customerTown, customerPostCode, customerNumber)
        VALUES ('$last_id', ' $customername', '$customeraddress', '$customertown', '$customerpostcode', '$customernumber')";
        if (mysqli_query($conn, $sql2)) {
                        
            echo "New record created successfully. Last inserted ID is: " . $last_id;
            header('Location: success.php');
        } 

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
  
  
}

// works 10th May
function logInCustomer() {   
    include("connect.php");
  
    if(isset($_POST)){
        $useremail = $_POST['userEmail'];
        $userpassword = $_POST['userPassword'];
    }
        $sql = "SELECT * FROM tbl_login WHERE userEmail = '$useremail' AND userPassword = '$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // check the category of the user and redirect
            while($row = $result->fetch_assoc()) {
                $_SESSION['user']['userID'] = $row['userID'];
                $_SESSION['user']['accountCategory'] = $row['accountCategory'];

                $accountCategory = $row['accountCategory'];
                if ($accountCategory == 'Customer') {
                    header('Location: customer.php');
                } elseif ($accountCategory == 'Admin') {
                    header('Location: administrator.php');    
                } else {
                    header('Location: logIn.php');    
                }
            }
        } else {
            header('Location: logIn.php');  
        }       
}



function processOrder() {
     
    if(isset($_SESSION['user']))
    {
    include("connect.php");
    //$userid = $_SESSION['user']['userID'];
    $userid = $_SESSION['user']['userID'];
    $employeeid = 1;
    $methodid = 1;
    $paymentid = 1;
        
    if(isset($_POST)){
       $ordertotal = $_POST['total'];
    }
   
   $sql = "INSERT INTO orders (total, userID, employeeID, methodID, paymentTypeId)
   VALUES ('$ordertotal', $userid, $employeeid, $methodid, $paymentid)"; 

   if (mysqli_query($conn, $sql)) {
       $order_id = mysqli_insert_id($conn);

        foreach($_SESSION['shopping_cart'] as $cartItem){
            foreach($cartItem as $key => $value){
                if($key == 'item_id'){
                    
                    $sql2 = "INSERT INTO order_details (productID, orderID) VALUES ($value, $order_id)";
                        if (mysqli_query($conn, $sql2)) {
                            $last_id = mysqli_insert_id($conn);
                        }
                }
            }
        }

        unset($_SESSION['shopping_cart']);
        echo "New record created successfully.";
        //echo $ordertotal;
        //echo $userid;
        $endURL = "?orderid=".$last_id."&price=".$ordertotal;
      
       header('Location: processorder.php'.$endURL); 
   
   } else {
       echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
    
    mysqli_close($conn);
}else{
    header('Location: processorder.php');
}
}













   
// works 10th may
function errorCatch() {
    //code to be executed;
    echo "Error Catch Function";
}


if(isset($_POST)){
    $userChoice = $_POST['userchoice'];

    switch ($userChoice) {
        case "processorder": processOrder();break;
        case "logincustomer": logInCustomer(); break;
        case "registercustomer": registerCustomer();break;
        case "registerstaff": registerStaff();break;
        case "testfunction": testFunction();break;
        case "leavefeedback": leaveFeedBack(); break;
        case "resetmemberpassword": resetMemberPassword(); break;
        default: errorCatch();
    }
}

?>