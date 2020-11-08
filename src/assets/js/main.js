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

     //Test inline SVGs are supported.
     if (true === supportsInlineSVG()) {
       document.documentElement.className = document.documentElement.className.replace(/(\s*)no-svg(\s*)/, '$1svg$2');
     }

    $(function() {

   	var $item = $('a[target="_blank"]');
   	  $item.append('<span class="blank-ico">'+ datalanuge.blank +'</span>');
   	  $item.addClass( "blank" );
   	});
     /**
     *  function menu
     */

     //if resize window
     $('#menu_header').nav();

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
       dots: true,
       arrows: false,
       slidesToShow: 1,
       autoplay: false,
       pauseOnHover: false,
       accessibility: true
     })

     $('#featured-slide').slick({
       dots: false,
       arrows: false,
       slidesToShow: 1,
       autoplay: true,
       pauseOnHover: false,
     })


     /**
     * Image Popup
     */
     //Translating magnificPopup
     $.extend(true, $.magnificPopup.defaults, {
       tClose: datalanuge.close, // Alt text on close button
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
     * Do mapy svg
     */
     $("path").on('mouseover', function(e) {
       $("#title_path").text(($(this).data("title"))).fadeIn('slow');
     });
     $("path").on('mouseleave', function(e) {
       $("#title_path").empty();
     });

      $('a.gmina_link').on('mouseover', function(e) {
        $($(this).data("gmina")).attr("class", "cls-3")
      });
      $('a.gmina_link').on('mouseleave', function(e) {
        $($(this).data("gmina")).attr("class", "cls-1")
      });



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

       /**
   		* Activate rwd table.
   		*/
   	    $('.hentry table').table();



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

     /**
 * Function rwd table.
 */
   $.fn.table = function() {
       return this.each(function () {
         var headertext = [];

     var $this = $(this);

     $this.find('thead td, th').each(function(){
           headertext.push($(this).html());
     });

     $this.find('tbody tr').each(function(){
           $(this).find('td').each(function(index){
                 $(this).attr('data-th', headertext[index]);
         });
     });
   });
 };






 })(jQuery);
