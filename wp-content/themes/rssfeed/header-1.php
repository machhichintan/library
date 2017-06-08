<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="<?php bloginfo('description'); ?>" content="">
        <meta name="author" content="">
        
        <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand page-scroll" href="#page-top">Cast Search</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header',
                            'menu_class' => 'nav navbar-nav navbar-right',
                        ));
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">Cast Search</h1>
                    <hr>
                </div>
            </div>
        </header>
