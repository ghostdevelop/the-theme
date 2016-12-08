jQuery(function() {

	var Page = (function() {

		var $nav = jQuery( '#nav-dots > span' ),
			slitslider = jQuery( '#' + SlitSlider.id + '-slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {

					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );

				},
				autoplay: true,
				interval: 4000
			} ),

			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				$nav.each( function( i ) {
				
					jQuery( this ).on( 'click', function( event ) {
						
						var $dot = jQuery( this );
						
						if( !slitslider.isActive() ) {

							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						
						}
						
						slitslider.jump( i + 1 );
						return false;
					
					} );
					
				} );

			};

			return { init : init };

	})();

	Page.init();

});