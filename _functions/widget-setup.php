<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cyberize_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cyberize' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cyberize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 1', 'cyberize' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'cyberize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 2', 'cyberize' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'cyberize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 3', 'cyberize' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'cyberize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar 4', 'cyberize' ),
		'id'            => 'footer-sidebar-4',
		'description'   => esc_html__( 'Add widgets here.', 'cyberize' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'cyberize_widgets_init' );