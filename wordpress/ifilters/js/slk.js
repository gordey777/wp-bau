
$('.slider-klients').slick({
    infinite: true,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1
            }
        },
        {
            breakpoint: 420,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]

});

$('a[data-toggle="tab"]').click(function(e){
    e.preventDefault();
    $(this).parent().siblings().removeClass("active");
});












