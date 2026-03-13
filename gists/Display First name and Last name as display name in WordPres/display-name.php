<?php /*
	Fix first last on profile saves.
*/
function ffl_save_extra_profile_fields( $user_id )
{
	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	//set the display name
	$display_name = trim($_POST['first_name'] . " " . $_POST['last_name']);
	if(!$display_name)
		$display_name = $_POST['user_login'];

	$_POST['display_name'] = $display_name;

	$args = array(
			'ID' => $user_id,
			'display_name' => $display_name
	);
	wp_update_user( $args ) ;
}
add_action( 'personal_options_update', 'ffl_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'ffl_save_extra_profile_fields' );

/*
	Fix first last on register.
*/
function ffl_fix_user_display_name($user_id)
{
	//set the display name
	$info = get_userdata( $user_id );

	$display_name = trim($info->first_name . ' ' . $info->last_name);
	if(!$display_name)
		$display_name = $info->user_login;

	$args = array(
			'ID' => $user_id,
			'display_name' => $display_name
	);

	wp_update_user( $args ) ;
}
add_action("user_register", "ffl_fix_user_display_name", 20); ?>