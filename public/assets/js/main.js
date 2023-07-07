$(function () {
    $('.test-data').find('div:first').show();

    $('.pagination a').on('click', function () {
        if ($(this).attr('class') == 'nav-active') return false;
        let link = $(this).attr('href');
        let preActive = $(".pagination a.nav-active").attr('href');

        $('.pagination a.nav-active').removeClass('nav-active');
        $(this).addClass('nav-active')

        $(preActive).fadeOut(300, function () {
            $(link).fadeIn(300);
        });

        return false;
    });
    $('#end-test').click(function () {
        let slug = window.location.href;
        let test = +$('#test-id').text();
        let res = {'test': test};
        console.log(res)

        $('.question').each(function () {
            let id = $(this).data('id');
            res[id] = $('input[name=question-' + id + ']:checked').val();
        });
        $.ajax({
            url: slug,
            type: "POST",
            data: res,
            success: function (html) {
                $('.test-content').html(html);
            },
            error: function () {
                alert('Ошибка');
            }
        });
    });
    // $('.start-test').on('click', function () {
    //     $(".abra").css({
    //         "display": "contents"
    //     });
    //     $('.start-test').css({
    //         "display": "none"
    //     });
    // });




});

