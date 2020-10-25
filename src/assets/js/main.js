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


     /**
     *  Scroll
     */
     var $offset_header = $('#top-bar').outerHeight();

     $(window).on('resize', function () {
       $offset_header = $('#top-bar').outerHeight();
     });

     $(window).on('scroll resize',function() {
       if ( $(this).scrollTop() > $offset_header){
         //$('body').addClass('fixed-header');
       } else {
         //$('body').removeClass('fixed-header');
       }
     });

     //Test inline SVGs are supported.
     if (true === supportsInlineSVG()) {
       document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
     }
     /**
     *  function menu
     */
     //if resize window
     $('#header-menu').nav();

     // if click button menu
     $('button.icon-button-small-menu').on('click', function(e){

       var item = $(this).next();

       item.toggleClass( item.data("class") + " small-menu" );
       $( '#site-nav-bar' ).toggleClass( "menu-active" );
       e.preventDefault();
     });

     // If Menu focus
     $( function() {
       $( '.h-nav' ).find( 'a' ).on( 'focus blur', function() {
         $( this ).parents().toggleClass( 'focus' );
         $( this ).removeClass("hover")
       });
     });


     var screenReaderText = {"expand":"<span class=\"screen-reader-text\">rozwi\u0144 menu potomne<\/span>","collapse":"<span class=\"screen-reader-text\">zwi\u0144 menu potomne<\/span>"};

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
     }

     $('#slider').slick({
       dots: false,
       arrows: false,
       slidesToShow: 1,
       autoplay: false,
       pauseOnHover: false,
     })

     $('#featured-slide').slick({
       dots: false,
       arrows: false,
       slidesToShow: 1,
       autoplay: false,
       pauseOnHover: false,
     })




       /**
       * Obsługa fomularza przycisku kontrastu i rozmiaru czcionek (formularz dziala bez js przez php)
       */
       $("#form-wcga button").click(function(e){

         var button  = $(this),
         value   = button.val();

         e.preventDefault();

         if (value == 'contrast' || value == 'normal') {
           switch(value) {
             case 'contrast':
             $('head').append('<link id="contrast-style-css" rel="stylesheet" href="'+ datalanuge.url +'/css/contrast.css" type="text/css" />');
             $.cookie("color", 'contrast', {expires: 365, path: '/'});
             button.val('normal');
             button.html(datalanuge.offcontrast);
             break;
             case 'normal':
             $("#contrast-style-css").remove();
             $.removeCookie('color', { path: '/' });
             button.val('contrast');
             button.html(datalanuge.oncontrast);
             break;
             default:
             break;
           }
         } else {

           if ($.cookie("font-size")) {
             $("#font-size-css").remove();
             $.removeCookie('font-size', { path: '/' });
           }

           switch(value) {
             case 'medium':
             $('head').append('<link id="font-size-css" rel="stylesheet" href="'+ datalanuge.url +'/css/medium.css" type="text/css" />');
             $.cookie("font-size",'medium', {expires: 365, path: '/'});
             break;
             case 'big':
             $('head').append('<link id="font-size-css" rel="stylesheet" href="'+ datalanuge.url +'/css/big.css" type="text/css" />');
             $.cookie("font-size",'big', {expires: 365, path: '/'});
             break;
             default:
             break;
           }
         }
       });
     });


     /*
     * Function Test if inline SVGs are supported.
     * @link https://github.com/Modernizr/Modernizr/
     */
     function supportsInlineSVG() {
       var div = document.createElement('div');
       div.innerHTML = '<svg/>';
       return 'http://www.w3.org/2000/svg' === ('undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI);
     }

     /**
     * Function rwd nav.
     */
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
