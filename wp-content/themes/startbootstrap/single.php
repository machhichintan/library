<?php
get_header('2');

$s_lastname = get_post_meta(get_the_ID(), 'lastname', TRUE);
$s_firstname = get_the_title();
$s_middlename = get_post_meta(get_the_ID(), 'middlename', TRUE);
$s_gender = get_post_meta(get_the_ID(), 'gender', TRUE);
$s_dob = get_post_meta(get_the_ID(), 'dateofbirth', TRUE);
$s_nationality = get_post_meta(get_the_ID(), 'nationality', TRUE);
$s_religion = get_post_meta(get_the_ID(), 'religion', TRUE);
$s_address = get_post_meta(get_the_ID(), 'address', TRUE);
$s_email = get_post_meta(get_the_ID(), 'email', TRUE);
$s_mobile = get_post_meta(get_the_ID(), 'mobile', TRUE);
$s_zipcode = get_post_meta(get_the_ID(), 'zipcode', TRUE);
$s_area = get_post_meta(get_the_ID(), 'area', TRUE);
$s_city = get_post_meta(get_the_ID(), 'city', TRUE);
$s_state = get_post_meta(get_the_ID(), 'state', TRUE);
$s_country = get_post_meta(get_the_ID(), 'country', TRUE);
$s_occupation = get_post_meta(get_the_ID(), 'occupation', TRUE);
$s_occupationarea = get_post_meta(get_the_ID(), 'occupationarea', TRUE);
$s_mothername = get_post_meta(get_the_ID(), 'mothername', TRUE);
$s_spousename = get_post_meta(get_the_ID(), 'spouse', TRUE);
$s_childranname = get_post_meta(get_the_ID(), 'childranname', TRUE);
$s_brothename = get_post_meta(get_the_ID(), 'brothename', TRUE);
$s_sistername = get_post_meta(get_the_ID(), 'sistername', TRUE);
?>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center"><?php echo $s_lastname . " " . $s_firstname; ?></h1>
                <hr class="star-primary">
            </div>
        </div>
        <p></p><br /><br />
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <p style="font-size: 11px;"><span><?php echo get_the_date(); ?></span>
                        <?php echo str_repeat("&nbsp;", 18); ?><span><?php echo get_the_time(); ?></span>
                    </p>
                    <?php the_post_thumbnail(array(150, 200)); ?>
                </div>
                <div class="col-lg-3">
                    <p><?php echo ucfirst($s_firstname); ?></p>
                    <p><?php ?></p>
                    <p><?php echo ucfirst($s_middlename); ?> Bhai</p>
                    <p><?php echo $s_email; ?></p>
                    <p><?php echo $s_gender; ?></p>
                    <p><?php echo $s_mobile; ?></p>
                    <p><?php echo $s_dob; ?></p>
                </div>
                <div class="col-lg-3">
                    <p>Address</p>
                    <p>Zip code</p>
                    <p>Area</p>
                    <p>City</p>
                    <p>State</p>
                    <p>Country</p>
                </div>
                <div class="col-lg-3">
                    <p><?php echo $s_address; ?></p>
                    <p><?php echo $s_zipcode; ?></p>
                    <p><?php echo $s_area; ?></p>
                    <p><?php echo $s_city; ?></p>
                    <p><?php echo $s_state; ?></p>
                    <p><?php echo $s_country; ?></p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">

                <div class="col-lg-3">
                    <p>Father Name</p>
                    <p>Mother Name</p>
                    <p>Spouse Name</p>
                    <p>Childran Name</p>
                    <p>Brother Name</p>
                    <p>Sister Name</p>
                </div>
                <div class="col-lg-3">
                    <p><?php echo $s_middlename; ?></p>
                    <p><?php echo $s_mothername; ?></p>
                    <p><?php echo ucfirst($s_spousename); ?></p>
                    <?php
                    $childranname = get_post_meta(get_the_ID(), 'childran', TRUE);
                    $unserialize_child = implode(' , ', $childranname);
                    ?>
                    <span><?php echo $unserialize_child; ?></span><br /><br />

                    <?php
                    $brothername = get_post_meta(get_the_ID(), 'brothername', TRUE);
                    $sistername = get_post_meta(get_the_ID(), 'sistername', TRUE);

                    $unserialize_bro = implode(' , ', $brothername);
                    $unserialize_sis = implode(' , ', $sistername);

                    //echo $unserialize_bro;
                    ?>
                    <span><?php echo $unserialize_bro; ?></span><br /><br />
                    <span><?php echo $unserialize_sis; ?></span>
                </div>
                <div class="col-lg-3">
                    <p>Occupation</p>
                    <p>Occupation Area</p>
                </div>
                <div class="col-lg-3">
                    <p><?php echo $s_occupation; ?></p>
                    <p><?php echo $s_occupationarea; ?></p>
                </div>
            </div>
        </div>
    </div><br /><br />
</section>
<?php get_footer(); ?>