
<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
include_once 'dbconnect.php';

if (isset($_POST['signup'])) {

    $uname = trim($_POST['uname']); // get posted data and remove whitespace
    $email = trim($_POST['email']);
    $upass = trim($_POST['pass']);
    $ph = trim($_POST['Ph']);
    $relation = trim($_POST['relation']);
    $ph1 = trim($_POST['ph1']);
    $ph2=$relation."=".$ph1;
    
    $aadhar = trim($_POST['aadhar']);
    $pan = trim($_POST['pan']);
    $address = trim($_POST['address']);
    $pin = trim($_POST['pin']);
    $upi = trim($_POST['upi']);
    $job = trim($_POST['job']);
    $cibil = trim($_POST['cibil']);
    $loan =1000;
    $days =7;
    $Wallet =701.50;
    // hash password with SHA256;
    $password = hash('sha256', $upass);

    // check email exist or not
    $stmt = $conn->prepare("SELECT aadhar FROM users WHERE aadhar=?");
    $stmt->bind_param("s", $aadhar);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) { // if email is not found add user


        $stmts = $conn->prepare("INSERT INTO users(username,email,password,Ph ,ph1,upi,aadhar,pan,cibil,address,pin,job ,loan,days, 
Wallet) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?, ?)");
        $stmts->bind_param("sssssssssssssss", $uname, $email, $password, $ph2 , $ph, $upi, $aadhar , $pan, $cibil, $address, $pin ,$job ,$loan, $days, $Wallet );
        $res = $stmts->execute();//get result
        $stmts->close();

        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location: index.php");
                exit;
            }

        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }

    } else {
        $errTyp = "warning";
        $errMSG = "Aadhar is already used";
    }

}
?>
<!DOCTYPE html>
<head>



<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px/1.8 Lato, sans-serif;
    color: #777;
  }
  h3, h4 {
    margin: 10px 0 30px 0;
    letter-spacing: 10px;      
    font-size: 20px;
    color: #111;
  }
  .container {
    padding: 80px 120px;
  }
  .person {
    border: 10px solid transparent;
    margin-bottom: 25px;
    width: 80%;
    height: 80%;
    opacity: 0.7;
  }
  .person:hover {
    border-color: #f1f1f1;
  }
  .carousel-inner img {
    -webkit-filter: grayscale(90%);
    filter: grayscale(90%); /* make all photos black and white */ 
    width: 100%; /* Set width to 100% */
    margin: auto;
  }
  .carousel-caption h3 {
    color: #fff !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
    }
  }
  .bg-1 {
    background: #2d2d30;
    color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
  .list-group-item:last-child {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail p {
    margin-top: 15px;
    color: #555;
  }
  .btn {
    padding: 10px 20px;
    background-color: #333;
    color: #f1f1f1;
    border-radius: 0;
    transition: .2s;
  }
  .btn:hover, .btn:focus {
    border: 1px solid #333;
    background-color: #fff;
    color: #000;
  }
  .modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-header, .modal-body {
    padding: 40px 50px;
  }
  .nav-tabs li a {
    color: #777;
  }
  #googleMap {
    width: 100%;
    height: 400px;
    -webkit-filter: grayscale(100%);
    filter: grayscale(100%);
  }  
  .navbar {
    font-family: Montserrat, sans-serif;
    margin-bottom: 0;
    background-color: #2d2d30;
    border: 0;
    font-size: 11px !important;
    letter-spacing: 4px;
    opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
    color: #fff !important;
  }
  .navbar-nav li.active a {
    color: #fff !important;
    background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
  }
  .open .dropdown-toggle {
    color: #fff;
    background-color: #555 !important;
  }
  .dropdown-menu li a {
    color: #000 !important;
  }
  .dropdown-menu li a:hover {
    background-color: red !important;
  }
  footer {
    background-color: #2d2d30;
    color: #f5f5f5;
    padding: 32px;
  }
  footer a {
    color: #f5f5f5;
  }
  footer a:hover {
    color: #777;
    text-decoration: none;
  }  
  .form-control {
    border-radius: 0;
  }
  textarea {
    resize: none;
  }
  </style>








<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v4.0&appId=1519031891445712&autoLogAppEvents=1"></script>




<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-7761967572046039",
          enable_page_level_ads: true
     });
</script>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>BHIM UPI LOAN</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
<body>
<center> <font color=green size=8> <b>BHIM UPI LOAN </b></font></center>
<hr>
<marquee>
<font color="green" size="4"><b>
 GET  LOAN INR 100000 FOR 18 MONTH </font></b> </br></marquee> <hr>

<div class="container">

    <div id="login-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class=""> ₹ Apply For Personal Loan  ₹ </h2>
                </div>
<font color=blue size=4>  <b>
Quick disbursal in 5 hours! Starting 1k
Up to ₹1.5 Lakhs from 1.5% monthly
Completely safe & secure online process . advances cherge not applicable .
</b></font>


                <div class="form-group">
                    <hr/>
                </div>

Select Aadhar font upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>

Select Aadhar back upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
Select Pan Card upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
Select Bank passbook or Cheque picture upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
Select Photo upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
Select selfie video :
    <input type="file" name="fileToUpload" id="fileToUpload"><br>



                <?php
                if (isset($errMSG)) {

                    ?>
                    <div class="form-group">
                        <div class="alert alert-<?php echo ($errTyp == "success") ? "success" : $errTyp; ?>">
                            <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="uname" class="form-control" placeholder="Enter Full Name" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                               required/>
                    </div>
                </div>

<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="Ph" class="form-control" placeholder="Enter Phone Number" required/>
                    </div>
                </div> 








<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-send"></span></span>
                        <input type="text" name="upi" class="form-control" placeholder="Enter Bhim or Upi id" required/>
                    </div>
                </div> 

<select class="browser-default custom-select" name="relation">
  <option selected>Select Guardian PH </option>
  <option value="father"> Father</option>
  <option value="Mother"> Mother </option>
  <option value="wife">Wife</option>
  <option value="uncle">Uncle </option>
  <option value="sister"> Sister</option>
  <option value="brother">Brother </option>
  <option value="son"> Son</option>
  <option value="Daughter">Daughter </option>
</select> <br><br>

<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="ph1" class="form-control" placeholder="Enter Guardian Phone Number" required/>
                    </div>
                </div> 



<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="aadhar" class="form-control" placeholder="Enter Aadhar Number" required/>
                    </div>
                </div>

<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="pan" class="form-control" placeholder="Pan Number" required/>
                    </div>
                </div>



<select class="browser-default custom-select" name="job">
  <option selected>  Professional Information </option>
  <option value="salary"> Salary person </option>
  <option value="business">  Self Employ  </option>
</select> <br><br>






<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="cibil" class="form-control" placeholder="Enter Cibil Score" required/>
                    </div>
                </div>






<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="address" class="form-control" placeholder="Full address" required/>
                    </div>
                </div>

<div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                        <input type="text" name="pin" class="form-control" placeholder="Pin Code Number" required/>
                    </div>
                </div>



                <div class="checkbox">
                    <label><input type="checkbox" id="TOS" value="This"><a href="terms.php">I agree with
                            terms of service</a></label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Apply Loan</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="login.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
                </div>

            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

<hr> <center>

<br><br>



<div class="fb-page" 
  data-href="https://m.facebook.com/Bhim-Upi-Loan-110419856997477/"
  data-width="380" 
  data-hide-cover="false"
  data-show-facepile="false"></div> </center>




</body>
</html>
