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


		<div class="commentsdata">
			<?php the_views(); ?> &nbsp;&nbsp;
            
            <img style="vertical-align:-5px;" alt="comments" src="<?php bloginfo('template_directory'); ?>/images/comment.gif" height="16" width="16" /> <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> 
        </div>
            

 		<div class="authordata">
             <!--
                <img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/category.gif" height="16" width="16" /> <?php the_category(', ') ?> 
				-->
             <!--
			 <?php //if (get_the_tags()){?>
                    | <img style="vertical-align:-5px;" alt="categories" src="<?php //bloginfo('template_directory'); ?>/images/tag.gif" height="16" width="16" /> <?php //the_tags('') ?>
			<?php //} ?>
			-->
            <?php the_time($dateFormat); ?> &nbsp;&nbsp;
       		
            <?php the_category(', ') ?>    &nbsp;&nbsp;
               
            <?php //the_author_posts_link(); ?>
  			
			<?php edit_post_link(' 编辑',' ',''); ?>
        </div>
            <?php //the_content(__('Read more &raquo;')); ?>
           
            <?php if(is_category() || is_archive() || is_home() ) {
     			the_excerpt();
 			} else {
     			the_content('Read the rest of this entry &raquo;'); 
 			} ?>
            
		</div>
	
        
        
        <div class="postmetadata" >
 			<div class="details2" style="float: left;">
               <a href="<?php the_permalink() ?>">阅读全文 &raquo;</a>
           	</div>
			<div style="clear:both"></div>
        	
		</div> 
		
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
