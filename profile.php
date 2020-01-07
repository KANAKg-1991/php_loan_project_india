

<?php

ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


// select logged in users detail
$res = $conn->query("SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
  
  
  
</head>
<center>
<font color=black size= 8> <b>BHIM UPI LOAN </b></font></center>
<hr>


<ul class="progressbar"  style="width:100%" >
            <li class="active">Submitted</li>
            <li  <?php if($userRow['statues']=="approve"){ 
    echo 'class="active"'; }else{}?>
      >Approved</li>
                  
            <li    <?php if($userRow['paydate']==null){}else{  echo 'class="active"';   }  ?>   >Disbursed</li>
            <li    <?php if($userRow['paydate']==0){
            echo 'class="active"'; }else{ if($userRow['paydate']=='close'){ echo 'class="active"';   }else{}}  ?>    >Repayment</li>
        </ul>
    </div>
    
<br>
<body>

<div class="btn-group">
    <button type="button" ><a class="btn btn-primary"  href="index.php" >LOAN </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="repay.php" >RE PAY</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="account.php" >ACCOUNT</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="logout.php?logout" >LOGOUT</a></button>
</div>


<div class="alert alert-warning">


<font color="#FF00FF" size =4 > CASTOMAR ID </font> - 
    <font color="BLACK" size =4 > bUL2019n<?php echo $userRow['id']; ?>xTK</font>


<?php 


echo "<font size=6 color=red>Documents Details:</font><br>";



echo "NAME :".$userRow['username']."<br>"; 
echo "E-MAIL :".$userRow['email']."<br>"; 
//echo "<th>".$row['password']."</th>"; 
echo "PHONE NUMBER :".$userRow['ph1']."<br>"; 
echo "UPI ID :".$userRow['upi']."<br>"; 
echo "AADHAR :".$userRow['aadhar']."<br>"; 
echo "PAN :".$userRow['pan']."<br>"; 
echo "ADDRESS :".$userRow['address']."<br>"; 
echo "PIN :".$userRow['Pin']."<hr>";

?>

</div>

<div class="btn-group">
    <button type="button" ><a class="btn btn-primary"  href="profile.php" >PROFILE </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="offer.php" >OFFER ZONE</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="#" >INBOX</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="help.php" >HELP</a></button>
</div>


</body>
</html>
