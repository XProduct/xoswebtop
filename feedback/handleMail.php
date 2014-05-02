	<?php
	
	$message = $_REQUEST['message'];
	$email = $_REQUEST['email'];
	$src = $_REQUEST['src'];
	
	require_once "Mail.php";
	require_once "Mail/mime.php";
	
	
	$from = "Fia File Fetch <fia@xproduct.net>";
	$to = "<bdavis@xproduct.net>"; 
	$subject = "Feedback for" . $src;
	$crlf = "\n";
	
	$text = "MESSAGE ONLY \n" . $message;
	$html = "<h1>" . $src . " Feedback</h1><p>From: " . $email . "</p><p>" . $message . "</p>";
	
	$host = "ssl://smtp.gmail.com";
	$port = "465";
	$username = "fia@xproduct.net";
	$password = "grammy27";
	
	$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject);
	
	$mime = new Mail_mime($crlf);
	
	// Setting the body of the email
	$mime->setTXTBody($text);
	$mime->setHTMLBody($html);
	
	$body = $mime->get();
	$headers = $mime->headers($headers);  
	
	$smtp = Mail::factory('smtp',
		array ('host' => $host,
		'port' => $port,
		'auth' => true,
		'username' => $username,
		'password' => $password));
	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) 
	{
		echo("<p>" . $mail->getMessage() . "</p>");
	} 
	else 
	{
		echo("<p>Message successfully sent!</p>");
	}
	
	?>