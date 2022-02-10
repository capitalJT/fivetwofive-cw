( function() {
	document.addEventListener('DOMContentLoaded', () => {
		const highlightedTexts = document.querySelectorAll( '.entry-content mark' );
		const twitterSVG = '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" viewBox="0 0 32 32"><path d="M32 7.075a12.941 12.941 0 0 1-3.769 1.031 6.601 6.601 0 0 0 2.887-3.631 13.21 13.21 0 0 1-4.169 1.594A6.565 6.565 0 0 0 22.155 4a6.563 6.563 0 0 0-6.563 6.563c0 .512.056 1.012.169 1.494A18.635 18.635 0 0 1 2.23 5.195a6.56 6.56 0 0 0-.887 3.3 6.557 6.557 0 0 0 2.919 5.463 6.565 6.565 0 0 1-2.975-.819v.081a6.565 6.565 0 0 0 5.269 6.437 6.574 6.574 0 0 1-2.968.112 6.588 6.588 0 0 0 6.131 4.563 13.17 13.17 0 0 1-9.725 2.719 18.568 18.568 0 0 0 10.069 2.95c12.075 0 18.681-10.006 18.681-18.681 0-.287-.006-.569-.019-.85A13.216 13.216 0 0 0 32 7.076z"/></svg>';
		let popperInstance;

		const createSocialTooltip = ( socialText ) => {
			const tooltipTemplate = `
				<span id="socialToolTip" class="tooltip">
					<a href="https://twitter.com/intent/tweet?text=${ encodeURIComponent( socialText ) }&url=${ encodeURIComponent( window.location.href ) }" target="_blank">${ twitterSVG } Article highlight</a>
				</span>	
			`;

			return tooltipTemplate;
		};

		const attachTooltip = ( elem, tooltip ) => {
			elem.insertAdjacentHTML( 'beforeend', tooltip );
			return document.querySelector( '#socialToolTip' );
		};

		const showTooltip = ( tooltip ) => {
			tooltip.setAttribute( 'data-show', '' );
		};

		const initializeSocialTooltip = ( elem ) => {
			const tooltip = attachTooltip( elem, createSocialTooltip( elem.textContent ) );

			popperInstance = Popper.createPopper( elem, tooltip, {
				placement: 'top',
			} );

			showTooltip( tooltip );
		};

		const bindMarkEvents = () => {
			if ( highlightedTexts.length <= 0 ) {
				return;
			}

			highlightedTexts.forEach( ( highlightedText ) => {
				highlightedText.addEventListener( 'mouseenter', ( e ) => {
					initializeSocialTooltip( e.currentTarget );
				} );

				highlightedText.addEventListener( 'mouseleave', () => {
					popperInstance.destroy();
					document.querySelector( '#socialToolTip' ).remove();
				} );
			} );
		};

		bindMarkEvents();
	} );
}() );
