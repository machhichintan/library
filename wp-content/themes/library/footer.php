<section class="bg-dark" style="padding:50px 0 50px 0;" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center pull-left">
                    <?php
                            $y=date('Y');
                            $text=get_theme_mod('footer_text_setting');
                            ?>
                    <p><i class="fa fa-copyright"></i> <?php echo $y. " ".$text;?></p>
                </div>
                <div class="col-lg-4 pull-right">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            </div>
        </div>
    </section>
<?php wp_footer(); ?>
</body>

</html>