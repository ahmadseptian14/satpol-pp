// event after click
$('.page-scroll').on('click', function(e) {

    // get value href
    var href = $(this).attr('href');

    var elemenHref = $(href);

    $('html,body').animate({
        scrollTop: elemenHref.offset().top
    });

    e.preventDefault();


});