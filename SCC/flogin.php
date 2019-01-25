<link style="text/css" href="CSS/loginstyle.css" rel="stylesheet">
<!--<script type="text/javascript" src="js/jquery1.4.2.js"></script>-->
<!--<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>-->
<script type="text/javascript" src="js/login.js"></script>

 <div id="header_wrapper">
     <div id="headerlogin">
        <?php 
        if(!isset($_SESSION['login_user']))
        {
        ?>
        <a href="#" class="login_btn"><span>Login</span><div class="triangle"></div></a>
        <?php 
        }
        else		
        {
        ?>
		
        <a href="Logout.php" class="logout_btn"><span>Logout</span></a>
                <a href="cpass.php" class="logout_btn"><span>Change Password</span></a>
                <?php
	if(isset($_SESSION['login_user']) && ($_SESSION['UserType'] == 3 || $_SESSION['UserType'] == 4))
	{
?>
		<a href="manageprofile.php" class="logout_btn"><span>Add Details</span></a>
<?php
	}
?>
        <?php } ?>
        <div id="login_box">
            <div id="tab"><a href="CSS/..." class="login_btn"><span>Login</span><div class="triangle"></div></a></div>
            <div id="login_box_content"></div>
            <div id="login_box_content">
                <form id="login_form" action="LoginCheck.php" method="post">
                    <input type="text" placeholder="Username" id="uname" name="uname" />
                    <input type="password" placeholder="Password" id="upass"  name="upass" />
                    <input type="submit" value="Login" id="Login" name="Login" />
                </form>
            </div>
        </div>
    </div>
</div>