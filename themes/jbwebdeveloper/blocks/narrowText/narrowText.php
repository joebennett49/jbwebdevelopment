<?php

//variables
$heading = get_field('heading');
$heading_color = get_field('heading_color');
$text = get_field('text');
$link = get_field('link');
$align = get_field('text_alignment');
$text_color = get_field('text_color');
$width = get_field('width');
$background_color = get_field('background_color');

if( $link ){
  $link_url = $link['url'];
  $link_title = $link['title'];
  $link_target = $link['target'] ? $link['target'] : '_self';
  $button = '<a class="bluebtn" target="'.esc_attr($link_target).'" href="'.esc_url($link_url).'">'.esc_html($link_title).'</a>';
}else{
  $button = '';
}

if($width == 1){
  $width = 'fullwidth';
}else{
  $background_color = 'none';
}

if($align){
  $align = get_field('text_alignment');
}else{
  $align = "text-left";
}

if($heading){
  $heading = "<h2 style='color:".$heading_color.";'>".$heading."</h2>";
}else{
  $heading = '';
}

?>

<section style="background: <?php echo $background_color; ?>;" class="<?php echo $width; ?>">
<div class="row">
  <div style="color: <?php echo $text_color; ?>" class="narrowText <?php echo $align; ?>">
    <?php echo $heading; ?>
    <?php echo $text; ?>
    <?php echo $button; ?>
  </div>
</div>
</section>
