// POSTS: 4 last
<?php
          $posts_args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'order' => 'DESC',
            'orderby' => 'publish_date',
        );

$posts = new WP_Query($posts_args);

if ($posts->have_posts()) :
  while ($posts->have_posts()) : $posts->the_post();
  endwhile;
  wp_reset_postdata();
endif;
?>
