$(document).ready(function () {
    ("use strict");

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
    $("#album-table").DataTable({
        responsive: false,
        ordering: false,
        columnDefs: [
            { responsivePriority: 1, targets: -1 },
            { responsivePriority: 2, targets: 0 },
        ],
    });
});
$("#album-form").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",

        url: `/admin/album/save`,

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
        var id = $("#album_id").val();
        var name = $("#edit_name").val();

        $.ajax({
            type: "PATCH",

            url: `/admin/album/${id}`,

            data: { name: name },

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
    swal({
        title: "Are you sure?",
        text: "Are you shure to delete this Album!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: `/admin/album/delete`,
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
        }
    });
});

$(".status-change").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: `/admin/album/toggle-status`,
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
        url: `/admin/album/toggle-featured`,
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

$(".view-album").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/album/${id}`,

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
$(".edit-album").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/album/${id}/edit`,

        success: function (data) {
            var result = JSON.parse(data);
            console.log(result);
            if (result.success) {
                $("#edit-modal").html(result.html);
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
