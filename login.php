<?php
session_start();
$error ="";
  if (isset($_SESSION['user'])) {
            $name=$_SESSION['user'];
            $pass=$_SESSION['pass'];
            require_once('classes/Leads.php');
$obj=new Leads;
$auth=$obj->get_valid($name,$pass);
if($auth){
    header('location:index.php');
    if(isset($_POST['elms-submit'])){
      $name=$_POST['elms-username'];
      $pass=$_POST['elms-password'];
      $_SESSION['user']=$name;
      $_SESSION['pass']=$pass;
      $obj=new Leads();
      $login=$obj->login_details($name,$pass);
   if($login)
   {
        echo $name ;
    header('location:index.php');
   }
   
   } ?>
<?php }

        }
require_once('classes/Leads.php');
 if(isset($_POST['elms-submit'])){
      $name=$_POST['elms-username'];
      $pass=$_POST['elms-password'];
      $_SESSION['user']=$name;
      $_SESSION['pass']=$pass;
      $obj=new Leads();
      $login=$obj->login_details($name,$pass);
   if($login)
   {
    header('location:index.php');
   }
   else
   {
       if(empty($name) && empty($pass)){
           $error = "<div class='error message'>". 'Username and Password are Empty'. "</div>";
       }else if(!$login){
           $error = "<div class='error message'>". 'Username and Password doesnt match'. "</div>"; 
       }
   }

   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email List Management System - Login Page</title>

	<!-- GOOGLE FONTS -->

    <!-- CUSTOM CSS -->
	<link rel="stylesheet" type="text/css" href="style.css" />

	<!-- SCRIPTS -->
	<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>

	<!-- CUSTOM JS -->
    <script type="text/javascript" src="js/custom.js"></script>
</head>
<body class="elms-login-page">
	<div class="container">
		<div class="row">
			<div class="col-4 auto">
				<div class="logo center">
					<a href="#">
						<img src="images/logo.png" alt="Email List Management System - Logo" width="214" height="70" />
					</a>
				</div>

				<div class="login-form">
                    <?php echo $error; ?>
					<form id="elms-login-form" action="" method="post">
						<div class="input-grp">
							<label for="username">Username</label>
							<input type="text" name="elms-username" id="elms-username" value="" />
						</div>

						<div class="input-grp">
							<label for="password">Password</label>
							<input type="password" name="elms-password" id="elms-password" value="" />
						</div>

						<div class="input-grp button">
							<input type="submit" name="elms-submit" id="elms-submit" value="Login" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>