<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$stmt=$mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
				$stmt->bind_param('sss',$username,$username,$password);
				$stmt->execute();
				$stmt -> bind_result($username,$username,$password,$id);
				$rs=$stmt->fetch();
				$_SESSION['id']=$id;
				$uip=$_SERVER['REMOTE_ADDR'];
				$ldate=date('d/m/Y h:i:s', time());
				if($rs)
				{
                //  $insert="INSERT into admin(adminid,ip)VALUES(?,?)";
   // $stmtins = $mysqli->prepare($insert);
   // $stmtins->bind_param('sH',$id,$uip);
    //$res=$stmtins->execute();
					header("location:dashboard.php");
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

	<title>Admin login</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head
<body>
	
	<div class="login-page bk-img" style="background-image: url(https://www.highereducationdigest.com/wp-content/uploads/2020/04/Img-1-18.jpg); object-fit: cover;">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3" style="margin-top:4%" >
						<h1 class="text-center text-bold text-white mt-4x"   style="background-color:#494949; padding:5px; font-size:30px; border-radius:8px ">SGGS Hostel Management System</h1>
						<div class="well row pt-2x pb-3x bk-light" style="background-color: transparent; " >
							<div class="col-md-8 col-md-offset-2" >
							
								<form action="" class="mt" method="post"  >
									<label for="" class="text-uppercase text-sm" style="color: white " >Your Username or Email</label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<label for="" class="text-uppercase text-sm"style="color: white "  >Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
<!-- captcha code-------------------------------------------------------------------------  -->
									<label for="" style="color: white ">Enter Captcha</label>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" readonly id="capt">
                                                </div>
                                                <!-- <p>huhhhhh</p> -->
                                                <div class="form-group col-md-6">
                                                    <input type="text" class="form-control" id="textinput">
                                                </div>
                                            </div>

											

                                            <input type="submit" onclick="validcap()" name="login"
                                                class="btn btn-primary btn-block" value="login">

												<h5 style="color: white ">Captcha not visibleE <img src="./img/refresh-16.png" onclick="cap()"></h5>
<!-- --------------------------------------------------------------------------------------  -->
									<!-- <input type="submit" name="login" onclick="validcap()" class="btn btn-success btn-block" value="login" > -->
								</form>
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
