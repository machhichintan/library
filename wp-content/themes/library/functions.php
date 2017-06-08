<?php
/*
 * scripting Function
 */

function library_script() {
    wp_enqueue_style('stylesheet', get_stylesheet_uri());

    wp_enqueue_style('jquery', get_theme_file_uri('/css/jquery-ui.css'), array(), '1.0');
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.css'), array(), '1.0');
    wp_enqueue_style('my-font', get_theme_file_uri('/css/myfont.css'), array(), '1.0');
    wp_enqueue_style('creative', get_theme_file_uri('/css/creative.css'), array(), '1.0');
    wp_enqueue_style('live', get_theme_file_uri('/css/live.css'), array(), '1.0');
    wp_enqueue_style('font-awesome', get_theme_file_uri('/css/font-awesome.css'), array(), '1.0');

    wp_enqueue_script('jquery-1.12.4', get_theme_file_uri('/js/jquery-1.12.4.js'), array(), '1.0', true);
    wp_enqueue_script('jquery-min', get_theme_file_uri('/js/jquery.min.js'), array(), '1.0', true);
    wp_enqueue_script('jquery-ui', get_theme_file_uri('/js/jquery-ui.js'), array(), '1.0', true);
    wp_enqueue_script('bootstrap', get_theme_file_uri('/js/bootstrap.js'), array(), '1.0', true);

    wp_enqueue_script('script', get_theme_file_uri('/js/script.js'), array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'library_script');

function register_menu() {
    register_nav_menus(array(
        'primary' => __('Header', 'header'),
        'footer' => __('Footer', 'footer'),
    ));
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'register_menu');

// Theme Options functions
function footer_function($wp_customize) {
    //(1) Header Section
    $wp_customize->add_section('header_section', array(
        'title' => __('Header', 'bootstrap'),
        'priority' => 1,
        'capability' => 'edit_theme_options',
        'description' => __('Header Settings Controls')
    ));

    //Header Background-Color Settings and Controls
    $wp_customize->add_setting('header_color_setting', array('default' => '#000000'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'header_color_control', array(
        'label' => __('Header Background Color Set', 'bootstrap'),
        'section' => 'header_section',
        'settings' => 'header_color_setting',
        'priority' => 1
    )));
    //Header Background-Color Settings and Controls Closed
    //Header Background-Images Settings and Controls
    $wp_customize->add_setting('header_image_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'header_image_control', array(
        'label' => __('Header Background Image Set', 'bootstrap'),
        'section' => 'header_section',
        'settings' => 'header_image_setting',
        'priority' => 2
    )));
    //Header Background-Images Settings and Controls Closed
    // Header Section Closed
    //(2) Content Section
    $wp_customize->add_section('content_section', array(
        'title' => __('Section', 'bootstrap'),
        'description' => __('Content Background Change'),
        'priority' => 2,
        'capability' => 'edit_theme_options',
    ));
    //Content Background-color setting and Controls
    $wp_customize->add_setting('content_background_color_setting', array('default' => '#ffffff'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'content_background_control', array(
        'label' => _('Content Background Color'),
        'section' => 'content_section',
        'settings' => 'content_background_color_setting'
    )));
    //Content Background-color setting and Controls Closed
    //Content Color setting and Controls
    $wp_customize->add_setting('font_color', array('default' => '#ffffff'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'font_color_control', array(
        'label' => __('Font Color', 'bootstrap'),
        'section' => 'content_section',
        'settings' => 'font_color'
    )));
    //Content Color setting and Controls Closed
    //Content Background-image setting and Controls
    $wp_customize->add_setting('content_image_setting');
    $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize, 'content_image_control', array(
        'label' => __('Content Background Image', 'bootstrap'),
        'section' => 'content_section',
        'settings' => 'content_image_setting'
    )));
    //Content Background-image setting and Controls Closed
    // Content Section Closed
    //(3) Footer Section
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer', 'bootstrap'),
        'priority' => 3,
        'capability' => 'edit_theme_options',
        'description' => __('Footer Settings Controls')
    ));
    //Footer text setting and Controls
    $wp_customize->add_setting('footer_text_setting', array('default' => 'Copyright'));
    $wp_customize->add_control('footer_text_control', array(
        'label' => __('Footer Text Set', 'bootstrap'),
        'section' => 'footer_section',
        'settings' => 'footer_text_setting',
        'priority' => 1
    ));
    //Footer text setting and Controls Closed
    //Footer Background-Color setting and Controls
    $wp_customize->add_setting('footer_color_setting', array('default' => '#222222'));
    $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize, 'footer_color_control', array(
        'label' => __('Footer Background Color Set', 'bootstrap'),
        'section' => 'footer_section',
        'settings' => 'footer_color_setting',
        'priority' => 2
    )));
    //Footer Background-Color setting and Controls Closed    
    //Footer Background-Image setting and Controls Closed
    $wp_customize->add_setting('footer_image_setting');
    $wp_customize->add_control(new Wp_Customize_Image_Control(
            $wp_customize, 'footer_image_control', array(
        'label' => __('Footer Background Image Set', 'bootstrap'),
        'section' => 'footer_section',
        'settings' => 'footer_image_setting',
        'priority' => 3
    )));
    //Footer Background- setting and Controls Closed
    //Footer Section Closed
}

add_action('customize_register', 'footer_function');

function css_function() {
    ?>
    <style>
        .bg-dark{
            background-color:<?php echo get_theme_mod('footer_color_setting'); ?>;
            background-image:url('<?php echo get_theme_mod('footer_image_setting') ?>');
        }
        .navbar-default{
            background-color:<?php echo get_theme_mod('header_color_setting'); ?>;
            background-image:url('<?php echo get_theme_mod('header_image_setting'); ?>');
        }
        header{
            background-color:<?php echo get_theme_mod('content_background_color_setting'); ?>;
            background-image:url('<?php echo get_theme_mod('content_image_setting'); ?>');
            color:<?php echo get_theme_mod('font_color'); ?>;
        }
    </style>
    <?php
}

add_action('wp_head', 'css_function');

function codex_book_init() {
    $labels = array(
        'name' => _x('Books', 'post type general name', 'your-plugin-textdomain'),
        'singular_name' => _x('Book', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name' => _x('Books', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar' => _x('Book', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new' => _x('Add New', 'book', 'your-plugin-textdomain'),
        'add_new_item' => __('Add New Book', 'your-plugin-textdomain'),
        'new_item' => __('New Book', 'your-plugin-textdomain'),
        'edit_item' => __('Edit Book', 'your-plugin-textdomain'),
        'view_item' => __('View Book', 'your-plugin-textdomain'),
        'all_items' => __('All Books', 'your-plugin-textdomain'),
        'search_items' => __('Search Books', 'your-plugin-textdomain'),
        'parent_item_colon' => __('Parent Books:', 'your-plugin-textdomain'),
        'not_found' => __('No books found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No books found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Description.', 'your-plugin-textdomain'),
        'public' => true,
        'menu_icon' => 'dashicons-book-alt',
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'book'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields')
    );

    register_post_type('book', $args);
}

add_action('init', 'codex_book_init');

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
}

add_action('init', 'create_book_taxonomies', 0);

function custom_widget() {
    register_sidebar(array(
        'name' => __('Footer Area', 'bootstrap'),
        'id' => 'footer-1',
        'description' => _('This Is Footer Area Set In Custom Widget'),
        'before_widget' => '<section style="padding:0" class="%1$s%" id="%1$s%">',
        'after_widget' => '</section>',
        'befor_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'custom_widget');

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
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" placeholder="<?php _e('Linked In'); ?>" />
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



add_filter('login_headerurl','logo_link');
function logo_link() {
	return 'Google.com';
}

function logo_hover_power(){
     return 'Power by Google';
}
add_filter('login_headertitle', 'logo_hover_power');
