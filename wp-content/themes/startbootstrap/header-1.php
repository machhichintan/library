
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <style>
            .name {
                color: #ffffff;
            }
            .title{
                text-align: center;
            }
        </style>
        <title><?php bloginfo('title'); ?> | <?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>

    <body id="page-top" class="index">
        <!--<div id="skipnav">
            <a href="#maincontent">Skip to main content</a>
        </div>-->

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                        </button>-->
                    <a class="navbar-brand" href="<?php bloginfo('home'); ?>"><?php echo the_custom_logo(); ?> <?php bloginfo('name'); ?></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'header',
                        'menu_class' => 'nav navbar-nav navbar-right',
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
                        <!--<img class="img-responsive" src="<?php //echo get_theme_mod('content_image_set');                  ?>" alt="">-->
                        <div class="intro-text">
                            <h2 class="name">Cast search</h2>
                            <hr class="star-light">
                        </div>
                    </div>
                </div>
                
                <form name="details_form" method="post">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group mypanel" data-toggle="collapse" data-target="#demo">
                                <div class="form-group col-lg-11">
                                    <input type="text" name="search" class="form-control" id="myauto" placeholder="Search" autocomplete="off">
                                </div>
                                <div class="form-group col-lg-1">
                                    <button type="submit" name="search_cast" class="btn btn-default" style="box-shadow: 1px 3px 5px #888888;">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group" data-toggle="collapse" data-target="#demo">
                                <div class="col-lg-3 checkbox" style="margin: 5px;">
                                    <label class="pull-left"><input type="checkbox" id="checkbox_fname"> First Name</label><br /><br />
                                    <input type="text" name="fname" class="click_fname form-control" placeholder="First Name"><br /><br />
                                </div>
                                <div class="col-lg-3 checkbox pull-left" style="margin: 5px;">
                                    <label class="pull-left"><input type="checkbox" id="checkbox_lname" class="pull-left"> Last Name</label><br /><br />
                                    <input type="text" name="fname" class="click_lname form-control" placeholder="Last Name"><br /><br />
                                </div>
                                <div class="col-lg-3 checkbox pull-left" style="margin: 5px;">
                                    <label class="pull-left"><input type="checkbox" id="checkbox_faname"> Father Name</label><br /><br />
                                    <input type="text" name="fname" class="click_faname form-control" placeholder="Father Name"><br /><br />
                                </div>
                            </div>
                        </div>
                    </div>-->
<!--                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <button type="submit" name="search_cast" class="btn btn-default" style="box-shadow: 1px 3px 5px #888888;">Submit</button>
                        </div>
                    </div>-->
                </form>
            </div>
        </header>
        
        <?php
        if (isset($_POST['search_cast'])) {
            $flag='false';
            $s_search=$_POST['search'];
            if (!empty($s_search)) {
                $Name_search = $s_search;
                ?>
                <section id="portfolio">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2>Find &nbsp;<?php echo $Name_search; ?></h2>
                                <hr class="star-primary">
                            </div>
                        </div>
                        <?php 
                        //echo $first_name_search;
                        //First name object and condition
                        $first_name_search = array(
                            'post_type' => 'post',
                            's' => $Name_search,
                        );

                        $theQuery = new WP_Query($first_name_search); //object

                        if ($theQuery->have_posts()):
                            while ($theQuery->have_posts()) : $theQuery->the_post();
                            $flag='true';
                                ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12" style="background-color: #2c3e50; border-radius: 10px;padding: 10px;margin: 5px 0;">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-6 text-center">
                                                <h3 class="title"><a href="<?php the_permalink(); ?>">*---- <?php echo get_post_meta(get_the_ID(), 'lastname', TRUE) ?> <?php the_title(); ?> ----*</a></h3>
                                                <hr>
                                                <p class="name">- Father Name <?php echo get_post_meta(get_the_ID(), 'middlename', TRUE) ?></p>
                                                <p class="name">- Mother Name <?php echo get_post_meta(get_the_ID(), 'mothername', TRUE) ?></p>
                                            </div>
                                            <div class="col-lg-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        //first name object and condition closed
                        //last name object and condition
                        $last_name_search = array(
                            'post_type' => 'post',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'lastname',
                                    'value' => $Name_search,
                                    'compare' => 'LIKE',
                                )
                            )
                        );

                        $the2Query = new WP_Query($last_name_search); //object

                        if ($the2Query->have_posts()):
                            while ($the2Query->have_posts()) : $the2Query->the_post();
                                $flag='true';
                                ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12" style="background-color: #2c3e50; border-radius: 10px;padding: 10px;margin: 5px 0;">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="title"><a href="<?php the_permalink(); ?>">*---- <?php echo get_post_meta(get_the_ID(), 'lastname', TRUE) ?> <?php the_title(); ?> ----* </a></h3>
                                                <hr>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name">First Name</p>
                                                    <p class="name">Last Name</p>
                                                    <p class="name">Father Name</p>
                                                    <p class="name">Mother Name</p>
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name"><?php the_title(); ?></p>
                                                    <p class="name"> <?php echo get_post_meta(get_the_ID(), 'lastname', TRUE) ?></p>
                                                    <p class="name"><?php echo get_post_meta(get_the_ID(), 'middlename', TRUE) ?></p>
                                                    <p class="name"><?php echo get_post_meta(get_the_ID(), 'mothername', TRUE) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        //last name object and condition closed
                        //middle name object and condition
                        $middle_name_search = array(
                            'post_type' => 'post',
                            'meta_query' => array(
                                'relation' => 'OR',
                                array(
                                    'key' => 'middlename',
                                    'value' => $Name_search,
                                    'compare' => 'LIKE',
                                )
                            )
                        );

                        $the3Query = new Wp_Query($middle_name_search); //object

                        if ($the3Query->have_posts()) :
                            while ($the3Query->have_posts()) : $the3Query->the_post();
                                $flag='true';
                                ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12" style="background-color: #2c3e50; border-radius: 10px;padding: 10px;margin: 5px 0;">
                                            <div class="col-lg-3">
                                                <!--content nakhvanu baki che-->
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="title"><a href="<?php the_permalink(); ?>">*---- <?php echo get_post_meta(get_the_ID(), 'middlename', TRUE) ?> Bhai ----*</a></h3>
                                                <hr>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name">Son Name</p>
                                                    <p class="name">Wife Name</p>
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name"><?php the_title(); ?></p>
                                                    <p class="name"><?php echo get_post_meta(get_the_ID(), 'mothername', TRUE) ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <!--content nakhvanu baki che-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        //middle name object and condition closed

                        //mother name object and condition
                        $mother_name_search=array(
                            'post_type'=>'post',
                            'meta_query'=>array(
                                'relation'=>'OR',
                                array(
                                    'key'=>'mothername',
                                    'value'=>$Name_search,
                                    'compare'=>'LIKE'
                                )
                            )
                        );

                        $the4Query= new Wp_Query($mother_name_search);

                        if($the4Query->have_posts()):
                            while($the4Query->have_posts()): $the4Query->the_post();
                                $flag='true';
                                ?>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12" style="background-color: #2c3e50; border-radius: 10px;padding: 10px;margin: 5px 0;">
                                            <div class="col-lg-3">

                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="title"><a href="<?php the_permalink(); ?>">*---- <?php echo get_post_meta(get_the_ID(), 'mothername', TRUE) ?> Ben ----*</a></h3>
                                                <hr>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name">Son Name</p>
                                                    <p class="name">Husband Name</p>
                                                </div>
                                                <div class="col-lg-6 text-center">
                                                    <p class="name"><?php the_title(); ?></p>
                                                    <p class="name"><?php echo get_post_meta(get_the_ID(),'middlename',TRUE); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        if($flag=='false')
                        { 
                            ?>
                            <div class="row">
                                <div class="col-lg-12" style="border-radius: 10px;padding: 10px;margin: 5px 0;">
                                    <div class="col-lg-4">

                                    </div>
                                    <div class="col-lg-4">
                                        <p class="title" style="background-color:#dddddd;"><?php echo "Data Not Found"; ?></p>
                                    </div>
                                    <div class="col-lg-4">

                                    </div>
                                </div>
                            </div>
                            <?php 
                        }
                        //mother name object and condition closed
                    ?>
                    </div>
                </section><?php
            } //isset closed
            else {
                ?>
                <div class="row">
                    <div class="col-lg-12" style="border-radius: 10px;padding: 10px;margin: 5px 0;">
                        <div class="col-lg-4">

                        </div>
                        <div class="col-lg-4">
                            <p class="title" style="background-color:#dddddd;"><?php echo "Enter Your Cast Name"; ?></p>
                        </div>
                        <div class="col-lg-4">

                        </div>
                    </div>
                </div>
                <?php
             }
        }
        ?>
        
