<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>	
	<?php
	if(has_post_thumbnail()):?>
	<figure class="post-thumbnail">
		<?php the_post_thumbnail('full',array('class'=>'img-fluid','alt'=>'blog-image'));?>
		<div class="click-view">
			<a <?php if(!function_exists('spice_software_plus_activate')){ echo 'href="'.esc_url(get_the_permalink()).'"';} else{ echo 'href="'.esc_url(get_the_post_thumbnail_url()).'" data-lightbox="image"';} ?> title="<?php the_title();?>"><i class="fa fa-link"></i></a>
		</div>			
	</figure>	
	<?php endif;?>	
    <div class="post-content">
    <?php if(get_theme_mod('spice_software_enable_blog_date',true) || get_theme_mod('spice_software_enable_blog_author',true) || get_theme_mod('spice_software_enable_blog_category',true) || get_theme_mod('spice_software_enable_blog_tag',true)): ?>
	
		<?php
		if(get_theme_mod('spice_software_enable_blog_date',true)==true):?>
		<?php if(has_post_thumbnail()) { echo '<div class="entry-date">'; }else{ echo '<div class="remove-image">'; } ?>
			<a href="<?php echo esc_url(home_url()); ?>/<?php echo esc_html(date('Y/m', strtotime(get_the_date()))); ?>"><span class="date"><?php echo esc_html(get_the_date()); ?></span></a>
		<?php 
		echo '</div>';
		endif;?>
    <?php if(get_theme_mod('spice_software_enable_blog_author',true) || get_theme_mod('spice_software_enable_blog_category',true) || get_theme_mod('spice_software_enable_blog_tag',true)): ?>
		<div class="entry-meta">
		
			<?php	if(get_theme_mod('spice_software_enable_blog_author',true)==true):?>
			<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" alt="<?php esc_attr_e('tag','spice-software'); ?>"><i class="fa fa-user"></i><span class="author"><?php echo esc_html(get_the_author());?>
			</span></a>

			<?php endif; 
			if(get_theme_mod('spice_software_enable_blog_category',true)==true):
			if ( has_category() ) : 
				echo '<i class="fa fa-folder-open"></i><span class="cat-links" alt="'.esc_attr__("Categories","spice-software").'">';
	    		the_category( ', ' );
	    		echo '</span>';
			endif; endif;

			if (get_theme_mod('spice_software_enable_blog_tag', true) === true):
            $spice_software_tag_list = get_the_tag_list();
                if (!empty($spice_software_tag_list)) {
                    ?>
                    <i class="fa fa-tag"></i>
                    <span class="cat-links posttag"><?php the_tags('', ', ', ''); ?></span>
                <?php } 
            endif;
                ?>
		
		</div>
    <?php endif;?>
	
    <?php endif;?>

	<header class="entry-header blog-title">
            <h4 class="entry-title blog-title"><a class="blog-title" href="<?php the_permalink();?>" alt="<?php esc_attr__('blog-title','spice-software'); ?>"><?php the_title();?></a></h4>
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