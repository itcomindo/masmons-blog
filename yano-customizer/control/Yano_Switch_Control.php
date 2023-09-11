<?php
namespace Control;

defined( 'ABSPATH' ) || exit;

/**
 * Yano Switch Control.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
final class Yano_Switch_Control extends \WP_Customize_Control {


	/**
	 * Adding third party libraries.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		// css
		if( wp_style_is( 'yano-checkbox-css', 'enqueued' ) == false ){
			wp_enqueue_style( 'yano-checkbox-css', yano_resource_url(). 'assets/checkbox/checkboxes.min.css' );
		}
	}


	/**
	 * Render the switch controller and display in frontend.
	 *
	 * @since 1.0.0
	 * 
	 * @return html
	 */
	public function render_content() {
	?>
		<div class="yano-switch-parent">
			<div class="yano-switch-container">

				<label class="yano-switch-label">
					<?php if( ! empty( $this->label ) ): ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif; ?>

					<?php if( ! empty( $this->description ) ): ?>
						<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
					<?php endif; ?>
				</label>

				<div class="ckbx-style-9 yano-switch">
                    <input  type="checkbox" 
                    		id="<?php echo esc_attr( $this->id ); ?>" 
                    		value="<?php echo esc_attr( $this->value() ); ?>" 
                    		name="<?php echo esc_attr( $this->id ); ?>"
                    		<?php echo $this->link(); ?>>
                    <label for="<?php echo esc_attr( $this->id ); ?>"></label>
                </div>
                
			</div>
		</div>

	<?php
	}
}