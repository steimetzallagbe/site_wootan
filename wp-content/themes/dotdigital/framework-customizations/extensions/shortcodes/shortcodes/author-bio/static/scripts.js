"use strict";
// Wrapping all JavaScript code into a IIFE function for prevent global variables creation
// and pass in jQuery to be mapped to $.
(function($) {
    jQuery(document).ready(function () {
        function processDots(slider, value) {
            var $slider = jQuery(slider).closest('.owl-carousel-slider');
            var data = $slider.data();
            var divider = 1;
            if ( data.itemsCount ) {
                divider = 100 / data.itemsCount ;
            }

            $slider.css('left', function () {
                    return '-' + ( value * divider ) + '%';
                }
            )
                .find('.year-dot')
                .removeClass('active')
                .each(function (index, item) {
                    if (value >= index ) {
                        jQuery(item).addClass('active');
                    }
                })
                .end()
                .find('.year-label')
                .removeClass('active')
                .each(function (index, item) {
                    if (value >= index ) {
                        jQuery(item).addClass('active');
                    }
                });
        }

        var $carousel = $('.owl-carousel-bio');

        //adding slider behavior
        //jQuery UI slider for owl carousel
        if (jQuery().slider) {
            var $slider = jQuery(".owl-carousel-slider");
            $slider.each(function () {
                var $this = jQuery(this);
                var data = $this.data();
                $this.slider({
                    range: "min",
                    value: 0,
                    min: 0,
                    max: data.itemsCount,
                    step: 1,
                    slide: function (event, ui) {
                        jQuery(data.carousel).trigger('to.owl.carousel', [ui.value, 500]);
                        processDots(ui.handle, ui.value);
                    }
                });
            });

            var owlSlider = $carousel.data('owlCarouselSlider') ? $carousel.data('owlCarouselSlider') : false;

            $carousel.on('changed.owl.carousel', function (e) {
                var indexTo = e.item.index;
                jQuery(owlSlider).slider("option", "value", indexTo);
                //dots processing
                var value = jQuery(owlSlider).slider("option", "value");
                processDots(owlSlider, value);
                return false;
            });
        }

        //init carousel
        $carousel.owlCarousel({
            loop:false,
            nav: true,
            dots: false,
            navContainer: '.custom-nav',
            items: 1,
            animateOut: 'fadeOutLeft',
            animateIn: 'fadeInLeft',
        }).addClass('owl-carousel');

        $carousel.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY<0) {
                $carousel.trigger('next.owl');
            } else {
                $carousel.trigger('prev.owl');
            }
            e.preventDefault();
            e.stopPropagation();
        });

    });
//end of IIFE function
})(jQuery);