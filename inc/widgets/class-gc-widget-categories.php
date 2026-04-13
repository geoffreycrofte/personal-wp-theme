<?php
/**
 * Core class used to implement a Categories widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class GC_Widget_Categories extends WP_Widget {

	/**
	 * Sets up a new Categories widget instance.
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'gc_widget_categories',
			'description'                 => __( 'A list of categories width posts count.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'gc-categories', __( 'GC Categories' ), $widget_ops );
	}

	/**
	 * Outputs the content for the current Categories widget instance.
	 */
	public function widget( $args, $instance ) {
		static $first_dropdown = true;

		$default_title = __( 'Categories' );
		$title         = ! empty( $instance['title'] ) ? $instance['title'] : $default_title;
		$subtitle     = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $subtitle ) {
			echo '<p class="widget-subtitle">' . $subtitle . '</p>';
		}

		$cat_args = array(
			'orderby'      => 'name',
			'show_count'   => 1,
			'hierarchical' => 0,
		);

		$format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';

		/** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
		$format = apply_filters( 'navigation_widgets_format', $format );

		if ( 'html5' === $format ) {
			// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
			$title      = trim( strip_tags( $title ) );
			$aria_label = $title ? $title : $default_title;
			echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
		}
		?>
		<ul>
			<?php
			$cat_args['title_li'] = '';
			/**
			 * Filters the arguments for the Categories widget.
			 */
			wp_list_categories( apply_filters( 'widget_categories_args', $cat_args, $instance ) );
			?>
		</ul>

	<?php
		if ( 'html5' === $format ) {
			echo '</nav>';
		}

		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Categories widget.
	 */
	public function form( $instance ) {
		// Defaults.
		$instance     = wp_parse_args( (array) $instance, array( 'title' => '', 'subtitle' => '' ) );
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>"><?php echo esc_attr( $instance['subtitle'] ); ?></textarea>
		</p>
		
		<?php
	}

	/**
	 * Handles updating settings for the current Categories widget instance.
	 **/
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['subtitle']     = $new_instance['subtitle'];

		return $instance;
	}

}
