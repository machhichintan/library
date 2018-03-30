<?php

/**
 * this is theme functions
 */
//Menu,Logo Setup 
function bootstrap_register() {
    register_nav_menus(array(
        'header' => __('Header', 'bootstrap'),
        'footer' => __('Footer', 'bootstrap'),
    ));

    add_theme_support('custom-logo', array(
        'width' => 200,
        'height' => 250,
        'flex-width' => true,
    ));
}

add_action('after_setup_theme', 'bootstrap_register');

//Menu Setup Closed
//Widgets Register
function register_widget_init() {
    register_sidebar(array(
        'name' => __('Header', 'bootstrap'),
        'id' => 'header-1',
        'description' => __('This is Header widget', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Left', 'bootstrap'),
        'id' => 'footer-1',
        'description' => __('This is Left Footer Widget', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after_widget' => '</section>',
        'befor_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Right', 'bootstrap'),
        'id' => 'footer-2',
        'description' => __('This id Right Footer widget', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Footer Center', 'bootstrap'),
        'id' => 'footer-3',
        'description' => __('This is Center Footer widget', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Left Sidebar', 'bootstrap'),
        'id' => 'sidebar-1',
        'description' => __('This is Left Sidebar', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => __('Right Sidebar', 'bootstrap'),
        'id' => 'sidebar-2',
        'description' => __('This is Right Sidebar', 'bootstrap'),
        'before_widget' => '<section style="padding:0px" id="%1$s%" class="widget %2$s%">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'register_widget_init');
//Widgets Register closed
//Featured Images
add_theme_support('post-thumbnails');

//Featured Images closed
//wp_enqueu_script_style Theme
function wp_enqueue_scripts_styles() {
    // Theme stylesheet.
    wp_enqueue_style('bootstrap-style', get_stylesheet_uri());

    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.css'), array('bootstrap-style'), '1.0');
    wp_enqueue_style('freelancer', get_theme_file_uri('/css/freelancer.css'), array('bootstrap-style'), '1.0');
    wp_enqueue_style('font-awesome', get_theme_file_uri('/css/font-awesome.css'), array('bootstrap-style'), '1.0');
    wp_enqueue_style('live', get_theme_file_uri('/css/live.css'), array('bootstrap-style'), '1.0');
    wp_enqueue_style('second', get_theme_file_uri('/css/second.css'), array('bootstrap-style'), '1.0');


    wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.js'), array(), '1.0', true);
    wp_enqueue_script('bootstrap-datepicker', get_theme_file_uri('/js/bootstrap-datepicker.js'), array(), '1.0', true);
    wp_enqueue_script('freelancer', get_theme_file_uri('/js/freelancer.js'), array(), '1.0', true);
    wp_enqueue_script('jqBootstrapValidation', get_theme_file_uri('/js/jqBootstrapValidation.js'), array(), '1.0', true);
    wp_enqueue_script('jquery', get_theme_file_uri('/js/jquery.js'), array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_styles');

//wp_enqueu_script_style Theme Closed
//Theme Options 
function color_theme_option($wp_customize) {
    //(1)=======***** Header Section *****=======//
    $wp_customize->add_section('color_change_section', array(
        'title' => __('Header', 'bootstrap'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'description' => __('Header Background Color Change', 'bootstrap'),
    ));
    // Header Section Related setting,controls
    //(i)Menu Font Color setting,controls
    $wp_customize->add_setting('menu_font_color', array('default' => '#103e31'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'menu_font_color_control', array(
        'label' => __('Menu Font-Color Changes', 'bootstrap'),
        'section' => 'color_change_section',
        'settings' => 'menu_font_color',
        'priority' => 1
    )));
    //Menu Font Color setting,controls
    //(ii)Header Background-Color setting,controls
    $wp_customize->add_setting('header_background_color', array('default' => '#2C3E50'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'color_controls', array(
        'label' => __('Header Color', 'bootstrap'),
        'section' => 'color_change_section',
        'settings' => 'header_background_color',
        'priority' => 2
    )));
    //Header Background-Color setting,controls Closed
    //(iii)Content section Background-Color setting,controls
    $wp_customize->add_setting('section_background_color', array('default' => '#3e403f'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'sction_background_color_control', array(
        'label' => __('Background Section Color', 'bootstrap'),
        'section' => 'color_change_section',
        'settings' => 'section_background_color',
        'priority' => 3
    )));
    //Content section Background-Color setting,controls Closed
    // Header Section Related setting,controls closed
    //////=======***** Header Section Closed *******==========///// 
    //////(2)=======***** Background-Image Section *****========//////
    $wp_customize->add_section('image_change_section', array(
        'title' => __('Background-Images', 'bootstrap'),
        'priority' => 2,
        'capability' => 'edit_theme_options',
        'description' => __('Header Background Image change', 'bootstrap'),
    ));
    // Background Section Related settindg,control
    //(i)Header Background-Images setting,controls
    $wp_customize->add_setting('header_image_change_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'header_image_controls', array(
        'label' => __('Header Images', 'bootstrap'),
        'section' => 'image_change_section',
        'settings' => 'header_image_change_setting',
        'priority' => 1
    )));
    //Header Background-Images setting,controls
    //Content Image set
    $wp_customize->add_setting('content_image_set');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'content_image_set_control', array(
        'label' => __('Content Image Set'),
        'section' => 'image_change_section',
        'settings' => 'content_image_set',
        'priority' => 2
    )));
    //Content Imagset cloesd
    //(ii)Section Background-Image settingm,controls
    $wp_customize->add_setting('section_image_change_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'content_image_change_control', array(
        'label' => __('Section Background Image', 'bootstrap'),
        'section' => 'image_change_section',
        'settings' => 'section_image_change_setting',
        'priority' => 3
    )));
    //Content Background-Image setting,control Closed
    //(iii)Footer-1 Background-Images setting,controls
    $wp_customize->add_setting('footer1_image_change_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'footer_image_control', array(
        'label' => __('Footer-1 Images', 'bootstrap'),
        'section' => 'image_change_section',
        'settings' => 'footer1_image_change_setting',
        'priority' => 4
    )));
    //Footer-1 Background-Images setting,controls closed
    //(iv)Footer-2 Background-Images setting,controls  
    $wp_customize->add_setting('footer2_image_change_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'footer2_image_change_setting_controls', array(
        'label' => __('Footer-2 Image', 'bootstrap'),
        'section' => 'image_change_section',
        'settings' => 'footer2_image_change_setting',
        'priority' => 5
    )));
    //Footer-2 Background-Images setting,controls closed
    // Background Section Related settindg,control closed
    //////=====****** Background-Image Section closed ******=======//////
    //////(3)=======***** Footer Section Background Color and Texts*****======//////
    $wp_customize->add_section('footer_text', array(
        'title' => __('Footer', 'bootstrap'),
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'description' => __('Footer Text Change'),
    ));
    // Footer Section Related setting,controls
    //(i)Footer Copyright changes setting,controls
    $wp_customize->add_setting('footer_text_setting', array('default' => 'Copyright © Your Website 2016'));
    $wp_customize->add_control('footer_text_control', array(
        'label' => __('Footer Text', 'bootstrap'),
        'section' => 'footer_text',
        'settings' => 'footer_text_setting',
        'type' => 'text',
        'priority' => 1
    ));
    //Footer Copyright changes setting,controls Closed
    //(ii)Footer Address changes setting,controls Closed
    $wp_customize->add_setting('footer_textarea_setting', array('default' => 'Machhipura shanti nagar society Khambhat-388620, Dist-Anand.'));
    $wp_customize->add_control('footer_textarea_control', array(
        'label' => __('Footer Address', 'bootstrap'),
        'section' => 'footer_text',
        'settings' => 'footer_textarea_setting',
        'type' => 'textarea',
        'priority' => 2
    ));
    //Footer Address changes setting,controls Closed
    //(iii)Footer-1,2 Background-color changes
    $wp_customize->add_setting('footer_background_color1', array('default' => '#ffffff'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'footer_background_color_control', array(
        'label' => __('Footer-1 Background Color', 'bootstrap'),
        'section' => 'footer_text',
        'settings' => 'footer_background_color1',
        'priority' => 3
    )));
    $wp_customize->add_setting('footer_background_color2', array('default' => '#000000'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'footer_background_color2_control', array(
        'label' => __('Footer-2 Background Color'),
        'section' => 'footer_text',
        'settings' => 'footer_background_color2',
        'priority' => 4
    )));
    //Footer-1,2 Background-color changes Closed
    // Footer Section Related setting,controls closed
    //////======****** Footer Section closed ******=======//////
}

//Theme Options Closed
add_action('customize_register', 'color_theme_option');

function style_sheet() {
    ?>
    <style>
        .navbar-custom{
            background-color:<?php echo get_theme_mod('header_background_color'); ?>;
            background-image:url('<?php echo get_theme_mod('header_image_change_setting'); ?>');
        }
        header{
            background-color:<?php echo get_theme_mod('section_background_color'); ?>;
            background-image:url('<?php echo get_theme_mod('section_image_change_setting'); ?>');
        }
        .navbar-custom .navbar-nav li a{
            color:<?php echo get_theme_mod('menu_font_color'); ?>;
        }
        footer .footer-above{
            background-color:<?php echo get_theme_mod('footer_background_color1'); ?>;
            background-image:url('<?php echo get_theme_mod('footer1_image_change_setting') ?>');
        }
        footer .footer-below{
            background-color:<?php echo get_theme_mod('footer_background_color2'); ?>;
            background-image:url('<?php echo get_theme_mod('footer2_image_change_setting'); ?>');
        }
    </style>
    <?php
}

add_action('wp_head', 'style_sheet');

class My_Widget extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'my_widget',
            'description' => 'A Social icons form for your site.',
        );
        parent::__construct('my_widget', 'Social', $widget_ops);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        // outputs the content of the widget
        extract($args);

        // these are the widget options
        $title = apply_filters('widget_title', $instance['title']);
        $target = ( isset($instance['target']) && $instance['target'] != "" ) ? $instance['target'] : '_blank';

        // Check if title is set
        $socialBlock .=$before_widget;

        if ($instance['title'] && $instance['title'] != "")
            $socialBlock .=$before_title . $instance['title'] . $after_title;
        $socialBlock .= "<ul class='list-inline'>";

        if (isset($instance['facebook']) && $instance['facebook'] != "")
            $socialBlock .= '<li><a href="' . $instance['facebook'] . '" target="' . $target . '"  class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a></li>';

        if (isset($instance['twitter']) && $instance['twitter'] != "")
            $socialBlock .= '<li><a href="' . $instance['twitter'] . '" target="' . $target . '"  class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a></li>';

        if (isset($instance['googleplus']) && $instance['googleplus'] != "")
            $socialBlock .= '<li><a href="' . $instance['googleplus'] . '" target="' . $target . '"  class="btn-social btn-outline"><span class="sr-only">Google plus</span><i class="fa fa-fw fa-google-plus"></i></a></li>';

        if (isset($instance['linkedin']) && $instance['linkedin'] != "")
            $socialBlock.='<li><a href="' . $instance['linkedin'] . '" target="' . $target . '" class="btn-social btn-outline"><span class="sr-only">LinkedIn</span><i class=" fa fa-fw fa-linkedin"></i></a></li>';
        $socialBlock .="</ul>";
        $socialBlock.=$after_widget;
        echo $socialBlock;
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        // outputs the options form on admin
        if ($instance) {
            $title = esc_attr($instance['title']);
            $facebook = $instance['facebook'];
            $twitter = $instance['twitter'];
            $google_plus = $instance['googleplus'];
            $linkedin = $instance['linkedin'];
        } else {
            $title = '';
            $facebook = '';
            $twitter = '';
            $google_plus = '';
            $linkedin = 'linkedin';
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wp_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id($facebook); ?>"><?php _e('Facebook Link:', 'wp_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id("facebook") ?>" name="<?php echo $this->get_field_name("facebook") ?>" type="text" value="<?php echo esc_attr($facebook) ?>" placeholder="<?php _e('Facebook'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id($twitter); ?>"><?php _e('Twitter Link:', 'wp_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id("twitter") ?>" name="<?php echo $this->get_field_name("twitter") ?>" type="text" value="<?php echo esc_attr($twitter); ?>" placeholder="<?php _e('Twitter'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id($google_plus); ?>"><?php _e('Google Plus', 'wp_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" type="text" value="<?php echo esc_attr($google_plus); ?>" placeholder="<?php _e('Google Plus'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id($linkedin); ?>"><?php _e('LinkedIn', 'wp_widget'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" placeholder="<?php _e('LinkedIn'); ?>" />
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
//	public function update( $new_instance, $old_instance ) {
//		// processes widget options to be saved
//            $instance = $old_instance;
//            // Fields
//            $instance['title'] = strip_tags($new_instance['title']);
//            $instance['link'] = strip_tags($new_instance['link']);
//            return $instance;
//	}
}

function my_custom_widget() {
    register_widget('My_Widget');
}

add_action('widgets_init', 'my_custom_widget');

// Movies Custom Post Type

function create_movies_post_type() {
    $labels = array(
        'name' => _x('Movies', 'post type movie general name', 'bollywood'),
        'singular_name' => _x('Movie', 'post type movie singular name', 'bollywood'),
        'menu_name' => _x('Movies', 'admin menu', 'bollywood'),
        'name_admin_bar' => _x('Movie', 'add new on admin bar', 'bollywood'),
        'add_new' => _x('Add New', 'Movie', 'bollywood'),
        'add_new_item' => __('Add New Movie', 'bollywood'),
        'new_item' => __('New Movie', 'bollywood'),
        'edit_item' => __('Edit Movie', 'bollywood'),
        'view_item' => __('View Movie', 'bollywood'),
        'all_items' => __('All Movies', 'bollywood'),
        'search_items' => __('search Movies', 'bollywood'),
        'parent_item_colon' => __('parent Movies:', 'bollywood'),
        'not_found' => __('No Movies found', 'bollywood'),
        'not_found_in_trash' => __('No Movies found in Trash.', 'bollywood'),
    );
    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'menu_icon' => 'dashicons-format-video',
        'publicly_queryable' => FALSE,
        'show_ui' => TRUE,
        'show_in_menu' => true,
        'query_var' => TRUE,
        'rewrite' => array('slug' => 'movie'),
        'capability_type' => 'post',
        'has_archive' => TRUE,
        'hierarchical' => FALSE,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail', 'comments', 'custom-fileds')
    );
    register_post_type('movie', $args);
}

add_action('init', 'create_movies_post_type');

// Movies Custom Post Type closed
// Movies Custom taxonomy movie_type
add_action('init', 'custom_type_taxonomy');

function custom_type_taxonomy() {

    register_taxonomy('movie_type', 'movie', array(
        'labels' => array(
            'name' => _x('Movie Category', 'taxonomy general name', 'text_domain'),
            'add_new_item' => __('Add New Movie Category', 'text_domain'),
            'new_item_name' => __('New Movie Type', 'text_domain'),
        ),
        'exclude_from_search' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'rewrite' => array('slug' => 'movie-type', 'with_front' => false),
        'show_ui' => true,
        'show_tagcloud' => false,
            )
    );
}

// Movies Custom taxonomy movie_type closed
// Movies Custom taxonomy Year Made
add_action('init', 'rv_create_movie_taxonomies');

function rv_create_movie_taxonomies() {

    // Add new taxonomy, make it non-hierarchical (like tags)
    $labels = array(
        'name' => _x('Year Made', 'taxonomy general name'),
        'singular_name' => _x('Year', 'taxonomy singular name'),
        'search_items' => __('Search Years'),
        'all_items' => __('All Years'),
        'parent_item' => __('Parent Year'),
        'parent_item_colon' => __('Parent Year:'),
        'edit_item' => __('Edit Year'),
        'update_item' => __('Update Year'),
        'add_new_item' => __('Add New Year'),
        'new_item_name' => __('New Year Name'),
        'separate_items_with_commas' => __('Separate Years with commas'),
        'add_or_remove_items' => __('Add or remove Years'),
        'choose_from_most_used' => __('Choose from the most used Years'),
        'not_found' => __('No Years found.'),
        'menu_name' => __('Year Made'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        // 'query_var'          => true,
        // 'show_in_nav_menus'	=> false,
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
    );

    $years = array('rewrite' => array('slug' => 'movie-year'));

    $movie_args = array_merge($args, $years);

    register_taxonomy('movie_years', 'movie', $movie_args);
}

// Movies Custom taxonomy Year Made closed


function create_product_post_type() {
    // set up labels
    $labels = array(
        'name' => 'Products',
        'singular_name' => 'Product',
        'add_new' => 'Add Product',
        'add_new_item' => 'Add New Product',
        'edit_item' => 'Edit Product',
        'new_item' => 'New Product',
        'all_items' => 'All Products',
        'view_item' => 'View Product',
        'search_items' => 'Search Products',
        'not_found' => 'No Products Found',
        'not_found_in_trash' => 'No Products found in Trash',
        'parent_item_colon' => '',
        'menu_name' => 'Products',
    );
    //register post type
    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'page-attributes'),
        //'taxonomies' => array('post_tag', 'category'),
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'products'),
    );
    register_post_type('product', $args);
}

add_action('init', 'create_product_post_type');

function create_product_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Brands', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Brand', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Brands', 'textdomain'),
        'all_items' => __('All Brands', 'textdomain'),
        'parent_item' => __('Parent Brand', 'textdomain'),
        'parent_item_colon' => __('Parent Brand:', 'textdomain'),
        'edit_item' => __('Edit Brand', 'textdomain'),
        'update_item' => __('Update Brand', 'textdomain'),
        'add_new_item' => __('Add New Brand', 'textdomain'),
        'new_item_name' => __('New Brand Name', 'textdomain'),
        'menu_name' => __('Brand', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'brand'),
    );

    register_taxonomy('brand', array('product'), $args);

    $labels = array(
        'name' => _x('Sales', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Sale', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Sales', 'textdomain'),
        'popular_items' => __('Popular Salers', 'textdomain'),
        'all_items' => __('All Salers', 'textdomain'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Saler', 'textdomain'),
        'update_item' => __('Update Saler', 'textdomain'),
        'add_new_item' => __('Add New Saler', 'textdomain'),
        'new_item_name' => __('New Saler Name', 'textdomain'),
        'separate_items_with_commas' => __('Separate Salers with commas', 'textdomain'),
        'add_or_remove_items' => __('Add or remove Salers', 'textdomain'),
        'choose_from_most_used' => __('Choose from the most used Salers', 'textdomain'),
        'not_found' => __('No Salers found.', 'textdomain'),
        'menu_name' => __('Salers', 'textdomain'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'saler'),
    );
    register_taxonomy('saler', 'product', $args);
}

add_action('init', 'create_product_taxonomies');

function create_books_post_type() {
    $labels = array(
        'name' => _x('Books', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('Book', 'post type singular name', 'your-plugin-textdomain'), //Panding
        'menu_name' => _x('Books', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('Book', 'add new on admin bar', 'your-plugin-textdomain'), //Panding
        'add_new' => _x('Add New', 'book', 'your-plugin-textdomain'),
        'add_new_item' => __('Add New Book', 'your-plugin-textdomain'),
        'new_item' => __('New Book', 'your-plugin-textdomain'), //Panding
        'edit_item' => __('Edit Book', 'your-plugin-textdomain'),
        'view_item' => __('View Book', 'your-plugin-textdomain'), //Panding
        'all_items' => __('All Books', 'your-plugin-textdomain'),
        'search_items' => __('Search Books', 'your-plugin-textdomain'),
        'parent_item_colon' => __('Parent Books:', 'your-plugin-textdomain'), //Panding
        'not_found' => __('No books found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No books found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt', //Menu Icon
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'book'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fileds')
    );

    register_post_type('book', $args);
}

add_action('init', 'create_books_post_type');

// create two taxonomies, genres and writers for the post type "book"
function create_book_taxonomies() {
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => _x('Genres', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Genre', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Genres', 'textdomain'),
        'all_items' => __('All Genres', 'textdomain'),
        'parent_item' => __('Parent Genre', 'textdomain'),
        'parent_item_colon' => __('Parent Genre:', 'textdomain'),
        'edit_item' => __('Edit Genre', 'textdomain'),
        'update_item' => __('Update Genre', 'textdomain'),
        'add_new_item' => __('Add New Genre', 'textdomain'),
        'new_item_name' => __('New Genre Name', 'textdomain'),
        'menu_name' => __('Genre', 'textdomain'),
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'genre'),
    );

    register_taxonomy('genre', array('book'), $args);

    $labels = array(
        'name' => _x('Writers', 'taxonomy general name', 'textdomain'),
        'singular_name' => _x('Writer', 'taxonomy singular name', 'textdomain'),
        'search_items' => __('Search Writers', 'textdomain'),
        'popular_items' => __('Popular Writers', 'textdomain'),
        'all_items' => __('All Writers', 'textdomain'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Writer', 'textdomain'),
        'update_item' => __('Update Writer', 'textdomain'),
        'add_new_item' => __('Add New Writer', 'textdomain'),
        'new_item_name' => __('New Writer Name', 'textdomain'),
        'separate_items_with_commas' => __('Separate writers with commas', 'textdomain'),
        'add_or_remove_items' => __('Add or remove writers', 'textdomain'),
        'choose_from_most_used' => __('Choose from the most used writers', 'textdomain'),
        'not_found' => __('No writers found.', 'textdomain'),
        'menu_name' => __('Writers', 'textdomain'),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'writer'),
    );

    register_taxonomy('writer', 'book', $args);
}

add_action('init', 'create_book_taxonomies', 0);

//auto-complete
function ajax_function() {
    $suggest = $_REQUEST['suggest'];
    $arg = array(
        'post_type' => 'post',
        's' => $suggest,
        'post_status' => 'publish',
        'orderby' => 'title',
        'order' => 'ASC'
    );
    $wp_query = new WP_Query($arg);
    while ($wp_query->have_posts()): $wp_query->the_post();
        $title[] = get_the_title();
    endwhile;
    echo json_encode($title);
    wp_reset_query();
    die();
}

add_action('wp_ajax_datasearch', 'ajax_function');

add_action('wp_ajax_nopriv_datasearch', 'ajax_function');

//auto-complete closed
//wp-login url and hover title
function add_logo_link() {
    return 'microsoft.com';
}

add_filter('login_headerurl', 'add_logo_link');

function hover_title() {
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'hover_title');

//wp-login url and hover title closed
//custom admin-menu
function register_my_custom_menu_page() {
    add_menu_page(
        __('Custom Menu Title','textdomain'), 
        'CSV', 
        'manage_options', 
        'menu_page_add', 
        'menu_page_add'
    );
}

add_action('admin_menu', 'register_my_custom_menu_page');

//custom admin-menu closed
//desinging function
function menu_page_add() {
    //custom post type
    $args = array(
        'public' => true,
        '_builtin' => false
    );

    $output = 'names'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types($args, $output, $operator);
    //custom post type closed
    require_once 'backand_desing.php';
    ?>
    <script>
        jQuery(document).ready(function () {
            jQuery(function () {
                jQuery('.post_onchange').change(function () {
                    var post_change = jQuery('.post_onchange').val();
                    jQuery.ajax({
                        url: "<?php echo admin_url(); ?>/admin-ajax.php",
                        type: "POST",
                        data: {action: "ajax_call_post_onchange", select_post_type: post_change},
                        success: function (data) {
                            jQuery(".taxonomy_onchange").html(data);
                        }
                    });

                });
            });
            jQuery('.taxonomy_onchange').change(function () {
                var taxonomy = jQuery('.taxonomy_onchange').val();
                //alert(taxonomy);
                jQuery.ajax({
                    url: "<?php echo admin_url(); ?>/admin-ajax.php",
                    type: "POST",
                    data: {action: "ajax_call_taxonomy_onchange", selected_taxonomy: taxonomy},
                    success: function (data) {
                        //alert("DDDD");
                        jQuery('.term_onchange').html(data);
                    }
                });
            });
        });
        function downloadCSV(csv, filename) {
            var csvFile;
            var downloadLink;

            // CSV file
            csvFile = new Blob([csv], {type: "text/csv"});

            // Download link
            downloadLink = document.createElement("a");

            // File name
            downloadLink.download = filename;

            // Create a link to the file
            downloadLink.href = window.URL.createObjectURL(csvFile);

            // Hide download link
            downloadLink.style.display = "none";

            // Add the link to DOM
            document.body.appendChild(downloadLink);

            // Click download link
            downloadLink.click();
        }
        
        function exportTableToCSV(filename) {
            var csv = [];
            var rows = document.querySelectorAll("table tr");

            for (var i = 0; i < rows.length; i++) {
                var row = [], cols = rows[i].querySelectorAll("td, th");

                for (var j = 0; j < cols.length; j++) 
                    row.push(cols[j].innerText);

                csv.push(row.join(","));        
            }

            // Download CSV file
            downloadCSV(csv.join("\n"), filename);
        }
    </script>
    <?php
}

//desinging function closed
//ajax function onchange event
function ajax_call_post_onchange() {
    $selected_value = lcfirst($_POST['select_post_type']);
    $args = array(
        'object_type' => array($selected_value)
    );
    $taxonomyies = get_taxonomies($args, 'names', 'and');
    foreach ($taxonomyies as $value) { ?>
        <option value="<?php echo $value; ?>"><?php echo $value; ?></option> <?php
    }
    die();
}

add_action('wp_ajax_ajax_call_post_onchange', 'ajax_call_post_onchange');
add_action('wp_ajax_nopriv_ajax_call_post_onchange', 'ajax_call_post_onchange');

//ajax function onchange event cloesd

function ajax_call_taxonomy_onchange() {
    $selected_value = $_POST['selected_taxonomy'];
    $terms = get_terms(array(
        'taxonomy' => array($selected_value),
    ));
    foreach ($terms as $term) {
        ?><option value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option> <?php
    }
    die();
}

add_action('wp_ajax_ajax_call_taxonomy_onchange', 'ajax_call_taxonomy_onchange');
add_action('wp_ajax_nopriv_ajax_call_taxonomy_onchange', 'ajax_call_taxonomy_onchange');


function recent_posts_function(){
  add_shortcode('recent-demo', 'front_end_desinging');
}
add_action('init','recent_posts_function');


//Contact form redirect other page
add_action( 'wp_footer', 'mycustom_wp_footer' );
 
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
       location = 'https://www.example.com/thank-you/';
}, false );
</script>
<?php
}
?>
