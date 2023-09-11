<?php
namespace Control;

defined( 'ABSPATH' ) || exit;

/**
 * Yano Color Set Control.
 *
 * @since   1.0.0
 * @version 1.0.0
 */
final class Yano_Color_Set_Control extends \WP_Customize_Control {


	/**
	 * The type of this control.
	 *
	 * @since 1.0.0
	 * 
	 * @var string
	 */
	public $type = 'color-set';


	/**
	 * The set of colors.
	 *
	 * @since 1.0.0
	 * 
	 * @var array
	 */
	public $colors;


	/**
	 * The default value.
	 *
	 * @since 1.0.0
	 * 
	 * @var string
	 */
	public $default;


	/**
	 * The shape of each color pills | square | circle.
	 *
	 * @since 1.0.0
	 * 
	 * @var string
	 */
	public $shape;


	/**
	 * The size of color pills.
	 *
	 * @since 1.0.0
	 * 
	 * @var number
	 */
	public $size;


	/**
	 * Validate the value of shape property.
	 *
	 * @since 1.0.0
	 * 
	 * @return string
	 */
	private function shape_value() {
		$output = 'square';
		if ( ! empty( $this->shape ) ) {
			if ( in_array( $this->shape, ['square', 'circle'] ) ) {
				$output = $this->shape;
			}
		}
		return $output;
	}


	/**
	 * Return the value of size with pixel unit.
	 *
	 * @since 1.0.0
	 * 
	 * @return string;
	 */
	private function size_value() {
		return ( ! empty( $this->size ) ? $this->size : 20 ) . 'px';
	}


	/**
	 * Return the id with extension index for uniqueness.
	 *
	 * @since 1.0.0
	 * 
	 * @return string
	 */
	private function color_id( $index ) {
		return $this->id . '-' . $index;
	}


	/**
	 * Validate if the value is select during document load.
	 *
	 * @since 1.0.0
	 * 
	 * @return string
	 */
	private function is_selected( $value ) {
		if ( $this->value() == $value ) {
			return 'selected';
		}
	}

	/**
	 * Render the color set controller and display in frontend.
	 *
	 * @since 1.0.0
	 * 
	 * @return html
	 */
	public function render_content() {
	?>
		<label>
			<?php if ( ! empty( $this->label ) ): ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( ! empty( $this->description ) ): ?>
				<span class="description customize-control-description"><?php echo wp_kses_post( $this->description ); ?></span>
			<?php endif; ?>
		</label>

		<input type="text" 
				class="yano-color-set"
				id="<?php echo esc_attr( $this->id ) ?>" 
				name="<?php echo esc_attr( $this->id ) ?>"
				value="<?php echo esc_attr( $this->value() ) ?>"
				hidden="hidden"
				<?php echo $this->link(); ?>>

		<div class="yano-accordion yano-color-set-parent">
			<div class="yano-accordion-head" data-state="close">
				<div class="yano-accordion-flex">
					<div class="yano-accordion-title">
						<div id="<?php echo esc_attr( $this->id ) ?>-color-preview" 
							 class="yano-color-set-color-preview <?php echo esc_attr( $this->shape_value() ) ?>"
							 style="background-color: <?php echo esc_attr( $this->value() ); ?>"></div>
						<h3 id="<?php echo esc_attr( $this->id ) ?>-color-label" 
							class="yano-color-set-color-label"><?php echo esc_attr( $this->value() ); ?></h3>
					</div>
					<i class="dashicons dashicons-arrow-down yano-accordion-arrow-down"></i>
					<i class="dashicons dashicons-arrow-up yano-accordion-arrow-up"></i>
				</div>
			</div>
			<div class="yano-accordion-body">
				<div class="yano-accordion-body-content">
					
					<div class="yano-color-set-body-overflow">
						<div class="yano-color-set-body">
							<?php if ( ! empty( $this->colors ) ): ?>
									<?php foreach ( $this->colors as $key => $value ): ?>

										<div  class="yano-color-set-colors-container <?php echo esc_attr( $this->id ) ?>-container <?php echo esc_attr( $this->shape_value() ) ?> <?php echo $this->is_selected( $value ) ?>" 
											  data-color="<?php echo esc_attr( $value ) ?>"
											  data-current_color="<?php echo esc_attr( $this->value() ) ?>"
											  data-target_id="<?php echo esc_attr( $this->id ) ?>"
											  style="width: <?php echo esc_attr( $this->size_value() ) ?>; height: <?php echo esc_attr( $this->size_value() ) ?>;">
											<div class="yano-color-set-color"style="background-color: <?php echo esc_attr( $value ) ?>"></div>
										</div>

									<?php endforeach; ?>
							<?php endif; ?>
							
							<!-- Hidden Component -->
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<div class="yano-hidden-component <?php echo esc_attr( $this->shape_value() )?>" style="width: <?php echo esc_attr( $this->size_value() ) ?>"></div>
							<!-- End Hidden Component -->

						</div>
					</div>

				</div>
				<div class="yano-accordion-body-footer">
					<button class="button-secondary yano-color-set-btn-default" 
							data-target_preview="<?php echo esc_attr( $this->id ) ?>-color-preview"
							data-target_id="<?php echo esc_attr( $this->id ) ?>"
							data-default_value="<?php echo esc_attr( $this->default ) ?>">Default</button>
				</div>
			</div>
		</div>

	<?php
	}
}