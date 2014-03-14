 /* Awc - cookie manager - */
jQuery.awc = function(name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        options.expires = 10;
        var expires = '';
        var date = new Date();
        date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
        expires = '; expires=' + date.toUTCString();
        var path = '; path=/';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

jQuery(document).ready(function(){
  diggcommentinit();
});
$ = jQuery;
//window.onload = diggcommentinit;
function diggcommentinit(){
	if ($(".diggcomment").length!=0){
	    $(".diggcomment").each(function(i){
	        $(this).html(getHtml($(this).attr("cid"),$(this).attr("digg"),$(this).attr("bury")));});}
}
function getRatioByDiggAndBury(d,b) {
	var o = {};
	o.lr = 50;
	if(d+b > 0) o.lr = (b / (d+b))*100;
	o.rr = 100 - o.lr;
	return o;
}
// Get the HTML code of each comments
function getHtml(cid, diggnum, burynum){
	diggnum = parseInt(diggnum);
	burynum = parseInt(burynum);
	var diggandbury = diggnum + burynum;
	var lratio = 50;
	var diggcolor = "#9acd32";
	if(diggandbury > 250){
		diggcolor = "#660066";
	}else if((diggandbury < 250) && (diggandbury >= 200)){
		diggcolor = "#CD3232";
	}else if((diggandbury < 200) && (diggandbury >= 160)){
		diggcolor = "#CD6032";
	}else if((diggandbury < 160) && (diggandbury >= 120)){
		diggcolor = "#CD8832";
	}else if((diggandbury < 120) && (diggandbury >= 80)){
		diggcolor = "#CD9C32";
	}else if((diggandbury < 80) && (diggandbury >= 50)){
		diggcolor = "#cdc432";
	}else if((diggandbury < 50) && (diggandbury >= 20)){
		diggcolor = "#aecd32";
	}else if(diggandbury < 20){
		diggcolor = "#9acd32";
	}
	var burycolor = "#DCDCDC";
	var diggwordcolor = "#000000";
	var burywordcolor = "#000000";
	var barwidth = "100";
	var barheight = "3";
	var o = getRatioByDiggAndBury(diggnum,burynum);
	lratio = o.lr;
	rratio = o.rr;
	var html = '<div class="clearfix">';
	html += '<div class="fR clearfix cd-wrapper" id="cd-wrapper'+cid+'">';
	html += '    <div class="fL">';
	if (checkifcandigg(cid))
		html += '        <a class="cd-votebtn" onclick="diggcomment('+cid+',\'DOWN\','+diggnum+','+burynum+')">'+cmt_digg_vote_down+'</a> <span id="burynum'+cid+'">'+burynum+'</span>';
	else
		html += '        <span class="cd-votebtn">' + cmt_digg_vote_down + '</span> <span id="burynum'+cid+'">'+burynum+'</span>';
	html += '   </div>';
	html += '   <div class="fL cd-votebar" id="cd-votebar'+cid+'">';
	html += '  	<table border="0" style="width:90px; height:8px" class="cd-votebar-table">';
	html += '			<tbody>';
	html += '			<tr>';
	html += '			<td style="width:'+lratio+'%;background:#ccc;padding:0 1px" class="burybar bar" id="burybar'+cid+'" />';
	html += '			<td style="width:'+rratio+'%;background:#ac4;padding:0 1px" class="diggbar bar" id="diggbar'+cid+'" />';
	html += '		</tr>';
	html += '		</tbody></table>';
	html += '   </div>';
	html += '    <div class="fL">';
	if (checkifcandigg(cid))
	html += '        <span id="diggnum'+cid+'">'+diggnum+'</span> <a class="cd-votebtn" onclick="diggcomment('+cid+',\'UP\','+diggnum+','+burynum+')">' + cmt_digg_vote_up +'</a>';
	else
	html += '        <span id="diggnum'+cid+'">'+diggnum+'</span> <span class="cd-votebtn">'+cmt_digg_vote_up+'</span>';
	html += '    </div>';
	html += ' </div>';
	html += '</div>';
	return html;
}
function diggcomment(cid, type, diggnum, burynum){
	if(checkifcandigg(cid, type)){
		dodiggit(cid, type, diggnum, burynum)
	}
}
function checkifcandigg(cid){
	if($.awc('cmtdiggdigg'+cid) == '1'){
		return false;
	}
	return true;
}
function dodiggit(cid, type, diggnum, burynum){
	updateDiggUI(cid, type, diggnum, burynum);
	$.get(url,{cmtdiggaction:"diggcomment",commentid:cid,diggAction:type,random:Math.random()},function(data){return});
/* if(data == 'yes'){} Only 'yes' means the digg or bury action is done correctly, we need to make this accurate in the backend as well as the front-end check. No one games the system easily */
}
function updateDiggUI(cid, type, diggnum, burynum){
/* Update the digg/bury bar */
if(type == 'DOWN')
	burynum = burynum + 1;
else
	diggnum = diggnum + 1;
/* Refresh the display number */
$("#burynum"+cid).html(String(burynum));
$("#diggnum"+cid).html(String(diggnum));
/* Refresh the ratio bar */
var o = getRatioByDiggAndBury(diggnum,burynum);
lratio = o.lr;
rratio = o.rr;
$("#burybar"+cid).css("width",lratio+"%");
$("#diggbar"+cid).css("width",rratio+"%");
$("#cd-wrapper"+cid+" .cd-votebtn").unbind("click").attr("onclick","").css({"color":"#ccc","cursor":"default"});}
