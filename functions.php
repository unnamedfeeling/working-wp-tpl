<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// CMB2
if ( file_exists( dirname( __FILE__ ) . '/assets/php/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/cmb2/init.php';
} elseif ( file_exists(  dirname( __FILE__ ) . '/assets/php/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/CMB2/init.php';
}
// CMB2 attached posts
if ( file_exists( dirname( __FILE__ ) . '/assets/php/cmb2-attached-posts/cmb2-attached-posts-field.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/cmb2-attached-posts/cmb2-attached-posts-field.php';
}

// CMB2 attached posts ajax
if ( file_exists( dirname( __FILE__ ) . '/assets/php/cmb2-field-post-search-ajax/cmb-field-post-search-ajax.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/cmb2-field-post-search-ajax/cmb-field-post-search-ajax.php';
}

// metaboxes include
if ( file_exists( dirname( __FILE__ ) . '/assets/php/metaboxes.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/metaboxes.php';
}

// tabbed admin menu include
if ( file_exists( dirname( __FILE__ ) . '/assets/php/tabbed-admin-menu.php' ) ) {
  require_once dirname( __FILE__ ) . '/assets/php/tabbed-admin-menu.php';
}

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width)){
    $content_width = 900;
}

if (function_exists('add_theme_support')){

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('main-slide', 1150, 500, true);
    add_image_size('main-prod-loop', 230, 120, true);
    add_image_size('single-prod-img', 385, 257, true);

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Enable HTML5 support
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

    // Localisation Support
    load_theme_textdomain('generic', get_template_directory() . '/assets/languages');

    add_theme_support( 'woocommerce' );
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// Global options Define
function generic_globals(){
	global $options;
	$options['prfx']='generic_';
	$options['tpld']=get_template_directory_uri();
	$options['brnc']=get_option('generic_options');
	$options['gnrl']=get_option('general_options');
	$options['socl']=get_option('social_options');
	$options['advd']=get_option('advanced_options');
	$options['translate'] = array(
		"am" => __("am", 'generic'),
		"pm" => __("pm", 'generic'),
		"AM" => __("AM", 'generic'),
		"PM" => __("PM", 'generic'),
		"Monday" => __("Monday", 'generic'),
		"Mon" => __("Mon", 'generic'),
		"Tuesday" => __("Tuesday", 'generic'),
		"Tue" => __("Tue", 'generic'),
		"Wednesday" => __("Wednesday", 'generic'),
		"Wed" => __("Wed", 'generic'),
		"Thursday" => __("Thursday", 'generic'),
		"Thu" => __("Thu", 'generic'),
		"Friday" => __("Friday", 'generic'),
		"Fri" => __("Fri", 'generic'),
		"Saturday" => __("Saturday", 'generic'),
		"Sat" => __("Sat", 'generic'),
		"Sunday" => __("Sunday", 'generic'),
		"Sun" => __("Sun", 'generic'),
		"January" => __("January", 'generic'),
		"Jan" => __("янв", 'generic'),
		"February" => __("February", 'generic'),
		"Feb" => __("Feb", 'generic'),
		"March" => __("March", 'generic'),
		"Mar" => __("Mar", 'generic'),
		"April" => __("April", 'generic'),
		"Apr" => __("Apr", 'generic'),
		"May" => __("May", 'generic'),
		"June" => __("June", 'generic'),
		"Jun" => __("Jun", 'generic'),
		"July" => __("July", 'generic'),
		"Jul" => __("Jul", 'generic'),
		"August" => __("August", 'generic'),
		"Aug" => __("Aug", 'generic'),
		"September" => __("September", 'generic'),
		"Sep" => __("Sep", 'generic'),
		"October" => __("October", 'generic'),
		"Oct" => __("Oct", 'generic'),
		"November" => __("November", 'generic'),
		"Nov" => __("Nov", 'generic'),
		"December" => __("December", 'generic'),
		"Dec" => __("Dec", 'generic'),
		"st" => __("st", 'generic'),
		"nd" => __("nd", 'generic'),
		"rd" => __("rd", 'generic'),
		"th" => __("th", 'generic')
	);
}

// HTML5 Blank navigation
function generic_nav(){
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul class="headmidmenu">%3$s</ul>',
        'depth'           => 0,
        'walker'          => new Nav_Menu_Walker
        )
    );
}

// Menu walker
class Nav_Menu_Walker extends Walker_Nav_Menu{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
		// print_r($item);

		$class=($depth>=1) ? 'headmenubot_item' : 'headmidmenu_item';
		$class.=($depth==0&&$item->current&&!in_array('headmidmenu_item-logo', $item->classes)) ? ' headmidmenu_link-active':'';
		// $class.=($depth>=1 ? 'header__bottom-sub-menu-link ' : 'header__bottom-menu-link ');
		$class.=($depth>=1&&$item->current ? ' headmidmenu_link-active ':'');
		$class.=' d-'.$depth;
		$addclass=' ';
		foreach ($item->classes as $key => $val) {
			$addclass.=' '.$val;
		}
		$class.=$addclass;
		$output.= '<li class="'.$class.'">';
		$jsbtn=(in_array('headmidmenu_item-logo', $item->classes)) ? ' headmidmenu_link-logo' : '';
		// $jsbtn='';
		// print_r($item->classes);
		$attributes  = ($depth>=1) ? ' class="headmenubot_link"' : ' class="headmidmenu_link'.$jsbtn.'"';
		if( !empty ( $item->attr_title ) && $item->attr_title !== $item->title ){
			// Avoid redundant titles
			$attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		} else {
			$title       = apply_filters( 'the_title', $item->title, $item->ID );
			$attributes .= ' title="' . $title .'"';
		}
		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>"
						. "$args->link_after$args->after";
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters('walker_nav_menu_start_el',   $item_output,   $item,   $depth,   $args);
	}
	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ){
		if($depth>=0){
			$output .= '<ul class="headmenubot">';
		} else {
			$output .= '<ul class="headmidmenu">';
		}
	}
	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ){
		// $output .= '</ul>';
		// if($depth>=0){
			$output .= '</ul>';
		// } else {
		// 	$output .= '</li>';
		// }
	}
	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ){
		$output .= '</li>';
	}
}

function generic_footer1_nav(){
    wp_nav_menu(
    array(
        'theme_location'  => 'footer-menu1',
        'menu'            => '',
        'container'       => 'nav',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<p class="footer_text">Компания</p><ul class="footer_list">%3$s</ul>',
        'depth'           => 0,
		'walker'          => new Nav_Footer1_Menu_Walker
        )
    );
}

// Menu walker
class Nav_Footer1_Menu_Walker extends Walker_Nav_Menu{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
		// print_r($item);
		// $jsbtn=(in_array('menu-item-has-children', $item->classes)) ? ' js-footer-submenu' : '';
		$class='footer_item';
		$class.=($depth==0&&$item->current) ? ' active':'';
		$class.=($depth>=1 ? 'footer-main__link ':'');
		$class.=($depth>=1&&$item->current ? 'active ':'');
		$class.=' d-'.$depth;
		$output.= '<li class="'.$class.'">';
		$attributes  = ($depth>=1) ? '' : ' class="footer_link"';
		// $attributes  = '';
		if( !empty ( $item->attr_title ) && $item->attr_title !== $item->title ){
			// Avoid redundant titles
			$attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		} else {
			$title       = apply_filters( 'the_title', $item->title, $item->ID );
			$attributes .= ' title="' . $title .'"';
		}
		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>"
						. "$args->link_after$args->after";
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters('walker_nav_menu_start_el',   $item_output,   $item,   $depth,   $args);
	}
	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ){
		if($depth>=0){
			$output .= '<ul class="footer-main-sublist">';
		} else {
			$output .= '<ul class="footer-main-list clearfix">';
		}
	}
	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ){
		$output .= '</ul>';
	}
	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ){
		$output .= '</li>';
	}
}

function generic_footer2_nav(){
    wp_nav_menu(
    array(
        'theme_location'  => 'footer-menu2',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<p class="footer_text">Информация</p><ul class="footer_list">%3$s</ul>',
        'depth'           => 0,
		'walker'          => new Nav_Footer2_Menu_Walker
        )
    );
}

// Menu walker
class Nav_Footer2_Menu_Walker extends Walker_Nav_Menu{
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ){
		// print_r($item);
		// $jsbtn=(in_array('menu-item-has-children', $item->classes)) ? ' js-footer-submenu' : '';
		$class='footer_item';
		$class.=($depth==0&&$item->current) ? ' active':'';
		$class.=($depth>=1 ? 'footer-main__link ':'');
		$class.=($depth>=1&&$item->current ? 'active ':'');
		$class.=' d-'.$depth;
		$output.= '<li class="'.$class.'">';
		$attributes  = ($depth>=1) ? '' : ' class="footer_link"';
		// $attributes  = '';
		if( !empty ( $item->attr_title ) && $item->attr_title !== $item->title ){
			// Avoid redundant titles
			$attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		} else {
			$title       = apply_filters( 'the_title', $item->title, $item->ID );
			$attributes .= ' title="' . $title .'"';
		}
		! empty ( $item->url )
			and $attributes .= ' href="' . esc_attr( $item->url ) .'"';
		$attributes  = trim( $attributes );
		$title       = apply_filters( 'the_title', $item->title, $item->ID );
		$item_output = "$args->before<a $attributes>$args->link_before$title</a>"
						. "$args->link_after$args->after";
		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters('walker_nav_menu_start_el',   $item_output,   $item,   $depth,   $args);
	}
	/**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ){
		if($depth>=0){
			$output .= '<ul class="footer-main-sublist">';
		} else {
			$output .= '<ul class="footer-main-list clearfix">';
		}
	}
	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ){
		$output .= '</ul>';
	}
	/**
	 * @see Walker::end_el()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ){
		$output .= '</li>';
	}
}

// Load HTML5 Blank scripts (header.php)
function generic_header_scripts(){
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
		wp_deregister_script( 'jquery' );
		wp_deregister_script( 'jquery-migrate' );
		wp_enqueue_script('jquery', '//cdn.jsdelivr.net/combine/npm/jquery@3.2.1,npm/jquery-migrate@3.0.0,npm/blazy@1.8.2,npm/magnific-popup@1.1.0,npm/slick-carousel@1.7.1', array(), '3.2.1');
    }
}

// Load HTML5 Blank conditional scripts
function generic_conditional_scripts(){
    if (is_page('pagenamehere')) {
        // Conditional script(s)
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scriptname');
    }
}

// Load HTML5 Blank styles
function generic_styles(){
	wp_enqueue_style('gfonts', '//fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:300,400,700|Playfair+Display', array(), '1.0', 'all');
	wp_enqueue_style('mainstyle', get_template_directory_uri().'/assets/dist/app.min.css', array(), '1.0', 'all');
}

// footer scripts
function generic_footer_scripts(){
	wp_deregister_script( 'wp-embed' );
	// wp_enqueue_script('footer-scripts', '//cdn.jsdelivr.net/g/jquery.magnific-popup@1.0.0,blazy@1.8.2', array('jquery'), '1.0');
	// wp_enqueue_script('slickslider', get_template_directory_uri() . '/assets/js/libs/slick/slick/slick.min.js', array('jquery'), '1.6.1');
	wp_enqueue_script('genericscripts-min', get_template_directory_uri() . '/assets/dist/app.min.js', array(), '1.0.0');
	wp_localize_script( 'genericscripts-min', 'ajax_func', array(
		'ajax_url' => admin_url( 'admin-ajax.php' ),
		'tpld' => get_template_directory_uri(),
	));
}

//cleanup version tag
function remove_cssjs_ver( $src ) {
	$src = remove_query_arg( array('v', 'ver', 'rev', 'id'), $src );
	return $src;
}

// remove emoji
function disable_wp_emojicons() {
  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  // add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}

// Register HTML5 Blank Navigation
function register_generic_menu(){
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Главное меню', 'generic'), // Main Navigation
        'footer-menu1' => __('Меню футера 1', 'generic'), // Sidebar Navigation
        'footer-menu2' => __('Меню футера 2', 'generic'), // Sidebar Navigation
        // 'extra-menu' => __('Extra Menu', 'generic') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = ''){
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var){
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes){
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')){
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'generic'),
        'description' => __('Description for this widget-area...', 'generic'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'generic'),
        'description' => __('Description for this widget-area...', 'generic'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style(){
    global $wp_widget_factory;

    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array(
            $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
            'recent_comments_style'
        ));
    }
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// set custom number for 'posts_per_page' per posttype
function posts_per_page_func( $query ) {
	if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'project' ) ) {
		$query->set( 'posts_per_page', '100' );
	}
	if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'post' ) ) {
	// if ( !is_admin() && $query->is_main_query() && is_page( 'novosti' ) ) {
		// $query->set( 'posts_per_page', '-1' );
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'asc' );
	}
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length){
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = ''){
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function generic_blank_view_article($more){
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'generic') . '</a>';
}

// Remove Admin bar
function remove_admin_bar(){
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function generic_style_remove($tag){
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ){
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults){
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments(){
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth){
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

// likes function
function generic_news_like() {
	// global $post;
	$id=$_POST['params']['like_id'];
	$liked=0;
	$exp=time()+60*60*24*30;
	// if($_COOKIE['liked']!==$id){
		// exit(json_encode($_POST));
	    $love = get_post_meta( $id, 'generic_post_likes', true );
	    $love++;
	    if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
	        update_post_meta( $id, 'generic_post_likes', $love );
	        echo $love;
			$liked=1;
	    }
		// setcookie('liked', $id, $exp);
	// }
	$response=[
		'id' => $id,
		'time' => $exp,
		'liked' => $liked
	];
    die(json_encode($response));
}

// ajax get posts for main page
function generic_ajax_posts(){
	global $options, $tpl;
	$tpl=$options['tpld'];

	$params=$_POST;
	// die(json_encode( $params ));
	$offset=$params['params']['p']*((!empty($params['params']['q'])) ? $params['params']['q'] : 4);
	$perpage=(!empty($params['params']['ppg'])) ? $params['params']['ppg'] : 4;
	$post_type=$params['params']['pt'];
	$catid=(!empty($params['params']['cat']))?$params['params']['cat']:null;
	$excl=(!empty($params['params']['e']))?explode(',', $params['params']['e']):array();
	$args=array(
		'post_type'=>$post_type,
		'posts_per_page'=>$perpage,
		'offset'=>(empty($excl))?$offset:0,
		'post__not_in'=> $excl
	);
	if(!empty($catid)){
		$args['tax_query']=array(
			array(
				'taxonomy'=>'product_cat',
				'terms'=>array($catid)
			)
		);
	}
	$posts=new WP_Query($args);
	ob_start();
	if (!empty($excl)) {
		$ret_ids='';
	}
	if ($posts->have_posts()): while ($posts->have_posts()) : $posts->the_post();
		$ret_ids.=(!empty($excl))?get_the_ID().',':null;
		get_template_part( 'assets/php/parts/loop', 'course' );
	endwhile;
	else : ?>
		<div class="noposts grid-item design fullwidth" style="width:100%;font-size:2rem;font-weight:bold;"><?=(empty($offset)||$offset==1)?__( 'No swimsuits!', 'generic' ):__( 'No more swimsuits!', 'generic' )?></div>
	<?php endif;
	// die(json_encode($args));
	$cont=ob_get_clean();
	// $cont=str_replace('data-src', 'src', $cont);
	// $response=[
	// 	'offset' => $offset,
	// 	'total_posts' => wp_count_posts('post'),
	// 	'content' => $cont
	// ];
	if (!empty($excl)) {
		$response['pids']=$ret_ids;
	}
	$response['offset']=$offset;
	$response['total_posts']=wp_count_posts($post_type)->publish;
	$response['content']=$cont;
	// $response['params']=$params;
	die(json_encode($response));
}

// ajax get posts for main page
function generic_ajax_filterPosts(){
	// global $post;
	// wp_reset_query();
	$params=$_POST;
	$post_type=$params['params']['pt'];
	// $catid=(!empty($params['params']['cat']))?$params['params']['cat']:$params['params']['c'];
	// $tagid=(!empty($params['params']['tag']))?$params['params']['tag']:$params['params']['t'];
	$catid=(empty($params['params']['c']))?null:(int) $params['params']['c'];
	$tagid=(empty($params['params']['t']))?null:(int) $params['params']['t'];
	$args=array(
		'post_type'=>$post_type,
		'posts_per_page'=>12,
		'post_status'=>'publish',
		// 'offset'=>0
	);
	if(!empty($catid)){
		$response['tax_type']='cat';
		$args['tax_query']=array(
			array(
				'taxonomy'=>'product_cat',
				'field' => 'id',
				'terms'=>array((int) $catid)
			)
		);
	}
	if(!empty($tagid)){
		$response['tax_type']='tag';
		$args['tax_query']=array(
			array(
				'taxonomy'=>'product_tag',
				'field' => 'id',
				'terms'=>(int) $tagid
			)
		);
		// $args['product_tag']=$tagid;
	}
	$posts=new WP_Query($args);
	ob_start();
	if ($posts->have_posts()): while ($posts->have_posts()) : $posts->the_post();
		get_template_part('loop', 'swim_grid-gen');
	endwhile;
	else : ?>
		<div class="noposts grid-item design fullwidth" style="width:100%;font-size:2rem;font-weight:bold;"><?=(empty($offset)||$offset==1)?__( 'No swimsuits!', 'generic' ):__( 'No more swimsuits!', 'generic' )?></div>
	<?php endif;
	// die(json_encode($args));
	$cont=ob_get_clean();
	// $cont=str_replace('data-src', 'src', $cont);
	// $response=[
	// 	'offset' => $offset,
	// 	'total_posts' => wp_count_posts('post'),
	// 	'content' => $cont
	// ];
	$response['offset']=$offset;
	$response['total_posts']=wp_count_posts($post_type)->publish;
	$response['content']=$cont;
	// $response['query']=$posts;
	$response['args']=$args;
	$response['post']=$params;
	$response['type']='generic_ajax_filterPosts';
	die(json_encode($response));
}

// ajax get cart content
function generic_ajax_cart(){
	global $woocommerce;
	ob_start();
	echo WC()->cart->get_cart_contents_count();
	$response['content']=ob_get_clean();
	die(json_encode($response));
}


// ajax add to cart
function generic_ajax_add_to_cart() {
	global $woocommerce;
	$params=$_POST['params'];

	// die(json_encode( $params ));

	$prid = $params['prodid'];
	$qty = $params['quant'];
	$var = (!empty($params['variation'])) ? $params['variation'] : null;
	$pass = apply_filters( 'woocommerce_add_to_cart_validation', true, $prid, $qty );
	$pr_stat = get_post_status( $prid );
	$res=array();
	// $res['id']=$prid;
	// $res['qty']=$qty;
	// $res['pass']=$pass;
	// $res['stat']=$pr_stat;
	$product=new WC_Product($prid);
	// wp_send_json_success( $res );

	if ( $pass && WC()->cart->add_to_cart( $prid, $qty, $var ) && 'publish' === $pr_stat ) {
		// ob_start();
		do_action( 'woocommerce_ajax_added_to_cart', $prid );
		$res['result']=wc_add_to_cart_message( $prid, true, true );
		$ttl='';
		if($var==0||$var==''){
			$ttl=$product->get_name();
		} else {
			$variations=new WC_Product_Variation($var);
			$res['prod']=json_encode( $variations );
			$res['attr']=json_encode($variations->get_attributes());
			$terms='';
			$i=1;
			$c=count($variations->get_attributes());
			foreach ($variations->get_attributes() as $key => $value) {
				// $terms.='$key='.$key.', $value='.$value.', $pa_pos='.strpos($key,'pa_');
				$varname=(strpos($key,'pa_')&&strpos($key,'pa_')>=0)?get_term_by( 'slug', $value, $key )->name : get_term_by( 'slug', $value, 'pa_'.$key )->name;
				$terms.=(!empty($varname))?$varname:get_term_by( 'slug', $value, $key )->name;
				$terms.=($i<$c) ? ', ' : null;
				$i++;
			}

			$res['title']=json_encode($terms);
			$ttl=$product->get_name().' ('.$terms.')';
		}
		// $res['html']='<div id="simpleModal" class="cartmodal"><div class="fade"></div><div class="modal-window small"><button class="close js-close" title="'.__( 'Close', 'generic' ).'">&times;</button><h3>'.__( 'Your product has been added to cart!', 'generic' ).'</h3><p>'.__( 'Product', 'generic' ).' - '.$ttl.', '.$qty.' '.__( 'pcs', 'generic' ).'.</p>
		// <p>'.__( 'Go to', 'generic' ).' <a href="'.$woocommerce->cart->get_cart_url().'" target="_blank">'.__( 'cart', 'generic' ).'</a>?</p><p><a href="'.$woocommerce->cart->get_checkout_url().'" target="_blank">'.__( 'Checkout', 'generic' ).'</a>?</p></div></div>';
		$res['html']='<div class="cartmodal-window small"><h3>'.__( 'Your product has been added to cart!', 'generic' ).'</h3><p>'.__( 'Product', 'generic' ).' - '.$ttl.', '.$qty.' '.__( 'pcs', 'generic' ).'.</p>
		<p>'.__( 'Go to', 'generic' ).' <a href="'.wc_get_cart_url().'" target="_blank">'.__( 'cart', 'generic' ).'</a>?</p><p><a href="'.wc_get_checkout_url().'" target="_blank">'.__( 'Checkout', 'generic' ).'</a>?</p></div>';
		wp_send_json_success( $res );
	} else {
		// If there was an error adding to the cart, redirect to the product page to show any errors
		$res['result'] = array(
			'error'	   => true,
			'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $prid ), $prid )
		);
		wp_send_json_error( $res );
	}
	die();
}

// callback for diltering html tags in admin input
function unfilter_html_tags( $value, $field_args, $field ) {
	/*
	 * Do your custom sanitization.
	 * strip_tags can allow whitelisted tags
	 * http://php.net/manual/en/function.strip-tags.php
	 */
	$value = strip_tags( $value, '<p><a><br><br/><span><b><i>' );

	return $value;
}

// callback for diltering all html tags in admin input
function unfilter_all( $value, $field_args, $field ) {
	/*
	 * Do your custom sanitization.
	 * strip_tags can allow whitelisted tags
	 * http://php.net/manual/en/function.strip-tags.php
	 */
	// $value = strip_tags( $value, '<p><a><br><br/><span><iframe><div>' );
	$value=str_replace('"', '\'', $value);

	return $value;
}
// check if this $post->ID has children
function has_children($pid) {
	$children = get_children( array(
		'post_parent' => $pid,
		'post_type'   => 'any',
		'numberposts' => -1,
		'post_status' => 'publish'
	) );
    if( count( $children ) > 0 ) {
        return true;
    } else {
        return false;
    }
}

// unwrap wpcf7 fields
// add_filter('wpcf7_form_elements', function($content) {
//     $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
//     return $content;
// });

// search only by title
function title_like_posts_where( $where, $wp_query ) {
    global $wpdb;
    if ( $post_title_like = $wp_query->get( 'post_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'' . esc_sql( $wpdb->esc_like( $post_title_like ) ) . '%\'';
    }
    return $where;
}

function add_my_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'RUB': $currency_symbol = 'руб'; break;
     }
     return $currency_symbol;
}


function wpa83367_price_html( $price, $product ){
	if (is_product()) {
    	return '<span class="product_digit">'.str_replace( 'руб', '<sup>руб</sup>', $price ).'</span>';
	} else {
		return $price;
	}
}

/*
 * Function creates post duplicate as a draft and redirects then to the edit post screen
 */
function rd_duplicate_post_as_draft(){
	global $wpdb;
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'rd_duplicate_post_as_draft' == $_REQUEST['action'] ) ) ) {
		wp_die('No post to duplicate has been supplied!');
	}

	/*
	 * Nonce verification
	 */
	if ( !isset( $_GET['duplicate_nonce'] ) || !wp_verify_nonce( $_GET['duplicate_nonce'], basename( __FILE__ ) ) )
		return;
 	/*
	 * get current paged
	 */
	$paged = (isset($_GET['paged']) ? absint( $_GET['paged'] ) : absint( $_POST['paged'] ) ); 	/*
	 * get current post type (for flexibility)
	 */
	$post_type=((!empty($_GET['post_type'])||!empty($_POST['post_type']))?(isset($_GET['post_type']) ? 'post_type='.$_GET['post_type'].'&' : 'post_type='.$_POST['post_type'].'&' ):null);
	/*
	 * get the original post id
	 */
	$post_id = (isset($_GET['post']) ? absint( $_GET['post'] ) : absint( $_POST['post'] ) );
	 /*
	 * and all the original post data then
	 */
	$post = get_post( $post_id );

	/*
	 * if you don't want current user to be the new post author,
	 * then change next couple of lines to this: $new_post_author = $post->post_author;
	 */
	$current_user = wp_get_current_user();
	$new_post_author = $current_user->ID;

	/*
	 * if post data exists, create the post duplicate
	 */
	if (isset( $post ) && $post != null) {

		/*
		 * new post data array
		 */
		$args = array(
			'comment_status' => $post->comment_status,
			'ping_status'    => $post->ping_status,
			'post_author'    => $new_post_author,
			'post_content'   => $post->post_content,
			'post_excerpt'   => $post->post_excerpt,
			'post_name'      => $post->post_name,
			'post_parent'    => $post->post_parent,
			'post_password'  => $post->post_password,
			'post_status'    => 'draft',
			'post_title'     => $post->post_title,
			'post_type'      => $post->post_type,
			'to_ping'        => $post->to_ping,
			'menu_order'     => $post->menu_order
		);

		/*
		 * insert the post by wp_insert_post() function
		 */
		$new_post_id = wp_insert_post( $args );

		/*
		 * get all current post terms ad set them to the new post draft
		 */
		$taxonomies = get_object_taxonomies($post->post_type); // returns array of taxonomy names for post type, ex array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($post_id, $taxonomy, array('fields' => 'slugs'));
			wp_set_object_terms($new_post_id, $post_terms, $taxonomy, false);
		}

		/*
		 * duplicate all post meta just in two SQL queries
		 */
		$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$post_id");
		// $post_meta_infos = get_post_meta($post_id, '', false);
		// print_r($post_meta_infos);
		if (count($post_meta_infos[0])!=0) {
			// $sql_query_sel=array();
			// $sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
			// foreach ($post_meta_infos as $meta_info) {
			foreach ($post_meta_infos as $meta_data) {
				$meta_key = $meta_data->meta_key;
				if( $meta_key == '_wp_old_slug' ) continue;
				$meta_value = addslashes($meta_data->meta_value);
				// $sql_query_sel[]= "SELECT $new_post_id, '$meta_key', '$meta_value'";
				update_post_meta( $new_post_id, $meta_key, $meta_value );
			}
			// $sql_query.= implode(" UNION ALL ", $sql_query_sel);
			// $wpdb->query($sql_query);
		}


		/*
		 * finally, redirect to the edit post screen for the new draft
		 */
		// wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_post_id ) );
		wp_redirect( admin_url( 'edit.php?'.$post_type.'paged='.$paged ) );
		exit;
	} else {
		wp_die('Post creation failed, could not find original post: ' . $post_id);
	}
}


/*
 * Add the duplicate link to action list for post_row_actions
 */
function rd_duplicate_post_link( $actions, $post ) {
	if (current_user_can('edit_posts')) {
		 /*
		 * get current paged
		 */
		$paged = ((!empty($_GET['paged'])||!empty($_POST['paged']))?(isset($_GET['paged']) ? absint( $_GET['paged'] ) : absint( $_POST['paged'] ) ):'1');
		$post_type=((!empty($_GET['post_type'])||!empty($_POST['post_type']))?(isset($_GET['post_type']) ? 'post_type='.$_GET['post_type'].'&' : 'post_type='.$_POST['post_type'].'&' ):null);

		$actions['duplicate'] = '<a href="' . wp_nonce_url('admin.php?'.$post_type.'paged='.$paged.'&action=rd_duplicate_post_as_draft&post=' . $post->ID, basename(__FILE__), 'duplicate_nonce' ) . '" title="Duplicate this item" rel="permalink">Duplicate</a>';
	}
	return $actions;
}

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('cmb2_admin_init', 'generic_metaboxes' );
add_action('wp_enqueue_scripts', 'generic_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'generic_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'generic_styles'); // Add Theme Stylesheet
add_action('init', 'register_generic_menu'); // Add HTML5 Blank Menu
// add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('init', 'generic_globals');
add_action('init', 'disable_wp_emojicons');
add_action('wp_footer', 'generic_footer_scripts');
add_action( 'wp_ajax_nopriv_generic_news_like', 'generic_news_like' );
add_action( 'wp_ajax_generic_news_like', 'generic_news_like' );
add_action( 'wp_ajax_nopriv_generic_ajax_posts', 'generic_ajax_posts' );
add_action( 'wp_ajax_generic_ajax_posts', 'generic_ajax_posts' );
add_action( 'wp_ajax_nopriv_generic_ajax_cart', 'generic_ajax_cart' );
add_action( 'wp_ajax_generic_ajax_cart', 'generic_ajax_cart' );
add_action( 'pre_get_posts', 'posts_per_page_func' );
add_action( 'admin_action_generic_duplicate_post_as_draft', 'generic_duplicate_post_as_draft' );

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'generic_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'generic_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter( 'script_loader_src', 'remove_cssjs_ver', 15, 1 );
add_filter( 'style_loader_src', 'remove_cssjs_ver', 15, 1 );
// add_filter( 'wpcf7_load_css', '__return_false' );
add_filter( 'emoji_svg_url', '__return_false' );
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'posts_where', 'title_like_posts_where', 10, 2 );
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
add_filter( 'post_row_actions', 'generic_duplicate_post_link', 10, 2 );
add_filter( 'page_row_actions', 'generic_duplicate_post_link', 10, 2 );


// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes above would be nested like this -
// [generic_shortcode_demo] [generic_shortcode_demo_2] Here's the page title! [/generic_shortcode_demo_2] [/generic_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

function create_post_type_html5(){
	if ( file_exists( dirname( __FILE__ ) . '/assets/php/post-types.php' ) ) {
		require_once dirname( __FILE__ ) . '/assets/php/post-types.php';
	}
}
