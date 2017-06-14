jQuery(function () {
    jQuery("#slider-range").slider({
        range: true,
        min: 100,
        max: 1500,
        change: function () {
            var val = jQuery("#amount").val();
            jQuery.ajax({
                type: "POST",
                datatype: "json",
                url:ajax_object.ajax_url,
                beforeSend: function () {
                },
                data: {action: "product_filter_by_price", price: val},
                success: function (data) {
                    jQuery("ul.products").html(data);
                }
            });

        },
        values: [100, 1500],
        slide: function (event, ui) {
            jQuery("#amount").val("$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ]);
        }
    });
    jQuery("#amount").val("$" + jQuery("#slider-range").slider("values", 0) + " - $" + jQuery("#slider-range").slider("values", 1));
});

jQuery(document).on("change", '#slider-range', function () {

    console.log(jQuery(this).val());
});




