<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php bloginfo('title'); ?> | <?php wp_title(); ?></title>
        <?php wp_head(); ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <style>
            .mypanel{
                color: #ffffff;
                padding: 5px 15px;
                font-size: 20px;
                font-family: verdana;
                background-color: #18bc9c;
                height: 40px;
                border-radius: 5px;
                box-shadow: 1px 3px 5px rgba(136, 136, 136, 0.48);
            }
        </style>
    </head>

    <body id="page-top" class="index">
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                   <a class="navbar-brand" href="<?php bloginfo('home'); ?>"><?php echo the_custom_logo(); ?> <?php bloginfo('name'); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'menu_class'=>'nav navbar-nav navbar-right',
                    ));
                    ?>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Header -->
        <header>
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                        <!--<img class="img-responsive" src="<?php //echo get_theme_mod('content_image_set'); ?>" alt="">-->
                        <div class="intro-text">
                            <h2 class="name">Cast</h2>
                            <hr class="star-light">
                        </div>
                    </div>
                </div>
            </div>
        </header>
