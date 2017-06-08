<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//print_r($taxonomyies);
?>
<div class="wrap">
    <h1 class="wp-heading-inline">Images Gallery</h1>
    <h2 id="short_code" class="wp-heading-inline" style="float: right;"></h2>
    <hr class="wp-header-end">
    <h2 class="screen-reader-text">Filter pages list</h2>
    <ul class="subsubsub">
        <li class="all"><a href="">All <span class="count">(5)</span></a>|</li>
        <li class="publish"><a href="">Publish<span class="count">(4)</span></a></li>
    </ul>
    <form method="get">
        <div class="tablenav top">
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
                <select name="action" id="bulk-action-selector-top" class="terms">
                    <option value="">Terms</option>
                    <?php
                    $args = array(
                        'object_type'=>array('image_gallery')
                    );
                    $output="names";
                    $operater="and";
                    $taxonomies=  get_taxonomies($args,$output,$operater);
                    if($taxonomies){
                        $query_term=  get_query_var($taxonomies);
                        $terms= get_terms($taxonomies,'slug='.$query_term);
                        if($terms){
                            foreach ($terms as $term){ 
                                ?><option><?php echo $term->name; ?></option><?php
                            }
                        }
                    }
                    ?>
                </select>
                
            </div>
            <div class="tablenav-pages one-page">
                <span class="displaying-num">10 items</span>
            </div>
        </div>
    </form>
</div> 
    
    <?php
    //$selected_value = lcfirst($_POST['select_post_type']);
    $args = array(
        'post_type' => 'image_gallery',
        'status' => 'publish'
    );
    $query = new WP_Query($args);

    if ($query->have_posts()): ?>
        <div id="data_blank">
            <table class="wp-list-table widefat fixed striped posts">
                <tr>
                    <td id="cb" class="manage-column column-cb">Select</td>
                    <th>ID</th>
                    <th class="manage-column column-title column-primary sortable desc">Title</td>
                    <th>Images</th>
                </tr> <?php 
                while ($query->have_posts()): $query->the_post(); ?>
                    <tr>
                        <td id="filter_checkbox"><label class="screen-reader-text" for="cb-select-all-1">Select</label>
                            <input type="checkbox" name="select" id="selected" value="<?php echo get_the_ID(); ?>">
                        </td>
                        <td  id="filter_id"><?php echo get_the_ID(); ?></td>
                        <td id="filter_title"><?php the_title(); ?></td>
                        <td id="filter_image"><?php the_post_thumbnail(array(30,30)); ?></td>
                    </tr> <?php 
                endwhile;  ?>
            </table>
        </div> <?php 
    endif; ?>
    <div id="btn_table">
        <table>
            <tr>
                <td class="animation_speed1">
                    <label>Speed: &nbsp; 
                    <input type="text" name="speed" class="animation_speed" placeholder="1000">
                    </label>
                </td>
                <td class="animation_speed1"><label>Auto: &nbsp; <input type="checkbox" name="auto" id="auto" value="1"></label></td>
                <td class="animation_speed1"><input type="submit" name="shortcode" class="button" value="Apply"></td>
            </tr>
        </table>
    </div>
    


<script>
    jQuery(document).ready(function(){
        jQuery('#data_blank').html('');
        jQuery('.button').hide();
        jQuery('#auto').hide();
        jQuery('.animation_speed1').hide();
        
        jQuery('.button').on("click",function(){
            var shortcode=jQuery('#selected:checked').map(function(){
                return jQuery(this).val();
            }).get();
            
            var speed_shortcode=jQuery('.animation_speed').val();
            var auto_shortcode=jQuery('#auto').val();
            alert(auto_shortcode);
//            if(auto_shortcode=="on"){
//                alert("ON");
//            }
//            else{
//                alert("OFF");
//            }
            var code="[" + "image_gallery "+" "+"images="+'"'+ shortcode+'"'+" "+"speed="+'"'+speed_shortcode+'"'+" "+"auto="+'"'+auto_shortcode+'"'+"]";
            jQuery('#short_code').html(code);
        });
        jQuery('#bulk-action-selector-top').on("change",function(){
            var taxonomy_change=jQuery('#bulk-action-selector-top').val();
            if(taxonomy_change ==''){
                jQuery('.button').hide();
                jQuery('#auto').hide();
                jQuery('.animation_speed1').hide();
                jQuery('#data_blank').html('');
            }
            else{   
                jQuery.ajax({
                    url:"<?php echo admin_url(); ?>/admin-ajax.php",
                    type:"POST",
                    data:{action:"taxonomy_change_function",select_taxonomy:taxonomy_change},
                    success:function(tax_change){
                        jQuery('#data_blank').html(tax_change);
                        jQuery('.button').show();
                        jQuery('.animation_speed1').show();
                        jQuery('#auto').show();
                    }
                });
            }
        });
    });
</script>
