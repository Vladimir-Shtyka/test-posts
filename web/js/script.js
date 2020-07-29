$(document).ready(function () {
    $(".post-ref").on("click", function () {

        var post_id = $(this).attr('id');

        if (post_id) {
            $.ajax({
                url: "view",
                data: "id=" + post_id,
                success: function (response) {

                    $(".loader").hide();

                    if (response) {
                        $(".modal-title").html(response.data.title);
                        $(".modal-date").html(timeConverter(response.data.updated_at));
                        $(".modal-body").html(response.data.description);
                    } else {
                        $(".modal-body").html("Error loading");
                    }
                },
                error: function (error) {
                    $(".loader").hide();
                    $(".modal-body").html("Error loading post");
                }
            });
        }
    });

    function timeConverter(UNIX_timestamp) {
        var a = new Date(UNIX_timestamp * 1000);
        var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        var year = a.getFullYear();
        var month = months[a.getMonth()];
        var date = a.getDate();
        return date + ' ' + month + ' ' + year;
    }
});