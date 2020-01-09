<?php


namespace HAMWORKS\Snippet_Injection;


class Customizer {

	/**
	 * Customizer constructor.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_section' ) );
		add_action( 'customize_register', array( $this, 'register_settings' ) );
	}

	public function register_section( \WP_Customize_Manager $wp_customize ) {
		$wp_customize->add_section(
			'snippet-injection',
			array(
				'priority' => 100,
				'title'    => __( 'Snippets', 'snippet-injection' ),
			)
		);
	}

	private function cusomitzer_setting( \WP_Customize_Manager $wp_customize, $id, $attr ) {
		$default_attr = array(
			'label'       => '',
			'description' => '',
		);

		$attr = wp_parse_args( $attr, $default_attr );

		$wp_customize->add_setting(
			$id,
			array(
				'default' => '',
				'type'    => 'option',
			)
		);

		$wp_customize->add_control(
			new \WP_Customize_Code_Editor_Control(
				$wp_customize,
				$id,
				array(
					'code_type'        => 'text/html',
					'label'       => $attr['label'],
					'description' => $attr['description'],
					'priority'    => 10,
					'section'     => 'snippet-injection',
				)
			)
		);
	}

	/**
	 * Customizer configuration.
	 *
	 * @param \WP_Customize_Manager $wp_customize WP_Customize_Manager instance.
	 */
	public function register_settings( \WP_Customize_Manager $wp_customize ) {
		$this->cusomitzer_setting( $wp_customize, 'snippet-injection-wp-head', array(
			'label'       => __( '<head>', 'snippet-injection' ),
			'description' => esc_html__( '<head>', 'snippet-injection' )
		) );

		$this->cusomitzer_setting( $wp_customize, 'snippet-injection-wp-body-open', array(
			'label'       => __( 'After <body>', 'snippet-injection' ),
			'description' => esc_html__( 'After <body>', 'snippet-injection' )
		) );

		$this->cusomitzer_setting( $wp_customize, 'snippet-injection-wp-footer', array(
			'label'       => __( 'before </body>', 'snippet-injection' ),
			'description' => esc_html__( 'before </body>', 'snippet-injection' )
		) );
	}
}
