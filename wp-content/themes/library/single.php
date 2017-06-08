<?php get_header(); ?>
<section class="bg-primary" id="about">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading"><?php the_title(); ?></h2>
                        <hr class="primary">
                    </div>
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <div class="form-group col-lg-10 pull-right">
                                <div class="col-lg-12">
                                    <span><?php the_time(); ?></span>
                                    <span><?php the_date(); ?></span>
                                    <p><?php echo the_post_thumbnail('medium'); ?></p>
                                    <p>
                                        <span>Price: <?php echo get_post_meta(get_the_ID(), 'price', TRUE); ?>&nbsp;<br />
                                        <span style="cursor: default;pointer-events: none;">Author: <?php the_terms(get_the_ID(), 'genre'); ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="exampleInputName2"></label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="col-lg-9">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
    endif;
    ?>
</section>
<?php get_footer(); ?>
