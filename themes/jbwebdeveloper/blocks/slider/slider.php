<?php

$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>

<section class="sliderSectionIntro">
  <!-- <div class="row"> -->
    <div class="flex">
      <div class="flex-item">
        <h2 style="color:<?php echo get_field('header_color'); ?>;"><?php echo get_field('header'); ?></h2>
        <div class="details">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <a class="bluebtn" target="_self" href="http://jbwebdeveloper.local/development/">Learn more</a>
        </div>
      </div>
      <!-- <div class="flex-item sliderBox">
        <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
            <?php if( have_rows('slides') ): ?>
            <div class="sliderContainer">
          		<div class="slider-nav flex">
          			<?php while( have_rows('slides') ): the_row();
          				$image = get_sub_field('image');
                  $heading = get_sub_field('heading');
                  $text = get_sub_field('text');
          				?>
                  <div class="singleSlide">
            				<div class="image">
            					<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
            				</div>
                    <div class="content">
                      <h3><?php echo $heading; ?></h3>
            					<?php echo $text; ?>
                    </div>
                  </div>
          			<?php endwhile; ?>
          		</div>
            </div>
        	<?php else: ?>
        		<p>Please add some slides.</p>
        	<?php endif; ?>
        </div>
      </div> -->
    </div>
  <!-- </div> -->
</section>


<section class="sliderSection">
    <!-- <div class="narrowText">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div> -->
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php if( have_rows('slides') ): ?>
        <div class="sliderContainer">
      		<div class="slider-nav flex">
      			<?php while( have_rows('slides') ): the_row();
      				$image = get_sub_field('image');
              $heading = get_sub_field('heading');
              $text = get_sub_field('text');
      				?>
              <div class="singleSlide">
        				<div class="image">
        					<?php echo wp_get_attachment_image( $image['id'], 'full' ); ?>
        				</div>
                <div class="content">
                  <h3><?php echo $heading; ?></h3>
        					<?php echo $text; ?>
                </div>
              </div>
      			<?php endwhile; ?>
      		</div>
        </div>
    	<?php else: ?>
    		<p>Please add some slides.</p>
    	<?php endif; ?>
    </div>

</section>
