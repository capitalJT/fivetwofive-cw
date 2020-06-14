<?php

// Add Google Tag Manager code in <head>
add_action( 'wp_head', 'sk_google_tag_manager1' );
function sk_google_tag_manager1() { ?>
	<!-- Google Tag Manager -->
	<script>
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	    })(window,document,'script','dataLayer','GTM-ND4M6LV');
	</script>
	<!-- End Google Tag Manager -->
<?php }


// Add Google Tag Manager code immediately below opening <body> tag
add_action( 'genesis_before', 'sk_google_tag_manager2' );
function sk_google_tag_manager2() { ?>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-ND4M6LV" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<?php }