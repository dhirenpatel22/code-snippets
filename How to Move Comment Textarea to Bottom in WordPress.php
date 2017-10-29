/**
 * How to Move Comment Textarea to Bottom in WordPress
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/how-to-move-comment-textarea-to-bottom-in-wordpress/
 */

function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );