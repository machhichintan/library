jQuery(function () {
    var ajax_call_func = function () {
        var val = jQuery("#amount").val();
        var cate = jQuery("#category option:selected").val();
        jQuery.ajax({
            type: "POST",
            datatype: "json",
            url: ajax_object.ajax_url,
            beforeSend: function () {
            },
            data: {action: "product_filter_by_price", price: val, category: cate},
            success: function (data) {
                jQuery("ul.products").html(data);
            }
        });

    }
    jQuery("#slider-range").slider({
        range: true,
        min: 5,
        max: 1200,
        change: ajax_call_func,
        values: [100, 1500],
        slide: function (event, ui) {
            jQuery("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery("#amount").val("$" + jQuery("#slider-range").slider("values", 0) + " - $" + jQuery("#slider-range").slider("values", 1));
    jQuery("#category").change(ajax_call_func);
});