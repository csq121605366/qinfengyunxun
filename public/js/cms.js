//cms必须的js文件，包括一些

/***
 *统计页面访问次数
 *cid 文章的cid
 **/
function count(cid,type){
	$.get(__JSROOT__+"/count/",{cid:cid,type:type},function(data){$("#"+type).html(data);});
}
/***
 * 设置对象包含内容里面的图片 滚动式放大缩小事件
 * obj为要处理的对象  如 .class #id  
 **/
function big_img(obj){
	$(obj).find("img").each(function(){
		w = $(obj).width();
		if($.browser.msie){
			$(this).bind("mousewheel",function(e){
				var e=e||event,v=e.wheelDelta||e.detail;
				if(v>0)
					resizeImg(w,this,false);
				else
					resizeImg(w,this,true);
				window.event.returnValue = false;
				return false;
			})
		}else{
		$(this).bind("DOMMouseScroll",function(event){
			if(event.detail<0)
				resizeImg(w,this,false);
			else
				resizeImg(w,this,true);
			event.preventDefault()
		})
		}
		function resizeImg(w,node,isSmall){
			up = $(node).width()*1.2;
			down = $(node).width()*0.8
				
			if(!isSmall){
				if(w< $(node).width()*1.2) up = w;
				$(node).width(up);
			}
			else{
				$(node).width(down);			
			}
		}
	});
}