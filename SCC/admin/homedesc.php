
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student's Club Corner - Admin - Home Page Description</title>
<link style="text/css" href="../CSS/style.css" rel="stylesheet">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	window.onload = function()
	{
	
	CKEDITOR.replace( 'desc', { height: '200px', width: '99%',
		toolbar :
		[
			{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript'] },
			{ name: 'paragraph', items : [ 'Blockquote','JustifyLeft','JustifyCenter','JustifyRight'] },
			{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
			{ name: 'insert', items : [ 'Image'] },
			{ name: 'colors', items : [ 'TextColor','BGColor' ] },
			{ name: 'style', items : ['Font','Styles','Format','FontSize'] },
			{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord']}]
			
	
	 });
	};
</script>
</head>

<body>
	<div id="bg_patern">
        <div id="container">
            <div id="backimage">
                <div id='header'> 
                <a href ='' id='logo' class='replace'></a> 
                    <p>Students' Club Corner</p> 	
                    <?php include("connection.php");  ?>	
                    <?php include("AdminMenu.php");  ?>
                </div>	
                <br />
                <div align="center" style="margin:10px 0 0 0; float:left; width:100%; font-weight:bold;">
					<?php
						
                        $sql="select * from home_desc ";
                        $rs=mysqli_query($conn,$sql);
                        $fetch=mysqli_fetch_array($rs);
                    ?>    
					 <form id="form1" name="form1" method="post" action="AE_homedesc.php">
                    	<input type="hidden" id="descid" name="descid" value="<?php echo $fetch['ID']; ?>" />
                         <table border="2" bordercolor="#0000FF"  class="gridtable" width="95%">
                            <tr>
                                <th>Home Page Information / Description</th>
							</tr>
                            <tr>
                                <td><textarea name="desc" rows="10" cols="51"><?php echo $fetch['description']; ?></textarea></td>
                            </tr>
                          </table>
                        <input type="submit" ID="save" class="button" value="Save">
                    </form>
                </div>
            </div>
            <?php include("footer.php");  ?>
        </div>
    </div>
</body>
</html>