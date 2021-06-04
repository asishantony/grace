/* Account Settings */
/* ----------------*/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#save-info").on("click", function (e) {
        e.preventDefault();
        var data = $("#info-form").serialize();
        $.ajax({
            type: "POST",

            url: `/admin/site_settings/info/1`,

            data: data,

            success: function (data) {
                var result = JSON.parse(data);
                if (result.success) {
                    swal({
                        title: result.message,
                        icon: "success",
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal({
                        title: result.message,
                        icon: "error",
                    });
                }
            },
        });
    });
    $("#social-submit").on("click", function (e) {
        e.preventDefault();
        var data = $("#social-form").serialize();
        $.ajax({
            type: "POST",

            url: `/admin/site_settings/social/1`,

            data: data,

            success: function (data) {
                var result = JSON.parse(data);
                if (result.success) {
                    swal({
                        title: result.message,
                        icon: "success",
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal({
                        title: result.message,
                        icon: "error",
                    });
                }
            },
        });
    });
    $("#basic-submit").on("click", function (e) {
        e.preventDefault();
        var data = $("#basic-form").serialize();
        $.ajax({
            type: "POST",

            url: `/admin/site_settings/basic/1`,

            data: data,

            success: function (data) {
                var result = JSON.parse(data);
                if (result.success) {
                    swal({
                        title: result.message,
                        icon: "success",
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    swal({
                        title: result.message,
                        icon: "error",
                    });
                }
            },
        });
    });
});
