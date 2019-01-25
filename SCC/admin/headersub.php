<div id="bg_patern">
            <div id="container">
                <div id="backimage">
                    <div id='header'> 
                        <a href ='' id='logo' class='replace'></a> 
                        <p>Students' Club Corner</p> 
                        
                        <?php
						$sql4="select UserFirstName, UserLastName from user where id =".$_SESSION['uid'] ;
						$result4 = mysqli_query($conn,$sql4);
						$fetch=mysqli_fetch_array($result4); 
						
						?>
                        
                        <h3>Welcome, Mr. <?php echo $fetch["UserFirstName"]; ?>&nbsp<?php echo $fetch["UserLastName"];?></h3>	
                        </div>
                        
						<?php include("menu.php");  ?>