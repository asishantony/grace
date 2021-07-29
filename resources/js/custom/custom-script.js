/*================================================================================
	Item Name: Grace International School
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
$(".card-alert .close").click(function () {
    $(this).closest(".card-alert").fadeOut("slow");
});
$("#launch-switch").change(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var val = $("#launch-switch")[0].checked;
    // console.log(val);
    $.ajax({
        type: "POST",

        url: `/admin/site_settings/launch`,

        data: { val: val },

        success: function (data) {
            var result = JSON.parse(data);
            if (result.success) {
                alert("Success");
                location.reload();
            } else {
                swal({
                    title: result.message,
                    icon: "error",
                });
            }
        },
        error: function (data) {
            var result = JSON.parse(data);
            swal({
                title: "Error",
                icon: "error",
            });
        },
    });
});
