<?php
session_start();
include('includes/config.php');
if(isset($_POST['submit']))
{
$regno=$_POST['regno'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$contactno=$_POST['contact'];
$emailid=$_POST['email'];
$p=$_POST['password'];
$password=hash('sha512', $p);
	$result ="SELECT count(*) FROM userRegistration WHERE email=? || regNo=?";
		$stmt = $mysqli->prepare($result);
		$stmt->bind_param('ss',$email,$regno);
		$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
if($count>0)
{
echo"<script>alert('Registration number or email id already registered.');</script>";
}else{

$query="insert into  userRegistration(regNo,firstName,middleName,lastName,gender,contactNo,email,password) values(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($query);
$rc=$stmt->bind_param('sssssiss',$regno,$fname,$mname,$lname,$gender,$contactno,$emailid,$password);
$stmt->execute();
echo"<script>alert('Student Succssfully register');</script>";
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
    <title>User Registration</title>
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

                        <h2 class="page-title">Student Registration </h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">Fill all Info</div>
                                    <div class="panel-body">
                                        <form method="post" action="" name="registration" class="form-horizontal"
                                            onSubmit="return valid();">



                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> Registration No : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="regno" id="regno" class="form-control"
                                                        required="required" onBlur="checkRegnoAvailability()">
                                                    <span id="user-reg-availability" style="font-size:12px;"></span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">First Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="fname" id="fname" class="form-control"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Middle Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="mname" id="mname" class="form-control">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Last Name : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="lname" id="lname" class="form-control"
                                                        required="required">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Gender : </label>
                                                <div class="col-sm-8">
                                                    <select name="gender" class="form-control" required="required">
                                                        <option value="">Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="others">Others</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Contact No : </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="contact" id="contact" class="form-control"
                                                        required="required">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email id: </label>
                                                <div class="col-sm-8">
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        onBlur="checkAvailability()" required="required">
                                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Password: </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="password" id="password"
                                                        class="form-control" required="required">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Confirm Password : </label>
                                                <div class="col-sm-8">
                                                    <input type="password" name="cpassword" id="cpassword"
                                                        class="form-control" required="required">
                                                </div>
                                            </div>

                                            <!-- --------------------------captchaa-----------------------------------------  -->
                                            <!-- <div class="form-container col-sm-2 control-label"> -->
                                                <!-- <label for="">Enter Captcha</label> -->
                                                <!-- <br> -->
                                                <!-- <div class="captcha col-md-6 form-control" -->
                                                    <!-- style="height: 65px; width : 300px; display:flex;align-items:center"> -->
                                                    <!-- <div id="captchaValue"></div> -->
                                                    <!-- <br> -->
                                                    <!-- <input id="inputCaptcha" type="text" -->
                                                        <!-- style="height: 42px; width : 200px;" -->
                                                        <!-- class="captcha col-md-6 form-control" name="" -->
                                                        <!-- placeholder="Retype Captcha here"> -->
                                                <!-- </div> -->
                                                <!-- <span style="color:white"> -->
                                                    <!-- <br>. -->
                                                    <!-- <br>. -->
                                                    <!-- <br>. -->
                                                <!-- </span> -->
                                                <!-- <button type="button" id="submitBtn" name="login" -->
                                                    <!-- class=" btn btn-primary btn-value=" login">Verify -->
                                                    <!-- Captcha</button> -->
                                            <!-- </div> -->
                                            <!-- <br> -->
                                        <!-- </form> -->
                                        <!-- <span style="color:white">
                                            <br>.
                                            <br>.
                                            <br>.
                                            <br>.
                                            <br>.
                                        </span> -->

                                        <!-- <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-default" type="reset">Reset</button>
                                            <input type="submit" name="submit" Value="Register" class="btn btn-primary">
                                        </div>
                                        </form> -->


<!-- --------------------------------------index wala captcha -------------------------------- -->
<label for="" style="color: black;" class="col-sm-2 control-label">Enter Captcha</label>
                                            <div class="form-row col-sm-6 control-label">
                                                <div class="form-group col-md-6 ">
                                                    <input type="text" class="form-control" readonly id="capt">
                                                </div>
                                                <!-- <p>huhhhhh</p> -->
                                                <div class="form-group col-md-6 ">
                                                    <input type="text" class="form-control" id="textinput">
                                                </div>
                                            </div>

											
                                            <!-- <input type="submit" onclick="validcap()" name="login"
                                                class="btn btn-primary btn-block" value="login">

												<h5 style="color: white ">Captcha not visibleE <img src="./img/refresh-16.png" onclick="cap()"></h5>

                                            <input type="submit" onclick="validcap()" name="login"
                                                class="btn btn-primary btn-block " value="register"> -->
<!-- //this works-----------------------------------------------------------------------  -->
                                        <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-default" type="reset">Reset</button>
                                            <input type="submit" name="submit" Value="Register" class="btn btn-primary">
                                        </div>

												<h5 style="color: Green "> Refresh Captcha <img style="width: 20px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYwVrN3cDrOijoWaXnRk8Zkk3qo__W9-Otfg&usqp=CAU" onclick="cap()"></h5>

<!-- --------------------------------------index wala captcha ends-------------------------------- -->

                                        <!-- -------------------experiment ends-----------------------------------------  -->

                                        <!-- <div class="col-sm-6 col-sm-offset-4">
                                            <button class="btn btn-default" type="reset">Reset</button>
                                            <input type="submit" name="submit" Value="Register" class="btn btn-primary">
                                        </div> -->
                                        </form>

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
    </div>
    <script type="text/javascript">
    function cap() {
        var alpha = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y', 'Z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a', 'b', 'c', 'd', 'e',
            'f', 'g', 'h', 'i',
            'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '!', '@', '#', '$',
            '%', '^', '&', '*', '+'
        ];
        var a = alpha[Math.floor(Math.random() * 71)];
        var b = alpha[Math.floor(Math.random() * 71)];
        var c = alpha[Math.floor(Math.random() * 71)];
        var d = alpha[Math.floor(Math.random() * 71)];
        var e = alpha[Math.floor(Math.random() * 71)];
        var f = alpha[Math.floor(Math.random() * 71)];

        var final = a + b + c + d + e + f;
        document.getElementById("capt").value = final;
    }

    function validcap() {
        var stg1 = document.getElementById('capt').value;
        var stg2 = document.getElementById('textinput').value;
        if (stg1 == stg2) {
            alert("Form is validated Succesfully");
            return true;
        } else {
            alert("Please enter a valid captcha");
			location.reload();
			history.go(-1)
            return false;
        }
    }
    </script>
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
<script>
function checkAvailability() {

    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#email").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {
            event.preventDefault();
            alert('error');
        }
    });
}
</script>
<script>
function checkRegnoAvailability() {

    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'regno=' + $("#regno").val(),
        type: "POST",
        success: function(data) {
            $("#user-reg-availability").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {
            event.preventDefault();
            alert('error');
        }
    });
}
</script>

</html>
