### IN THEME FILE ###

<?php
  $args = array(
    'menu' => 'primary-menu',
    'container' => false,
    'menu_class' => 'nav-header__list',
    'add_li_class' => 'nav-header__item',
    'add_subli_class' => '',
    'link_class' => 'nav-header__link',
    'depth' => 0,
  );

  wp_nav_menu($args);
?>


### FUNCTIONS ###
<?php
function add_additional_class_on_li($classes, $item, $args, $depth) {
  if( in_array( 'current-menu-item', $classes ) ||
  in_array( 'current-menu-ancestor', $classes ) ||
  in_array( 'current-menu-parent', $classes ) ||
  in_array( 'current_page_parent', $classes ) ||
  in_array( 'current_page_ancestor', $classes )
  ) {
      $classes[] = 'active ';
  }
  if ($args->add_li_class && $depth == 0) {
      $classes[] = $args->add_li_class;
  }
  if ($args->add_subli_class && $depth) {
      $classes[] = $args->add_subli_class;
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 4);

function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );
?>
