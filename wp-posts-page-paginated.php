<?php
/*
Template Name: Produktai
*/

$paged = $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$product_posts = new WP_Query( array( 'post_type' => 'post', 'post_status’' => 'publish', 'posts_per_page' => 12, 'paged' => $paged ) );

get_header(); ?>

<main>

<section class="products">
    <?php if ( $product_posts->have_posts() ) :?>
    <div class="row u-flex-center u-flex-wrap">
        <?php while ( $product_posts->have_posts() ) : $product_posts->the_post(); ?>
        <div class="img-with-box-small">
            <?= the_post_thumbnail('medium_large', ['class' => 'img-with-box-small__img', 'title' => 'Produkto nuotrauka']); ?>
            <div class="img-with-box-small__box">
                <div class="heading heading--fourth"><b>Kodas:</b> <?= the_title(); ?></div>
                <div class="img-with-box-small__link"><button type="button" class="button-small popup__button-open">Daugiau</button></div>
                <button type="button" class="button-small button-small--question popup__button-open">?</button>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="row u-flex-center--2">
        <?php echo paginate_links( array(
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $product_posts->max_num_pages,
                'prev_text' => __('Atgal &laquo;'),
                'next_text' => __('Pirmyn &raquo;'),
                ) ); ?>
    </div>
    <?php endif;
    wp_reset_postdata(); ?>
</section>

</main>

<?php get_footer(); ?>
