<?php 
 include("connection.php");

	$query= "Select u.*, e.EventName from user u, event_master e, subevent_master s, event_users eu
	 where u.Id = ".$_SESSION['uid']." and u.Id = eu.EventUserId and eu.EventId = s.Id and s.EventId and e.EventId";
	 
	 $query = "Select u.*, s.*, eu.*, e.* from user u, subevent_master s, event_users eu, event_master e 
	 	where u.Id = ".$_SESSION['uid']." and u.id= eu.EventUserId and eu.EventId = s.Id and s.EventId = e.EventId";
//echo $query;
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	while ($row =mysql_fetch_array($result))
	{
    // EDIT THE 2 LINES BELOW AS REQUIRED
    	$email_to = "yamrajpandya@gmail.com";//$row["Email"];
    $email_subject = "You have succesfully registered for ".$row["EventName"];
    $first_name = $row['UserFirstName']; // required
    $last_name = $row['UserLastName']; // required
    $email_from = "08dit201@nirmauni.ac.in"; // required
	}
    
	if ($count > 0 )
	{
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  //if(!preg_match($email_exp,$email_from)) {
//    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
//  }
//    $string_exp = "/^[A-Za-z .'-]+$/";
//  if(!preg_match($string_exp,$first_name)) {
//    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
//  }
//  if(!preg_match($string_exp,$last_name)) {
//    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
//  }
//  if(strlen($comments) < 2) {
//    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
//  }
//  if(strlen($error_message) > 0) {
//    died($error_message);
//  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
   
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();

require_once('class.phpmailer-lite.php');

$mail             = new PHPMailerLite(); // defaults to using php "Sendmail" (or Qmail, depending on availability)

$mail->IsMail(); // telling the class to use native PHP mail()

try {
  $mail->SetFrom('08dit201@nirmauni.ac.in', 'Rujit Raval');
  $mail->AddAddress('yamrajpandya@gmail.com', 'Yamraj Pandya');
  $mail->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  //$mail->MsgHTML(file_get_contents('contents.html'));
  //$mail->AddAttachment('images/phpmailer.gif');      // attachment
  //$mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
  $mail->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


//$send = @mail($email_to, $email_subject, $email_message, $headers); 
//	echo $send;
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php

	}
//header("Location:event.php");
?>