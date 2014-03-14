<?php $dateFormat = get_settings('date_format'); ?>
<?php get_header(); ?>


<div id="content">
	<div id="content-inner">

<?php get_sidebar(); ?>
<div id="main">

<?php if (have_posts()) : ?>
		
	<?php while (have_posts()) : the_post(); ?>
			
	<div class="post" id="post-<?php the_ID(); ?>">
	
			
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to '); ?><?php the_title(); ?>"><?php the_title(); ?></a></h2>
		
		
 
		<div class="entry">



 		<div class="authordata">
           <div class="" style="float: left;">
            <?php the_time($dateFormat); ?> &nbsp;&nbsp;
            <!--, by <?php the_author_posts_link(); ?>-->
            <?php edit_post_link('编辑',' ',''); ?>	
            </div>
            
           <div class="" style="float: right;">
			<?php the_views(); ?> &nbsp;&nbsp;
            <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comment.gif" height="16" width="16" /> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> 
        	</div>
            
    	</div>
            <div style="clear:both;"></div>   
 		<!--
		<div class="commentsdata">
			<?php the_views(); ?> &nbsp;&nbsp;
            <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comment.gif" height="16" width="16" /> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> 
        </div>
        -->   
				<?php the_content(__('Read more &raquo;')); ?>
				<div style="clear:both"></div>
		</div>
	
        <!--
		<div class="postmetadata">
			<?php edit_post_link('编辑',' ',''); ?>	
		</div> 
		-->
		
		
		<?php comments_template(); ?>
		
		
		</div>
		
	<?php endwhile; ?>

	
	
	<div id="navigation">
        <!--
			<div class="fleft"><?php next_posts_link(__('&laquo; Older')) ?></div>
			<div class="fright"> <?php previous_posts_link(__('Newer &raquo;')) ?></div>
        -->
        <?php wp_pagenavi(); ?>
	</div>
			
	

	<?php else : ?>
	
	<div class="post">
	<div class="entry">
<?php 	_e('<h2>Not Found</h2>'); ?>
<?php 	_e('<p>Sorry, you are looking for something that isn\'t here.</p>'); ?>
	</div>
	</div>	
		
	<?php endif; ?>
	
	

	</div> <!-- eof main -->


<?php get_footer(); ?>
