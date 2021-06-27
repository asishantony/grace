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
    $(".datepicker").datepicker();
    $(".dropify").dropify();
    $("#news-table").DataTable({
        responsive: false,
        ordering: false,
        columnDefs: [
            { responsivePriority: 1, targets: -1 },
            { responsivePriority: 2, targets: 0 },
        ],
    });
});

$("#news-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",

        url: `/admin/news/save`,

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
            console.log(result);
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
        var id = $(this).data("id");
        console.log({ id, formData });
        $.ajax({
            type: "PATCH",

            url: `/admin/news/${id}`,

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
                console.log(result);
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
        url: `/admin/news/delete`,
        data: { id: id },

        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
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
        url: `/admin/news/toggle-status`,
        data: { id: id },

        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
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
$(".featured-change").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: `/admin/news/toggle-featured`,
        data: { id: id },

        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
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

$(".view-news").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/news/${id}`,

        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
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
$(".edit-news").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/news/${id}/edit`,

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
