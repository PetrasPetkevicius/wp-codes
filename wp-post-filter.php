<?php
/*
Template Name: Produktai
*/

$category_slug = (isset($_GET['product-categories']) && !empty($_GET['product-categories'])) ? $_GET['product-categories'] : 'all';
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array(
    'post_type' => 'post',
    'post_status’' => 'publish',
    'posts_per_page' => 12,
    'paged' => $paged,
    'order' => 'DESC',
    'orderby' => 'publish_date',
);

if($category_slug && $category_slug != 'all') {
    $args['category_name'] = $category_slug;
}

$product_posts = new WP_Query( $args );

get_header(); ?>

<form action="">
  <select name="product-categories" id="product-categories" onchange="this.form.submit()">
      <option value="all">Visi</option>
      <?php
          $cats = get_categories();

          foreach ($cats as $cat) {
              $name = $cat->name;
              $slug =$cat->slug;
          ?>
              <option value="<?= $slug ?>" <?= $category_slug == $slug ? 'selected' : '' ?>><?= $name ?></option>
          <?php
          }
      ?>
  </select>
</form>
