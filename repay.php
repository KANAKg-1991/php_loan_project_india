

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
    <button type="button" ><a class="btn btn-primary"  href="#" >RE PAY</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="account.php" >ACCOUNT</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="logout.php?logout" >LOGOUT</a></button>
</div>





<?php

  if($userRow['paydate']==null){ 
  }else{ 
if($userRow['paydate']=="close"){
}else{if($userRow['paydate']==0){
}else{
    /* echo '<a class="btn btn-primary btn-lg" href="https://p-y.tm/D4lg-QK" role="button">REPAYMENT</a>
<br>';*/
echo'   
<table class="table"> <thead> 
<tr> 
<th> 
<font color=red size=4><b>  REPAYMENT UPI ID </b></font><br> 
<font color=blue size=4>     BHARATPE09893808665@yesbankltd </font><br>

<a href="http://bhimupiloan.online/qr.jpg">
<img src="qr.jpg"  width="100px" height="200px"></a> <br>


<font color=red size=4><b>  REPAYMENT ACCOUNT (INTERNET BANK NEFT ONLY ) </b></font><br> <font color=blue size=4> NAME - NOVOPAY SOLUTION PRIVATE LIMITED<br>
ACCOUNT NUMBER - 11108327891082<br>
IFSC - IDFB0010209 
</font><br>


</th>

</tr> 
</tbody>
 </table>
 



'




;
} }}
?>







<div class="btn-group">
    <button type="button" ><a class="btn btn-primary"  href="profile.php" >PROFILE </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="offer.php" >OFFER ZONE</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="#" >INBOX</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="help.php" >HELP</a></button>
</div>


</body>
</html>
