var x = $(document);
x.ready(start);

function start() {
    $(".td_link_delete").on("click", "#btn-delete", function () {
        console.log('go');
        var link_post = $(this).attr('href');
        var title_post = $(this).attr('the_title');

        delete_post(link_post, title_post);
    });


}

function delete_post(link_post, title_post) {
    $('.modal-body').html("Are you sure?, this post will be deleted: " + title_post);
    $('.confirm_delete').attr('href', link_post);
}