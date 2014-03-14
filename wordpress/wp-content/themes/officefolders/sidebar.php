<!-- begin sidebar -->
<div id="sidebar">

<?php $twitterText = ap_twitterLink();

	if (!empty($twitterText)) { ?>

	<div class="menu">
		<?php echo $twitterText; ?>
	</div>
	<?php } ?>

<div class="menu">

<ul>

<?php /* WordPress Widget Support */ if (false and function_exists('dynamic_sidebar') and dynamic_sidebar(1)) { } else { ?>

    
    <!--
    <li class="widget" id="today_time"><h3 style="border-bottom: 1px solid #F0F8FF; "></h3>
    	
    	<div class="textwidget">
		<center>
            
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" 
					codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" 
					width="160" height="70" id="honehoneclock" align="middle"><param name="allowScriptAccess" 
					value="always">
                    <param name="movie" 
					value="http://blog.ithomer.net/wp-content/plugins/ithomer_time.swf">
					<param name="quality" value="high">
                    <param name="bgcolor" value="#F5F5F5">
                    <param name="color" value="#F5F5F5">
					<param name="wmode" value="transparent">
					<embed wmode="transparent" src="http://blog.ithomer.net/wp-content/plugins/ithomer_time.swf" 
						quality="high" bgcolor="#ffffff" color="#ffffff" width="200" height="100" name="honehoneclock" align="middle" allowscriptaccess="always" 
						type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer">
                        </object>
			</center></div>
 	</li>
    -->
    
    
    
    <!--
    <script type="text/javascript" src="http://www.lufylegend.com/js/lufylegend-1.7.3.min.js"></script>
    <script type="text/javascript" src="http://www.lufylegend.com/lufylegend_developers/yorhom_Tic_Tac_Toe/js/main.js"></script>
	<li class="widget"><h3>井字棋</h3>
        
    <div id="mylegend">
        <div style="position:absolute;margin:0px 0px 0px 0px;width:300px;height:300px;z-index:0;">
            <canvas id="mylegend_canvas" width="300" height="420">
                <div id="noCanvas">
                    <p>Hey there,it looks like you're using Microsoft's Internet Explorer. Microsoft hates the Web and doesn't support HTML5:(</p>
                    <p>To play this game you need a good Browser,like<a href="http://www.opera.com/">Opera</a>,
                    <a href="http://www.google.com/chrome">Chrome</a>,
                    <a href="http://www.mozilla.com/firefox/">Firefox</a>
                    or<a href="http://www.apple.com/safari/">Safari</a>.</p>
                </div>
            </canvas>
        </div>
        <div id="mylegend_InputText" style="position:absolute;margin:0px 0px 0px 0px;z-index:10;display:none;">
            <textarea rows="1" id="mylegend_InputTextBox">&lt;/div&gt;</textarea></div></div>
    	
 	</li>
    -->
    
    
    <!-- 
    <table border="0" cellpadding="10" cellspacing="0" align="center">
        <tr><td align="center"></td>
        </tr>
        <tr><td align="center"><a href="https://www.paypal.com/c2/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/c2/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;">
            <img src="https://www.paypalobjects.com/webstatic/en_C2/mktg/Logo-images/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a></td></tr>
    </table>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="Z3K6PHGX8GUM8">
        <input type="image" src="https://www.paypalobjects.com/en_US/C2/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
	 -->
    
    
      <!--
    <li class="widget" id="weather"><h3>今日天气</h3>
     
    	<iframe src="http://weather.news.qq.com/inc/ss252.htm" frameBorder="0" scrolling="no" height="200" width="300"></iframe>
      
        
        <iframe src="http://m.weather.com.cn/m/pn12/weather.htm " width="300" height="110" 
         marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no">
        </iframe>
		
	</li>
     -->
     
     <li class="widget" id="donate"><h3>技术交流群</h3>	
         <!--
         <div style="text-align:center; margin-top: 0px; margin-bottom: 10px; line-height:24px;">
        	<a href="http://vote.blog.csdn.net/blogstaritem/blogstar2013/sunboy_2050" target="_blank" title="赞助支持他！"><img src="<?php bloginfo('template_directory'); ?>/images/logo_csdn.png" width="300" height="150" alt="投我一票" title="投我一票"></a> &nbsp;&nbsp;
        	<br/>
         
			<a target="_blank" href="http://vote.blog.csdn.net/blogstaritem/blogstar2013/sunboy_2050"><font color="red" size="4"><b>支持你一票</b></font></a>
             <br/>
		-->
             <!--
             <a target="_blank" href="http://www.csdn.net/article/2013-01-21/2813843"><font color="black">人物专访</font></a>
			-->
         <!--
         </div>
         -->
         <!--
         <div style="text-align:center; margin-top: 0px; margin-bottom: 10px; line-height:24px;">
         <b> <font color="blue">
            程序人生的平凡生活</font> <br>
           <font color="red">
            QQ交流群：282297696
            </font></b><font color="#FF00FF">（高端群，需验证）</font>
            <br>
            本群汇聚有百度、小米、微软、腾讯、创新工场、阿里巴巴、日本雅虎等行业精英，欢迎交流分享
         </div>
         -->
         
         <div style="text-align:left; margin-top: 0px; margin-bottom: 10px; line-height:24px;">
         	<font color="blue">
            爱黑客，爱技术</font>
             <br/>
           <font color="red">QQ交流群：</font>
             <a href="http://shang.qq.com/wpa/qunwpa?idkey=df71fd3cd864587cf671681058508de88bd30fb0706170a581d8de7883a99b64">
           		<b><font color="red">320296250</font></b>
             </a>
			<br>
             <div style="margin-top: 8px;"></div>
             
         	<font color="blue">
            程序人生的平凡生活</font>
             <br/>
           <font color="red">QQ交流群：</font>
             
             <a href="http://shang.qq.com/wpa/qunwpa?idkey=2130483145605449b3b5d70927e4b4f4d65826834765e39aec9f22def67184f1">
           		<b><font color="red">282297696</font></b>
             </a> （已满）
			<br> 
             <div style="margin-top: 8px;"></div>
             
         	<font color="blue">
            程序员创业邦</font>
             <br/>
           <font color="red">QQ交流群：</font>
             <a href="http://shang.qq.com/wpa/qunwpa?idkey=08ff1c37500d4a3a1062d6c90447ab471430451241acd8f4c1e5a10cfa289483">
           		<b><font color="red">239292073</font></b>
             </a>
			<br> 
             <div style="margin-top: 8px;"></div>
             
            <font color="blue">
            资深产品经理人</font>
             <br/>
           <font color="red">QQ交流群：</font>
             <a href="http://shang.qq.com/wpa/qunwpa?idkey=c4945a2ddbbb9e6ec2b5ec514f6385e798a57f13487f4bf53bc8edd27b5026a4">
           		<b><font color="red">338142405</font></b>
             </a>
			<br>
             </div>
     </li>
       
    
    
	 <li class="widget"><h3>亲，早起跑步</h3>
     	<object type="application/x-shockwave-flash" style="outline:none;" data="http://blog.ithomer.net/wp-content/plugins/ithomer_mouse.swf?" width="300" height="240" alt="显示人体艺术时间，请安装flash" title="人体艺术时间">
            <param name="movie" value="http://blog.ithomer.net/wp-content/plugins/ithomer_mouse.swf?">
            <param name="bgcolor" value="#F5F5F5">
           	<param name="color" value="#F5F5F5">
            <param name="AllowScriptAccess" value="always">
            <param name="wmode" value="opaque">
     	</object>
 	</li>
 
    
	 <li class="widget"><h3>本站公告</h3>
         <div style="line-height: 24px; color: red;">
             <b>本博客内容，由本人精心整理</b>
             <br>
            <font color="blue">诚邀您<a href="<?php bloginfo('home'); ?>/wp-login.php?action=register"><font color="red">注册投稿</font></a>，版权归您所有!</font>
             <br>
            <font color="blue">欢迎交流，欢迎转载，大家转载</font>
             <br>
            <font color="blue">请注明出处，禁止用于商业目的。</font>
             <br>
         </div>
 	</li>
    
    
     <li class="widget" id="donate"><h3>赞助支持</h3>	
    	<p style="text-align:left; font-size:12px;">本站专注高质量博文，悦享品质，无偿提供技术支持！ <br> <!--感谢您对本站的喜爱，如果您愿意支持，欢迎赞助。 <br> -->
        <br /> 
        <a href="https://me.alipay.com/ithomer" target="_blank" title="赞助支持他！"><img src="<?php bloginfo('template_directory'); ?>/images/alipay-ithomer.png" width="159" height="37" alt="赞助支持" title="博客不错，赞助他一下" style="vertical-align:top;"></a> &nbsp;&nbsp;
        <img src="<?php bloginfo('template_directory'); ?>/images/gx-ithomer-2.gif" width="60" height="60" alt="赞助支持" title="博客不错，赞助他一下">			
		</p>
	</li>
    

    <div >
        <div style="float: left;">
 			<li class="widget" id="categories"><h3><?php _e('Categories'); ?></h3>
			<ul>
				<?php wp_list_categories('title_li='); ?>
			</ul>
 			</li>
        </div>
        <div style="float: left; padding-left: 60px;">
			<li class="widget" id="archives"><h3><?php _e('Archives'); ?></h3>
 			<ul>
	 			<?php wp_get_archives('type=monthly'); ?>
            	<?php //wp_get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'show_post_count' => $c))); ?>
 			</ul>
 			</li>
        </div>
    </div>
 
    <div style="clear: both;"></div>
    
    <!--
	<li class="widget" id="calendar"> 
        <h3><?php //_e('Calendar'); ?> 文章日历</h3>
		<?php //get_calendar(); ?> 
	</li>
	-->
    
    <!--
	<li class="widget" id="pages"> 
		<h3><?php //_e('Pages'); ?></h3>
		<ul>
			<?php //wp_list_pages('title_li='); ?>
		</ul>
	</li>
	-->

	
	<li class="widget" id="links">
        <?php //wp_list_bookmarks('title_before=<h3>&title_after=</h3>&category_before=&category_after='); ?>	
	</li>
	
	
    <li class="widget" id="tags"><h3><?php //_e('Tagcloud'); ?> 标签云</h3>
        <?php //wp_tag_cloud(''); ?>
        <?php wp_cumulus_insert(); ?>
 	</li>
 

    
    
    <li class="widget" id="dream"><h3>我的信念</h3>			
        <div class="textwidget" style="color: #000000;"><ul>
		<li>每天进步一点</li>
        <li>站在巨人的肩上</li>
        <li>三人行，必有我师</li>
        <li>想一万次，不如实干一次</li>
        <li>父母家人，永远我生命最宝贵</li>
        <li>努力，奋斗！</li>
        </ul></div>
	</li>
    
    
    
  
    
    <!-- 
    <li class="widget"> <h3>站点统计</h3> 		
        <div class="textwidget" style="color: #000000;"><ul>
        <li>站点成立：2013-10-05</li>
        <li>文章数量：<?php $count_posts = wp_count_posts();  echo $published_posts = $count_posts->publish; ?> </li>
        <li>评论数量：<?php $total_comments = get_comment_count(); echo $total_comments['approved'];?></li>
        <li>分类数量：<?php echo $count_categories = wp_count_terms('category'); ?> </li>
   -->
        <!--
		<li>文章草稿：<?php $count_posts = wp_count_posts(); echo $draft_posts = $count_posts->draft; ?> </li>
		<li>加入会员：<?php $users = $wpdb->get_var("SELECT COUNT(ID) FROM $wpdb->users"); echo $users; ?> </li>
		<li>页面数量：<?php $count_pages = wp_count_posts('page'); echo $page_posts = $count_pages->publish; ?> </li>
        <li>链接数量：<?php $link = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->links WHERE link_visible = 'Y'"); echo $link; ?> </li>
        <li>标签数量：<?php echo $count_tags = wp_count_terms('post_tag'); ?>  </li>
		-->
   	<!--
		<li>迄今运行：<?php echo floor((time() - strtotime("2013-10-05"))/86400); ?>天 </li>
        <li>最后更新：<?php $last = $wpdb->get_results("SELECT MAX(post_modified) AS MAX_m FROM $wpdb->posts WHERE (post_type = 'post' OR post_type = 'page') AND (post_status = 'publish' OR post_status = 'private')"); $last = date('Y-n-j', strtotime($last[0]->MAX_m));echo $last; ?></li>
        </ul></div>
   </li>
    -->
    
    
    
    
    
    
    
    
   <!--
    <li class="widget" id="meta"><h3><?php //_e('Meta'); ?> </h3>
 	<ul>
        <li><?php //wp_loginout(); ?></li>
        <li><?php //wp_register(); ?></li>
		-->
        <!--
		<li><a href="<?php //bloginfo('rss2_url'); ?>" title="<?php //_e('Syndicate this site using RSS'); ?>"><?php //_e('RSS'); ?></a></li>

		<li><a href="<?php //bloginfo('comments_rss2_url'); ?>" title="<?php //_e('The latest comments to all posts in RSS'); ?>"><?php //_e('Comments RSS'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php //_e('This page validates as XHTML 1.0 Transitional'); ?>"><?php //_e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
		<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
		<li><a href="http://wordpress.org/" title="<?php //_e('Powered by WordPress, state-of-the-art semantic personal publishing platform.'); ?>"><abbr title="WordPress">WP</abbr></a></li>
		-->
        
    <!--    
        <?php //wp_meta(); ?>
	</ul>
 	</li> 
   	-->
 
<?php } ?>

</ul>

</div>


<div style="clear:both;"></div>

</div><!-- end sidebar -->