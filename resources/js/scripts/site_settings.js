/* Account Settings */
/* ----------------*/
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
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
    var aboutUs = new Quill("#about-us-quill .editor", {
        bounds: "#about-us-quill .editor",
        modules: modules,
        theme: "snow",
    });
    var rulesEditor = new Quill("#rules-quill .editor", {
        bounds: "#rules-quill .editor",
        modules: modules,
        theme: "snow",
    });
    $("#save-info").on("click", function (e) {
        e.preventDefault();
        var about = aboutUs.root.innerHTML;
        var rules = rulesEditor.root.innerHTML;
        var data = $("#info-form").serializeArray();
        data.push(
            { name: "about", value: about },
            { name: "rules", value: rules }
        );
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
