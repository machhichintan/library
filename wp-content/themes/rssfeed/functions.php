<?php
//This is function scripts
    function script_function(){
        wp_enqueue_style('stylesheet',get_stylesheet_uri());

        wp_enqueue_style('bootstrap-min',get_theme_file_uri('/css/bootstrap.min.css'),array(),'1.0');
        wp_enqueue_style('creative-min',get_theme_file_uri('/css/creative.min.css'),array(),'1.0');
        wp_enqueue_style('font-awesome-min',get_theme_file_uri('/css/font-awesome.min.css'),array(),'1.0');
        wp_enqueue_style('magnific-popup',get_theme_file_uri('/css/magnific-popup.css'),array(),'1.0');
        wp_enqueue_style('fonts',get_theme_file_uri('/css/fonts.css'),array(),'1.0');
        wp_enqueue_style('font',get_theme_file_uri('/css/font.css'),array(),'1.0');

        wp_enqueue_script('jquery',get_theme_file_uri('/js/jquery.js'),array(),'1.0',TRUE);
        //wp_enqueue_script('jquery-min',get_theme_file_uri('/js/jquery.min.js'),array(),'1.0',TRUE);
        wp_enqueue_script('bootstrap-min',get_theme_file_uri('/js/bootstrap.min.js'),array(),'1.0',TRUE);
        wp_enqueue_script('jquery-magnific-popup-min',get_theme_file_uri('/js/jquery.magnific-popup.min.js'),array(),'1.0',TRUE);
        wp_enqueue_script('scrollreveal-min',get_theme_file_uri('/js/scrollreveal.min.js'),array(),'1.0',TRUE);
        wp_enqueue_script('jquery-easing-min',get_theme_file_uri('/js/jquery.easing.min.js'),array(),'1.0',TRUE);
    }
    add_action('wp_enqueue_scripts','script_function'); //wp_enqueue_scripts Hook
//This is function scripts Closed
    
//Theme Options 
    function theme_options($wp_customize){
        //Header Settind
            $wp_customize->add_section('header_section',array(
                'title'=>__('Header','rss'),
                'description'=>__('This Header Setting Here','rss'),
                'capability'=>'edit_theme_options',
                'priority'=>1
            ));
            
            $wp_customize->add_setting('header_color_setting',array('default'=>'#000000'));
            $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize,'header_color_control',array(
                'label'=>__('Header Backgound Color','rss'),
                'section'=>'header_section',
                'settings'=>'header_color_setting',
                'priority'=>1,
            )));
        //Header Setting Closed
            
        //Container Setting
            $wp_customize->add_section('container_section',array(
                'title'=>__('Section','rss'),
                'description'=>__('This Section Setting Here','rss'),
                'capability'=>'edit_theme_options',
                'priority'=>2
            ));
            
            $wp_customize->add_setting('container_color_setting',array('defalut'=>'#ffffff'));
            $wp_customize->add_control(new Wp_Customize_Color_Control(
            $wp_customize,'container_color_control',array(
                'label'=>__('Section Background Color','rss'),
                'section'=>'container_section',
                'settings'=>'container_color_setting',
                'priority'=>2
            )));
        //Container Setting Closed
    }
    add_action('customize_register','theme_options'); //Theme Option Hook
    
    function css_adding(){
        //css adding
    }
    add_action('wp_head','css_adding'); //css add Hook
//Theme Options Closed
    
//Menu, Thumbnail, Logo register function after setup theme
    function installation_theme(){
        register_nav_menus(array(
            'header'=>__('Header','header'),
            'footer'=>__('Footer','footer')
        ));
        add_theme_support('custom-logo'); //Custom Logo Hook
        add_theme_support('post-thumbnails'); //Thumbnails Hook
    }
    add_action('after_setup_theme','installation_theme'); //After Setup Theme Hook
//Menu, Thumbnail, Logo register function after setup theme Closed
    
//Register Widgets
    function widget_area(){
        register_sidebar(array(
            'name'=>__('Header','rss'),
            'id'=>'header-1',
            'description'=>__('This Is Header Area','rss'),
            'befor_widget'=>'<section class="%1$s%" id="%1$s%">',
            'after_widget'=>'</section>',
            'befor_title'=>'<h3>',
            'after_title'=>'</h3>',
        ));
        
        register_sidebar(array(
            'name'=>__('Footer','rss'),
            'id'=>'footer-1',
            'description'=>__('This Is Footer Area','rss'),
            'befor_widget'=>'<section class="%1$s% id="%1$s%">',
            'after_widget'=>'</section>',
            'befor_title'=>'<h3>',
            'after_title'=>'</h3>',
        ));
    }
    add_action('widgets_init','widget_area'); //Widgets Hook
//Register Widgets Closed
    
    function autocomplete_function(){
        $suggest=$_REQUEST['suggest'];
        $args=array(
            'post_type'=>'post',
            's'=>$suggest,
            'post_status'=>'publish',
            'orderby'=>'title',
            'oreder'=>'ASC'
        );
       $query=new WP_Query($args);
       while($query->have_posts()): $query->the_post();
            $title[]=  get_the_title();
       endwhile;
       echo json_encode($title);
       wp_reset_query();
       die();
    }
    add_action('wp_ajax_value_search','autocomplete_function');
    add_action('wp_ajax_nopriv_value_search','autocomplete_function');