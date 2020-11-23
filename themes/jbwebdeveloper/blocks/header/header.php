<?php

//variables
$header = get_field('header');
$header_color = get_field('header_color');
$caption = get_field('caption');
$link = get_field('link');
$linkText = get_field('linktext');
$image = get_field('image');
$pseudo = get_field('shape');
$size = 'full';


if( $pseudo ) {
  $shape = $pseudo;
}else{
  $shape = '';
}

if( $link ) {
  $button = '<a class="bluebtn" href="'.$link.'">'.$linkText.'</a>';
}else{
  $button = '';
}


if( is_admin() ) {
  $hidden = '';
}else{
  $hidden = 'hiddentxt hidden';
}

?>

<section class="headerSection">
<div class="heading row <?php echo $shape; ?>">
  <div class="flex">
    <div class="flex-item">
      <div class="content">
        <h1 class="<?php echo $hidden?>" id="anim-typewriting" style="color:<?php echo $header_color; ?>">
          <?php echo $header; ?>
        </h1>
        <p><?php echo $caption; ?></p>
        <?php echo $button; ?>
      </div>
    </div>
    <div class="flex-item">
      <div class="image">
        <?php
          if( $image ) {
              // echo wp_get_attachment_image( $image, $size );
              echo wp_get_attachment_image( $image, $size, '', array( "class" => "frontImg" ));
          }



          if( have_rows('animated_element') ):

              while( have_rows('animated_element') ) : the_row();

                  // Load sub field value.
                  $subimage = get_sub_field('animated_image');
                  $animation = get_sub_field('animation');
                  $speed = get_sub_field('animation_speed');
                  $delay = "delay-".get_sub_field('animation_delay')."s";
                  $infinite = get_sub_field('infinite');

                  if( $infinite == 1 ) {
                    $infinite = 'animate__infinite';
                  }

                  if( $subimage ) {
                      echo wp_get_attachment_image( $subimage, $size, '', array("class" => "backImg animate__animated ".$infinite." animate__".$delay." animate__".$speed." animate__".$animation."" ));
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
