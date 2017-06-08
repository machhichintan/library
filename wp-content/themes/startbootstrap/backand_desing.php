<div class="wrap">
    <h1 style="margin: 10px 0;">CSV FILE GENERATE</h1>
    <!--<div class="media-toolbar wp-filter" style="border: none;"></div>-->
    <form name="post_type" method="post">
        <select class="post_onchange" name="post_type">
            <option style="display: none;">Post Type</option> 
            <?php 
            foreach ($post_types as $post_type) { ?>
                <option><?php echo ucfirst($post_type); ?></option><?php
            }
            ?>
        </select>
        <select class="taxonomy_onchange" name="taxonomy">
            <option>Taxonomy</option> 
        </select>
        <select class="term_onchange" name="term">
            <option>Terms</option> 
        </select>
        <?php
        //$taxonomy_objects = get_object_taxonomies('book', 'objects', 'names');
        ?>
        <input type="submit" name="data_display" value="Find" class="button">
        <button onclick="exportTableToCSV(prompt('Enter File Name','filename.csv'))" class="button">Export CSV File</button>
    </form>
    <br /><br />

    <?php if (isset($_POST['data_display'])) { ?>
    <table id="csv_generate" border="1" cellpadding="10">
        <tr>
            <td>#</td>
            <td>Post</td>
            <td>Taxonomies</td>
            <td>Terms</td>
        </tr> <?php
        $select_post_type = lcfirst(!empty($_POST['post_type']) ? $_POST['post_type'] : '');
        $select_taxonomy = !empty($_POST['taxonomy']) ? $_POST['taxonomy'] : '';
        $select_term = !empty($_POST['term']) ? $_POST['term'] : '';

        if (!empty($select_post_type)) {
            $taxonomy = $select_taxonomy;
            $term = $select_term;

            $value=array(
                'post_type'=>$select_post_type,
                'post_per_page'=>-1,
            );
            $value['tax_query']=array(array(
                'taxonomy'=>$taxonomy,
                'field'=>'slug',
                'terms'=>$term,
            ));
        }
        // $value['tax_query'] = array('taxonomy' => $taxonomy, 'field' => 'term_name', 'terms' => $term, 'compare' => 'IN');
        //print_r($value);
        $query = new WP_Query($value);
        ?>
         <?php
            if ($query->have_posts()):
                $i = 1;
                while ($query->have_posts()): $query->the_post();
                    ?>
                        <tr><td><?php echo $i++; ?></td> 
                        <td><?php the_title(); ?></td>
                        <td><?php echo $taxonomy; ?></td>
                        <td><?php echo $term; ?></td></tr> <?php
                endwhile;
                else:
                    echo "Data Not Found";
            endif;
                wp_reset_query(); ?>

    </table> <?php 
    }
    ?>
</div>