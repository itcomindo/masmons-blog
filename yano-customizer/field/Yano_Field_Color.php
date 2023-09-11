<?php
namespace Field;

use Field\Yano_Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Yano Field Color.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
final class Yano_Field_Color extends Yano_Settings {


	/**
	 * Rendering Color.
	 *
	 * @since 1.0.0
	 * 
	 * @param object  $wp_customize  Object from WP_Customize_Manager.
	 * @param array   $config 		 List of configuration.
	 */
	public function render( $wp_customize, $config ) {
		$rules = array(
			'label'			=> array(
				'rule'		=> 'empty',
				'default'	=> 'Color Field',
				'type'		=> 'string'
			),
			'description'	=> array(
				'rule'		=> 'empty',
				'default'	=> '',
				'type'		=> 'string'
			),
			'section'		=> array(
				'rule'		=> 'required',
				'default'	=> '',
				'type'		=> 'string'
			),
			'priority'		=> array(
				'rule'		=> 'empty',
				'default'	=> '',
				'type'		=> 'number'
			),
			'active_callback' => array(
				'rule'		=> 'empty',
				'default'	=> '',
				'type'		=> 'any'
			)
		);

		$field_name =  yano_error_field_name( 'color', $config['settings'] );
		$args = yano_sanitize_argument( $field_name, $config, $rules );
		if ( is_array( $args ) && parent::sanitize_argument( $config, $field_name ) != false ) {
			$this->init_settings( $wp_customize, $config, $field_name );
			$wp_customize->add_control( $args['settings'] . '_field', array(
				'type'			=> 'color',
				'label'			=> __( $args['label'] ),
				'description'	=> esc_html( $args['description'] ),
				'section'		=> $args['section'],
				'settings'		=> $args['settings'],
				'priority'		=> $args['priority'],
				'active_callback' => $args['active_callback']
			));
		}
	}
}