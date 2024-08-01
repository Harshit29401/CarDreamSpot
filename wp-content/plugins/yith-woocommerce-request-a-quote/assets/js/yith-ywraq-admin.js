/**
* Javascript functions to administrator pane
*
* @package YITH\RequestAQuote
* @since   1.0.0
* @version 1.0.0
* @author  YITH <plugins@yithemes.com>
*/
jQuery(function($) {
    "use strict";

    var select          = $( document).find( '.yith-ywraq-chosen' );

    select.each( function() {
        if( $.fn.chosen !== undefined ) {
            $(this).chosen({
                width: '350px',
                disable_search: true,
                multiple: true
            });
        }
    });

    /**
     * Move the create page option near page select on Request a quote page options.
     */
    var createToPage = function () {
        var $single_select_page = $('.single_select_page'),
            $create_page = $('.ywraq-create-page'),
            $row_to_hide = $create_page.closest('tr');
        if ($single_select_page.length > 0) {
            $single_select_page.find('.description').before($create_page);
            $create_page.css({display:'inline-block',lineHeight:'30px', marginLeft:'10px'});
            $row_to_hide.hide();
        }
    }

    createToPage();

    /**
     * Disable Chrome window popup on submit.
     */
    $('#doaction, #post-query-submit').on('click', function (e) {
        e.preventDefault();
        window.onbeforeunload = null;

        var $t = $(this);
        $t.closest('form').submit();
    });
});