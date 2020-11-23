<?php
$image = get_field('image');
$heading = get_field('heading');
$content = get_field('content');
$link = get_field('link');
$size = 'full';
// styles
$width = get_field('text_width');
$side = get_field('flip_sides');
$header_color = get_field('header_color');

if( $width ){
  $widthcalc = 100 - $width;
}

if( $link ){
  $link_url = $link['url'];
  $link_title = $link['title'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $button = '<a class="bluebtn" target="'.esc_attr($link_target).'" href="'.esc_url($link_url).'">'.esc_html($link_title).'</a>';
}else{
  $button = '';
}

$url = wp_get_attachment_url( $image );
$frontImageAdmin = wp_get_attachment_image( $image, $size, '', array( "class" => "frontImg" ));
$frontImage = wp_get_attachment_image( $image, $size, '', array("src" => "", "data-src" => $url, "class" => "frontImg" ));


if( is_admin() ) {
  $createImg = $frontImageAdmin;
}else{
  $createImg = '<noscript>'.$frontImage.'</noscript>'.$frontImage;
}
?>

<section class="staggered">
  <div class="row">
      <div class="flex valignCenter <?php echo $side; ?>">
        <div class="flex-item" style="width:<?php echo $width; ?>%">
          <div class="content">
            <h2 class="swish" style="color:<?php echo $header_color; ?>"><?php echo $heading; ?></h2>
            <p><?php echo $content; ?></p>
            <?php echo $button; ?>
          </div>
        </div>
        <div class="flex-item" style="width:<?php echo $widthcalc; ?>%">
          <div class="image">
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
        </div>
      </div>
  </div>
</section>


<?php
?>
