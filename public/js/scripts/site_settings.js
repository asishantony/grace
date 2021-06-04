/* Account Settings */
/* ----------------*/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // // music select init
    // var musicselect = $("#musicselect2").select2({
    //     dropdownAutoWidth: true,
    //     width: "100%",
    // });
    // // movies select init
    // var moviesselect = $("#moviesselect2").select2({
    //     dropdownAutoWidth: true,
    //     width: "100%",
    // });
    // // language select init
    // var languageselect = $("#languageselect2").select2({
    //     dropdownAutoWidth: true,
    //     width: "100%",
    // });
    /*  UI - Alerts */
    // $(".card-alert .close").click(function () {
    //     $(this).closest(".card-alert").fadeOut("slow");
    // });
    // form validation for general tab
    // $(".formValidate").validate({
    //     rules: {
    //         uname: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         email: {
    //             required: true,
    //             email: true,
    //         },
    //         name: {
    //             required: true,
    //             // email: true
    //         },
    //         oldpswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         newpswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         repswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         crole: {
    //             required: true,
    //         },
    //         curl: {
    //             required: true,
    //             url: true,
    //         },
    //         ccomment: {
    //             required: true,
    //             minlength: 15,
    //         },
    //         tnc_select: "required",
    //     },
    //     //For custom messages
    //     messages: {
    //         uname: {
    //             required: "Enter a username",
    //             minlength: "Enter at least 5 characters",
    //         },
    //         curl: "Enter your website",
    //     },
    //     errorElement: "div",
    //     errorPlacement: function (error, element) {
    //         var placement = $(element).data("error");
    //         if (placement) {
    //             $(placement).append(error);
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    // });
    // //  form validation for passowrd tab
    // $(".paaswordvalidate").validate({
    //     rules: {
    //         oldpswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         newpswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //         repswd: {
    //             required: true,
    //             minlength: 5,
    //         },
    //     },
    //     errorElement: "div",
    //     errorPlacement: function (error, element) {
    //         var placement = $(element).data("error");
    //         if (placement) {
    //             $(placement).append(error);
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    // });
    // upload button converting into file button
    // $("#select-files").on("click", function () {
    //     $("#upfile").click();
    // });

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
