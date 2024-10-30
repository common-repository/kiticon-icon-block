<?php
class KITICON_Scripts {
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'kahafkit_js' ) );
	}
	public function kahafkit_js() {
		// js 
	}
}
$kiticon_scripts = new KITICON_Scripts();
