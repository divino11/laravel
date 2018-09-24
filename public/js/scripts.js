$(document).ready(function () {
    $('.fa-star').click(function () {
        $.ajax({
            url: '/favorite/25',
            type: 'POST',
            dataType: 'json',
            data: 'id_article=25',
            success: function (e) {
                alert('yes');
            },
            error: function (e) {
                alert('no');
            }
        });
    });
});