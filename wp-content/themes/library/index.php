<?php get_header(); ?>
    
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	
<script>
    $(function () {
        //alert('Hello');
        $("#slider-range").slider({
            range: true,
            min: 100,
            max: 500,
            values: [100, 500],
            slide: function (event, ui) {
                $("#amount").val("" + ui.values[ 0 ] + " - " + ui.values[ 1 ]);
            }
        });

       $("#amount").val("" + $("#slider-range").slider("values", 0) +
                " - " + $("#slider-range").slider("values", 1));

       alert($("#minValue").val(ui.values[ 0 ]));

       $("#maxValue").val(ui.values[ 1 ]);
    });
</script>
<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <form name="book_search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">SEARCH BOOKS HERE </h2>
                    <hr class="primary">
                </div>
                <div class="col-lg-6">
                    <div class="form-group col-lg-8 pull-right">
                        <label for="exampleInputName2">Books Title</label>
                        <input type="text" name="book_search" class="form-control" id="exampleInputName2" placeholder="Enter Book Title">
                    </div>
                    <div class="form-group col-lg-8 pull-right">
                        <label for="exampleInputName2">Rateing</label>
                        <select name="rate" class="form-control">
                            <option style="display: none;" value="">Select Rateing</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group col-lg-8">
                        <label>Author Name</label>
                        <select name="author" class="form-control">
                            <option style="display: none;" value="">Select</option>
                            <?php
                            $author = get_terms('genre');
                            foreach ($author as $author_name) { ?>
                                <option value="<?php echo $author_name->term_id; ?>"><?php echo $author_name->name; ?></option> <?php 
                            } ?> 
                        </select>
                    </div>
                    <div class="form-group col-lg-8">
                        <div data-role="rangeslider">
                            <p>
                                <label for="amount">Set Price:  </label>
                                <input type="text" id="amount" name="price" readonly style="border:0; color:#000000; font-weight:bold;">
                                <!--<input type="hidden" id="minValue" name="minValue" value="<?php // echo (isset($_POST['minValue'])) ? $_POST['minValue'] : '75';   ?>" />-->
                                <!--<input type="hidden" id="maxValue" name="maxValue" value="<?php // echo (isset($_POST['maxValue'])) ? $_POST['maxValue'] : '300';   ?>" />-->
                            </p>                
                            <div id="slider-range"></div><br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pull-right">
                    <div class="form-group col-lg-5 text-center">
                        <button id="submit_data" class="btn btn-primary" name="submit_data" type="submit">Book Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php

//Books Fliter like,Author,Boo_Name,Rating
    if (isset($_GET['submit_data'])) {
        $book_search = !empty($_GET['book_search']) ? $_GET['book_search'] : '';
        $rate = !empty($_GET['rate']) ? $_GET['rate'] : '';
        $author = !empty($_GET['author']) ? $_GET['author'] : ''; // Start the Query
        $price = !empty($_GET['price']) ? $_GET['price'] : '';
        
       $user_price=  explode("-", $price);
       //echo "Mini"
       //echo "Maxi"
       $min=(int)$user_price[0];
       $max=(int)$user_price[1];
        
        $data = array(
            'post_type' => 'book', // your CPT
            's' => $book_search, // looks into everything with the keyword from your 'name field'
        );

        if (!empty($rate)) {
            $data['meta_query'] = array(
            array(
                'key' => 'rating',
                'value' => $rate,
                'compare' => 'LIKE'
            ),
                array(
                    'key'=>'price',
                    'value'=>array($min,$max),
                    'compare'=>'BETWEEN'
                ));
        }
        if(!empty(array($min,$max))){
            $data['meta_query']=array(
            array(
                'key'=>'price',
                'value'=>array($min,$max),
                'compare'=>'BETWEEN'
            ));
        }
        
        if (!empty($author)) {
            $data['tax_query'] = array(
            array(
                'taxonomy' => 'genre',
                'field' => 'term_id',
                'terms' => $author,
            ));
        }
        
        $query = new WP_Query($data);

        if ($query->have_posts()) :
        $flag=1;
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
                        <div class="col-lg-1">
                            <div class="service-box text-center">
                                <h4>#</h4>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="service-box">
                                <h4>Books Name</h4>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="service-box">
                                <h4>Author</h4>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="service-box">
                                <h4>Price</h4>
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="service-box text-center">
                                <h4>Rating</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                while ($query->have_posts()) : $query->the_post();
                    //$flag = 1;
                    ?>
                    <div class="container dataat">
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="service-box text-center">
                                    <h5><?php echo $flag++; ?></h5>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="service-box">
                                    <h5><a href="<?php the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h5>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="service-box">
                                    <h5 style="cursor: default;pointer-events: none;"><?php echo the_terms(get_the_ID(), 'genre') ?></h5>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="service-box">
                                    <h5><?php echo get_post_meta(get_the_ID(), 'price', TRUE) ?></h5>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="service-box text-center">
                                    <h5><?php echo get_post_meta(get_the_ID(), 'rating', TRUE) ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    //echo get_post_meta(get_the_ID(), 'rating', true);
                endwhile;
                
                else: ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 col-md-6">
                                <div class="service-box">
                                    <h5><?php echo _e('Sorry, Data Not Found.'); ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php        
                    
                ?>
            </section>
            <?php 
        endif;
    }
//Books Fliter like,Author,Boo_Name,Rating Closed
    
//Books like,Author,Boo_Name,Rating,Price
    else
    {
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
                    <div class="col-lg-1">
                        <div class="service-box text-center">
                            <h4>#</h4>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="service-box">
                            <h4>Books Name</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="service-box">
                            <h4>Author</h4>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="service-box">
                            <h4>Price</h4>
                        </div>
                    </div>
                    <div class="col-lg-1">
                        <div class="service-box text-center">
                            <h4>Rating</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <?php
                $my_query = new WP_Query(array('post_type' => 'book', 'posts_per_page' => '50'));
                if ($my_query->have_posts()) :
                    $f = 1;
                    while ($my_query->have_posts()) : $my_query->the_post();
                        ?>
                        <div class="row">
                            <div class="col-lg-1">
                                <div class="service-box text-center">
                                    <h4><?php echo $f++; ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="service-box">
                                    <h4><a href="<?php the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></h4>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="service-box">
                                    <h4 style="cursor: default;pointer-events: none;"><?php the_terms(get_the_ID(), 'genre'); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="service-box">
                                    <h4><?php echo get_post_meta(get_the_ID(), 'price', true); ?></h4>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="service-box text-center">
                                    <h4><?php echo get_post_meta(get_the_ID(), 'rating', true); ?></h4>
                                </div>
                            </div>
                        </div>
                        <?php 
                    endwhile;
                    ?>
                    <!--pagination code Start Here-->
                <?php 
                    else:
                        echo _e('Sorry, Post Not Found.');
                endif; 
                ?>
            </div>
        </section>
        <?php
    }
//Books like,Author,Boo_Name,Rating,Price Closed
?>

<!--    <section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter popup-gallery">
                <div class="col-lg-4 col-sm-6">
                    <a href="img/portfolio/fullsize/1.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/1.jpg" class="img-responsive" alt="">
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
                    <a href="img/portfolio/fullsize/2.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/2.jpg" class="img-responsive" alt="">
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
                    <a href="img/portfolio/fullsize/3.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/3.jpg" class="img-responsive" alt="">
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
                    <a href="img/portfolio/fullsize/4.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/4.jpg" class="img-responsive" alt="">
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
                    <a href="img/portfolio/fullsize/5.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/5.jpg" class="img-responsive" alt="">
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
                    <a href="img/portfolio/fullsize/6.jpg" class="portfolio-box">
                        <img src="img/portfolio/thumbnails/6.jpg" class="img-responsive" alt="">
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
    </section>-->

<!--    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Free Download at Start Bootstrap!</h2>
                <a href="http://startbootstrap.com/template-overviews/creative/" class="btn btn-default btn-xl sr-button">Download Now!</a>
            </div>
        </div>
    </aside>-->

<?php get_footer(); ?>
