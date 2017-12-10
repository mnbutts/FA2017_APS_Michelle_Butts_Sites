<?php
function wp_store_promo_section_child_cb(){
?>
  <div id="promo-section" class = 'clearfix'>
    <div class = 'promo-block'>
      <?php the_post_thumbnail('wp-store-medium-image');?>
      <div class='promo-text'>
        <div class='category'>Category</div>
        <div class='title'>this would be title</div>
      </div>
    </div>

    <div class = 'promo-block'>
      <?php the_post_thumbnail('wp-store-medium-image');?>
      <div class='promo-text'>
        <div class='category'>category</div>
        <div class='title'>This would be title</div>
      </div>
    </div>
  </div>
}

			<?php
add_action('wp_store_promo_section_child','wp_store_promo_section_child_cb')
