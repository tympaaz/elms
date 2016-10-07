<?php 
session_start();
if (isset($_SESSION['user'])) {
require_once('templates/header.php'); 
require_once('classes/Leads.php');
if(isset($_POST['btn'])){
    $target= 'images/'.$_FILES['elms-bt-upload']['name'];
    $theme= 'css/themes/'.$_POST['elms-bt-theme'].".css";
    $req= array(
        'logo_path'=>$target,
        'theme_path'=>$theme
    );

    if(!empty($req)){
        $uploads_dir = 'images/';
        (move_uploaded_file($_FILES['elms-bt-upload']['tmp_name'], $uploads_dir.$_FILES['elms-bt-upload']['name']));
        $obj=new Leads();
        $obj->insert($req);
    }else{
        echo"please Choose File";
    }
}

if(isset($_POST['submit'])){
    $obj=new Leads();
    $old_pass=$_POST['elms-cp-oldpass'];
    $name = $_SESSION['user'];
    $pass = $_SESSION['pass'];
    $login=$obj->login_details($name,$pass);
    $id=$login[0][0];
    $new_pass=$_POST['elms-cp-newpass'];
    $cnfrm_pass=$_POST['elms-cp-confirm-newpass'];
    
    if($old_pass == $pass){
         if($new_pass == $cnfrm_pass){
             $obj->updatepass($id,$new_pass);
             unset($_SESSION["user"]);
             header("location:classes/Auth.php");
         }
         else{
             echo "New Password & Confirm password Missmatch";
         }
     }else{
         echo"Enter Valid Password";
     }   
}
?>
<?php require_once('templates/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="page-title">Settings</h3>

                    <section class="main branding">
                        <h2 class="title">Branding</h2>

                        <form action="settings.php" id="elms-bt-form" method="post" enctype="multipart/form-data">

                            <div class="sub branding-logo">
                                <h4 class="sub-title">Logo</h4>
                                <p class="description">Upload your logo</p>
                                <input type="file" value="" name="elms-bt-upload" id="elms-bt-upload" />
                            </div>

                            <div class="sub branding-theme">
                                <h4 class="sub-title">Choose a theme</h4>
                                <p class="description">Select one of the predefined themes which matches your site design</p>
                                <select name="elms-bt-theme" id="elms-bt-theme">
                                <option value="red">Kansas Red</option>
                                <option value="orange">Immitech Orange</option>
                                <option value="yellow" selected>ELMS Yellow</option>
                            </select>
                            </div>

                            <div class="save-options">
                                <input type="submit" value="Save" name="btn" id="elms-bt-submit" />
                            </div>

                            <!--
                            -------------------------    
                            * Success Message
                            -------------------------

                            <div class="success msg">
                                Settings Saved Successfully
                            </div>

                            -------------------------    
                            * Error Message
                            -------------------------

                            <div class="error msg">
                                Error
                            </div>

                            -->
                        </form>
                    </section>

                    <section class="main change-password">
                        <h2 class="title">Change Password</h2>
                        <form action="settings.php" id="elms-cp-form" method="post">
                            <div class="sub old-pass">
                                <h4 class="sub-title">Old Password</h4>
                                <p class="description">Enter your Old Password</p>
                                <input type="text" value="" name="elms-cp-oldpass" id="elms-cp-oldpass" />
                            </div>

                            <div class="sub new-pass">
                                <h4 class="sub-title">New Password</h4>
                                <p class="description">Enter your New Password</p>
                                <input type="text" value="" name="elms-cp-newpass" id="elms-cp-newpass" />
                            </div>

                            <div class="sub confirm-new-pass">
                                <h4 class="sub-title">Confirm New Password</h4>
                                <p class="description">Re-enter your New Password</p>
                                <input type="text" value="" name="elms-cp-confirm-newpass" id="elms-cp-confirm-newpass" />
                            </div>

                            <div class="save-options">
                                <input type="submit" value="Save" name="submit" id="elms-bt-submit" />
                            </div>

                            <!--
                            -------------------------    
                            * Success Message
                            -------------------------

                            <div class="success msg">
                                Settings Saved Successfully
                            </div>

                            -------------------------    
                            * Error Message
                            -------------------------

                            <div class="error msg">
                                Error
                            </div>

                            -->

                        </form>
                    </section>
            </div>
        </div>
    </div>
<?php require_once('templates/footer.php');
}else{
     header('location:classes/Auth.php');
}?>