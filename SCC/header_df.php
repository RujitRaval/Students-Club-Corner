
<?php

$query = "Select StreamId, StreamName from stream where IsActive = 1";
$result = mysqli_query($conn,$query);
while ($row =mysqli_fetch_assoc($result))
{
	$sid= $row["StreamId"];
}

 include("flogin.php"); ?>
 <div id='header'> 
 <a href ='' id='logo' class='replace'></a> 
 <p><?php echo $TitleStream; ?></p> 
 <ul>
    <li ><a href='index.php' >Home</a></li>
 </ul>

        
        	</div>
     	

<script type='text/javascript' >
	
		var url = window.location.pathname;
		url=url.substring(url.lastIndexOf('/')+1,url.length);
		
		var menu = document.getElementById('header').getElementsByTagName('A');
		
		var surl;
		 for( var x = 0; x < menu.length ; x++ )
		 {
		 surl=menu[x].href;
		 
		 	surl=surl.substring(surl.lastIndexOf('/')+1,surl.length);		  
			if (surl == url) {
            menu[x].className = 'active';
			
        }
			
		}
</script>