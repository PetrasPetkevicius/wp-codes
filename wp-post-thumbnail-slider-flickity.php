### PHP ###
<?php
// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$args = array(
    'post_type' => 'post',
    'post_status’' => 'publish',
    'posts_per_page' => 12,
    'order' => 'DESC',
    'orderby' => 'publish_date',
);

$product_posts = new WP_Query( $args );
?>

### HTML ###
<?php if ( $product_posts->have_posts() ) :?>
<section class="featured-products">
    <div class="row">
        <h2 class="heading heading--secondary">Produktai</h2>
        <div class="carousel" data-flickity='{ "lazyLoad": 2, "initialIndex": 2, "freeScroll": true, "wrapAround": true }'>
            <?php while ( $product_posts->have_posts() ) : $product_posts->the_post();
                $url = get_permalink( get_page_by_path( 'produktai' ) );
                $img_src = get_the_post_thumbnail_url();
                $img_id = get_post_thumbnail_id();
                $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            ?>
                <img class="carousel-image" data-flickity-lazyload="<?= $img_src ?>" alt="<?= $img_alt ?>">
            <?php endwhile; ?>
        </div>
        <div class="button-wrapper"><a href="<?php echo get_permalink( get_page_by_path( 'produktai' ) ); ?>" class="button-inline">Pamatykite daugiau &raquo;</a></div>
    </div>
</section>
<?php endif; ?>


### CSS ###
.carousel {
    height: 100%;
    overflow: hidden;
    background-color: #fff;
  }

.carousel .flickity-viewport {
    height: 300px;
}

 .carousel-cell {
    height: 100%;
}

.carousel-image {
    height: 100%;
}


### FLICKITY INCLUDES ###
wp_register_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', false, '2.8.7' );
wp_enqueue_style( 'flickity-css' );

wp_register_script('flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js');
wp_enqueue_script('flickity-js');
