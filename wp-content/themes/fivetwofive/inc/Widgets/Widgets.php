<?php
/**
 * Handle all the functions related in widgets.
 *
 * @package Fivetwofive
 * @subpackage FivetwofiveTheme/Widgets
 * @since 1.0.0
 */

namespace Fivetwofive\FivetwofiveTheme\Widgets;

use Fivetwofive\FivetwofiveTheme\Interfaces\Component_Interface;

/**
 * Handle all the functions related in widgets.
 */
class Widgets implements Component_Interface {

	public function register() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
	}

	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	public function widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'fivetwofive' ),
				'id'            => 'primary-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'fivetwofive' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
