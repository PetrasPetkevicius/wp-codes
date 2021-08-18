### TEXT ###
<?php
     $hero_description = get_field('hero_description');
     if ($hero_description): echo($hero_description);
     else: echo("Please create your hero description in pages section.");
     endif;
?>
     
### IMAGE ###
 <?php 
     $hero_image = get_field('hero_image', 29);
     if ($hero_image) {
        $url = $hero_image['url'];
        echo ($url);
     } else {
        echo get_template_directory_uri() . "/assets/images/hero-img.jpg";
     }
?>


### REPEATER ###
<?php
if( have_rows('contact_phones', 'option') ) :
     while( have_rows('contact_phones', 'option') ) : the_row();
          $sub_value = get_sub_field('contact_phone');
?>
          <li class="footer__item"><a href="tel: <?= $sub_value ?>" class="footer__link"><?= $sub_value ?></a></li>
<?php
     endwhile;
else:
?>
     <li class="footer__item"><a href="tel: +37069984297" class="footer__link">+37069984297</a></li>
<?php endif; ?>
