/*!
*  Powiat Bartoszycki 0.1.0
*  Main javascript for Theme.
*/
(function ($) {
  /*********************************************************
  * Document ready (jQuery)
  * Fire on document ready.
  *********************************************************/
  $(document).ready(function () {

    var screenReaderText = {
      "expand":"<span class=\"screen-reader-text\">rozwi\u0144 menu potomne<\/span>",
      "collapse":"<span class=\"screen-reader-text\">zwi\u0144 menu potomne<\/span>",
      "expand_menu":"Menu <span class=\"screen-reader-text\">rozwi\u0144 <\/span>",
      "collapse_menu":"Menu <span class=\"screen-reader-text\">zwi\u0144 <\/span>"
    };

    /**
    *  Test inline SVGs are supported.
    ****************************************************/
    if (true === supportsInlineSVG()) {
      document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
    }

    /**
    *  Slideshow
    ****************************************************/
    $('#slider').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      autoplay: true,
      pauseOnHover: true,
      focusOnSelect: true,
      accessibility: true,
      focusOnChange: false
    });

    $('#featured-slide').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      autoplay: true,
      pauseOnHover: true,
      focusOnSelect: true,
      accessibility: true,
      focusOnChange: false
    });

    /**
    *  Scroll
    ****************************************************/
    var $offset_header = $('#top-bar').outerHeight();

    $(window).on('resize', function () {
      $offset_header = $('#top-bar').outerHeight();
    });


    /**
    *  function for menus
    ****************************************************/

    //if resize window
    $('#menu_header').nav();

    // if click button menu
    $('button.icon-button-small-menu').on('click', function(e){
      var _this = $( this ),
          item = _this.next();

      item.toggleClass( item.data("class") + " small-menu" );
      e.preventDefault();
      $( '#site-nav-bar' ).toggleClass( "menu-active" );
      _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
      _this.html( _this.html() === screenReaderText.expand_menu ? screenReaderText.collapse_menu : screenReaderText.expand_menu );
      console.log( _this.html());
      console.log(screenReaderText.expand_menu);
      console.log(_this.html() === screenReaderText.expand_menu);
    });

    // If Menu focus
    $( function() {
      $( '.h-nav' ).find( 'a' ).on( 'focus blur', function() {
        $( this ).parents().toggleClass( 'focus' );
        $( this ).removeClass("hover")
      });
    });

    $( '.v-nav.dropdown .menu .page_item_has_children > a, .v-nav.dropdown .menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

    $( '.dropdown-toggle' ).click( function( e ) {
      var _this = $( this );
      e.preventDefault();
      _this.toggleClass( 'toggle-on' );
      _this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
      _this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
      _this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
    });

    if ("ontouchstart" in document.documentElement) {
      $(".h-nav li.menu-item-has-children > a").on( 'click', function(e) {
        if ($(window)["0"].innerWidth > 992) {
          var link = $(this);
          if (link.hasClass('hover')) {
            return true;
          } else {
            link.addClass("hover");
            $(".h-nav a").not(this).removeClass("hover");
            return false;
          }
        }
      });
    } else {
      $(window).on('scroll resize',function() {
        if ( $(this).scrollTop() > ($offset_header + 700)){
          $('body').addClass('fixed-header fixed-header-2');
        }
        if ( $(this).scrollTop() < ($offset_header + 300)) {
          $('body').removeClass('fixed-header-2');
        }
        if ( $(this).scrollTop() < ($offset_header + 600)) {
          $('body').removeClass('fixed-header');
        }
      });
    }


    /**
    *  Slideshow WCAG
    ****************************************************/
    $('#stop-header').on('click', function(e){
      $('#slider').slick('slickPause').slick('slickSetOption', 'focusOnChange', true);
      $('#stop-header').toggleClass( "hide" );
      $('#play-header').toggleClass( "hide" );
    });
    $('#play-header').on('click', function(e){
      $('#slider').slick('slickPlay').slick('slickSetOption', 'focusOnChange', false);
      $('#stop-header').toggleClass( "hide" );
      $('#play-header').toggleClass( "hide" );
    });
    $('#stop-featured').on('click', function(e){
      $('#featured-slide').slick('slickPause').slick('slickSetOption', 'focusOnChange', true);
      $('#stop-featured').toggleClass( "hide" );
      $('#play-featured').toggleClass( "hide" );
    });
    $('#play-featured').on('click', function(e){
      $('#featured-slide').slick('slickPlay').slick('slickSetOption', 'focusOnChange', false);
      $('#stop-featured').toggleClass( "hide" );
      $('#play-featured').toggleClass( "hide" );
    });

    /**
    *  WCGA add information to _blank link
    ****************************************************/
    $(function() {

      cookiewpg();

      var $item = $('a[target="_blank"]');
      $item.append('<span class="blank-ico">'+ datalanuge.blank +'</span>');
      $item.addClass( "blank" );
    });


    /**
    *  Image Popup
    ****************************************************/
    //Translating magnificPopup
    $.extend(true, $.magnificPopup.defaults, {
      tClose: datalanuge.close, // Alt text on close button
      closeMarkup:'<button title="%title%" type="button" class="mfp-close i-style icon-close"></button>',
      tLoading: datalanuge.load, // Text that is displayed during loading. Can contain %curr% and %total% keys
      gallery: {
        tPrev: datalanuge.prev, // Alt text on left arrow
        tNext: datalanuge.next, // Alt text on right arrow
        tCounter: '%curr% '+ datalanuge.of + ' %total%' // Markup for "1 of 7" counter
      },
      image: {
        tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when image could not be loaded
      },
      ajax: {
        tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when ajax request failed
      }
    });

    // Single image
    $('.wp-block-image a[href*=".jpg"]').magnificPopup({
      type:'image',
    });

    //Gallery image
    $('.wp-block-gallery, .gallery').each(function () {
      $(this).magnificPopup({
        delegate: 'a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]',
        type: 'image',
        gallery: {
          enabled: true,
        }
      });
    });


    /**
    *  Footer SVG MAP
    ****************************************************/

    var $map_path    = $("#mapa_powiatu path"),
        $gmina_link  = $('a.gmina_link');

    $map_path.on('mouseover', function(e) {
      $("#title_path").text(($(this).data("title"))).fadeIn('slow');
    });
    $map_path.on('mouseleave', function(e) {
      $("#title_path").empty();
    });
    $gmina_link.on('mouseover', function(e) {
      $($(this).data("gmina")).attr("class", "cls-3")
    });
    $gmina_link.on('mouseleave', function(e) {
      $($(this).data("gmina")).attr("class", "cls-1")
    });


    /**
    *   Obsługa fomularza przycisku kontrastu i rozmiaru czcionek (formularz dziala bez js przez php)
    *************************************************************************************************/
    $("#form-wcga button").click(function(e){
      var button  = $(this),
      value   = button.val();

      e.preventDefault();

      if (value == 'contrast' || value == 'normal') {
        switch(value) {
          case 'contrast':
          $('head').append('<link id="contrast-style-css" rel="stylesheet" href="'+ datalanuge.url +'/css/contrast.css" type="text/css" />');
          Cookies.set("color", 'contrast', {expires: 365, path: '/'});
          button.val('normal');
          button.html(datalanuge.offcontrast);
          break;
          case 'normal':
          $("#contrast-style-css").remove();
          Cookies.remove('color', { path: '/' });
          button.val('contrast');
          button.html(datalanuge.oncontrast);
          break;
          default:
          break;
        }
      } else {
        if (Cookies.get("font-size")) {
          $("#font-size-css").remove();
          Cookies.remove('font-size', { path: '/' });
        }

        switch(value) {
          case 'medium':
          $('head').append('<link id="font-size-css" rel="stylesheet" href="'+ datalanuge.url +'/css/medium.css" type="text/css" />');
          Cookies.set("font-size",'medium', {expires: 365, path: '/'});
          break;
          case 'big':
          $('head').append('<link id="font-size-css" rel="stylesheet" href="'+ datalanuge.url +'/css/big.css" type="text/css" />');
          Cookies.set("font-size",'big', {expires: 365, path: '/'});
          break;
          default:
          break;
        }
      }
    });

    /**
    *   Activate rwd table
    ****************************************************/
    $('.entry-content > table').wrap('<figure class="wp-block-table"></figure>');

  });//Document ready (jQuery)

  /**
  *  Function cookie information
  **************************************************/
  function cookiewpg() {
    var cookie_mbp = Cookies.get('cookie_mbp');
    if (cookie_mbp != 'powiatbartoszyce-accept') {
      $('#cookie-notice').addClass('cookie-notice-visible');
      $("#cn-accept-cookie").click(function(e){
        e.preventDefault();
        Cookies.set("cookie_mbp", 'powiatbartoszyce-accept', {expires: 365, path: '/'});
        $('#cookie-notice').removeClass('cookie-notice-visible');
      });
    }
  }


  /**
  * Function Test if inline SVGs are supported.
  * @link https://github.com/Modernizr/Modernizr/
  ****************************************************/
  function supportsInlineSVG() {
    var div = document.createElement('div');
    div.innerHTML = '<svg/>';
    return 'http://www.w3.org/2000/svg' === ('undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI);
  }


  /**
  * Function rwd nav.
  ****************************************************/
  $.fn.nav = function (nav) {
    return this.each(function () {
      var $this = $(this);

      $(window).on('resize orientationchange', function () {

        var window_width = $(window)["0"].innerWidth;
        if (window_width > 992) {
          $classes = $this.data("class");
          // Usuwanie classy z menu
          if ($this.hasClass("small-menu")) {
            $('#site-nav-bar').removeClass("menu-active");
            $this.removeClass();
            $this.addClass($classes);
          }
        }
      }).resize();
    });
  };



})(jQuery);
