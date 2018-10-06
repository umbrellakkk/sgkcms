( function( window ) {
  'use strict';
    // class helper functions from bonzo www.bootstrapmb.com
function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}
// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;
if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}
function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}
var form = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};
// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( form );
} else {
  // browser global
  window.form = form;
}
})( window );
(function() {

  if (!String.prototype.trim) {
    (function() {
            // Make sure we trim BOM and NBSP
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, '');
            };
          })();
        }
        [].slice.call( document.querySelectorAll( 'input.temp_input_field') ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            form.add( inputEl.parentNode, 'input--filled' );
          }
          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );
        [].slice.call( document.querySelectorAll( 'textarea.temp_input_field' ) ).forEach( function( inputEl ) {
          // in case the input is already filled..
          if( inputEl.value.trim() !== '' ) {
            form.add( inputEl.parentNode, 'input--filled' );
          }
          // events:
          inputEl.addEventListener( 'focus', onInputFocus );
          inputEl.addEventListener( 'blur', onInputBlur );
        } );
        function onInputFocus( ev ) {
          form.add( ev.target.parentNode, 'input--filled' );
        }
        function onInputBlur( ev ) {
          if( ev.target.value.trim() === '' ){
            form.remove( ev.target.parentNode, 'input--filled' );
          }
        }
        // for textarea
      })();
      // for font-family
      $(".temp-setting").click(function()
      {
        $(".temp-change-setting-wrap").toggleClass('active');
        $(".temp-font-submenu-list li").click(function() {
         var a = $(this).attr('data-font');
         $("body").css("font-family" ,a);
       });
      });
      // for font-family dropdown
      $(document).ready(function(){
        $(".temp-main-font-family-list").click(function(){
          $(".temp-font-submenu-list").slideToggle("slow");
        });

        // for swaping value in dropdown
        $('.temp-list').click(function() {
          $('.temp-list').removeClass('hide_class');
          var litext=$(this).children('a').html();
          $(document).find('#temp-menu').text(litext);
          $(this).addClass('hide_class');
        });
      });


      // for color
      $(document).on('click','.temp-color-radio-btn',function(){
        var color1 = $(this).attr('data-color1'); 
        var color2 = $(this).attr('data-color2'); 
        $(".temp-custom-navigation").css('background', color1);
        $(".temp-custom-modal-content .temp-custom-modal-body .temp-login-form-wrapper .temp-form-column-wrap h2").css('color', color1);
        $(".temp-popup-form-wrapper .temp-content-wrapper h1").css('text-shadow','2px','2px','2px', color1);
        $(".temp-span-wrap .temp_input_label::after").css('background', color1);
        $(".temp-form-button").css('background', color1,'important');
        $(".temp-span-wrap .temp_input_label .temp_input_label-content").css('color', color2);
        $(".temp-custom-radio-button .temp-radio-checkmark").css('background', color2);
        $(".temp-custom-radio-button input:checked ~ .temp-radio-checkmark").css('background', color1);
        $(".temp-popup-form-wrapper .temp-content-wrapper .temp-change-setting-wrap .temp-setting-wrapper .temp-font-family .temp-main-font-family-list .temp-font-menu .temp-font-submenu-list").css('background', color2);
        $(".temp-setting").css('border-color', color1);
        $(".temp-font-menu").css('border-color', color1);
        $(".temp-custom-select").css('border-bottom-color', color1, 'important');
        $(".temp-checkbox-wrap .checkmark").css('background', color1);
        $(".temp-checkbox-wrap").css('color', color1);
        $(".temp-custom-modal-content .temp-custom-modal-body .temp-login-form-wrapper .temp-form-column-wrap .custom-form-label2 a").css('color', color1);
        $("select").css('color', color2,'important');
        $(".temp-custom-modal-content .temp-custom-modal-body .temp-login-form-wrapper .temp-form-column-wrap.temp-subscribe-form-column-wrap .temp-radio-button-subscribe").css('color', color1);
    // hover
    $(".temp-popup-form-wrapper .temp-custom-navigation .temp-custom-list-items li a").hover(function(){
      $(this).css("background-color", color2,"important");
    },
    function(){
      $(this).css("background-color", "");
    });
        // hover
        $(".temp-popup-form-wrapper .temp-content-wrapper .temp-change-setting-wrap .temp-setting-wrapper .temp-font-family .temp-main-font-family-list .temp-font-menu .temp-font-submenu-list li").hover(function(){
          $(this).css("background-color", color1,"important");
        }, function(){
          $(this).css("background-color", "");
        });
      });
/*====================================
=            after effect            =
====================================*/
$(".temp-radio-checkmark").on('click',function()
{
  var linkvalue = $(this).attr('data-link_design');
  if(linkvalue == 1 ){
    $(".temp-form-column-wrap-image").addClass('changed-one');
    $(".temp_input_label").addClass('changed-one');
    $(".temp-form-button").addClass('changed-one-btn');
  }
  else if(linkvalue == 2){
    $(".temp-form-column-wrap-image").addClass('changed-two');
    $(".temp_input_label").addClass('changed-two');
    $(".temp-form-button").addClass('changed-two-btn');
  }
  else if(linkvalue == 3){
    $(".temp-form-column-wrap-image").addClass('changed-three');
    $(".temp_input_label").addClass('changed-three');
    $(".temp-form-button").addClass('changed-three-btn');
  }
});
/*=====  End of after effect  ======*/
 // for background image
 $(document).on('click','.temp-image-radio-btn',function(){
  var image1 = $(this).attr('data-image1'); 
  $(".temp-popup-form-wrapper").css('background', image1);
  $(".temp-popup-form-wrapper").css('background-size', 'cover');
});