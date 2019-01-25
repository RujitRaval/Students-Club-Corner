<?php
include ("connection.php");
if(!isset($_SESSION['uid']))
{
	header("Location: login.php");
}
$allowedExts = array("jpg", "jpeg", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/bmp")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 1000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("../pg/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "../pg/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "../pg/" . $_FILES["file"]["name"];
	  
	  $Pisactive = $_POST['PIsActive'];
		$aid = $_POST['AId'];
		$sql = "INSERT INTO photo_gallery".
			   "(filename,IsActive, AddDate,AlbumId, AddUserId) ".
			   "VALUES('".$_FILES["file"]["name"]."',".$Pisactive.", NOW(),".$aid.", ".$_SESSION['uid'].")";
		echo $sql . "<br />";
		$retval = mysqli_query( $conn,$sql );
		if(! $retval )
		{
		  die('Could not enter data: ' . mysqli_error());
		}
		echo "Entered data successfully\n";
		header("Location: AlbumDetails.php?id=".$aid);
      }
    }
  }
else
  {
  echo "Invalid file";
  }

//$target_path = "../Album/";
//
//$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
//echo $target_path ;
//if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
//    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
//    " has been uploaded";
//} else{
//    echo "There was an error uploading the file, please try again!";
//}

////?heck that we have a file
//if((!empty($_FILES["uploaded_file"])) && ($_FILES['uploadded_file']['error'] == 0)) {
//  //Check if the file is JPEG image and it's size is less than 350Kb
//  $filename = basename($_FILES['uploaded_file']['name']);
//  $ext = substr($filename, strrpos($filename, '.') + 1);
//  if (($ext == "jpg") && ($_FILES["uploaded_file"]["type"] == "image/jpeg") && 
//    ($_FILES["uploaded_file"]["size"] < 350000)) {
//    //Determine the path to which we want to save this file
//      $newname = dirname(__FILE__).'/Album/'.$filename;
//      //Check if the file with the same name is already exists on the server
//      if (!file_exists($newname)) {
//        //Attempt to move the uploaded file to it's new place
//        if ((move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$newname))) {
//           echo "It's done! The file has been saved as: ".$newname;
//			$Pisactive = $_POST['PIsActive'];
//			$aid = $_POST['AId'];
//			$sql = "INSERT INTO photo_gallery".
//				   "(filename,IsActive, AddDate,AlbumId) ".
//				   "VALUES('$newname',$Pisactive, NOW(),$aid)";
//			
//			$retval = mysqli_query( $sql, $conn );
//			if(! $retval )
//			{
//			  die('Could not enter data: ' . mysqli_error());
//			}
//			echo "Entered data successfully\n";
//			header("Location: AlbumDetails.php?id=".$aid);
//        } else {
//           echo "Error: A problem occurred during file upload!";
//        }
//      } else {
//         echo "Error: File ".$_FILES["uploaded_file"]["name"]." already exists";
//      }
//  } else {
//     echo "Error: Only .jpg images under 350Kb are accepted for upload";
//  }
//} else {
// echo "Error: No file uploaded";
//}
?>