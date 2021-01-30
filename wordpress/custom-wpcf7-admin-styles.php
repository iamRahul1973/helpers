<?php

function add_custom_cf7_styles() {

		if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) :
			?>
			<style type="text/css">

				#wpcf7-admin-form-element #contact-form-editor, 
				#wpcf7-admin-form-element #contact-form-editor textarea#wpcf7-form, 
				#wpcf7-admin-form-element #contact-form-editor .form-table input, 
				#wpcf7-admin-form-element #contact-form-editor .form-table textarea, 
				#wpcf7-admin-form-element #contact-form-editor #messages-panel input, 
				#wpcf7-admin-form-element #contact-form-editor textarea#wpcf7-additional-settings {
					font-family: Tahoma !important;
				}

				#wpcf7-admin-form-element #contact-form-editor textarea#wpcf7-form, 
				#wpcf7-admin-form-element #contact-form-editor textarea#wpcf7-additional-settings {
					font-size: 16px;
					line-height: 28px;
				}

				/* Flamingo */

				#inboundfieldsdiv, #inboundmetadiv {
					font-family: Tahoma;
				}

			</style>
			<?php
		endif;

	}

add_action( 'admin_head', 'add_custom_cf7_styles' );
