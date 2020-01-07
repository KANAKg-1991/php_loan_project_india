

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=1519031891445712&autoLogAppEvents=1"></script>


<?php
require_once 'dbconnect.php';

$id1 =trim($_POST['id']);

//$id=$id1;

$stmt = $conn->prepare("SELECT email, username, password, ph1, upi, aadhar, pan , address, Pin, loan, loandate, paydate, statues, days, Wallet, lno FROM users WHERE id='".$id1."'");
    //$stmt->bind_param("s", $email);
    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);


echo "<center><font size=8 color=blue>BHIM UPI LOAN </font><hr>";
if($id1==3){
echo "WARNING! Couldn't Close 1st Loan";
}else{if($id1==1){
//echo "SORRY ! ";
//echo" Your Application Reject for Bank Statements or Credit report problem .<br> Please try Again After 30 days.";
 echo " <br>Your Application is under processing. Please wait, we are  verify all documents . Please check back after few time";
}else{if($id1==2){
echo"WARNING! Close Runing Loan";
}else{
echo "<font size=4 color=green>Congress! <b>".$row['username']."</b> Your Loan Application Successfully Submit .</font><hr></center>";


echo "<font size=6 color=red>Documents Details:</font><br>";



echo "NAME :".$row['username']."<br>"; 
echo "E-MAIL :".$row['email']."<br>"; 
//echo "<th>".$row['password']."</th>"; 
echo "PHONE NUMBER :".$row['ph1']."<br>"; 
echo "UPI ID :".$row['upi']."<br>"; 
echo "AADHAR :".$row['aadhar']."<br>"; 
echo "PAN :".$row['pan']."<br>"; 
echo "ADDRESS :".$row['address']."<br>"; 
echo "PIN :".$row['Pin']."<hr>";
echo" WhatsApp 1year bank Statements & itr last 3 year and 3 months pay clip";
$paydate="close";

$sql = "UPDATE users SET paydate='".$paydate."' WHERE id='".$id1."'";

if ($conn->query($sql) === TRUE) {
    echo " ";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();}}}


?>
<hr>
<center>
<div class="fb-page" 
  data-href="https://m.facebook.com/Bhim-Upi-Loan-110419856997477/"
  data-width="380" 
  data-hide-cover="false"
  data-show-facepile="false"></div> </center>
