### PHP/HTML ###
<div class="carousel" data-flickity='{ "lazyLoad": 2, "initialIndex": 2, "freeScroll": true, "wrapAround": true, "autoPlay": true, "setGallerySize": false }'>
  <?php
      $imgs = get_field('product_imgs');
  ?>
  <?php if( $imgs ): ?>
      <?php foreach( $imgs as $img ): ?>
          <img class="carousel-image" data-flickity-lazyload="<?= esc_url($img['url']); ?>" alt="<?= esc_attr($img['alt']); ?>">
      <?php endforeach; ?>
  <?php endif; ?>
</div>


### SCSS ###
.carousel {
    height: 100%;
    grid-column: 1 / span 1;
    overflow: hidden;
    background-color: $color-secondary;

        @include respond(br680) {
            grid-column: 1 / span 2;
            grid-row: 2 / span 1;
        }

    &-cell {
        height: 100%;
    }

    &-image {
        height: 100%;
    }
  }
