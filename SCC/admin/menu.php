<div id="subhead">
		  <ul>
					<li ><a href='subhome.php' >Users</a></li>
					<li><a href='AE_Electionyear.php'>Online Nomination</a></li>
					<li><a href='subpg.php'>Photo Gallery</a></li>
					<li><a href='subdf.php'>Discussion Forum</a></li>
					<li><a href='subfeed.php'>Feedback</a></li>
                    <li><a href='subevent.php'>Events</a></li>
                    <li><a href='subnews.php'>News</a></li>
                    <li><a href='subactivities.php'>Activities</a></li>
                    <li><a href='subnewsletter.php'>NewsLetter</a></li>
                    <li><a href='Logout.php'>Logout</a></li>
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