<div class="wrap">
<h2>WordPress Digg Comment Management</h2>
<?php if(isset($message)) : ?>
<div class="updated fade" id="message" style="background-color: rgb(255, 251, 204);">
<p><strong><?php echo $message ?></strong></p>
</div>
<?php endif; ?>
<script type="text/javascript">
function changestatus(sw){
	var objs = document.getElementsByTagName("input");
	 for(var i=0; i<objs.length; i++) {
		    if(objs[i].type.toLowerCase() == "checkbox")
		      objs[i].checked = sw.checked;
	}
}
</script>
<form action="<?php echo clean_url(add_query_arg(array('cmtdiggaction' => 'delete'), $_SERVER['REQUEST_URI']))?>" method="post" name="cmtdiggcomment">
<div class="tablenav">
<?php if ($page_links): ?>
	<div class='tablenav-pages'><?php echo $page_links;?></div>
<?php endif; ?>
<div class="alignleft">
<button type="submit" onclick=""><?php echo _e('Delete');?></button>
</div>
<br class="clear" />
</div>
<br class="clear" />
<table class="widefat">
	<thead>
		<tr>
    <?php $isasc = (isset($_REQUEST['isasc']) && $_REQUEST['isasc']) ? 0 : 1;?>
    	<th scope="col" class="check-column"><input type="checkbox"
				onclick="changestatus(this)" /></th>
			<th scope="col"><?php _e('Comment')?></th>
			<th scope="col"><a href="<?php echo clean_url(add_query_arg(array('orderby' => 'comment_date_gmt' , 'isasc' => $isasc), $_SERVER['REQUEST_URI']))?>"><?php _e('Date')?></a>
			<?php
			  if (isset($_REQUEST['orderby'])) {
					if ($_REQUEST['orderby'] == 'comment_date_gmt') {
						if (isset($_REQUEST['isasc']) && ! $_REQUEST['isasc']) {
							echo '↓';
						} else {
							echo '↑';
						}
					}
				}
			?>
			</th>
			<th scope="col"><a href="<?php echo clean_url(add_query_arg(array('orderby' => 'digg' , 'isasc' => $isasc), $_SERVER['REQUEST_URI']))?>">digg</a>
			<?php
			  if (isset($_REQUEST['orderby'])) {
					if ($_REQUEST['orderby'] == 'digg') {
						if (isset($_REQUEST['isasc']) && ! $_REQUEST['isasc']) {
							echo '↓';
						} else {
							echo '↑';
						}
					}
				}
			?>
			</th>
			<th scope="col"><a href="<?php echo clean_url(add_query_arg(array('orderby' => 'bury' , 'isasc' => $isasc), $_SERVER['REQUEST_URI']))?>">bury</a>
			<?php if (isset($_REQUEST['orderby'])) {
					if ($_REQUEST['orderby'] == 'bury') {
						if (isset($_REQUEST['isasc']) && ! $_REQUEST['isasc']) {
							echo '↑';
						} else {
							echo '↓';
						}
					}
				} ?>

			</th>
			<th scope="col" class="action-links"><?php _e('Delete')?></th>
		</tr>
	</thead>
	<tbody id="the-comment-list" class="list:comment">
<?php //var_dump($wpdb->last_result); ?>
<?php foreach ($wpdb->last_result as $comment): ?>
<tr>
			<th class="check-column"><input type="checkbox"
				name="delete_comments[]"
				value="<?php echo $comment->comment_ID;?>" /></th>
			<td class="comment">
<?php
            if (! empty($comment->comment_author)) {
                echo "<p class=\"comment-author\"><strong><a class=\"row-title\" href=\"comment.php?action=editcomment&amp;c={$comment->comment_ID}\" title=\"" . __('Edit comment') . "\">{$comment->comment_author}</a></strong><br />";
            }
            if (! empty($comment->comment_author_email)) {
                echo htmlspecialchars($comment->comment_author_email);
            }
            if (! empty($comment->comment_author_IP)) {
                echo ' | ' . $comment->comment_author_IP . '<br />';
            }
            ?>

<?php

            echo '</p><p style="margin-bottom:25px">' . $comment->comment_content . '</p>';
            echo 'In Entry: <a href="' . site_url() . '?p=' . $comment->comment_post_ID . '#comment-' . $comment->comment_ID . '">' . $comment->post_title . '</a><p style="color:#999">Post date: ' . $comment->post_date .'</p>';
            echo "</td>";
            echo "<td>{$comment->comment_date}</td>";
            echo "<td>{$comment->digg}</td>";
            echo "<td>{$comment->bury}</td>";
            echo "<td class='action-links'><a href=\"" . clean_url(add_query_arg(array('cmtdiggaction' => 'delete' , 'delete_comments' => $comment->comment_ID), $_SERVER['REQUEST_URI'])) . "\">";
            echo _e('Delete');
            echo "</a></td></tr>";
            ?>
         <?php endforeach; ?>
	</tbody>
</table>
<div class="tablenav">
<?php if ($page_links) echo "<div class='tablenav-pages'>{$page_links}</div>"; ?>
<div class="alignleft">
<button type="submit" onclick=""><?php echo _e('Delete');?></button>
</div>
<br class="clear" />
</div>
<br class="clear" />
</form>
</div>
