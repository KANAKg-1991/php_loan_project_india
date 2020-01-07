

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=1519031891445712&autoLogAppEvents=1"></script>


<?php
require_once 'dbconnect.php';

$id1 =trim($_POST['id']);
$withdrow =trim($_POST['withdrow']);
$Wallet=701-$withdrow;
//$id=$id1;

$stmt = $conn->prepare("SELECT email, username, password, ph1, upi, aadhar, pan , address, Pin, loan, loandate, paydate, statues, days, Wallet, lno, acc, ifsc FROM users WHERE id='".$id1."'");
    //$stmt->bind_param("s", $email);
    /* execute query */
    $stmt->execute();
    //get result
    $res = $stmt->get_result();
    $stmt->close();

    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);


echo "<center><font size=8 color=blue>BHIM UPI LOAN </font><hr>";



if($withdrow<=501){if($withdrow>=400){    

echo "<font size=4 color=green>Congress! <b>".$row['username']."</b> we are happy to inform you that your loan request is approved. Money Rs ".$withdrow." will be disbursed to your linked bank account soon .(BANKING HOUR 9.00 AM TO 6.00 PM) <b> Loan Time- 7days . Repayment amount - Rs1000 </b></font><hr></center>";


echo "<font size=6 color=red>Documents Details:</font><br>";



echo "NAME :".$row['username']."<br>"; 
echo "E-MAIL :".$row['email']."<br>"; 
//echo "<th>".$row['password']."</th>"; 
echo "PHONE NUMBER :".$row['ph1']."<br>"; 
echo "UPI ID :".$row['upi']."<br>"; 
echo "AADHAR :".$row['aadhar']."<br>"; 
echo "PAN :".$row['pan']."<br>"; 
echo "ADDRESS :".$row['address']."<br>"; 
echo "PIN :".$row['Pin']."<br>";

echo "<b>LOAN TIME : 7 DAYS</b><br>";
echo "<b>REPAYMENT AMOUNT : Rs - 1000</b><br>";
echo "ACCOUNT NUMBER :".$row['acc']."<br>";
echo "IFSC CODE :".$row['ifsc']."<hr>";


$sql = "UPDATE users SET withdraw='".$withdrow."', Wallet='".$Wallet."' WHERE id='".$id1."'";

if ($conn->query($sql) === TRUE) {
    echo " ";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();}else{echo "<center><font size=4 color=red>Wallet Minimum  Balance maintenance INR 200 (Refundeble) if no need loan or Reject Application  .<br> Please Enter Amount Rs 400 TO  RS 501 Maximum . </font><hr>";}
}else
{echo "<center><font size=4 color=red>Wallet Minimum  Balance maintenance INR 200 (Refundeble) if no need loan or Reject Application  .<br> Please Enter Amount Rs 400 TO  RS 501 Maximum . </font><hr>";}
?>
<hr>
<center>
<div class="fb-page" 
  data-href="https://m.facebook.com/Bhim-Upi-Loan-110419856997477/"
  data-width="380" 
  data-hide-cover="false"
  data-show-facepile="false"></div> </center>
