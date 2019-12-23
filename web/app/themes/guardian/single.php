<?php get_header(); 
get_template_part('weblizar','breadcrumbs'); ?>
<div class="container">
	<div class="col-md-9 content_left" id="main">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>		
		<div class="col-md-12 blog_post">
		<div class="col-md-12 blog_postcontent">
        <?php if(has_post_thumbnail()) :?>
		<div class="image_frame">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('small_thumbs'); ?>
		</a>
		</div>
		<h3><?php the_title();?></h3>
		<ul class="post_meta_links">
		<li><?php echo get_the_date(); ?></li>				
                <li class="post_by"><i><?php _e('by:','guardian'); ?>&nbsp;</i> <?php the_author(); ?></li>
				<?php if(get_the_tag_list() != '' ) { ?>
                <li class="post_categoty"><i><?php _e('in:','guardian'); ?>&nbsp;</i> <?php the_tags('', ' ', ''); ?></li>
				<?php } ?>
                <li class="post_comments"><i><?php _e('note:','guardian'); ?>&nbsp;</i><?php comments_number( "<strong>0</strong> ".__('Comments','guardian'), "<strong>1</strong> ".__('Comment' ,'guardian'),"<strong>%</strong>".__('Comments','guardian')); ?></li>
        </ul>
        <div class="clearfix"></div>
        <div class="margin_top1"></div>
		<?php endif; ?>            
		<?php the_content(__('Read more...','guardian')); 
		$defaults = array(
              'before'           => '<div class="pagination">' . __( 'Pages:','guardian' ),
              'after'            => '</div>',
	          'link_before'      => '',
	          'link_after'       => '',
	          'next_or_number'   => 'number',
	          'separator'        => ' ',
	          'nextpagelink'     => __( 'Next page'  ,'guardian'),
	          'previouspagelink' => __( 'Previous page' ,'guardian'),
	          'pagelink'         => '%',
	          'echo'             => 1
	          );
	          wp_link_pages( $defaults );
			  ?>
		</div>
</div>

		<?php  		
		endwhile; 
		else : 
		get_template_part('nocontent');
		endif;		
		get_template_part('post-author'); 
		weblizar_navigation_posts(); ?>		
    <div class="clearfix divider_dashed9"></div>  
	<?php comments_template('',true); ?>
	<div class="clearfix mar_top2"></div>
	</div><!-- end content left side -->
	<?php get_sidebar(); ?>
</div><!-- end content area -->
<div class="margin_top5"></div>	
<?php get_footer(); ?>