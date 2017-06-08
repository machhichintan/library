<?php get_header(); 

    if (isset($_POST['searching'])) { ?>
        <section class="bg-primary" id="about">
            <div class="container">
                <?php 
                $f=0;
                $cast = $_POST['cast'];
                if (!empty($cast)) { ?>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <?php
                            $myname = array(
                                'post_type' => 'post',
                                'posts_per_page'=>2,
                                's' => $cast,
                            );
                            ?>
                            <h2 class="section-heading">Find Your <?php echo ucfirst($cast); ?></h2>
                            <hr class="light">
                        </div>
                    </div>
                    <?php
                    $myquery = new WP_Query($myname);
                    if($myquery->have_posts()){
                        $f=1;
                        while ($myquery->have_posts()): $myquery->the_post(); 
                            $laname=get_post_meta(get_the_ID(),'lastname',TRUE);
                            $fathe=get_post_meta(get_the_ID(),'middlename',TRUE);
                            $mother=get_post_meta(get_the_ID(),'mothername',TRUE);
                            $title=get_the_title();
                            ?>
                            <div class="row">
                                <div class="col-lg-12" style="padding: 35px 0; background-color: #1e3b4c">
                                    <div class="col-lg-6 text-center">
                                        <p><?php echo ucfirst($title)." ".ucfirst($laname); ?></p>
                                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(150,200)); ?></a>
                                    </div>
                                    <div class="col-lg-6">
                                        <p></p>
                                        <p>Father Name <?php echo $fathe; ?></p>
                                        <p>Mother Name <?php echo $mother; ?></p>
                                        <p><a href="<?php the_permalink(); ?>" style="color: #ffffff;" class="btn btn-info">More Details</a></p>
                                    </div>
                                </div>
                            </div><br /><br />
                            <?php
                        endwhile;
                        wp_reset_query();
                    }
                    else
                    {
                        $data=array(
                            'post_type' => 'post',
                            'meta_query'=>array(
                                'relation'=>'OR',
                                array(
                                    'key'=>'lastname',
                                    'value'=>$cast,
                                    'compare'=>'LIKE'
                                ),
                                array(
                                    'key'=>'middlename',
                                    'value'=>$cast,
                                    'compare'=>'LIKE'
                                ),
                                array(
                                    'key'=>'mothername',
                                    'value'=>$cast,
                                    'compare'=>'LIKE'
                                ),
                                array(
                                    'key'=>'city',
                                    'value'=>$cast,
                                    'compare'=>'LIKE'
                                )
                            )
                        );
                        //print_r($data);
                        $demo=new WP_Query($data);
                        if ($demo->have_posts()):
                            while ($demo->have_posts()): $demo->the_post();
                                $lname=get_post_meta(get_the_ID(), 'lastname', TRUE);
                                $fathe=get_post_meta(get_the_ID(),'middlename',TRUE);
                                $mother=get_post_meta(get_the_ID(),'mothername',TRUE);
                                $title=get_the_title();
                                if(stripos($fathe, $cast)!==false){ ?>
                                    <div class="row">
                                        <div class="col-lg-12" style="padding: 35px 0; background-color: #1e3b4c">
                                            <div class="col-lg-6 text-center">
                                                <p><?php echo ucfirst($title)." ".  ucfirst($lname); ?></p>
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(200,250)); ?></a>
                                            </div>
                                            <div class="col-lg-6">
                                                <p></p>
                                                <p><?php echo ucfirst($lname)." ".ucfirst($title); ?> (Son)</p>
                                                <p>Wife Name <?php echo $mother; ?></p>
                                                <p><a href="<?php the_permalink(); ?>" style="color: #ffffff;" class="btn btn-info">More Details</a></p>
                                            </div>
                                        </div>
                                    </div><br /><br />
                                    <?php
                                }
                                else if(stripos($mother, $cast)!==false){ ?>
                                    <div class="row">
                                        <div class="col-lg-12" style="padding: 35px 0; background-color: #1e3b4c">
                                            <div class="col-lg-6 text-center">
                                                <p><?php echo ucfirst($title)." ".  ucfirst($lname); ?></p>
                                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(200,250)); ?></a>
                                            </div>
                                            <div class="col-lg-6">
                                                <p></p>
                                                <p><?php echo $title; ?> (Son)</p>
                                                <p>Husband Name <?php echo $fathe; ?></p>
                                                <p><a href="<?php the_permalink(); ?>" style="color: #ffffff;" class="btn btn-info">More Details</a></p>
                                            </div>
                                        </div>
                                    </div><br /><br />
                                    <?php
                                }
                            endwhile;
                            else:
                            ?>
                                <div class="row">
                                    <div class="col-lg-8 col-lg-offset-2 text-center">
                                        <?php echo "Data Not Found"; ?>
                                    </div>
                                </div>
                            <?php
                        endif;
                        wp_reset_query();
                    }
                }
                else{ ?>
                    <h2 class="section-heading">Find Your <?php echo ucfirst($cast); ?></h2>
                    <hr class="light">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2 text-center">
                            <p><?php echo "pleace Enter Your Cast Name"; ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
        <?php
    }
    ?>
    
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">At Your Service</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                        <h3>Sturdy Templates</h3>
                        <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                        <h3>Ready to Ship</h3>
                        <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                        <h3>Up to Date</h3>
                        <p class="text-muted">We update dependencies to keep things fresh.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                        <h3>Made with Love</h3>
                        <p class="text-muted">You have to make your websites with love these days!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="<?php echo get_template_directory_uri(); ?>/img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
            </div>
        </div>
    </aside>
<?php get_footer(); ?>
