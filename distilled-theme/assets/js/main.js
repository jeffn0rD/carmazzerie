/**
 * Carmazzi Real Estate Distilled - Main JavaScript
 * 
 * @package Carmazzi_Distilled
 */

(function($) {
    'use strict';
    
    /**
     * Initialize Flexslider for property galleries
     */
    function initPropertySlider() {
        if ($('.flexslider').length) {
            $('.flexslider').flexslider({
                animation: 'fade',
                slideshow: true,
                slideshowSpeed: 7000,
                animationSpeed: 400,
                controlNav: true,
                directionNav: true,
                pauseOnHover: true,
                keyboard: true,
                touch: true,
                prevText: '‹',
                nextText: '›',
                start: function(slider) {
                    slider.removeClass('loading');
                }
            });
        }
    }
    
    /**
     * Mobile Navigation Toggle
     */
    function initMobileNav() {
        // Add mobile menu toggle button if not exists
        if (!$('.mobile-menu-toggle').length && $(window).width() <= 768) {
            $('.main-navigation').before('<button class="mobile-menu-toggle" aria-label="Toggle navigation menu" aria-expanded="false"><span></span><span></span><span></span></button>');
        }
        
        // Toggle menu on button click
        $(document).on('click', '.mobile-menu-toggle', function() {
            var $this = $(this);
            var $menu = $('.main-navigation ul');
            
            $menu.slideToggle(300);
            $this.toggleClass('active');
            
            // Update aria-expanded
            var expanded = $this.attr('aria-expanded') === 'true';
            $this.attr('aria-expanded', !expanded);
        });
    }
    
    /**
     * Smooth scroll for anchor links
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && 
                location.hostname === this.hostname) {
                
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    e.preventDefault();
                    
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 800, function() {
                        // Focus the target element for accessibility
                        target.focus();
                        if (!target.is(':focus')) {
                            target.attr('tabindex', '-1');
                            target.focus();
                        }
                    });
                }
            }
        });
    }
    
    /**
     * Add loading class to images
     */
    function initImageLoading() {
        $('img').on('load', function() {
            $(this).addClass('loaded');
        });
    }
    
    /**
     * Accessibility: Focus management
     */
    function initAccessibility() {
        // Skip link focus fix
        $('.skip-link').on('click', function(e) {
            var target = $(this.hash);
            if (target.length) {
                e.preventDefault();
                target.attr('tabindex', '-1').focus();
                window.location.hash = this.hash;
            }
        });
        
        // Add focus class to parent elements
        $('a, button, input, textarea, select').on('focus', function() {
            $(this).parent().addClass('has-focus');
        }).on('blur', function() {
            $(this).parent().removeClass('has-focus');
        });
    }
    
    /**
     * Initialize all functions
     */
    $(document).ready(function() {
        initPropertySlider();
        initMobileNav();
        initSmoothScroll();
        initImageLoading();
        initAccessibility();
    });
    
    /**
     * Handle window resize
     */
    var resizeTimer;
    $(window).on('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            // Reinitialize mobile nav if needed
            if ($(window).width() > 768) {
                $('.main-navigation ul').removeAttr('style');
                $('.mobile-menu-toggle').removeClass('active').attr('aria-expanded', 'false');
            }
        }, 250);
    });
    
})(jQuery);