(function($){

    var initializeBlock = function( $block ) {
        $block.find('.slider-nav').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          centerMode: true,
          focusOnSelect: false,
          infinite: true,
          speed: 300,
          arrows: true,
        });
    }

    // Initialize each block on page load (front end).
    $(document).ready(function(){
        $('.slider').each(function(){
            initializeBlock( $(this) );
        });
    });

    // Initialize dynamic block preview (editor).
    if( window.acf ) {
        window.acf.addAction( 'render_block_preview/type=slider', initializeBlock );
    }

})(jQuery);
