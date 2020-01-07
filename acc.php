 
<?php
require_once 'dbconnect.php';

    $acc1 =trim($_POST['acc1']);
    $acc2 =trim($_POST['acc2']);
    $ifsc =trim($_POST['ifsc']);
    $id =trim($_POST['id']);
    
    if( $acc1==$acc2){ 
  
    $sql = "UPDATE users SET acc='".$acc1."', ifsc='".$ifsc."' WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "Account updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
    
    
    }else{ 
    echo "Account Number incorrect ";}

   
?>
   
        