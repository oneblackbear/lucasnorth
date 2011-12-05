<?php
$page = "contact";
require_once("common/page_head.php");

?>
<p>
Please use the form below to contact me.
</p>
<form action="/contact_sent.php" id="send_contact" class="form_container" method="post" >
	<fieldset>		
		<label for="name" class="form_label">Name:</label>
		<input type="text" id="name" name="name" value="" class="form_item"/>
	</fieldset>
	<fieldset>	
		<label for="email_address" class="form_label">Email address:</label>
		<input type="text" id="email_address" name="email_address" value="" class="form_item"/>
	</fieldset>
	<fieldset>	
		<label for="message" class="form_label">Message:</label>
		<textarea name="message" id="message" rows="5" cols="18" class="form_item" ></textarea>		
	</fieldset>
	<fieldset>
		<p><small>Alternatively you can contact me on my mobile: <strong>07956 155899</strong></small></p>
	</fieldset>
	<fieldset>
		<input name="submit" type="submit" value="Send" class="form_submit" />
	</fieldset>
</form>
<?
require_once("common/page_foot.php");
?>
