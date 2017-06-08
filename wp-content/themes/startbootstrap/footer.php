<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <?php
                    $y = date("Y");
                    $copyright = get_theme_mod('footer_text_setting');
                ?>
                
                <div class="col-lg-4">
                    <?php
                        wp_nav_menu(array(
                            'theme_location'=>'footer',
                            'menu_class'=>'nav navbar-nav navbar-right',
                        ));
                    ?>
                </div>
                <div class="col-lg-4" style="margin: 30px 0;">
                   <span><i class="fa fa-copyright"></i> <?php echo $y . " " . $copyright; ?></span>
                </div>
                
                <?php //dynamic_sidebar('header-1'); ?>
                <div class="col-lg-4">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    jQuery(document).ready(function(){
        //alert("HELLO");
        var checkbox_fname=jQuery("#checkbox_fname");
        var checkbox_lname=jQuery("#checkbox_lname");
        var checkbox_faname=jQuery("#checkbox_faname");
        
        var textbox_fname=jQuery(".click_fname");
        var textbox_lname=jQuery(".click_lname");
        var textbox_faname=jQuery(".click_faname");
        
//        textbox_fname.hide();
//        textbox_lname.hide();
//        textbox_faname.hide();
          
        //First CheckBox and TextBox
            jQuery(checkbox_fname).click(function(){
                if(this.checked){
                    jQuery(textbox_fname).attr("disabled","disabled");
                }
                else{
                    jQuery(textbox_fname).removeAttr("disabled");
                }
            });
        //First CheckBox and TextBox Closed
        
        //Last CheckBox and TextBox
            jQuery(checkbox_lname).click(function(){
                if(this.checked){
                    //jQuery(textbox_lname)
                    jQuery(textbox_lname).attr("disabled","disabled");
                }
                else{
                    jQuery(textbox_lname).removeAttr("disabled","disabled");
                }
            });
        //Last CheckBox and TextBox Closed
        
        //Father CheckBox and TextBox
            jQuery(checkbox_faname).click(function(){
                //alert("Hello");
                if(this.checked){
                    jQuery(textbox_faname).attr("disabled","disabled");
                }
                else{
                    jQuery(textbox_faname).removeAttr("disabled");
                }

            });
        //Father CheckBox and TextBox Closed
        
        //Father CheckBox and TextBox Hide And Show
            //jQuery(checkbox_faname).change(function(){
            //  if(this.checked){
            //      jQuery(".click_faname").show();
            //  }
            //  else{
            //      jQuery(".click_faname").hide();
            //  }
            //});
        //Father CheckBox and TextBox Hide And Show Closed
    });
</script>
<script>
    jQuery(document).ready(function () {
        //document.ready
            //alert('Hello');
            //marriege status related variable and function
                var maxchild = 3; //maximum 3 childs add
                var count = 0; // increment/decrement

                var after = jQuery('.spouse_name'); //Spouse div class
                var hiden_child = jQuery('.hide_child'); //child div class
                var addchild = jQuery('#add_chiled'); //onclick in add child

                var married = jQuery('#married_check'); //checkbox id

                var child_msg = jQuery('.child_msg');

                after.hide(); //Spouse div class hide
                hiden_child.hide(); //add_child div class hide

                //checked and unchecked spouse & child change hide/show process
                    //spouse and child hide/show
                        married.change(function () {
                            if (this.checked) {
                                //alert('Hello');
                                //var married="true";
                                after.show(300);
                                hiden_child.show(300);
                            }
                            else
                            {
                                //alert('Hello');
                                //var married="false";
                                after.hide(300);
                                hiden_child.hide(300);
                            }
                        });
                    //spouse and child hide/show cloed
                    //add new child and remove
                        jQuery(addchild).click(function (e) {
                            //alert("Hello");
                            e.preventDefault();

                            if (count < maxchild)
                            {
                                count++;
                                after.append('<div><input type="text" name="childs[]" placeholder="Child Name" class="form-control"><a href="#" class="remove">Remove</a></div>');
                            }
                            else {
                                if (count == maxchild)
                                {
                                    child_msg.html("Maximum 3 Children");
                                }
                                //else
                                //{
                                //   msg.html(""); 
                                //}
                            }
                        });
                        jQuery(after).on('click', '.remove', function (e) {
                            e.preventDefault();
                            jQuery(this).parent('div').remove();
                            count--;
                            child_msg.html("");
                        });
                    //add new child and remove closed
                //checkbox checked and unchecked spouse & child change hide/show process closed
            //marriege status related variable and function closed

            //brother and sister related variabel and function
                var maxbrother = 4; //maxbrother 5 limit 
                var countbrother = 0; //Incriment/Decriment
                var brother_msg = jQuery('.brother_msg');

                var hiden_brother = jQuery('.brother_name'); //brother div class
                var add_brother = jQuery('#add_brother'); //onclick in add brother

                jQuery(add_brother).click(function (e) {
                    e.preventDefault();
                    if (countbrother < maxbrother) {
                        countbrother++;
                        hiden_brother.append('<div><input type="text" name="brother_name[]" placeholder="Brother Name" class="form-control"><a href="#" class="remove_bro">Remove</a></div>');
                    }
                    else {
                        if (countbrother == maxbrother)
                        {
                            brother_msg.html("Maximum Limit 5");
                        }
                        //else{

                        //}
                    }
                });
                jQuery(hiden_brother).on('click', '.remove_bro', function (e) {
                    e.preventDefault();
                    jQuery(this).parent('div').remove();
                    countbrother--;
                    brother_msg.html("");
                });

                var maxsister = 4;
                var countsister = 0;

                var sister_msg = jQuery('.sister_msg');
                var sister_name = jQuery('.sister_name');
                var add_sister = jQuery('#add_sister');

                jQuery(add_sister).click(function (e) {
                    e.preventDefault();
                    if (countsister < maxsister)
                    {
                        countsister++;
                        sister_name.append('<div><input type="text" name="sister_name[]" placeholder="Sister Name" class="form-control"><a href="#" class="remove_sis">Remove</a></div>');
                    }
                    else {
                        if (countsister == maxsister) {
                            sister_msg.html("Maximum Limit 5");
                        }
                        //else{

                        //}
                    }
                });

                jQuery(sister_name).on('click', '.remove_sis', function (e) {
                    e.preventDefault();
                    jQuery(this).parent('div').remove();
                    countsister--;
                    sister_msg.html("");
                });
            //brother and sister related variabel and function closed

            //Pincode Related
                var zipcode = jQuery('#zipcode');

                jQuery(zipcode).blur(function () {
                    var postcode = zipcode.val();
                    jQuery.ajax({url: 'https://www.whizapi.com/api/v2/util/ui/in/indian-city-by-postal-code?pin=' + postcode + '&project-app-key=sesgtefwbsfeq12twt55ips1',
                        success: function (result) {
                        var json = JSON.parse(result);
                        var area = jQuery('#area_pin');
                        var city = jQuery('#city_pin');
                        var state = jQuery('#state_pin');
                        var country = jQuery('#country_pin');
                        //console.log(result); //all data print
                        console.log(json); //Object data print in console
                        //console.log(json.Data[0].Address); //one area print

                        area.val(json.Data[4].Address); //area print
                        city.val(json.Data[4].City); //city print
                        state.val(json.Data[4].State); //state print
                        country.val(json.Data[4].Country); //country print
                    }});
                });
            //Pincode Related closed
    }); //document.ready closed
</script>
<script>
    jQuery(document).ready(function(){
        //alert('Hello');
//        jQuery('#myauto').autocomplete({
//            source:["php","asp"],
//            minLength:1
//        });
        jQuery('#myauto').keyup(function(){
            var myid=jQuery('#myauto').val();
            //alert(myid);
            
            jQuery.ajax({
                url:"<?php echo admin_url(); ?>/admin-ajax.php",
                type:"POST",
                datatype:"json",
                data:{action:"datasearch",suggest:myid},
                success:function(data){
                    //console.log(data);
                    //alert(data);
                    var mydata=jQuery.parseJSON(data);
                    console.log(mydata);
                    jQuery('#myauto').autocomplete({
                       source:mydata,
                       minLength:1
                    });
                }
            });
        });
    });
</script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"/></script>
    
<script>
    jQuery(document).ready(function(){
        //alert("DDD");
        jQuery('#lname').click(function(){
            jQuery('.lname_error').hide();
        });
        jQuery('#lname').focus(function(){
            jQuery('.lname_error').hide();
        });
        jQuery('#fname').click(function(){
            jQuery('.fname_error').hide();
        });
        jQuery('#fname').focus(function(){
            jQuery('.fname_error').hide();
        });
    });
</script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>