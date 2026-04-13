<?php
/**
 * Custom Search Widget
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class GC_Widget_Search extends WP_Widget {
	/**
	 * Sets up a new Search widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_gc_search',
			'description'                 => __( 'A best search form for your site.' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'gc-search', _x( 'GC Search', 'geoffreycrofte' ), $widget_ops );
	}
	/**
	 * Outputs the content for the current Search widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Search widget instance.
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$subtitle = ! empty( $instance['subtitle'] ) ? $instance['subtitle'] : '';

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $subtitle ) {
			echo '<p class="widget-subtitle">' . $subtitle . '</p>';
		}

		// Use current theme search form if it exists.
		get_search_form();

		echo $args['after_widget'];
	}

	/**
	 * Outputs the settings form for the Search widget.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'subtitle' => '' ) );
		$title    = $instance['title'];
		$subtitle = $instance['subtitle'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subitle:' ); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>"><?php echo esc_attr( $subtitle ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Handles updating settings for the current Search widget instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = $old_instance;
		$new_instance      = wp_parse_args( (array) $new_instance, array( 'title' => '', 'subtitle' => '' ) );
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['subtitle'] = sanitize_text_field( $new_instance['subtitle'] );
		return $instance;
	}

}
