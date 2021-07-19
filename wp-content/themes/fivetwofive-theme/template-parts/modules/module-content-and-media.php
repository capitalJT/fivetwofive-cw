<?php
/**
 * Template part for displaying the MultiColumn module of the modules template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FiveTwoFive_Theme
 */

wp_enqueue_script( 'fivetwofive-theme-fancybox' );
wp_enqueue_style( 'fivetwofive-theme-fancybox' );

// Contents.
$module_title             = get_sub_field( 'title' );
$module_subtitle          = get_sub_field( 'subtitle' );
$module_description       = get_sub_field( 'description' );
$module_image             = get_sub_field( 'image' );
$module_video             = get_sub_field( 'video' );
$module_video_placeholder = get_sub_field( 'video_placeholder' );
$module_media_alignment   = get_sub_field( 'alignment' );
$module_media_modal       = get_sub_field( 'modal' );
$module_media_type        = get_sub_field( 'image_or_video' );
$media_alignment          = '';

if ( $module_media_alignment && ( 'right' === $module_media_alignment ) ) {
	$media_alignment = 'order-last';
}

// Styles.
$background_image = get_sub_field( 'background_image' );
$background_color = get_sub_field( 'background_color' );
$text_color       = get_sub_field( 'text_color' );
$text_alignment   = get_sub_field( 'text_alignment' );

$module_classes          = '';
$styles                  = '';
$text_color_inline_style = '';

if ( get_sub_field( 'module_classes' ) ) {
	$module_classes = implode( ' ', explode( ',', get_sub_field( 'module_classes' ) ) );
}

if ( $background_color ) {
	$styles .= sprintf( 'background-color: %1$s;', $background_color );
}

if ( $background_image ) {
	$styles .= sprintf( 'background: url(\'%1$s\') center center no-repeat; background-size:cover;', esc_url_raw( wp_get_attachment_image_url( $background_image, 'full' ) ) );
}

if ( $text_color ) {
	$styles                 .= sprintf( 'color:%1$s;', $text_color );
	$text_color_inline_style = sprintf( 'color:%1$s;', $text_color );
}

?>
<section class="ftf-module ftf-module-content-and-media py-5 py-md-6 text-md-<?php echo esc_attr( $text_alignment ); ?> <?php echo esc_attr( $module_classes ); ?>" style="<?php echo esc_attr( $styles ); ?>">
	<div class="container">
		<div class="row">
			<?php if ( $module_image || $module_video ) : ?>
				<div class="col-12 col-md-6 ftf-module-content-and-media__media <?php echo esc_attr( $media_alignment ); ?>">
					<?php
					if ( $module_media_type ) {
						if ( $module_image ) {
							$image = wp_get_attachment_image( $module_image, 'full', false, array( 'class' => 'ftf-module-content-and-media__media-image' ) );

							if ( $module_media_modal ) {
								$image = sprintf( '<a href="%2$s" data-fancybox class="ftf-module-content-and-media__media-image-link">%1$s</a>', $image, esc_url( wp_get_attachment_image_url( $module_image, 'full' ) ) );
							}

							echo wp_kses_post( $image );
						}
					} else {
						if ( $module_video ) {
							$video = fivetwofive_get_acf_oembed_iframe( $module_video );

							if ( $module_media_modal && $module_video_placeholder ) {
								$video_placeholder = wp_get_attachment_image( $module_video_placeholder, 'full', false, array( 'class' => 'ftf-module-content-and-media__media-video-placeholder' ) );
								$video_url         = get_sub_field( 'video', false, false );
								$video             = sprintf( '<a href="%2$s" data-fancybox class="ftf-module-content-and-media__media-video-link">%1$s</a>', $video_placeholder, esc_url( $video_url ) );
							}

							echo wp_kses( $video, fivetwofive_kses_extended_ruleset() );
						}
					}
					?>
				</div>
			<?php endif; ?>
			<?php if ( $module_title || $module_subtitle || $module_description ) : ?>
				<div class="col-12 col-md-6 ftf-module-content-and-media__content">
					<?php if ( $module_title ) : ?>
						<h2 class="ftf-module__title" style="<?php echo esc_attr( $text_color_inline_style ); ?>"><?php echo esc_html( $module_title ); ?></h2>
					<?php endif; ?>

					<?php if ( $module_subtitle ) : ?>
						<p class="ftf-module__subtitle" style="<?php echo esc_attr( $text_color_inline_style ); ?>"><?php echo esc_html( $module_subtitle ); ?></p>
					<?php endif; ?>

					<?php if ( $module_description ) : ?>
						<div class="ftf-module_description" style="<?php echo esc_attr( $text_color_inline_style ); ?>"><?php echo wp_kses( $module_description, fivetwofive_kses_extended_ruleset() ); ?></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
