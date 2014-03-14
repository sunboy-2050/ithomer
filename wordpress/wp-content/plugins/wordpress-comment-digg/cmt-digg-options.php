<div class="wrap">
<h2>WordPress Digg Comment Options</h2>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<h3>Usage</h3>
<p style="margin-left:10px">It's so easy to use that you don't need to add much code</p>
<h3>Settings</h3>
<table class="form-table">
<tr valign="top">
<th scope="row">The text for "digg up" <b style="color:red">*</b></th>
<td><input type="text" name="cmt_digg_vote_up" value="<?php echo get_option('cmt_digg_vote_up'); ?>" /></td>
</tr>
<tr valign="top">
<th scope="row">The text for "digg down" <b style="color:red">*</b></th>
<td><input type="text" name="cmt_digg_vote_down" value="<?php echo get_option('cmt_digg_vote_down'); ?>" /><br/>
	FYI: I didn't make a multi-language package since it's too complicated and not so flexible, just type any words you want in the box to represent "Digg Up"!</td>
</tr>
</table>
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="cmt_digg_vote_down, cmt_digg_vote_up" />

<p class="submit">
<input type="submit" name="Submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>
<h3>About</h3>
<p style="margin-left:10px">This plugin is brought to you by Aw Guo. Twitter: <a href="http://twitter.com/awflasher">@awflasher</a> / blog: <a href="http://www.ifgogo.com/author/admin/">Aw@ifgogo</a></p>. Contact me via: <code>awflasher@gmail.com</code>
</div>