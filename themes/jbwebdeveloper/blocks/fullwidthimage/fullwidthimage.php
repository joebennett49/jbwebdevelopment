<?php

$image = get_field('image');
$size = 'full';

$url = wp_get_attachment_url( $image );
$frontImageAdmin = wp_get_attachment_image( $image, $size, '', array( "class" => "frontImg" ));
$frontImage = wp_get_attachment_image( $image, $size, '', array("src" => "", "data-src" => $url, "class" => "frontImg" ));


if( is_admin() ) {
  $createImg = $frontImageAdmin;
}else{
  $createImg = '<noscript>'.$frontImage.'</noscript>'.$frontImage;
}

?>

<section class="fullwidthimage">
  <div class="row expanded">
    <?php

      if( $image ) {
          // echo wp_get_attachment_image( $image, $size );
          echo $createImg;
      }

      if( have_rows('animated_element') ):

          while( have_rows('animated_element') ) : the_row();

              // Load sub field value.
              $subimage = get_sub_field('animated_image');
              $animation = get_sub_field('animation');
              $speed = get_sub_field('animation_speed');
              $delay = "delay-".get_sub_field('animation_delay')."s";
              $infinite = get_sub_field('infinite');
              $hidden = get_sub_field('hidden');
              $suburl = wp_get_attachment_url( $subimage );

              if( is_admin() ) {
                $animationName = "animate__".$animation;
                $src = $suburl;
              }else{
                $animationName = "";
                $src = "";
                if( $hidden == 1 ) {
                  $hidden = 'hidden';
                }
              }

              if( $infinite == 1 ) {
                $infinite = 'animate__infinite';
              }

              if( $subimage ) {
                  echo wp_get_attachment_image( $subimage, $size, '', array("data-src" => $suburl, "src" => "$src", "data-anim" => "$animation", "class" => "toAnimate ".$animationName." backImg ".$hidden." animate__animated ".$infinite." animate__".$delay." animate__".$speed."" ));
              }

          endwhile;

      endif;


      // if( $animated_element ) {
      //     // echo wp_get_attachment_image( $image, $size );
      //     echo wp_get_attachment_image( $animated_element, $size, '', array( "class" => "backImg animate__animated animate__".$animation." animate__slow" ));
      // }
    ?>
  </div>
</section>
