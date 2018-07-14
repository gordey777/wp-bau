$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.up').fadeIn();
        } else {
            $('.up').fadeOut();
        }
    });

    $('.up').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});




$(document).ready(function() {
    $("a.anchor").click(function () {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        $('html,body').animate( { scrollTop: destination }, 1100 );
        return false;
    });
});
