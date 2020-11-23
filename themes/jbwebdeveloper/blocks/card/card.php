<?php

$backcolor = get_field('background_color');
$color = get_field('heading_color');
$head = get_field('heading');
$intro = get_field('introduction_text');
?>

<section class="cardContainer">
  <div class="row">
    <h2 style="text-align: center;"><?php echo $head; ?></h2>
    <div class="intro">
      <?php echo $intro; ?>
    </div>
      <!-- <div class="cardIntro">
        <h2 style="color: #fff;">Services</h2>
        <p style="color: #fff;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
      </div> -->
      <div class="flex">
        <?php

        if( have_rows('cards') ):

            while( have_rows('cards') ) : the_row();

                // Load sub field value.
                $content = get_sub_field('content');
                $heading = get_sub_field('heading');
                $image = get_sub_field('image');
                $size = 'full';

                if( is_admin() ) {
                  $createImg = '<img class="" src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" />';
                }else{
                  $createImg = '<noscript><img class="" src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" /></noscript><img class="" data-src="'.esc_url($image['url']).'" alt="'.esc_attr($image['alt']).'" />';
                }

                ?>
                <div style="background: <?php echo $backcolor?>;" class="flex-item">
                  <div class="image">
                    <?php
                    if( $image ) {
                        echo $createImg;
                    } ?>
                  </div>
                  <div class="content">
                    <h3 style="color: <?php echo $color;?>"><?php echo $heading; ?></h3>
                    <?php echo $content; ?>
                  </div>
                </div>
                <?php

            endwhile;

        endif;

        ?>
      </div>
    </div>
</section>
