 
<?php
require_once 'dbconnect.php';

    $password1 =trim($_POST['password1']);
    $password2 =trim($_POST['password2']);
    $id =trim($_POST['id']);
    
    if($password1==$password2){ 
    $password=hash('sha256', $password1);
    
    $sql = "UPDATE users SET password='".$password."' WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
    
    
    }else{ 
    echo "password incorrect ";}

   
?>
   
        
