<?php 
//session_start();
if (isset($_SESSION['user'])) {
    $name=$_SESSION['user'];
    $pass=$_SESSION['pass'];
require_once('classes/Leads.php');
$obj=new Leads();
$logo=$obj->get_logo();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Email List Management System</title>

    <!-- GOOGLE FONTS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="stylesheet" type="text/css" href="css/default.date.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $logo[0]['theme_path']; ?>" />

    <!-- SCRIPTS -->
    <script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-3.0.0.min.js"></script>
    <script type="text/javascript" src="js/picker.js"></script>
    <script type="text/javascript" src="js/picker.date.js"></script>
    <!-- CUSTOM JS -->
    <script type="text/javascript" src="js/custom.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="primary row">
                    <div class="col-3">
                        <div class="logo">
                            <a href="index.php">
                                <img src="<?php echo $logo[0]['logo_path']; ?>" alt="ELMS - Logo" width="214" height="70" />
                            </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="welcome-message right">
                            <span class="message">Welcome <b><?php echo $_SESSION['user']; ?></b>, <a class="logout" href="logout.php">Logout</a></span>
                            <p> <span id="hours">0</span>:<span id="minutes">0</span></p>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <div class="nav wrap container fullwidth">
        <nav class="primary row">
            <ul>
                <li class="active"><a href="index.php"><i class="fa fa-home"></i></a></li>
                <!--
                <li><a href="#">Recently Exported Lists</a></li>
                <li><a href="#">Delete History</a>
                -->
                <li><a href="settings.php">Settings</a></li>
            </ul>
        </nav>
    </div>