$(document).ready(function () {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(".modal").modal();

    $("#academic-table").DataTable({
        responsive: false,
        ordering: false,
        columnDefs: [
            { responsivePriority: 1, targets: -1 },
            { responsivePriority: 2, targets: 0 },
        ],
    });
    var modules = {
        toolbar: [
            [
                {
                    font: [],
                },
                {
                    size: [],
                },
            ],
            ["bold", "italic", "underline", "strike"],
            [
                {
                    color: [],
                },
                {
                    background: [],
                },
            ],
            [
                {
                    script: "super",
                },
                {
                    script: "sub",
                },
            ],
            [
                {
                    header: "1",
                },
                {
                    header: "2",
                },
                "blockquote",
                "code-block",
            ],
            [
                {
                    list: "ordered",
                },
                {
                    list: "bullet",
                },
                {
                    indent: "-1",
                },
                {
                    indent: "+1",
                },
            ],
            [
                "direction",
                {
                    align: [],
                },
            ],
            ["link", "video"],
            ["clean"],
        ],
    };
    var descriptionQuill = new Quill("#description-quill .editor", {
        bounds: "#description-quill .editor",
        modules: modules,
        theme: "snow",
    });
    var organisationQuill = new Quill("#organisation-quill .editor", {
        bounds: "#organisation-quill .editor",
        modules: modules,
        theme: "snow",
    });
    var objectivesQuill = new Quill("#objectives-quill .editor", {
        bounds: "#objectives-quill .editor",
        modules: modules,
        theme: "snow",
    });
    var timeQuill = new Quill("#time-quill .editor", {
        bounds: "#time-quill .editor",
        modules: modules,
        theme: "snow",
    });

    $("#academic-form").on("submit", function (e) {
        e.preventDefault();
        var data = new FormData();
        var name = $("#name").val();
        var description = descriptionQuill.root.innerHTML;
        var organisation = organisationQuill.root.innerHTML;
        var objectives = objectivesQuill.root.innerHTML;
        var time = timeQuill.root.innerHTML;
        data.append("description", description);
        data.append("organisation", organisation);
        data.append("objectives", objectives);
        data.append("time", time);
        data.append("name", name);
        $.ajax({
            type: "POST",

            url: `/admin/academics/save`,

            data: data,
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
});

function editSubmit() {
    $("#edit-form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        var id = $(this).data("id");
        $.ajax({
            type: "PUT",

            url: `/admin/academic/${id}`,

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
        url: `/admin/academics/delete`,
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
        url: `/admin/academic/toggle-status`,
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
$(".featured-change").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "POST",
        url: `/admin/academic/toggle-featured`,
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

$(".view-academic").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/academic/${id}`,

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
$(".edit-academic").on("click", function (e) {
    var id = $(this).data("id");
    $.ajax({
        type: "GET",
        url: `/admin/academic/${id}/edit`,

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
