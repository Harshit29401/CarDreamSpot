<article <?php post_class('post'); ?>>
	<div class="post-content">
	<?php if(has_post_thumbnail()){
		if ( is_single() ) {
			the_post_thumbnail( '', array( 'class'=>'img-fluid','alt' => esc_attr( get_the_title() ) ) );
		}else{
			echo '<figure class="post-thumbnail" href="'.esc_url(get_the_permalink()).'">';
			the_post_thumbnail( '', array( 'class'=>'img-fluid','alt' => esc_attr( get_the_title() ) ) );
			echo '</figure>';
		}}?>					
	<div class="entry-content">
		<?php the_content();?>
	</div>
</div>
</article>