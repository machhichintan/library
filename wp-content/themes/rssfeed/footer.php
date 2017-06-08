<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Let's Get In Touch!</h2>
                    <hr class="primary">
                    <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                </div>
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-phone fa-3x sr-contact"></i>
                    <p>123-456-6789</p>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                    <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                </div>
            </div>
        </div>
    </section>
<script>
    jQuery(document).ready(function(){
        var autocomplete_textbox=jQuery('#autocomplete_text');
        jQuery(autocomplete_textbox).keyup(function(){
            //alert("Hello");
            var suggest_value=autocomplete_textbox.val();
            //alert(demo);
            
            jQuery.ajax({
                url:"<?php echo admin_url(); ?>/admin-ajax.php",
                type:"POST",
                datatype:"json",
                data:{action:"value_search",suggest:suggest_value},
                success:function(data){
                    var user_data=jQuery.parseJSON(data);
                    console.log(user_data);
                    jQuery("#autocomplete_text").autocomplete({
                        source:user_data,
                        minLength:1
                    });
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"/></script>
<?php wp_footer(); ?>
</body>
</html>