<?php get_header(); ?>


<div id="content">
	<div id="content-inner">

<div id="main">


	
	<div class="post">
	<div class="entry">
<?php 	_e('<h2>Not Found</h2>'); ?>
<?php 	_e('<p>Sorry, you are looking for something that isn\'t here.</p>'); ?>
        
        
        
        
<!--        
        <script type="text/javascript">        
        
        $(function () { 
			setInterval(function () { 
                var timetxt = $("#time").text(); 
                var time = parseInt(timetxt); 
                time--; 
                if (time >0) { 
               	 	$("#time").text(time); 
                } else { 
                	window.location = ""; 
                } 
          	}, 1000); 
         }); 
        
        </script>      
-->       
 <!--        
        <script type="text/javascript"> 
            window.onload = function () { 
      			setTimeout(changeTime, 1000); 
           	} 
            
           	function changeTime() { 
                var timetxt = document.getElementById("time").innerHTML; 
                time = parseInt(timetxt); 
                time--; 
                if (time <= 0) { 
                var url = document.getElementById("url").href; 
                	window.location = url; 
                } else { 
                    document.getElementById("time").innerHTML= time; 
                    setTimeout(changeTime, 1000); 
                } 
            } 
        </script> 
        
    <span style="font-size: 18px; color: Red" id="time">5</span>秒钟以后跳转到 <a href="<%=this.url %>" 
 -->    
        
    页面不存在， <span id="myspan" style="color: #ff0000; font-weight: bold;">5</span> 秒后，自动跳回主页 <a href="http://blog.ithomer.net">IT-Homer</a>
	<script type="text/javascript" language="javascript">
        var i = 5000;
        var myspan=document.getElementById("myspan");  
        function goto(){
         	myspan.innerText = i;
            i--;
            if(i < 0){
                window.clearInterval(mytime);
                window.location.href="http://blog.ithomer.net"; 
                
           	}
		 }
        var mytime=window.setInterval("goto()",1000);
	</script>   
        
        
        
        
        
        
        
	</div>
	</div>	
		
	
	

	</div> <!-- eof main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
