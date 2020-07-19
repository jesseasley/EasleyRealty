<?php
//$sEmail = "Carter.Low@DentonCMG.com";
//$sEmail = "jess.easley@waterfordparkestates.com";
$sEmail = "jess@jesseasley.com";

function valueOf($class, $variable)
{
	$return = "";

	switch ($class)
	{
		case "cookie":
			if (isset($_COOKIE[$variable]))
				$return = $_COOKIE[$variable];
			break;
		case "post":
			if (isset($_POST[$variable]))
				$return = $_POST[$variable];
			break;
		case "get":
			if (isset($_GET[$variable]))
				$return = $_GET[$variable];
			break;
		case "request":
			if (isset($_REQUEST[$variable]))
				$return = $_REQUEST[$variable];
			break;
		case "server":
			if (isset($_SERVER[$variable]))
				$return = $_SERVER[$variable];
			break;
		default:
			$return = "";
	}

	return $return;
}

function SendEmail($sFrom, $sSubject, $sBody, $sSendToGroup)
{

	global $CC, $sEmail;
	
	$headers = "From: " . $sFrom . "\r\n"; 
	$headers .= "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\r\n";
	
	if ($sSendToGroup == "true")
		$headers .= $CC;
	else
		$headers .= "Bcc: Jess Easley <jess.easley@waterfordparkestates.com>\r\n";
	
	$send_to = $sEmail;
	if (valueOf("server", "SERVER_NAME") != "localhost")
		if (!(mail($send_to, $sSubject, $sBody, $headers)))
			echo "Error!";
}	

function PageUpdateEmail($sSubject, $sBody)
{
	$headers = "From: website@waterfordparkestates.com\r\n"; 
	$headers .= "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\r\n";
	$send_to = "Jess Easley <jess.easley@waterfordparkestates.com>";

	if (valueOf("server", "SERVER_NAME") != "localhost")
		if (!(mail($send_to, $sSubject, $sBody, $headers)))
			echo "Error!";
}

function PageUpdateCustomerEmail($eMail, $sSubject, $sBody)
{
	$headers = "From: admin@waterfordparkestates.com\r\n"; 
	$headers .= "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\r\n";
	$send_to = $eMail;

	if (valueOf("server", "SERVER_NAME") != "localhost")
		if (!(mail($send_to, $sSubject, $sBody, $headers)))
			echo "Error!";
}

function SendSingleEmail($sSubject, $sBody)
{
	$headers = "From: webbrowser@easleyrealty.com\r\n"; 
	$headers .= "MIME-Version: 1.0\nContent-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "To: Jess Easley <jess@jesseasley.com>\r\n";
	
	if (valueOf("server", "SERVER_NAME") != "localhost")
		if (!(mail("jess@easleyrealty.com", $sSubject, $sBody, $headers)))
			echo "Error!";
}
?>