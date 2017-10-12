var $ = jQuery.noConflict();

$.fn.inlineStyle = function (prop) {
    return this.prop("style")[$.camelCase(prop)];
};

$.fn.doOnce = function( func ) {
    this.length && func.apply( this );
    return this;
}

var SEMICOLON = SEMICOLON || {};

(function($){

    // USE STRICT
    "use strict";

    SEMICOLON.initialize = {

        init: function(){

            SEMICOLON.initialize.responsiveClasses();
            SEMICOLON.initialize.stickyElements();
            SEMICOLON.initialize.goToTop();
            SEMICOLON.initialize.lightbox();
            SEMICOLON.initialize.pageTransition();
            SEMICOLON.initialize.dataStyles();
            SEMICOLON.initialize.dataResponsiveHeights();

        },

        responsiveClasses: function(){
            var jRes = jRespond([
                {
                    label: 'smallest',
                    enter: 0,
                    exit: 479
                },{
                    label: 'handheld',
                    enter: 480,
                    exit: 767
                },{
                    label: 'tablet',
                    enter: 768,
                    exit: 991
                },{
                    label: 'laptop',
                    enter: 992,
                    exit: 1199
                },{
                    label: 'desktop',
                    enter: 1200,
                    exit: 10000
                }
            ]);
            jRes.addFunc([
                {
                    breakpoint: 'desktop',
                    enter: function() { $body.addClass('device-lg'); },
                    exit: function() { $body.removeClass('device-lg'); }
                },{
                    breakpoint: 'laptop',
                    enter: function() { $body.addClass('device-md'); },
                    exit: function() { $body.removeClass('device-md'); }
                },{
                    breakpoint: 'tablet',
                    enter: function() { $body.addClass('device-sm'); },
                    exit: function() { $body.removeClass('device-sm'); }
                },{
                    breakpoint: 'handheld',
                    enter: function() { $body.addClass('device-xs'); },
                    exit: function() { $body.removeClass('device-xs'); }
                },{
                    breakpoint: 'smallest',
                    enter: function() { $body.addClass('device-xxs'); },
                    exit: function() { $body.removeClass('device-xxs'); }
                }
            ]);
        },

        stickyElements: function(){
            if( $siStickyEl.length > 0 ) {
                var siStickyH = $siStickyEl.outerHeight();
                $siStickyEl.css({ marginTop: -(siStickyH/2)+'px' });
            }

            if( $dotsMenuEl.length > 0 ) {
                var opmdStickyH = $dotsMenuEl.outerHeight();
                $dotsMenuEl.css({ marginTop: -(opmdStickyH/2)+'px' });
            }
        },

        goToTop: function(){
            $($goToTopEl).click(function() {
                $('body,html').stop(true).animate({scrollTop:0},400);
                return false;
            });
            $('.scrollTop').click(function() {
                $('body,html').stop(true).animate({scrollTop:0},400);
                return false;
            });
        },

        goToTopScroll: function(){
            if($window.scrollTop() > 450) {
                $goToTopEl.fadeIn();
            } else {
                $goToTopEl.fadeOut();
            }
        },
        
        maxHeight: function(){
            if( $commonHeightEl.length > 0 ) {
                $commonHeightEl.each( function(){
                    var parentEl = $(this),
                        maxHeight = 0;
                    parentEl.children('[class^=col-]').each(function() {
                        var element = $(this).children('div');
                        if( element.hasClass('max-height') ){
                            maxHeight = element.outerHeight();
                        } else {
                            if (element.outerHeight() > maxHeight)
                            maxHeight = element.outerHeight();
                        }
                    });

                    parentEl.children('[class^=col-]').each(function() {
                        $(this).height(maxHeight);
                    });
                });
            }
        },

        lightbox: function(){
            var $lightboxImageEl = $('[data-lightbox="image"]'),
                $lightboxGalleryEl = $('[data-lightbox="gallery"]'),
                $lightboxIframeEl = $('[data-lightbox="iframe"]'),
                $lightboxAjaxEl = $('[data-lightbox="ajax"]'),
                $lightboxAjaxGalleryEl = $('[data-lightbox="ajax-gallery"]');

            if( $lightboxImageEl.length > 0 ) {
                $lightboxImageEl.magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    closeBtnInside: false,
                    fixedContentPos: true,
                    mainClass: 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
                    image: {
                        verticalFit: true
                    }
                });
            }

            if( $lightboxGalleryEl.length > 0 ) {
                $lightboxGalleryEl.each(function() {
                    var element = $(this);

                    if( element.find('a[data-lightbox="gallery-item"]').parent('.clone').hasClass('clone') ) {
                        element.find('a[data-lightbox="gallery-item"]').parent('.clone').find('a[data-lightbox="gallery-item"]').attr('data-lightbox','');
                    }

                    element.magnificPopup({
                        delegate: 'a[data-lightbox="gallery-item"]',
                        type: 'image',
                        closeOnContentClick: true,
                        closeBtnInside: false,
                        fixedContentPos: true,
                        mainClass: 'mfp-no-margins mfp-fade', // class to remove default margin from left and right side
                        image: {
                            verticalFit: true
                        },
                        gallery: {
                            enabled: true,
                            navigateByImgClick: true,
                            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                        }
                    });
                });
            }

            if( $lightboxIframeEl.length > 0 ) {
                $lightboxIframeEl.magnificPopup({
                    disableOn: 600,
                    type: 'iframe',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            }

            if( $lightboxAjaxEl.length > 0 ) {
                $lightboxAjaxEl.magnificPopup({
                    type: 'ajax',
                    closeBtnInside: false,
                    callbacks: {
                        ajaxContentAdded: function(mfpResponse) {
                        },
                        open: function() {
                            $body.addClass('ohidden');
                        },
                        close: function() {
                            $body.removeClass('ohidden');
                        }
                    }
                });
            }

            if( $lightboxAjaxGalleryEl.length > 0 ) {
                $lightboxAjaxGalleryEl.magnificPopup({
                    delegate: 'a[data-lightbox="ajax-gallery-item"]',
                    type: 'ajax',
                    closeBtnInside: false,
                    gallery: {
                        enabled: true,
                        preload: 0,
                        navigateByImgClick: false
                    },
                    callbacks: {
                        ajaxContentAdded: function(mfpResponse) {

                        },
                        open: function() {
                            $body.addClass('ohidden');
                        },
                        close: function() {
                            $body.removeClass('ohidden');
                        }
                    }
                });
            }
        },

        pageTransition: function(){
            if( !$body.hasClass('no-transition') ){
                var loaderStyleHtml = '<div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div>';
                if($.fn.animsition != undefined){
                    $wrapper.animsition({
                        linkElement : '',
                        loading : false,
                        loadingParentElement : 'html',
                        loadingClass : 'css3-spinner',
                        loadingHtml : loaderStyleHtml,
                        unSupportCss : [
                                         'animation-duration',
                                         '-webkit-animation-duration',
                                         '-o-animation-duration'
                                       ],
                        overlay : false,
                        overlayClass : 'animsition-overlay-slide',
                        overlayParentElement : 'body'
                    });
                }

            }
        },

        topScrollOffset: function() {
            var topOffsetScroll = 0;

            if( ( $body.hasClass('device-lg') || $body.hasClass('device-md') ) && !SEMICOLON.isMobile.any() ) {
                if( $header.hasClass('sticky-header') ) {
                    if( $pagemenu.hasClass('dots-menu') ) { topOffsetScroll = 100; } else { topOffsetScroll = 144; }
                } else {
                    if( $pagemenu.hasClass('dots-menu') ) { topOffsetScroll = 140; } else { topOffsetScroll = 184; }
                }

                if( !$pagemenu.length ) {
                    if( $header.hasClass('sticky-header') ) { topOffsetScroll = 100; } else { topOffsetScroll = 140; }
                }
            } else {
                topOffsetScroll = 40;
            }

            return topOffsetScroll;
        },

        aspectResizer: function(){
            var $aspectResizerEl = $('.aspect-resizer');
            if( $aspectResizerEl.length > 0 ) {
                $aspectResizerEl.each( function(){
                    var element = $(this),
                        elementW = element.inlineStyle('width'),
                        elementH = element.inlineStyle('height'),
                        elementPW = element.parent().innerWidth();
                });
            }
        },

        dataStyles: function(){
            var $dataStyleXxs = $('[data-style-xxs]'),
                $dataStyleXs = $('[data-style-xs]'),
                $dataStyleSm = $('[data-style-sm]'),
                $dataStyleMd = $('[data-style-md]'),
                $dataStyleLg = $('[data-style-lg]');

            if( $dataStyleXxs.length > 0 ) {
                $dataStyleXxs.each( function(){
                    var element = $(this),
                        elementStyle = element.attr('data-style-xxs');

                    if( $body.hasClass('device-xxs') ) {
                        if( elementStyle != '' ) { element.attr( 'style', elementStyle ); }
                    }
                });
            }

            if( $dataStyleXs.length > 0 ) {
                $dataStyleXs.each( function(){
                    var element = $(this),
                        elementStyle = element.attr('data-style-xs');

                    if( $body.hasClass('device-xs') ) {
                        if( elementStyle != '' ) { element.attr( 'style', elementStyle ); }
                    }
                });
            }

            if( $dataStyleSm.length > 0 ) {
                $dataStyleSm.each( function(){
                    var element = $(this),
                        elementStyle = element.attr('data-style-sm');

                    if( $body.hasClass('device-sm') ) {
                        if( elementStyle != '' ) { element.attr( 'style', elementStyle ); }
                    }
                });
            }

            if( $dataStyleMd.length > 0 ) {
                $dataStyleMd.each( function(){
                    var element = $(this),
                        elementStyle = element.attr('data-style-md');

                    if( $body.hasClass('device-md') ) {
                        if( elementStyle != '' ) { element.attr( 'style', elementStyle ); }
                    }
                });
            }

            if( $dataStyleLg.length > 0 ) {
                $dataStyleLg.each( function(){
                    var element = $(this),
                        elementStyle = element.attr('data-style-lg');

                    if( $body.hasClass('device-lg') ) {
                        if( elementStyle != '' ) { element.attr( 'style', elementStyle ); }
                    }
                });
            }
        },

        dataResponsiveHeights: function(){
            var $dataHeightXxs = $('[data-height-xxs]'),
                $dataHeightXs = $('[data-height-xs]'),
                $dataHeightSm = $('[data-height-sm]'),
                $dataHeightMd = $('[data-height-md]'),
                $dataHeightLg = $('[data-height-lg]');

            if( $dataHeightXxs.length > 0 ) {
                $dataHeightXxs.each( function(){
                    var element = $(this),
                        elementHeight = element.attr('data-height-xxs');

                    if( $body.hasClass('device-xxs') ) {
                        if( elementHeight != '' ) { element.css( 'height', elementHeight ); }
                    }
                });
            }

            if( $dataHeightXs.length > 0 ) {
                $dataHeightXs.each( function(){
                    var element = $(this),
                        elementHeight = element.attr('data-height-xs');

                    if( $body.hasClass('device-xs') ) {
                        if( elementHeight != '' ) { element.css( 'height', elementHeight ); }
                    }
                });
            }

            if( $dataHeightSm.length > 0 ) {
                $dataHeightSm.each( function(){
                    var element = $(this),
                        elementHeight = element.attr('data-height-sm');

                    if( $body.hasClass('device-sm') ) {
                        if( elementHeight != '' ) { element.css( 'height', elementHeight ); }
                    }
                });
            }

            if( $dataHeightMd.length > 0 ) {
                $dataHeightMd.each( function(){
                    var element = $(this),
                        elementHeight = element.attr('data-height-md');

                    if( $body.hasClass('device-md') ) {
                        if( elementHeight != '' ) { element.css( 'height', elementHeight ); }
                    }
                });
            }

            if( $dataHeightLg.length > 0 ) {
                $dataHeightLg.each( function(){
                    var element = $(this),
                        elementHeight = element.attr('data-height-lg');

                    if( $body.hasClass('device-lg') ) {
                        if( elementHeight != '' ) { element.css( 'height', elementHeight ); }
                    }
                });
            }
        }

    };

    SEMICOLON.header = {

        init: function(){

            SEMICOLON.header.superfish();
            SEMICOLON.header.menufunctions();
            SEMICOLON.header.fullWidthMenu();
            SEMICOLON.header.stickyMenu();
            SEMICOLON.header.onePageScroll();
            SEMICOLON.header.onepageScroller();
            SEMICOLON.header.darkLogo();

        },

        superfish: function(){

            if ( $().superfish ) {
                if( $body.hasClass('device-lg') || $body.hasClass('device-md') ) {
                    $('#primary-menu ul ul, #primary-menu ul .mega-menu-content').css('display', 'block');
                }

                $('body:not(.side-header) #primary-menu > ul, body:not(.side-header) #primary-menu > div > ul,.top-links > ul').superfish({
                    popUpSelector: 'ul,.mega-menu-content,.top-link-section',
                    delay: 250,
                    speed: 350,
                    animation: {opacity:'show'},
                    animationOut:  {opacity:'hide'},
                    cssArrows: false
                });

                $('body.side-header #primary-menu > ul').superfish({
                    popUpSelector: 'ul',
                    delay: 250,
                    speed: 350,
                    animation: {opacity:'show',height:'show'},
                    animationOut:  {opacity:'hide',height:'hide'},
                    cssArrows: false
                });
            }

        },

        menufunctions: function(){

            $( '#primary-menu ul li:has(ul)' ).addClass('sub-menu');
            $( '.top-links ul li:has(ul) > a' ).append( ' <i class="icon-angle-down"></i>' );
            $( '.top-links > ul' ).addClass( 'clearfix' );

            if( $body.hasClass('device-lg') || $body.hasClass('device-md') ) {
                $('#primary-menu.sub-title > ul > li,#primary-menu.sub-title > div > ul > li').hover(function() {
                    $(this).prev().css({ backgroundImage : 'none' });
                }, function() {
                    $(this).prev().css({ backgroundImage : 'url("images/icons/menu-divider.png")' });
                });

                $('#primary-menu.sub-title').children('ul').children('.current').prev().css({ backgroundImage : 'none' });
                $('#primary-menu.sub-title').children('div').children('ul').children('.current').prev().css({ backgroundImage : 'none' });
            }

            if( SEMICOLON.isMobile.Android() ) {
                $( '#primary-menu ul li.sub-menu' ).children('a').on('touchstart', function(e){
                    if( !$(this).parent('li.sub-menu').hasClass('sfHover') ) {
                        e.preventDefault();
                    }
                });
            }

        },

        fullWidthMenu: function(){
            if( $body.hasClass('stretched') ) {
                if( $header.find('.container-fullwidth').length > 0 ) { $('.mega-menu .mega-menu-content').css({ 'width': $wrapper.width() - 120 }); }
                if( $header.hasClass('full-header') ) { $('.mega-menu .mega-menu-content').css({ 'width': $wrapper.width() - 60 }); }
            } else {
                if( $header.find('.container-fullwidth').length > 0 ) { $('.mega-menu .mega-menu-content').css({ 'width': $wrapper.width() - 120 }); }
                if( $header.hasClass('full-header') ) { $('.mega-menu .mega-menu-content').css({ 'width': $wrapper.width() - 80 }); }
            }
        },

        stickyMenu: function( headerOffset ){
            if( ( $body.hasClass('device-lg') || $body.hasClass('device-md') ) && !SEMICOLON.isMobile.any() ) {
                if ($window.scrollTop() > headerOffset) {
                    $('body:not(.side-header) #header:not(.no-sticky)').addClass('sticky-header');
                    $('#page-menu:not(.dots-menu,.no-sticky)').addClass('sticky-page-menu');
                    if( !$headerWrap.hasClass('force-not-dark') ) { $headerWrap.removeClass('not-dark'); }
                    SEMICOLON.header.stickyMenuClass();
                } else {
                    SEMICOLON.header.removeStickyness();
                }
            } else {
                SEMICOLON.header.removeStickyness();
            }
        },

        removeStickyness: function(){
            if( $header.hasClass('sticky-header') ){
                $('body:not(.side-header) #header:not(.no-sticky)').removeClass('sticky-header');
                $('#page-menu:not(.dots-menu,.no-sticky)').removeClass('sticky-page-menu');
                if( !$headerWrap.hasClass('force-not-dark') ) { $headerWrap.removeClass('not-dark'); }
            }
        },

        onePageScroll: function(){
            $onePageMenuEl.find('a[data-href]').click(function(){
                var divScrollToAnchor = $(this).attr('data-href');
                var link = about_link;

                if( $( "#"+divScrollToAnchor ).length > 0 ) {
                    var topOffsetScroll = SEMICOLON.initialize.topScrollOffset();
                    if($(document).scrollTop() < $("#header").offset().top) topOffsetScroll -= 50;
                    if(divScrollToAnchor == "work"){
                        link = work_link;
                        topOffsetScroll -= 140;
                    }
                    if(divScrollToAnchor == "fees"){
                        link = fees_link;
                        topOffsetScroll -= 140;
                    }


                    history.pushState({}, '', link);

                    if( $onePageMenuEl.hasClass('no-offset') ) { topOffsetScroll = 0; }

                    $onePageMenuEl.find('li').removeClass('current');
                    $onePageMenuEl.find('a[data-href="' + divScrollToAnchor + '"]').parent('li').addClass('current');

                    $('html,body').stop(true).animate({
                        'scrollTop': $( "#"+divScrollToAnchor ).offset().top - topOffsetScroll
                    }, 500, 'easeOutQuad');
                }
            });
        },

        onepageScroller: function(){
            $onePageMenuEl.find('li').removeClass('current');
            $onePageMenuEl.find('a[data-href="#' + SEMICOLON.header.onePageCurrentSection() + '"]').parent('li').addClass('current');
        },

        onePageCurrentSection: function(){
            var currentOnePageSection = 'home';

            $pageSectionEl.each(function(index) {
                var h = $(this).offset().top;
                var y = $window.scrollTop();

                if( y + 150 >= h && y < h + $(this).height() && $(this).attr('id') != currentOnePageSection ) {
                    currentOnePageSection = $(this).attr('id');
                }
            });

            return currentOnePageSection;
        },

        darkLogo: function(){
            if( ( $header.hasClass('dark') || $body.hasClass('dark') ) && !$headerWrap.hasClass('not-dark') ) {
                if( defaultDarkLogo ){ defaultLogo.find('img').attr('src', defaultDarkLogo); }
                if( retinaDarkLogo ){ retinaLogo.find('img').attr('src', retinaDarkLogo); }
            } else {
                if( defaultLogoImg ){ defaultLogo.find('img').attr('src', defaultLogoImg); }
                if( retinaLogoImg ){ retinaLogo.find('img').attr('src', retinaLogoImg); }
            }
        },

        stickyMenuClass: function(){
            if( stickyMenuClasses ) { var newClassesArray = stickyMenuClasses.split(/ +/); } else { var newClassesArray = ''; }
            var noOfNewClasses = newClassesArray.length;

            if( noOfNewClasses > 0 ) {
                var i = 0;
                for( i=0; i<noOfNewClasses; i++ ) {
                    if( newClassesArray[i] == 'not-dark' ) {
                        $header.removeClass('dark');
                        $headerWrap.addClass('not-dark');
                    } else if( newClassesArray[i] == 'dark' ) {
                        $headerWrap.removeClass('not-dark force-not-dark');
                        if( !$header.hasClass( newClassesArray[i] ) ) {
                            $header.addClass( newClassesArray[i] );
                        }
                    } else if( !$header.hasClass( newClassesArray[i] ) ) {
                        $header.addClass( newClassesArray[i] );
                    }
                }
            }

        }

    };

    SEMICOLON.widget = {

        init: function(){

            SEMICOLON.widget.parallax();
            SEMICOLON.widget.animations();
            SEMICOLON.widget.accordions();
            SEMICOLON.widget.progress();
            SEMICOLON.widget.linkScroll();
            SEMICOLON.widget.extras();

        },

        parallax: function(){
            if( !SEMICOLON.isMobile.any() ){
                $.stellar({
                    horizontalScrolling: false,
                    verticalOffset: 150,
                    responsive: true
                });
            } else {
                $parallaxEl.addClass('mobile-parallax');
            }
        },

        animations: function(){
            var $dataAnimateEl = $('[data-animate]');
            if( $dataAnimateEl.length > 0 ){
                if( $body.hasClass('device-lg') || $body.hasClass('device-md') || $body.hasClass('device-sm') ){
                    $dataAnimateEl.each(function(){
                        var element = $(this),
                            animationDelay = element.attr('data-delay'),
                            animationDelayTime = 0;

                        if( animationDelay ) { animationDelayTime = Number( animationDelay ) + 250; } else { animationDelayTime = 250; }

                        if( !element.hasClass('animated') ) {
                            element.addClass('not-animated');
                            var elementAnimation = element.attr('data-animate');
                            // element.appear(function () {
                            //     setTimeout(function() {
                            //         element.removeClass('not-animated').addClass( elementAnimation + ' animated');
                            //     }, animationDelayTime);
                            // },{accX: 0, accY: -120},'easeInCubic');
                        }
                    });
                }
            }
        },

        accordions: function(){
            var $accordionEl = $('.accordion');
            if( $accordionEl.length > 0 ){
                $accordionEl.each( function(){
                    var $accElement = $(this);
                    var accElementState = $accElement.attr('data-state');

                    $accElement.find('.acc_content').hide();

                    if( accElementState != 'closed' ) {
                        $accElement.find('.acctitle:first').addClass('acctitlec').next().show();
                    }

                    $accElement.find('.acctitle').click(function(){
                        if( $(this).next().is(':hidden') ) {
                            $accElement.find('.acctitle').removeClass('acctitlec').next().slideUp("normal");
                            $(this).toggleClass('acctitlec').next().slideDown("normal");
                        }
                        return false;
                    });
                });
            }
        },

        progress: function(){
            var $progressEl = $('.progress');
            if( $progressEl.length > 0 ){
                $progressEl.each(function(){
                    var element = $(this),
                        skillsBar = element.parent('li'),
                        skillValue = skillsBar.attr('data-percent');

                    if( $body.hasClass('device-lg') || $body.hasClass('device-md') ){
                        // element.appear( function(){
                        //     if (!skillsBar.hasClass('skills-animated')) {
                        //         skillsBar.find('.progress').css({width: skillValue + "%"}).addClass('skills-animated');
                        //     }
                        // },{accX: 0, accY: -120},'easeInCubic');
                    } else {
                        skillsBar.find('.progress').css({width: skillValue + "%"});
                    }
                });
            }
        },

        linkScroll: function(){
            $("a[data-scrollto]").click(function(){
                var divScrollToAnchor = $(this).attr('data-scrollto');
                var topOffsetScroll = SEMICOLON.initialize.topScrollOffset();

                $('html,body').stop(true).animate({
                    'scrollTop': $( divScrollToAnchor ).offset().top - topOffsetScroll
                }, 750, 'easeOutQuad');

                return false;
            });
        },

        extras: function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('#primary-menu-trigger,#overlay-menu-close').click(function() {
                $( '#primary-menu > ul, #primary-menu > div > ul' ).toggleClass("show");
                return false;
            });
            $('#page-submenu-trigger').click(function() {
                $body.toggleClass('top-search-open', false);
                $pagemenu.toggleClass("pagemenu-active");
                return false;
            });
            $pagemenu.find('nav').click(function(e){
                $body.toggleClass('top-search-open', false);
            });
            if( SEMICOLON.isMobile.any() ){
                $body.addClass('device-touch');
            }
            // var el = {
            //     darkLogo : $("<img>", {src: defaultDarkLogo}),
            //     darkRetinaLogo : $("<img>", {src: retinaDarkLogo})
            // };
            // el.darkLogo.prependTo("body");
            // el.darkRetinaLogo.prependTo("body");
            // el.darkLogo.css({'position':'absolute','z-index':'-100'});
            // el.darkRetinaLogo.css({'position':'absolute','z-index':'-100'});
        }

    };

    SEMICOLON.isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (SEMICOLON.isMobile.Android() || SEMICOLON.isMobile.BlackBerry() || SEMICOLON.isMobile.iOS() || SEMICOLON.isMobile.Opera() || SEMICOLON.isMobile.Windows());
        }
    };

    SEMICOLON.documentOnResize = {

        init: function(){

            var t = setTimeout( function(){
                SEMICOLON.header.fullWidthMenu();
                SEMICOLON.initialize.maxHeight();
                SEMICOLON.initialize.dataStyles();
                SEMICOLON.initialize.dataResponsiveHeights();
            }, 500 );

        }

    };

    SEMICOLON.documentOnReady = {

        init: function(){
            SEMICOLON.initialize.init();
            SEMICOLON.header.init();
            SEMICOLON.widget.init();
            SEMICOLON.documentOnReady.windowscroll();
        },

        windowscroll: function(){
            if($header.length){
                var headerOffset = $header.offset().top;  
            }
            if($headerWrap.length){
                var headerWrapOffset = $headerWrap.offset().top;  
            }

            $window.scroll( function(){

                SEMICOLON.initialize.goToTopScroll();
                $('body.open-header.close-header-on-scroll').removeClass("side-header-open");
                SEMICOLON.header.stickyMenu( headerWrapOffset );
                SEMICOLON.header.darkLogo();

            });
            if($.fn.scrolled != undefined){
                $window.scrolled(function() {
                    SEMICOLON.header.onepageScroller();
                });
            }
        }

    };

    SEMICOLON.documentOnLoad = {

        init: function(){
            SEMICOLON.initialize.maxHeight();
        }

    };

    var $window = $(window),
        $body = $('body'),
        $wrapper = $('#wrapper'),
        $header = $('#header'),
        $headerWrap = $('#header-wrap'),
        stickyMenuClasses = $header.attr('data-sticky-class'),
        defaultLogo = $('#logo').find('.standard-logo'),
        defaultLogoWidth = defaultLogo.find('img').outerWidth(),
        retinaLogo = $('#logo').find('.retina-logo'),
        defaultLogoImg = defaultLogo.find('img').attr('src'),
        retinaLogoImg = retinaLogo.find('img').attr('src'),
        defaultDarkLogo = defaultLogo.attr('data-dark-logo'),
        retinaDarkLogo = retinaLogo.attr('data-dark-logo'),
        $pagemenu = $('#page-menu'),
        $onePageMenuEl = $('.one-page-menu'),
        $pageTitle = $('#page-title'),
        prevPostPortId = '',
        $siStickyEl = $('.si-sticky'),
        $dotsMenuEl = $('.dots-menu'),
        $goToTopEl = $('#gotoTop'),
        $commonHeightEl = $('.common-height'),
        $pageSectionEl = $('.page-section'),
        $parallaxEl = $('.parallax');

    $(document).ready( SEMICOLON.documentOnReady.init );
    $window.load( SEMICOLON.documentOnLoad.init );
    $window.on( 'resize', SEMICOLON.documentOnResize.init );

})(jQuery);

// Custom
$(function(){
    // JQuery iCheck
    if($.fn.iCheck != undefined){   
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-grey',
            radioClass: 'iradio_square-grey',
            increaseArea: '20%' // optional
        });
    }
    // Date Picker
    if($.fn.datepicker != undefined){   
        $.fn.datepicker.defaults.format = "dd/mm/yyyy";
        $('.datepicker').datepicker({
            startView : "decade",
            autoclose: true
        });
        $('.adult').datepicker({
            startView : "decade",
            startDate : "-88y",
            endDate : "-18y",
            autoclose: true
        });
    }
    // Masonry
    if($.fn.masonry != undefined){   
        $( window ).load( function(){
            $('.masonry').masonry( { itemSelector: '.column' } );
        });
    }
    // Select 2
    if($.fn.select2 != undefined){
        $(".select2").select2();
    }
    // Input Masking
    if($.fn.mask != undefined){
        $.mask.definitions['~'] = '[+-]';
        $('.input-currency').mask('9.999.999');
        $('.input-mask-phone').mask('(999) 999-9999');
        $('.input-mask-eyescript').mask('~9.99 ~9.99 999');
        $(".input-mask-product").mask("a*-999-a999", {
            placeholder: " ",
            completed: function () {
                alert("You typed the following: " + this.val());
            }
        });
    }
    // Mask Money
    if($.fn.maskMoney != undefined){
        $(".input-salary").maskMoney({
            thousands : ".",
            precision : 0,
        });
    }
    // Ladda Button Loading
    if(typeof Ladda == "object"){
        Ladda.bind('.ladda-button');
    }
});