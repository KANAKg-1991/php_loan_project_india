<?php
$conn = new mysqli("192.168.0.100", "bhimupil_b", "KANAKg-1991");
mysqli_select_db($conn,"bhimupil_B");
//search code
//error_reporting(0);
if($_REQUEST['submit']){
$name = $_POST['name'];

if(empty($name)){
	$make = '<h4>You must type a word to search!</h4>';
}else{
	$make = '<h4>No match found!</h4>';
	$sele = "SELECT * FROM users WHERE username LIKE '%$name%' OR email LIKE '%$name%'OR ph1 LIKE '%$name%'OR paydate LIKE '%$name%'OR id LIKE '%$name%'";
	$result = mysqli_query($conn,$sele);
	
	if($mak = mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
		// while($row = mysqli_fetch_array($result)){   
		echo '<h4> Id						: '.$row['id'];
		echo '<br> name						: '.$row['username'];
 	        echo '<br> email			         	: '.$row['email'];
                echo '<br> phone			         	: '.$row['ph1'];
                 echo '<br> paydate			         	: '.$row['paydate'];
                 echo '<br> 2nd Ph			         	: '.$row['Ph'];
                  echo '<br> Acc no		         	: '.$row['acc'];
                   echo '<br> ifsc			         	: '.$row['ifsc'];
                   echo '<br> otp			         	: '.$row['otp'];
                    echo '<br> last admin update			         	: '.$row['admin'];
        	echo '</h4>';
	}
}else{
echo'<h2> Search Result</h2>';

print ($make);
}
mysqli_free_result($result);
mysqli_close($conn);
}
}

?>
