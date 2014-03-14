<?php 
require_once('../../../../wp-load.php');
$options = get_option('Back2TopAdminOptions');

header("Content-Type: text/css");
$width = 20;
?>

/****************** 返回顶部 ************************/
.gotop {
	display: none;
	position: fixed;
	/*bottom: <?php echo $options['yHeight'];?>px;*/
	bottom: 20px;
	/*right: 11.7%;*/
	/*right: 330px;*/
	right: -2px;
	margin-right: 0px;
text-align: right;
float: right;
}

.gotopcn {
	width: <?php echo $width;?>px;
	line-height: 14px;
	padding: 5px 3px;
	background-color: <?php echo $options['bg-color'];?>;
	color: <?php echo $options['font-color'];?>;
	font-size: 12px;
	text-align: center;
	position: relative;
	/*left: <?php if($options['pLeft']) {
		?>-<?php echo $options['xWidth'] + $width;
	}else{
		echo $options['xWidth'];
	}?>px;*/
	/*left: -<?php echo $options['xWidth'] + $width;?>px;*/
	cursor: pointer;
	opacity: .6;
	filter: Alpha(opacity = 60);
	border-radius: 3px 3px 3px 3px;
	display: block;
}

.gotopcn:hover {
	opacity: 1;
	filter: Alpha(opacity = 100);
}

.gotopcn span {
	display: block;
	padding: 3px 0 4px;
}

.gotopcn span em.icon {
	margin-bottom: 3px;
	background-image: url("../imgs/arrow_large_up_outline.png");
	background-repeat: no-repeat;
	background-position: 0px 1px;
	display: inline-block;
	height: 16px;
	width: 16px;
}

.gotopcn span em.sj {
	display:block;
	height:8px;
	margin:0 0 0 3px;
	font-size:28px;
	overflow:hidden;
	text-align:left;
	font-style: normal;
	font-weight: normal;
}
.gotopcn span em.fk {
	display:block;
	height:5px;
	margin:-1px 0 3px 3px;
	font-size:14px;
	overflow:hidden;
	text-align:left;
	font-style: normal;
	font-weight: normal;
}
