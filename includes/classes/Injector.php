<?php

namespace HAMWORKS\Snippet_Injection;

class Injector {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'wp_head' ) );
		add_action( 'wp_body_open', array( $this, 'wp_body_open' ) );
		add_action( 'wp_footer', array( $this, 'wp_footer' ) );
	}

	public function wp_head() {
		echo get_option( 'snippet-injection-wp-head', '' );
	}

	public function wp_body_open() {
		echo get_option( 'snippet-injection-wp-body-open', '' );
	}

	public function wp_footer() {
		echo get_option( 'snippet-injection-wp-footer', '' );
	}
}
