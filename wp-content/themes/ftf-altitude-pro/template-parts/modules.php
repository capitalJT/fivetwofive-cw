<?php
    // Removing Paragraph Tags from WYSIWYG Fields
    remove_filter('acf_the_content', 'wpautop');
?>

<?php while ( have_rows('modules') ) : the_row();
    switch (get_row_layout()) {
        case 'hero_section':
            get_template_part('template-parts/modules/module-hero');
            break;
        case 'announcement_section':
            get_template_part('template-parts/modules/module-announcement');
            break;
        case 'multi_column_section':
            get_template_part('template-parts/modules/module-multi-column');
            break;
        case 'module_carousel_quote':
            get_template_part('template-parts/modules/module-quote-carousel');
            break;
        case 'image_with_overlay_section':
            get_template_part('template-parts/modules/module-image-overlay');
            break;
        case 'multi_column_video_section':
            get_template_part('template-parts/modules/module-multi-column-video');
            break;
        case 'image_mosaic_section':
            get_template_part('template-parts/modules/module-image-mosaic');
            break;
        case 'featured_image_module':
            get_template_part('template-parts/modules/module-featured-image');
            break;
        case 'raw_code':
            get_template_part('template-parts/modules/module-raw-code');
            break;
        case 'cta_module':
            get_template_part('template-parts/modules/module-cta');
            break;
        default:
            echo 'no match';
    }
endwhile; ?>


<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {

        $(".various").fancybox({

            afterShow: function(){
                if( ($( window ).width()) > 800 ){  $('#main video').css('display','none'); }
            },
            afterClose: function(){
                if( ($( window ).width()) > 800 ){ $('#main video').css('display','block'); }
            },
            helpers: {
                overlay: {
                    locked: false
                }
            }
        });
    });
</script>