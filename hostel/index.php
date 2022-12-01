<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$emailreg=$_POST['emailreg'];
$p=$_POST['password'];
$password=hash('sha512', $p);
$stmt=$mysqli->prepare("SELECT email,password,id FROM userregistration WHERE (email=? || regNo=?) and password=? ");
				$stmt->bind_param('sss',$emailreg,$emailreg,$password);
				$stmt->execute();
				$stmt -> bind_result($email,$password,$id);
				$rs=$stmt->fetch();
				$stmt->close();
				$_SESSION['id']=$id;
				$_SESSION['login']=$emailreg;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
             $uid=$_SESSION['id'];
             $uemail=$_SESSION['login'];
$ip=$_SERVER['REMOTE_ADDR'];
$geopluginURL='http://www.geoplugin.net/php.gp?ip='.$ip;
$addrDetailsArr = unserialize(file_get_contents($geopluginURL));
$city = $addrDetailsArr['geoplugin_city'];
$country = $addrDetailsArr['geoplugin_countryName'];
$log="insert into userLog(userId,userEmail,userIp,city,country) values('$uid','$uemail','$ip','$city','$country')";
$mysqli->query($log);
if($log)
{
header("location:dashboard.php");
				}
}
				else
				{
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
			}
				?>

<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    <title>Student Hostel Registration</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">>
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <link rel="stylesheet" href="css/fileinput.min.css">
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/validation.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
    function valid() {
        if (document.registration.password.value != document.registration.cpassword.value) {
            alert("Password and Re-Type Password Field do not match  !!");
            document.registration.cpassword.focus();
            return false;
        }
        return true;
    }
    </script>
</head>

<body>
    <?php include('includes/header.php');?>
    <div class="ts-main-content">
        <?php include('includes/sidebar.php');?>
        <div class="content-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">

                        <h2 class="page-title">User Login </h2>

                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="well row pt-2x pb-3x bk-light">
                                    <div class="col-md-8 col-md-offset-2">

                                        <form action="" class="mt" method="post">
                                            <label for="" class="text-uppercase text-sm">Email / Registration
                                                Number</label>
                                            <input type="text" placeholder="Email / Registration Number" name="emailreg"
                                                class="form-control mb" required="true">
                                            <label for="" class="text-uppercase text-sm">Password</label>
                                            <input type="password" placeholder="Password" name="password"
                                                class="form-control mb" required="true">

                                            <!-- <label for="">Enter Captcha</label>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text"  class="form-control" readonly id="capt" id="captchaValue">
                                                </div>

                                                 <p>huhhhhh</p> -->
                                            <!-- <div class="form-group col-md-6"> -->
                                            <!-- <input type="text" class="form-control" id="textinput"> -->
                                            <!-- </div> -->
                                            <!-- </div> -->

                                            <!-- <button onclick="validcap()" class="btn btn-lg btn-success btn-block">Verify Captcha</button> -->

                                            <!-- -------------------experiment-----------------------------------------  -->
                                            <!-- <div class="form-container"> -->
                                                <!-- <h1>Login</h1> -->
                                                <!-- <form name="logform"> -->
                                                <!-- <input type="text" class="captcha col-md-6 form-control" name="user" placeholder = "Username" > -->
                                                <!-- <input type="password" class="captcha col-md-6 form-control" name="pass" placeholder = "Password" > -->
                                                <!-- <label for="">Enter Captcha</label> -->
                                                <!-- <div class="captcha col-md-6 form-control"> -->

                                                    <!-- <div id="captchaValue"></div> -->
                                                    <!-- <br> -->
                                                    <!-- <input id="inputCaptcha" type="text" -->
                                                        <!-- class="captcha col-md-6 form-control" name="" -->
                                                        <!-- placeholder="Retype Captcha here"> -->
                                                <!-- </div> -->
                                                <!-- <span style="color:white">
                                                    <br>.
                                                    <br>.
                                                    <br>.
                                                </span> -->
                                                <!-- <button type="button" id="submitBtn" name="login" -->
                                                    <!-- class=" btn btn-primary btn-block" value="login">Verify -->
                                                    <!-- Captcha</button> -->

                                                <!-- </form>                                      -->
                                            <!-- </div> -->
                                            <!-- <br> -->
                                            <!-- -------------------experiment ends-----------------------------------------  -->
                                            <input type="submit" name="login" class="btn btn-primary btn-block"
                                                value="login">

                                        </form>
                                    </div>
                                </div>
                                <div class="text-center text-light" style="color:black;">
                                    <a href="forgot-password.php" style="color:black;">Forgot password</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script type="text/javascript">
    var allValue = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
        'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
    ];

    var cVal1 = allValue[Math.floor(Math.random() * allValue.length)];
    var cVal2 = allValue[Math.floor(Math.random() * allValue.length)];
    var cVal3 = allValue[Math.floor(Math.random() * allValue.length)];
    var cVal4 = allValue[Math.floor(Math.random() * allValue.length)];
    var cVal5 = allValue[Math.floor(Math.random() * allValue.length)];
    var cVal6 = allValue[Math.floor(Math.random() * allValue.length)];

    var cValue = cVal1 + cVal2 + cVal3 + cVal4 + cVal5 + cVal6;

    captchaValue.innerHTML = cValue;

    thisValue = "";

    inputCaptcha.addEventListener('change', function() {
        thisValue = inputCaptcha.value;

    })

    submitBtn.addEventListener('click', function() {
        if (cValue == thisValue) {
            alert('Captcha Verified Successfully');
            document.logForm.submit();
        } else {
            alert('Invalid Captcha');
            history. back();
        }

    })
    </script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
