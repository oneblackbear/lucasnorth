<?php
$page = "contact";
require_once("common/page_head.php");
require_once("common/contact_model.php");
$send_model = new Contact();
if($_POST && $send_model->send($_POST['name'], $_POST['email_address'], $_POST['message'])){
?>
	<p>Thank you for contacting me, I'll get back to you soon.</p>	
	
<?} else{
header("Location: /contact.php");
}
require_once("common/page_foot.php");
?>
