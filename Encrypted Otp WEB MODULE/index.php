<!DOCTYPE html>
<html>
<head>
	<title>CYBERGAINTS</title>
</head>
<body bgcolor="#A9A9A9">
    <center>
<div class="container">
<h1 class="text-center">WELCOME TO ENCRYPTED OTP YOU ARE SECURED</h1>
<hr>
	<div class="row">
	<div class="col-md-9 col-md-offset-2">
		<?php
			if(isset($_POST['sendopt'])) {
				require('textlocal.class.php');
				require('credential.php');

				$textlocal = new Textlocal(false, false, API_KEY);

                // You can access MOBILE from credential.php
				// $numbers = array(MOBILE);
                // Access enter mobile number in input box
                                $numbers = array($_POST['mobile']);
				$sender = 'TXTLCL';
				$otp1 = mt_rand(1000, 9999);
                                //$salt='cybergaints';
                                $otp=base64_encode($otp1);
				$message = $otp;

				try {
				    $result = $textlocal->sendSms($numbers, $message, $sender);
				    setcookie('otp', $otp1);
				    echo "otp successfully send..";
				} catch (Exception $e) {
				    die('Error: ' . $e->getmessage());
				}
			}

			if(isset($_POST['verifyotp'])) { 
				$otp1 = $_POST['otp'];
				if($_COOKIE['otp'] == $otp1) {
					echo "Congratulation, Your mobile is verified.";
				} else {
					echo "Please enter correct otp.";
				}
			}
		?>
	</div>
    <div class="col-md-9 col-md-offset-2">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="uname">Name</label>
                    <input type="text" class="form-control" id="uname" name="uname" value="" maxlength="10" placeholder="Enter your name" required=""><br/><br/>
                </div>
            </div>
              <label for="uname">ACC No</label>
            <input type="text" name="acc no" placeholder="enter you acc no"><br><br>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="" maxlength="10" placeholder="Enter valid mobile number" required=""><br/><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="sendopt" style="background-color: #696969">Send otp</button><br/><br>
                </div>
            </div>
            </form>
            <form method="POST" action="">
            <div class="row">
                <div class="col-sm-9 form-group">
                    <label for="otp">OTP</label>
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter otp" maxlength="" required=""><br><br>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-9 form-group">
                    <button type="submit" name="verifyotp" style="background-color: #696969">Verify</button><br><br>
                </div>
            </div>
        </form>
	</div>
</div>
</center>
</body>
</html>
