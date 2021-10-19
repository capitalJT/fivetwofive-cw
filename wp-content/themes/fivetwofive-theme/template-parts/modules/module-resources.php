<?php
/**
 * Template part for displaying the Resouces module of the modules template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FiveTwoFive_Theme
 */

$module_title            = get_sub_field( 'title' );
$module_subtitle         = get_sub_field( 'subtitle' );
$module_description      = get_sub_field( 'description' );
$background_toggle       = get_sub_field( 'background_toggle' );
$background_color        = get_sub_field( 'background_color' );
$background_image        = get_sub_field( 'background_image' );
$module_text_color       = get_sub_field( 'text_color' );
$module_text_alignment   = get_sub_field( 'text_alignment' );
$module_id               = uniqid( 'ftf-module-resources' );
$module_resources        = get_sub_field( 'resources' );
$module_static_resources = get_sub_field( 'static_resources' );
$module_resources_type   = get_sub_field( 'resources_type' );
$module_resources_limit  = get_sub_field( 'resources_limit' );
$module_display          = get_sub_field( 'display' );
$module_classes          = '';
$module_styles           = '';
$inline_text_color       = '';

// Animations.
$module_animation_desktop  = get_sub_field( 'animation_desktop' );
$module_animation_mobile   = get_sub_field( 'animation_mobile' );
$module_animation_reset    = get_sub_field( 'animation_reset' );
$module_animation_delay    = get_sub_field( 'animation_delay' );
$module_animation_distance = get_sub_field( 'animation_distance' );
$module_animation_duration = get_sub_field( 'animation_duration' );
$module_animation_opacity  = get_sub_field( 'animation_opacity' );
$module_animation_origin   = get_sub_field( 'animation_origin' );
$module_animation_scale    = get_sub_field( 'animation_scale' );

$module_animation_options = array(
	'reset'   => $module_animation_reset,
	'origin'  => $module_animation_origin,
	'desktop' => $module_animation_desktop,
	'mobile'  => $module_animation_mobile,
);

if ( $module_animation_delay ) {
	$module_animation_options['delay'] = $module_animation_delay;
}

if ( $module_animation_distance ) {
	$module_animation_options['distance'] = $module_animation_distance . 'px';
}

if ( $module_animation_duration ) {
	$module_animation_options['duration'] = (int) $module_animation_duration;
}

if ( $module_animation_opacity ) {
	$module_animation_options['opacity'] = (int) $module_animation_opacity;
}

if ( $module_animation_scale ) {
	$module_animation_options['scale'] = (int) $module_animation_scale;
}

if ( get_sub_field( 'module_classes' ) ) {
	$module_classes = implode( ' ', explode( ',', get_sub_field( 'module_classes' ) ) );
}

if ( $background_toggle ) {
	if ( $background_image ) {
		$module_styles .= sprintf( 'background: url(\'%1$s\') center center no-repeat; background-size:cover;', esc_url( wp_get_attachment_image_url( $background_image, 'full' ) ) );
	}
} else {
	if ( $background_color ) {
		$module_styles .= sprintf( 'background-color:%1$s;', $background_color );
	}
}

if ( $module_text_color ) {
	$module_styles    .= sprintf( 'color:%1$s;', $module_text_color );
	$inline_text_color = sprintf( 'color:%1$s;', $module_text_color );
}

if ( $module_text_alignment ) {
	$module_classes .= sprintf( ' text-md-%1$s', $module_text_alignment );
}

if ( $module_animation_desktop || $module_animation_mobile ) {
	$module_classes .= ' ftf-module-hidden';
}

?>

<section id="<?php echo esc_attr( $module_id ); ?>" data-animation="<?php echo esc_attr( wp_json_encode( $module_animation_options ) ); ?>" class="ftf-module ftf-module-resources <?php echo esc_attr( $module_classes ); ?>" style="<?php echo esc_attr( $module_styles ); ?>">
	<div class="container">
		<?php if ( $module_title || $module_subtitle || $module_description ) : ?>
			<header class="ftf-module__header mb-md-5">
				<?php if ( $module_title ) : ?>
					<h2 class="ftf-module__title" style="<?php echo esc_attr( $inline_text_color ); ?>"><?php echo esc_html( $module_title ); ?></h2>
				<?php endif; ?>

				<?php if ( $module_subtitle ) : ?>
					<p class="ftf-module__subtitle"><?php echo esc_html( $module_subtitle ); ?></p>
				<?php endif; ?>

				<?php if ( $module_description ) : ?>
					<div class="ftf-module_description"><?php echo wp_kses( $module_description, fivetwofive_kses_extended_ruleset() ); ?></div>
				<?php endif; ?>
			</header>
		<?php endif; ?>

		<?php if ( $module_resources ) : ?>

			<?php
			if ( $module_static_resources ) :
				$resource_counter = 0;

				if ( 'grid' === $module_display ) :
					?>
						<div class="row">
					<?php
				endif;

				foreach ( $module_static_resources as $post ) :
					setup_postdata( $post );

					if ( 'stacked-alternate' === $module_display ) {
						$resource_counter++;

						if ( 0 !== $resource_counter % 2 ) {
							get_template_part( 'template-parts/post-type/post-item', null, array( 'id' => get_the_ID() ) );
						} else {
							get_template_part(
								'template-parts/post-type/post-item',
								null,
								array(
									'id'                 => get_the_ID(),
									'thumbnail-position' => 'right',
								)
							);
						}
					}

					if ( 'stacked' === $module_display ) {
						get_template_part( 'template-parts/post-type/post-item', null, array( 'id' => get_the_ID() ) );
					}

					if ( 'grid' === $module_display ) :
						?>

						<div class="col-md-4 mb-3 mb-md-5">
							<?php get_template_part( 'template-parts/post-type/post-card', null, array( 'id' => get_the_ID() ) ); ?>
						</div>

						<?php
					endif;

				endforeach;

				wp_reset_postdata();
				if ( 'grid' === $module_display ) :
					?>
						</div>
					<?php
				endif;
			endif;
			?>

		<?php else : ?>

			<?php
			$posts_per_page = 5;

			if ( $module_resources_limit ) {
				$posts_per_page = intval( $module_resources_limit );
			}

			$resource_query_args = array(
				'post_type'      => 'ftf_resource',
				'posts_per_page' => $posts_per_page,
			);

			if ( $module_resources_type ) {
				$resource_query_args['tax_query'] = array(
					array(
						'taxonomy' => 'ftf_resource_type',
						'field'    => 'term_id',
						'terms'    => $module_resources_type,
					),
				);
			}

			$resources_query  = new WP_Query( $resource_query_args );
			$resource_counter = 0;

			?>

			<?php if ( $resources_query->have_posts() ) : ?>

				<?php if ( 'grid' === $module_display ) : ?>
					<div class="row">
				<?php endif; ?>

				<?php
				while ( $resources_query->have_posts() ) :
					$resources_query->the_post();
					?>

					<?php if ( 'grid' === $module_display ) : ?>
						<div class="col-md-4 mb-3 mb-md-5">
							<?php get_template_part( 'template-parts/post-type/post-card', null, array( 'id' => get_the_ID() ) ); ?>
						</div>
					<?php endif; ?>

					<?php if ( 'stacked' === $module_display ) : ?>
						<?php get_template_part( 'template-parts/post-type/post-item', null, array( 'id' => get_the_ID() ) ); ?>
					<?php endif; ?>

					<?php
					if ( 'stacked-alternate' === $module_display ) :
						$resource_counter++;
						if ( 0 !== $resource_counter % 2 ) {
							get_template_part( 'template-parts/post-type/post-item', null, array( 'id' => get_the_ID() ) );
						} else {
							get_template_part(
								'template-parts/post-type/post-item',
								null,
								array(
									'id'                 => get_the_ID(),
									'thumbnail-position' => 'right',
								)
							);
						}
					endif;
					?>

					<?php
				endwhile;
				?>

				<?php if ( 'grid' === $module_display ) : ?>
					</div>
				<?php endif; ?>

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
				<p><?php _e( 'Sorry, no resources matched your criteria.' ); ?></p>
			<?php endif; ?>

		<?php endif; ?>
	</div>
</section>
