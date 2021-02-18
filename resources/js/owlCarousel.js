/* Carousel con Owl */
jQuery(document).ready(function(){

    jQuery('.owl-carousel').owlCarousel({
        margin:10,
        loop:true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});
