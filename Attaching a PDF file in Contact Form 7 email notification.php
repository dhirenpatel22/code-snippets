<?php 
/**
 * Attaching a PDF file in Contact Form 7 email notification
 * @author Dhiren Patel
 * @link http://www.dhirenpatel.me/attach-pdf-file-in-cf7-email/
 */

add_filter( 'wpcf7_mail_components', 'mycustom_wpcf7_mail_components' );

function mycustom_wpcf7_mail_components( $components ) {
    $components['attachments'][] = get_template_directory().'/pdf/test.pdf'; // PDF Path

    return $components;
}