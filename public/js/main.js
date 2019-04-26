/* 
 * eConnect4u
 */


$(document).ready(function () {
    $('.delete').on('click', function (e) {
        e.preventDefault();
        var link = $(e.currentTarget);
        if (confirm("Are you sure, you want delete this?")) {
            window.location = link.attr('href');
        }
    });
});