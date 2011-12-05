<?php
class Contact {
	
	var $to = "lucas@lucasnorth.com";
	var $from_email_address = "lucas@lucasnorth.com";
	var $subject = "Enquiry Form";
	

	public function Contact(){}	
	
	public function send($from_name, $from_email, $message){
		$info = split(",|;", $from_name);
		$from_name = $info[0];
		$info = split(",|;", $from_email);
		$from_email = $info[0];
		$message = strip_tags($message);
		
		$headers = "From: $from_name <".$this->from_email_address.">\r\nReply-To: $from_name <$from_email>\r\nBcc: charles@oneblackbear.com";
		return mail($this->to, $this->subject, $message, $headers);
	}
	
}

?>