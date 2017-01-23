!function ($) {

  /** Set up initial load and load on option updates (.pl-trigger will fire this) */
  $( '.pl-sn-starter' ).on('template_ready', function(){

    $.plStarterSection.init( $(this) )

  })

  /** A JS object to encapsulate functions related to the section */
  $.plStarterSection = {

    init: function( section ){

      var that       = this

      

    }
  }

/** end of jQuery wrapper */
}(window.jQuery);
