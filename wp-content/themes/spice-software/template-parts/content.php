<article  id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>	
	<?php
	if(has_post_thumbnail()):?>
	<figure class="post-thumbnail">
		<?php the_post_thumbnail('full',array('class'=>'img-fluid','alt'=>'blog-image'));?>
		<div class="click-view">
			<a <?php if(!function_exists('spice_software_plus_activate')){ echo 'href="'.esc_url(get_the_permalink()).' "';} else{ echo 'href="'.esc_url(get_the_post_thumbnail_url()).'" data-lightbox="image"';} ?> title="<?php the_title();?>"><i class="fa fa-link"></i></a>
		</div>			
	</figure>	
	<?php endif;?>

    <div class="post-content">
    <?php 
	if(has_post_thumbnail()) { echo '<div class="entry-date">'; }else{ echo '<div class="remove-image">'; } ?>
		<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>"><span class="date"><?php echo esc_html(get_the_date()); ?></span></a>
		
	<?php 
	echo '</div>';?>
	<div class="entry-meta">
	<?php
	$spice_software_blog_meta_sort=get_theme_mod( 'spice_software_blog_meta_sort', array('blog_author','blog_category','blog_tag'));  	 
	if ( ! empty( $spice_software_blog_meta_sort ) && is_array( $spice_software_blog_meta_sort ) ) :
		foreach ( $spice_software_blog_meta_sort as $spice_software_blog_meta_sort_key => $spice_software_blog_meta_sort_val ) :		
			if ( 'blog_author' === $spice_software_blog_meta_sort_val ) :?>		
				<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" alt="<?php esc_attr_e('tag','spice-software'); ?>"><i class="fa fa-user"></i><span class="author"><?php echo esc_html(get_the_author());?></span></a>
			<?php 
			endif;
			if ( 'blog_category' === $spice_software_blog_meta_sort_val ) :
				if ( has_category() ) : 
					echo '<i class="fa fa-folder-open"></i><span class="cat-links" alt="'.esc_attr__("Categories","spice-software").'">';
					the_category( ', ' );
					echo '</span>';
				endif; 
			endif;
			if ( 'blog_tag' === $spice_software_blog_meta_sort_val ) :
			$spice_software_tag_list = get_the_tag_list();
		        if (!empty($spice_software_tag_list)) {?>
		            <i class="fa fa-tag"></i>
		            <span class="cat-links posttag"><?php the_tags('', ', ', ''); ?></span>
		    	<?php }
	    	endif;
		endforeach;
	endif;?>		
	</div>

	<header class="entry-header blog-title">
            <h4 class="entry-title blog-title"><a class="blog-title" href="<?php the_permalink();?>" alt="<?php esc_attr_e('blog-title','spice-software'); ?>"><?php the_title();?></a></h4>
	</header>

	<div class="entry-content">
		<?php spice_software_posted_content();?>
		 <?php
		 $spice_software_button_show_hide=get_theme_mod('spice_software_blog_content','excerpt');
		 if($spice_software_button_show_hide=="excerpt")
		 {
		 if(get_theme_mod('spice_software_enable_blog_read_button',true)==true):
		 spice_software_button_title();
		 endif;
		} ?>
	</div>
</div>
</article>