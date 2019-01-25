
            <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
            <script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.0.6"></script>


             <!-- basic fancybox setup -->
             <script type="text/javascript">
                $(document).ready(function () {
                    $(".modalbox").fancybox();
                    
                    $("#contact").submit(function () { return false; });
                });
            </script>
    
    	<?php 
			if (isset($_REQUEST['btnLogin']))
			{
				if($_SERVER["REQUEST_METHOD"] == "POST")
				{
				// username and password sent from Form 
				$myusername=addslashes($_POST['uname']); 
				$mypassword=addslashes($_POST['upass']); 
				
				$sql="SELECT * FROM user WHERE UserId='$myusername' and Password='$mypassword'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$active=$row['active'];
				$count=mysql_num_rows($result);
				
				
				// If result matched $myusername and $mypassword, table row must be 1 row
				if($count==1)
				{
				session_register("userid");
				$_SESSION['login_user']=$myusername;
				
				header("location: index.php");
				}
				else 
				{
				$error="Your Login Name or Password is invalid";
				}
				}
				$user_check=$_SESSION['login_user'];
	
				$ses_sql=mysql_query("select UserId from user where UserId='$user_check' ");
				
				$row=mysql_fetch_array($ses_sql);
				
				$login_session=$row['userid'];
				
				if(!isset($login_session))
				{
				header("Location: index.php");
				}
			}
		?>
        </div>
        <!-- hidden inline form -->
        <div id="divLogin" >
            <form id="stream" name="stream" action="<?php $_PHP_SELF ?>" method="post">
                <table class="gridtable" width="100%" >
                    <tr>
                        <th colspan="2" align="center">Login</th>
                    </tr>
                   <tr>
                        <td>
                            User Name:
                        </td>
                        <td>
                            <input type="text" id="uname" name="uname" size="20" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input type="password" id="upass" name="upass" size="20" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" >
                            <input type="submit" name="btnLogin" id="btnLogin" value="Login"  />
                        </td>
                    </tr>    
                </table>     
            </form>
        </div>
        <!-- basic fancybox setup -->
