<?php
/**
 * widget-juiz-ads.php
 * Create a list of 4 ads
 */

class GC_Ads_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'widget_gc_promo',
			__('GC Ads', 'juiz'),
			array( 'description' => __( 'A list of ads', 'geoffreycrofte' ))
		);
	}

	public function widget( $args, $instance ) {
		
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		$tutocom = array(
			'<a href="http://fr.tuto.com/?aff=g26556d"><img src="'.get_stylesheet_directory_uri().'/assets/img/ads/ad-tutocom.png" alt="Tuto.com" width="125" height="125" loading="lazy"></a>',

			'<a href="http://fr.tuto.com/?aff=g26556d"><img src="' . get_stylesheet_directory_uri() . '/assets/img/ads/ad-tutocom-2.jpg" alt="Tuto.com" width="125" height="125" loading="lazy"></a>',

			'<a href="http://fr.tuto.com/?aff=g26556d"><img src="' . get_stylesheet_directory_uri() . '/assets/img/ads/ad-tutocom-3.jpg" alt="Tuto.com" width="125" height="125" loading="lazy"></a>',
			);

		$pif = mt_rand(0,2);
		
		echo '<ul class="gc-promo-link">'.
				'<li>
					'.$tutocom[$pif].'
				</li>
				<li>
					<a hreflang="en" href="http://themeforest.net/?ref=creativejuiz"><img lang="en" src="' . get_stylesheet_directory_uri() . '/assets/img/ads/ad-themeforest.png" alt="ThemeForest" width="125" height="125" loading="lazy"></a>
				</li>
				<li>
					<a hreflang="en" href="http://click.linksynergy.com/fs-bin/click?id=J67NZr0ecDo&amp;offerid=323058.50&amp;subid=0&amp;type=4"><img lang="en" src="' . get_stylesheet_directory_uri() . '/assets/img/ads/ad-udemy.png" alt=", online courses" width="125" height="125" loading="lazy"></a>
				</li>
				<!--li>
					<a href="' . get_bloginfo('url') . '/contact/"><span class="ad_free">' . __('Your website here', 'geoffreycrofte') . '<br><small>' . __('Contact me', 'geoffreycrofte') . '</small></span></a>
				</li-->
			</ul>
			';

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		
		$title = '';
		if ( isset( $instance[ 'title' ] ) ) { $title = $instance[ 'title' ]; }
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

} // class Foo_Widget