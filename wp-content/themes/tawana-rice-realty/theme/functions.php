<?php
/**
 * tawana_rice_realty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tawana_rice_realty
 */

if ( ! defined( 'TAWANA_RICE_REALTY_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'TAWANA_RICE_REALTY_VERSION', time() );
}

if ( ! defined( 'TAWANA_RICE_REALTY_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `tawana_rice_realty_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'TAWANA_RICE_REALTY_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'tawana_rice_realty_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tawana_rice_realty_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on tawana_rice_realty, use a find and replace
		 * to change 'tawana_rice_realty' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tawana_rice_realty', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'tawana_rice_realty' ),
				'menu-2' => __( 'Footer Menu', 'tawana_rice_realty' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'tawana_rice_realty_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tawana_rice_realty_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'tawana_rice_realty' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'tawana_rice_realty' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}
add_action( 'widgets_init', 'tawana_rice_realty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tawana_rice_realty_scripts() {
	wp_enqueue_style( 'tawana-rice-realty-style', get_stylesheet_uri(), array(), TAWANA_RICE_REALTY_VERSION );
	wp_enqueue_script( 'tawana-rice-realty-script', get_template_directory_uri() . '/js/script.min.js', array(), TAWANA_RICE_REALTY_VERSION, true );


	wp_enqueue_style('tawana-rice-realty-fonts', 'https://use.typekit.net/tkb5ykr.css', [], null );	

	wp_enqueue_style('tawana-rice-realty-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), TAWANA_RICE_REALTY_VERSION);
	wp_enqueue_style('tawana-rice-realty-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), TAWANA_RICE_REALTY_VERSION);	


	wp_enqueue_script('jquery');			
	wp_enqueue_script( 'tawana-rice-realty-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(),TAWANA_RICE_REALTY_VERSION, true ); 
	wp_enqueue_script( 'tawana-rice-realty-custom-js', get_template_directory_uri() . '/js/custom.js', array(), TAWANA_RICE_REALTY_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tawana_rice_realty_scripts' );

add_filter('wp_img_tag_add_auto_sizes', '__return_false');


/**
 * Register's all blocks found in the blocks directory that have a valid block.json file.
 */
function register_acf_blocks_from_directory() {
    $blocks_dir = get_template_directory() . '/template-parts/blocks/';
    
    if ( ! is_dir( $blocks_dir ) ) {
        return;
    }

    $block_folders = scandir( $blocks_dir );

    foreach ( $block_folders as $folder ) {
        if ( $folder === '.' || $folder === '..' ) {
            continue;
        }
        $block_json_file = $blocks_dir . $folder . '/block.json';
        if ( file_exists( $block_json_file ) ) {
            register_block_type( $block_json_file );
        }
    }
}
add_action( 'init', 'register_acf_blocks_from_directory' );


/**
 * Get responsive vertical padding classes based on selected padding option.
 * Small: 80px
 * Medium: 120px
 * Large: 160px
 *
 * @param string $padding_option The selected padding size (small, medium, large)
 * @return string The corresponding Tailwind CSS padding classes
 */
function get_vertical_padding_class($padding_option) {
    $padding_map = [
        'small' => 'py-14 md:py-20 lg:py-20',     
        'medium' => 'py-18 md:py-32 lg:py-32',  
		'large' => 'py-20 md:py-40 lg:py-40',    
    ];

    return isset($padding_map[$padding_option]) ? $padding_map[$padding_option] : 'py-20 md:py-32 lg:py-40';
}



/**
 *	ENABLED FILE *.svg
 **/

 add_filter('upload_mimes', 'custom_upload_mimes');
 function custom_upload_mimes ( $existing_mimes=array() ) {
	 // add your extension to the array
	
	 $existing_mimes['svg'] = 'image/svg+xml';
	 return $existing_mimes;
 }

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function tawana_rice_realty_tinymce_add_class( $settings ) {
	$settings['body_class'] = TAWANA_RICE_REALTY_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'tawana_rice_realty_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
