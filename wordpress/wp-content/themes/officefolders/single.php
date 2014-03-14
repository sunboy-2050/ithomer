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
            <?php the_time($dateFormat); ?> &nbsp;&nbsp;
            <!--By <?php the_author_posts_link(); ?>, -->
            
            <?php the_category(', ') ?> &nbsp;&nbsp;
            <?php edit_post_link('&nbsp;&nbsp; 编辑',' ',''); ?>
            </div>
 
    			<!--	<div class="entry"><?php //the_content(__('Read more &raquo;')); ?></div>  -->
		<div class="post-content" ><?php the_content(__('Read more &raquo;')); ?></div>
    
		<?php wp_link_pages(array('before' => '<p><strong>'. __('Pages','') .':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<div style="clear:both"></div>
		</div>
	
        <!--
		<div class="postmetadata">
		
            <p><img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/category.gif" height="16" width="16" />  
                <?php the_category(', ') ?> 
            
			 <?php if (get_the_tags()){?>
		 		 &nbsp; | &nbsp; 	 <img style="vertical-align:-5px;" alt="categories" src="<?php bloginfo('template_directory'); ?>/images/tag.gif" height="16" width="16" /> <?php the_tags('') ?>
			<?php } ?>
		
			<?php edit_post_link('&nbsp; | &nbsp; 编辑',' ',''); ?></p>			
		</div> 
		-->
        
		</div>
		
		


	<?php endwhile; ?>

	
	<div id="navigation">
		<!--
			<div class="fleft"><?php previous_post_link('&larr; %link') ?></div>
			<div class="fright"><?php next_post_link('%link &rarr;') ?></div>
        -->
			<div class="fleft"> <?php if (get_previous_post()) { previous_post_link('旧一篇: %link');} else {echo "没有了，已经是最后文章";} ?> </div>
        	<div class="fright"> <?php if (get_next_post()) { next_post_link('新一篇: %link');} else {echo "没有了，已经是最新文章";} ?> </div>
        
			<div style="clear:both;"></div>	
        
        <?php wp_pagenavi(); ?>
		
	</div>
	
        
		<?php comments_template(); ?>

	<?php else : ?>
	
	<div class="post">
	<div class="entry">
<?php 	_e('<h2>Not Found</h2>'); ?>
<?php 	_e('<p>Sorry, you are looking for something that isn\'t here.</p>'); ?>
	</div>
	</div>	
		
	<?php endif; ?>
	
	

	</div> <!-- eof main -->


        
        
        
        
        
        
        
<script type="text/javascript"> 
document.body.oncopy = function () {  
	window.setTimeout( function ()  
	{  
		var text = clipboardData.getData("text");  
		if (text) {  
            text = text + "\n\n本文转自：http://blog.ithomer.net \n原文出处：" + location.href; 
			clipboardData.setData("text",text);  
		}  
	}, 100 )  
} 
</script>
        
        

<?php get_footer(); ?>
        
        
        
    
        
        
        
        
        
        
        
        
        