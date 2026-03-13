<?php //Adding custom menu

add_action( 'admin_menu' ,'sap_generate_pdf',10);
function sap_generate_pdf(){
	add_menu_page(
		__( 'Generate PDF', 'textdomain' ),
		'Generate PDF',
		'manage_options',
		'sap-generate-pdf',
		'sap_generate_pdf_callback',
		'dashicons-admin-site'
	);
}

// Callback function for custom menu
function sap_generate_pdf_callback(){
	?>
	<div class="mch-settings-section-header">
		<h3>Generate PDFs</h3>
	</div>
	<?php
		$taxonomies = get_terms( array(
		    'taxonomy' => 'category',
		    'hide_empty' => true
		));
		if ( !empty($taxonomies) ){ ?>
			<table class="form-table">
				<tbody>
					<?php foreach( $taxonomies as $taxonomy ) {

						$tax_link = get_term_link( $taxonomy );
						?>
						<tr>
							<th scope="row"><label for="sitekey" ><?php echo $taxonomy->name; ?></label></th>
							<td>
								<a href="<?php echo esc_url( $tax_link ); ?>?generate_pdf" class="button button-primary generate_pdf">Re-Generate PDF</a>
								<p class="spinner" style="float:none;"></p>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table><?php
		}
}