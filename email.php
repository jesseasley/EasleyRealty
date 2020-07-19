<?php
include "includes/functions.php";

  if ((valueOf("post", "name") > "") && (valueOf("post", "phone") > "") && (valueOf("post", "email") > "")){
    $body = "Sent by: " . valueOf("post", "name") . "<br><br>";
	  $body .= "Phone: " . valueOf("post", "phone") . "<br><br>";
	  $body .= "Email: " . valueOf("post", "email") . "<br><br>";
	  $body .= "Their message: ". valueOf("post", "body");
	  SendSingleEmail(valueOf("post", "subject"), $body);
	  $body = "<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" height=\"260\">";
	  $body .= "<tr height=12>";
	  $body .= "	<td colspan=2></td>";
	  $body .= "</tr>";
	  $body .= "<tr>";
	  $body .= "	<td width=12></td>";
	  $body .= "	<td valign=\"top\">";
	  $body .= "		<b>Thank you for your comments.";
	  $body .= "		<br><br>";
	  $body .= "		Someone will get back to you shortly.</b>";
	  $body .= "	</td>";
	  $body .= "</tr>";
	  $body .= "</table>";
	  echo $body;
  }
?>