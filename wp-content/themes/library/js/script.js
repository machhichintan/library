/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(function () {
    jQuery("#exampleInputName2").autocomplete({
        source: 'http://localhost/library/wp-content/themes/library/results_posts.php', // sunil_results.php is the file having all the results
        minLength: 1
    });
//    jQuery("#submit_data").click(function () { 
//        var titlepost=jQuery("#exampleInputName2").val();
//        var authid=jQuery("#authnm").val();
//        alert(authid); return false;
//        jQuery.ajax({url: 'http://localhost/library/wp-content/themes/library/admin_checkuser.php',
//            data: {title:titlepost,authids:authid},
//            type: 'post',
//            success: function (output) {
//                jQuery(".old_data").html(output);
//                //jQuery("#newdata")
//                alert(output);
//                
//            }
//        });
//    });
});

