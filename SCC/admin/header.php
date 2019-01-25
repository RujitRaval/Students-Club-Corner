
 <div id='header'> 
 <a href ='' id='logo' class='replace'></a> 
 <p>Students' Club Corner</p> 
		  <ul>
					<li ><a href='index.php' >Home</a></li>
					<li><a href='event.php'>Events</a></li>
					<li><a href='photogallery.php'>Photo Gallery</a></li>
					<li><a href='discussionforum.php'>Discussion Forum</a></li>
					<li><a href='feedback.php'>Feedback</a></li>
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