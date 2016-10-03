<?php require_once('templates/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="page-title">Settings</h3>

                    <section class="main branding">
                        <h2 class="title">Branding</h2>

                        <form action="" id="elms-bt-form" method="post">

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
                                <input type="submit" value="Save" id="elms-bt-submit" />
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
                        <form action="" id="elms-cp-form" method="post">
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
                                <input type="submit" value="Save" id="elms-bt-submit" />
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
<?php require_once('templates/footer.php'); ?>