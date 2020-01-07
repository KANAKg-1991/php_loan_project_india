

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  
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



 <div class="alert alert-success">


<font color="#FF00FF" size =6 >OFFRE ZONE  </font> <br>
  <?php 
  if($userRow['lno'] ==null){

echo   '<font color=green size=4>Cibil Score </font> :<b> <i class="fa fa-dashboard "style="font-size:28px;color: yellow" >
</i> '. $userRow['cibil'].'</b><br><br>';

echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    <i class="fa fa-unlock"  style="font-size:28px;color: orange" > <i class="fa fa-inr" style="font-size:48px;color:white">  1,00,000 </i> </i>
  </button><br><br>';
  echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">
    <i class="fa fa-lock"  style="font-size:28px;color: orange" > <i class="fa fa-inr" style="font-size:48px;color: white">  2,00,000 </i> </i>
  </button><br>';

}else{
echo "<font color=green size=4>Cibil Score </font>  :<b>".$userRow['cibil']."</b><br>";
echo "<font color=green size=4>&nbsp Congress , you are <br>
  <strong>
Unlock credit amount INR <b>25000 </b>Rs .<br> &nbsp 
</strong>
</font><br>";

}
  
?> 
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <table class="table"> <thead> 

</thead> <tbody>
 <tr class="table-primary"> 
<td></td> 
<td>Loan Amount</td>
 <td></td> 
<td>INR  1,00,000 </td> </tr>
 <tr class="table-secondary"> 
<td></td> 
<td>On Boarding Fee <b>FIRST TIME</b></td> 
<td></td> 
<td>INR 100</td> </tr>
 <tr class="table-success"> 
<td></td>
 <td>Processing Fee</td> 
<td></td>
 <td>INR  1,500</td> </tr> 
<tr class="table-info"> 
<td></td>
 <td>OTHER CHARGE 18%on  Processing Fees @</td> 
<td></td> 
<td>INR 270</td> </tr> 
<tr class="table-warning"> 
<td></td> 
<td>Total Interest Year @ 18%</td>
 <td></td> 
<td>INR 1500 Monthly</td> </tr> 
<tr class="table-danger"> 
<td></td>
 <td>Disbursal Amount</td> 
<td></td> 
<td><font size=4 color=green><b> INR 98,230</b>
</font>
</td> 
</tr> 
<tr class="table-active"> 
<td></td>
 <td>  Disbursal Date  </td>
 <td></td>
 <td>  </td> </tr> 
<tr class="table-light"> 
<td></td>
 <td>Bhim Account</td>
 <td></td> 
<td>   <?php echo $userRow['upi'] ;?>   </td> </tr> 
<tr class="table-dark"> 
<td></td>
 <td>penalty charge </td> 
<td></td>
<td>100rs/week</td> </tr> 
</tbody>
 </table></div>
 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
  </div>
  </div></div>
  
  
  <div class="modal" id="myModal2">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <table class="table"> <thead> 

</thead> <tbody>
 <tr class="table-primary"> 
<td></td> 
<td>Loan Amount</td>
 <td></td> 
<td>INR  2,00,000 </td> </tr>
 <tr class="table-secondary"> 
<td></td> 
<td>On Boarding Fee <b>FIRST TIME</b></td> 
<td></td> 
<td>INR 100</td> </tr>
 <tr class="table-success"> 
<td></td>
 <td>Processing Fee</td> 
<td></td>
 <td>INR  3,000</td> </tr> 
<tr class="table-info"> 
<td></td>
 <td>OTHER CHARGE 18%on  Processing Fees @</td> 
<td></td> 
<td>INR 540</td> </tr> 
<tr class="table-warning"> 
<td></td> 
<td>Total Interest Year @ 18%</td>
 <td></td> 
<td>INR 3000 Monthly</td> </tr> 
<tr class="table-danger"> 
<td></td>
 <td>Disbursal Amount</td> 
<td></td> 
<td><font size=4 color=green><b> INR 1,96,460</b>
</font>
</td> 
</tr> 
<tr class="table-active"> 
<td></td>
 <td>  Disbursal Date  </td>
 <td></td>
 <td>  </td> </tr> 
<tr class="table-light"> 
<td></td>
 <td>Bhim Account</td>
 <td></td> 
<td>   <?php echo $userRow['upi'] ;?>   </td> </tr> 
<tr class="table-dark"> 
<td></td>
 <td>penalty charge </td> 
<td></td>
<td>100rs/week</td> </tr> 
</tbody>
 </table></div>
 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
  </div>
  </div></div>
  
  
  
  
  
  
<form action="/apply_loan.php" method="post">
    <div class="form-group">
     
         
      

<?php
//<input type="hidden" class="form-control" id="id" name="id"  value="?php echo $userRow['id']; ? ">

  if($userRow['paydate']==null){ 
  echo '<input type="hidden" class="form-control" id="id" name="id"value="3">';
   echo '<br><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal4">
     Apply Loan
  </button><br><br>';
}else{ 
if($userRow['paydate']=="close"){
echo '<input type="hidden" class="form-control" id="id" name="id"  value="1">';
echo '<input type="hidden" class="form-control" id="id" name="id"  value="2">';
echo '<br><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal3">
     Loan Status
  </button><br><br>';

}else{if($userRow['statues']==1){

echo "  <font color=red>  Loan application Reject for credit score problem .<br> wallet balance auto credit  before 30 day . </font>";

}else{  


if($userRow['paydate']==0){
echo " Before  apply sent WhatsApp .<br>";
echo '<div class="checkbox">
<input type="checkbox" id="TOS" value="This"> 1 year bank Statements .<br>
<input type="checkbox" id="TOS" value="This">  3 year itr and from 16A .<br>
<input type="checkbox" id="TOS" value="This">  3 month pay cilip (if you have) .<br>
 </div>';

 echo '<input type="hidden" class="form-control" id="id" name="id"  value="'.$userRow['id'].'">';
echo  '  <input type="submit" class="form-control"  value="Apply Loan"> ';
      }else{
      echo '<br><button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal4">
     Apply Loan
  </button><br><br>';
} }}}
?>


  </form>

<div class="modal" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">

 Your Application is under processing. Please wait, we are  verify all documents . 
 Please check back after few time .


</div>
 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
  </div>
  </div></div>
  
  <div class="modal" id="myModal4">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">

 WARNING! Couldn't Close 1st Loan .


</div>
 <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
  </div>
  </div></div>
</div>

</div>





<div class="btn-group">
    <button type="button" ><a class="btn btn-primary"  href="profile.php" >PROFILE </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="offer.php" >OFFER ZONE</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="#" >INBOX</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="help.php" >HELP</a></button>
</div>



</body>
</html>
