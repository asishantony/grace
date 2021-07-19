$(document).ready(function () {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".modal").modal();
    // Close other sidenav on click of any sidenav
    // if ($(window).width() > 900) {
    //     $("#email-sidenav").removeClass("sidenav");
    // }
    $(".dropify").dropify();
    $("#programmes-table").DataTable({
        responsive: false,
        ordering: false,
        columnDefs: [
            { responsivePriority: 1, targets: -1 },
            { responsivePriority: 2, targets: 0 },
        ],
    });
});

$("#programmes-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",

        url: `/admin/programmes/save`,

        data: new FormData(this),
        processData: false,
        contentType: false,

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
        error: function (data) {
            var result = JSON.parse(data);
            swal({
                title: "Error",
                icon: "error",
            });
        },
    });
});
function editSubmit() {
    $("#edit-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var name = $(this).find("#name").val();
        var description = $(this).find("#description").val();
        var image = $(this).find("#image").val();
        var id = $(this).data("id");
        $.ajax({
            type: "PATCH",

            url: `/admin/programmes/${id}`,

            data: formData,
            processData: false,
            contentType: false,

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
            error: function (data) {
                var result = JSON.parse(data);
                swal({
                    title: "Error",
                    icon: "error",
                });
            },
        });
    });
}
$("span.delete").on("click", function (e) {
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: `/admin/programmes/delete`,
        data: { id: id },

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
        error: function (data) {
            var result = JSON.parse(data);
            // console.log(result);
            // swal({
            //     title: "Error",
            //     icon: "error",
            // });
        },
    });
});

$(".status-change").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: `/admin/programmes/toggle-status`,
        data: { id: id },

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
        error: function (data) {
            var result = JSON.parse(data);
            // console.log(result);
            // swal({
            //     title: "Error",
            //     icon: "error",
            // });
        },
    });
});

$(".view-program").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/programmes/${id}`,

        success: function (data) {
            var result = JSON.parse(data);
            if (result.success) {
                // swal({
                //     title: result.message,
                //     icon: "success",
                // }).then(() => {
                //     location.reload();
                // });
                $("#show-modal").html(result.html);
                $("#show-modal").modal("open");
            } else {
                swal({
                    title: result.message,
                    icon: "error",
                });
            }
        },
        error: function (data) {
            var result = JSON.parse(data);
            // console.log(result);
            // swal({
            //     title: "Error",
            //     icon: "error",
            // });
        },
    });
});
$(".edit-program").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/programmes/${id}/edit`,

        success: function (data) {
            var result = JSON.parse(data);
            // console.log(result);
            if (result.success) {
                $("#edit-modal").html(result.html);
                $(".dropify").dropify();
                $(".datepicker").datepicker();
                editSubmit();
                $("#edit-modal").modal("open");
            } else {
                swal({
                    title: result.message,
                    icon: "error",
                });
            }
        },
        error: function (data) {
            var result = JSON.parse(data);
            // console.log(result);
            // swal({
            //     title: "Error",
            //     icon: "error",
            // });
        },
    });
});
