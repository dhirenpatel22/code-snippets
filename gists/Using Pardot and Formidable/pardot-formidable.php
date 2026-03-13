<?php
add_action('frm_after_create_entry', 'sendToPardot', 30, 2);
function sendToPardot($entry_id, $form_id){
if($form_id == 5){ // This is the ID from your Formidable Form
	/* You can create as many variables as you need, the last number is the field ID number
 	that you get from the Build or Settings tab of your form */
	$pardotEmail = ($_POST['item_meta'][10]); 
	$pardotFirst = ($_POST['item_meta'][11]);
	$pardotPhone = ($_POST['item_meta'][12]);
	/* In Pardot you specify whatever External Field Name you want.
	Use those field names in the URL string below along with
	the variables you specified up above. */
	$result = wp_remote_post('https://youlinktoyourpardotformhandler.com/?email='.$pardotEmail.'&name='.$pardotFirst.'&phone number='.$pardotPhone);    
 }
}
?>