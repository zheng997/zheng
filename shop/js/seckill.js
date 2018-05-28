$(function(){
	/*点击模块切换*/
	$('.nav_list ul li').click(function(e) {
        $(this).addClass('current').siblings().removeClass('current')
		var selfIndex = $(this).index()
		$('.pro_list').eq(selfIndex).addClass('current').siblings().removeClass('current')
    });
	
	/*点击左右按钮*/
	var snum = 0;
	$('span.right').click(function(e) {
		snum++;
		if(snum > $('.nav_list ul li').length-2){
			snum = $('.nav_list ul li').length-2
		}
		//$('.nav_list ul').stop().animate({'left':-475*snum},400)
    });
	
	$('span.left').click(function(e) {
		snum--;
		if(snum < 0){
			snum = 0
		}
		//$('.nav_list ul').stop().animate({'left':-475*snum},400)
    });
})
/*---------------倒计时----------------*/	
	
function timer(starttimeStr,endtimeStr,idStr,webHost){
	json_ajax(webHost+"getCurrentTime.do", function(data) {//异步获取当前时间
		var todayStr = data.currentTime;	
		var starttime = new Date(starttimeStr.replace("-", "/").replace("-", "/"));//开始时间
		var today = new Date(todayStr);//当前时间
		var endtime = new Date(endtimeStr.replace("-", "/").replace("-", "/")); //时间结束
		var delta_t = starttime.getTime() - today.getTime();//倒计时的时间
		var delta_n = endtime.getTime() - starttime.getTime();//开始到结束的时间
		var delta_s = endtime.getTime() - today.getTime();//开始之后的倒计时
		
		var intDiff = parseInt(delta_t / 1000); //<!--倒计时总秒数量-->
		var endnum = parseInt(delta_n / 1000); //<!--活动总秒数量-->
		var endnum2 = parseInt(delta_s / 1000);// <!--开始之后倒计时总秒数量-->
		
		if(intDiff>0){//未开始
			$("#title"+idStr).html("距开始");
			$("#titleshow_"+idStr).html("即将开始");
			$(".seckill_mod_goods_info_i").text("即将开始");
	        $(".seckill_mod_goods_info_i").css('background', '#443630');
	        $(".seckill_mod_goods_info").css('border', '1px solid #000');
		}
		if(intDiff<0 && endnum>=0){//已经开始
			$("#title"+idStr).html("距结束");
			$("#titleshow_"+idStr).html("正在秒杀");
		}
		if(endnum<0){//已经结束
			$("#title"+idStr).html("距结束");
			$("#titleshow_"+idStr).html("已结束");
			$(".seckill_mod_goods_info_i").text("已结束");
            $(".seckill_mod_goods_info_i").css('background', '#999');
            $(".seckill_mod_goods_info").css('border', '1px solid #666');
		}
		if(intDiff > 0){//未开始
		var w_timer=window.setInterval(function(){
				var day=0,
					hour=0,
					minute=0,
					second=0;//时间默认值		
					day = Math.floor(intDiff / (60 * 60 * 24));
					hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
					minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
					second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
			//	if (day <= 9) day = '0' + day;
				if (hour <= 9) hour = '0' + hour;
				if (minute <= 9) minute = '0' + minute;
				if (second <= 9) second = '0' + second;
				if(intDiff>=-1){
					$('#day_show'+idStr).html(day);
					$('#hour_show'+idStr).html('<s id="h"></s>'+hour);
					$('#minute_show'+idStr).html('<s></s>'+minute);
					$('#second_show'+idStr).html('<s></s>'+second);
				}
				
				intDiff--;
				var num = intDiff + 1;
				if(num <= 0){	/*当时间为0时,表示已经开始*/				
					$('#seckillStatus'+idStr).val('true');
					$('#pro_operate'+idStr+' .btn').eq(1).addClass('current').siblings().removeClass('current');
					$("#title"+idStr).html("距结束");
					$("#titleshow_"+idStr).html("正在秒杀");
					window.clearInterval(w_timer);  
					$(".seckill_mod_goods_info_i").text("立即抢购");
					var web_theme = $("#web_theme_id").val();
			        $(".seckill_mod_goods_info_i").css('background', web_theme);
			        $(".seckill_mod_goods_info").css('border', '1px solid '+web_theme+'');
					timer2(endnum2,idStr,endnum);							
				}
			}, 1000);
		}else{
			if(endnum2>0){
				$("#seckillStatus"+idStr).val('true');
				$("#pro_operate"+idStr+" .btn").eq(1).addClass('current').siblings().removeClass('current');
				$("#title"+idStr).html("距结束");
				$("#titleshow_"+idStr).html("正在秒杀");
				timer2(endnum2,idStr,endnum);
			}else{
				againRefresh();
				$('#seckillStatus'+idStr).val('false');
				$('#pro_operate'+idStr+' .btn').eq(2).addClass('current').siblings().removeClass('current');
				$("#title"+idStr).html("距结束");
				$("#titleshow_"+idStr).html("已结束");
	            $(".seckill_mod_goods_info_i").text("已结束");
	            $(".seckill_mod_goods_info_i").css('background', '#999');
	            $(".seckill_mod_goods_info").css('border', '1px solid #666')
			}
		}
	});	
}

function timer2(endnum2,idStr,endnum){
	window.setInterval(function(){
		var day=0,
			hour=0,
			minute=0,
			second=0;//时间默认值		
		day = Math.floor(endnum2 / (60 * 60 * 24));
		hour = Math.floor(endnum2 / (60 * 60)) - (day * 24);
		minute = Math.floor(endnum2 / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(endnum2) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);	
		//if (day <= 9) day = '0' + day;
		if (hour <= 9) hour = '0' + hour;
		if (minute <= 9) minute = '0' + minute;
		if (second <= 9) second = '0' + second;
		if(endnum2>=-1 && day>=0 && hour>=0){
			$('#day_show'+idStr).html(day);
			$('#hour_show'+idStr).html('<s id="h"></s>'+hour);
			$('#minute_show'+idStr).html('<s></s>'+minute);
			$('#second_show'+idStr).html('<s></s>'+second);
		}
		endnum2--;
		var num2 = endnum2 + 1;
		if(num2<=0){
			againRefresh();
			$('#seckillStatus'+idStr).val('false');
			$('#pro_operate'+idStr+' .btn').eq(2).addClass('current').siblings().removeClass('current');
			$("#title"+idStr).html("已结束");
			$("#titleshow_"+idStr).html("已结束");
            $(".seckill_mod_goods_info_i").text("已结束");
            $(".seckill_mod_goods_info_i").css('background', '#999');
            $(".seckill_mod_goods_info").css('border', '1px solid #666');
			window.clearInterval(10);  
		}
	}, 1000);
};




function detailTimer(starttimeStr,todayStr,endtimeStr){
	var starttime = new Date(starttimeStr.replace("-", "/").replace("-", "/"));//开始时间
	var today = new Date(todayStr.replace("-", "/").replace("-", "/"));//当前时间
	var endtime = new Date(endtimeStr.replace("-", "/").replace("-", "/")); //时间结束

	var delta_t = starttime.getTime() - today.getTime();//倒计时的时间 大于表示未开始
	var delta_n = endtime.getTime() - starttime.getTime();//开始到结束的时间
	var delta_s = endtime.getTime() - today.getTime();//开始之后的倒计时
	
	var intDiff = parseInt(delta_t / 1000); //<!--倒计时总秒数量-->
	var endnum = parseInt(delta_n / 1000); //<!--活动总秒数量-->
	var endnum2 = parseInt(delta_s / 1000);// <!--开始之后倒计时总秒数量-->
	
	if(intDiff>0){//未开始
		$('.pro_detail_btn_buy').hide();
		$('.pro_detail_btn_cart').hide();
		$("#startTime").removeClass('dn');//显示还剩时间
		var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值	
		day = Math.floor(intDiff / (60 * 60 * 24));
		hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
		minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
		if (day <= 9) day = '0' + day;
		if (hour <= 9) hour = '0' + hour;
		if (minute <= 9) minute = '0' + minute;
		if (second <= 9) second = '0' + second;
		$('#day_show4').html(day);
		$('#hour_show4').html(hour);
		$('#minute_show4').html(minute);
		$('#second_show4').html(second);
		$("#activityEnd").removeClass("dn");
		$("#startTime").removeClass('dn');//距离开始时间
		$("#endTime").addClass('dn')
	}
	if(intDiff<0 && endnum>=0){//已经开始
		$("#addCart").removeClass("dn");
		$("#toBuy").removeClass("dn");
		$("#endTime").removeClass('dn');//显示还剩时间
		$("#startTime").addClass('dn');
		var day=0,
		hour=0,
		minute=0,
		second=0;//时间默认值	
		day = Math.floor(endnum2 / (60 * 60 * 24));
		hour = Math.floor(endnum2 / (60 * 60)) - (day * 24);
		minute = Math.floor(endnum2 / 60) - (day * 24 * 60) - (hour * 60);
		second = Math.floor(endnum2) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
		if (day <= 9) day = '0' + day;
		if (hour <= 9) hour = '0' + hour;
		if (minute <= 9) minute = '0' + minute;
		if (second <= 9) second = '0' + second;
		$('#day_show3').html(day);
		$('#hour_show3').html(hour);
		$('#minute_show3').html(minute);
		$('#second_show3').html(second);
		$('.pro_detail_btn_buy').show();
		$('.pro_detail_btn_cart').show();
	}
	if(endnum<0){//已经结束
		$('.pro_detail_btn_buy').hide();
		$('.pro_detail_btn_cart').hide();
	}
	if(intDiff>0){
		var w_detailTimer = window.setInterval(function(){
			var day=0,
				hour=0,
				minute=0,
				second=0;//时间默认值		
			if(intDiff > 0){
				day = Math.floor(intDiff / (60 * 60 * 24));
				hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
				minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
				second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
			}
			if (day <= 9) day = '0' + day;
			if (hour <= 9) hour = '0' + hour;
			if (minute <= 9) minute = '0' + minute;
			if (second <= 9) second = '0' + second;
			if(intDiff>=-1){
				$('#day_show4').html(day);
				$('#hour_show4').html('<s id="h"></s>'+hour);
				$('#minute_show4').html('<s></s>'+minute);
				$('#second_show4').html('<s></s>'+second);
			}			
			intDiff--;
			var num = intDiff + 1;		
			if(num <= 0){/*当时间为0时，加入购物车和立即购买按钮显示,表示已经开始*/
				$("#addCart").removeClass("dn");
				$("#toBuy").removeClass("dn");
				$("#endTime").removeClass('dn');//显示还剩时间
				$("#startTime").addClass('dn');//距离开始时间
				$('.pro_detail_btn_buy').show();
				$('.pro_detail_btn_cart').show();
				clearInterval(w_detailTimer);
				detailTimer2(endnum2,endnum);
			}
		}, 1000);
	}else{
		detailTimer2(endnum2,endnum);
	}	
}


//牛牛商品限购倒计时
function detailTimer2(endnum2,endnum){	
	var w_detailTimer2 = window.setInterval(function(){
		var day=0,
			hour=0,
			minute=0,
			second=0;//时间默认值		
			day = Math.floor(endnum2 / (60 * 60 * 24));
			hour = Math.floor(endnum2 / (60 * 60)) - (day * 24);
			minute = Math.floor(endnum2 / 60) - (day * 24 * 60) - (hour * 60);
			second = Math.floor(endnum2) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
		
		if (day <= 9) day = '0' + day;
		if (hour <= 9) hour = '0' + hour;
		if (minute <= 9) minute = '0' + minute;
		if (second <= 9) second = '0' + second;
		$('#day_show3').html(day);
		$('#hour_show3').html(hour);
		$('#minute_show3').html(minute);
		$('#second_show3').html(second);
		endnum2--;	
		var num2 = endnum2 + 1;	
		if(num2<=0){//活动结束
			$('.pro_detail_btn_buy').hide();
			$('.pro_detail_btn_cart').hide();
			$("#activityEnd").removeClass("dn");	
			$('#day_show3').html('00');
			$('#hour_show3').html('00');
			$('#minute_show3').html('00');
			$('#second_show3').html('00');
			$("#endTime").removeClass('dn');//显示还剩时间
			$("#addCart").addClass("dn");
			$("#toBuy").addClass("dn");	
			$("#endTimeText").html("已结束").css("background","#999");
			$("#activityEnd").html("活动已结束...").css("background","#C2B6B4");
			clearInterval(w_detailTimer2);
		}
	}, 1000);
}

function detail(url,idStr){
	var seckillStatus=$('#seckillStatus'+idStr).val();
	if(seckillStatus==='true')
		window.open(url);	
}


////偏移
function banner(webHost) {
    /*1.获取banner*/
    var banner = document.querySelector(".sk-bottom");
    /*2.获取banner的宽度*/
    var arrLeft = document.querySelector("#left");
    var arrRight = document.querySelector("#right");
    /*4.创建图片索引:已经有了默认的一个宽度的偏移*/
    var index = 0;

    var bannerWidth;
    var flag = true; // 节流阀,不到0.2s,不让index改变
    var myIndex = 0;
    var imgBoxs = banner.querySelectorAll('.seckill_mod_goodslist');

    /*开启定时器*/

    bannerWidth = banner.offsetWidth;

    arrLeft.onclick = function () {
        if (flag) {
            flag = false;
            /*6.1索引自增*/
            index++;
            /*6.2设置过渡效果*/
            openTransition(myIndex);
            /*6.3偏移*/
            setTransform(myIndex, -index * bannerWidth);
            setTimeout(function () {
                flag = true;
            }, 200)
        }

    }
    arrRight.onclick = function () {
        if (flag) {
            flag = false;
            /*6.1索引自增*/
            index--;
            /*6.2设置过渡效果*/
            openTransition(myIndex);
            /*6.3偏移*/
            setTransform(myIndex, -index * bannerWidth);
            setTimeout(function () {
                flag = true;
            }, 200)
        }
    }

    /*开启过渡*/
    var openTransition = function (myIndex) {
        imgBoxs[myIndex].style.transition = "transform .2s";
        imgBoxs[myIndex].style.webkitTransition = "transform .2s";
    }
    /*关闭过渡*/
    var closeTransition = function (myIndex) {
        imgBoxs[myIndex].style.transition = "none";
        imgBoxs[myIndex].style.webkitTransition = "none";
    }
    /*设置偏移*/
    var setTransform = function (myIndex, distanceX) {
        imgBoxs[myIndex].style.transform = "translateX(" + distanceX + "px)";
        imgBoxs[myIndex].style.webkitTransform = "translateX(" + distanceX + "px)";
    }


    $('.timeline_list li').click(function () {
        myIndex = $(this).attr("n"); //下标第一种写法
      //  alert($(this).index());
        var startDate = $(this).attr("s");
        var endDate = $(this).attr("e");
        var idStr = $(this).attr("id");
        var $_this = $(this);
        json_ajax(webHost+"getCurrentTime.do", function(data) {//异步获取当前时间
    		var todayStr = data.currentTime;	
    		todayTimer(startDate,endDate,idStr,todayStr);
    		$_this.addClass('timeline_item_selected').siblings().removeClass('timeline_item_selected');
	        $('.sk-bottom ul').eq(myIndex).show().siblings().hide();
	        var childrenSize = $('.sk-bottom ul').eq(myIndex).children('li').length;
	        var text = $_this.find(".timeline_item_link_skew_processtips").text();

	        
	        var starttime = new Date(startDate.replace("-", "/").replace("-", "/"));//开始时间
	    	var today = new Date(todayStr);//当前时间
	    	var endtime = new Date(endDate.replace("-", "/").replace("-", "/")); //时间结束
	    	var delta_t = starttime.getTime() - today.getTime();//倒计时的时间
	    	var delta_s = endtime.getTime() - today.getTime();//开始之后的倒计时		
	    	var intDiff = parseInt(delta_t / 1000); //<!--倒计时总秒数量-->
	    	var endnum2 = parseInt(delta_s / 1000);// <!--开始之后倒计时总秒数量-->    
	       // var text2 = "即将开始";
	        if(childrenSize>4){
	        	$(".arrow .arrow-left").show();
	        	$(".arrow .arrow-right").show();
	        }else{
	        	$(".arrow .arrow-left").hide();
	        	$(".arrow .arrow-right").hide();
	        }
	        if (intDiff>0) {
	        	$("#titleshow_"+idStr).html("即将开始");
	            $(".seckill_mod_goods_info_i").text("即将开始");
	            $("#title"+idStr).html("距开始");
	            $(".seckill_mod_goods_info_i").css('background', '#443630');
	            $(".seckill_mod_goods_info").css('border', '1px solid #000')
	        } else {      	
	        	if(endnum2>0){
	        		var web_theme = $("#web_theme_id").val();
		            $(".seckill_mod_goods_info_i").text("立即抢购");
		            $(".seckill_mod_goods_info_i").css('background', web_theme);
		            $(".seckill_mod_goods_info").css('border', '1px solid '+web_theme+'')
	        	}else{
	        		$("#titleshow_"+idStr).html("已结束");
		            $(".seckill_mod_goods_info_i").text("已结束");
		            $(".seckill_mod_goods_info_i").css('background', '#999');
		            $(".seckill_mod_goods_info").css('border', '1px solid #666')
	        	}        	
	        }
    	})
       
    });
    for(var i=0;i<imgBoxs.length;i++){
        /*添加过渡效果结束的监听*/
        itcast.addTransitionEnd(imgBoxs[i], function () {
            /*作用：可能会越界，但是越界后又会重新回到正确的位置*/
            console.log(index);
            if (index > 1) {
                /*之前添加的过渡效果如果没有清除，那么在下次设置某个样式的时候还会拥有之前添加的过渡效果*/
                index = 0;
                closeTransition(myIndex);
                /*6.3偏移*/
                setTransform(myIndex, -index * bannerWidth);
            } else if (index < 0) {
                index = 1;
                closeTransition(myIndex);
                /*6.3偏移*/
                setTransform(myIndex, -index * bannerWidth);
            }
        });
    }
    againRefresh();
}
/*更好的封装方式*/
var itcast={
    addTransitionEnd:function(dom,callback) {
        dom.addEventListener("webkitTransitionEnd", function () {
            callback && callback();
        });
        dom.addEventListener("transitionEnd", function () {
            callback && callback();
        });
        dom.addEventListener("oTransitionEnd", function () {
            callback && callback();
        });
        dom.addEventListener("msTransitionEnd", function () {
            callback && callback();
        });
        dom.addEventListener("mozTransitionEnd", function () {
            callback && callback();
        });
    },
    addAnimationEnd:function(){},
    tap:function(){}
};


function todayTimer(starttimeStr,endtimeStr,idStr,todayStr){	
	var starttime = new Date(starttimeStr.replace("-", "/").replace("-", "/"));//开始时间
	var today = new Date(todayStr);//当前时间
	var endtime = new Date(endtimeStr.replace("-", "/").replace("-", "/")); //时间结束
	var delta_t = starttime.getTime() - today.getTime();//倒计时的时间
	var delta_n = endtime.getTime() - starttime.getTime();//开始到结束的时间
	var delta_s = endtime.getTime() - today.getTime();//开始之后的倒计时		
	var intDiff = parseInt(delta_t / 1000); //<!--倒计时总秒数量-->
	var endnum = parseInt(delta_n / 1000); //<!--活动总秒数量-->
	var endnum2 = parseInt(delta_s / 1000);// <!--开始之后倒计时总秒数量-->
	if(intDiff > 0){
		window.setInterval(function(){
			var day=0,
				hour=0,
				minute=0,
				second=0;//时间默认值		
				day = Math.floor(intDiff / (60 * 60 * 24));
				hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
				minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
				second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
			//if (day <= 9) day = '0' + day;
			if (hour <= 9) hour = '0' + hour;
			if (minute <= 9) minute = '0' + minute;
			if (second <= 9) second = '0' + second;
			if(intDiff>=-1){
				$('#day_show'+idStr).html(day);
				$('#hour_show'+idStr).html('<s id="h"></s>'+hour);
				$('#minute_show'+idStr).html('<s></s>'+minute);
				$('#second_show'+idStr).html('<s></s>'+second);
			}
			
			intDiff--;
			var num = intDiff + 1;
			
			/*当时间为0时，秒杀按钮显示*/
			if(num <= 0){
				$('#seckillStatus'+idStr).val('true');
				$('#pro_operate'+idStr+' .btn').eq(1).addClass('current').siblings().removeClass('current');
					$("#title"+idStr).html("距结束");
					window.clearInterval(10);  
					timer2(endnum2,idStr,endnum);
			}
		}, 1000);
	}else{
		if(endnum2>0){
			$("#seckillStatus"+idStr).val('true');
			$("#pro_operate"+idStr+" .btn").eq(1).addClass('current').siblings().removeClass('current');
			$("#title"+idStr).html("距结束");
			timer2(endnum2,idStr,endnum);
		}else{
			againRefresh();
			$("#title_"+idStr).html("已结束");
            $(".seckill_mod_goods_info_i").text("已结束");
            $(".seckill_mod_goods_info_i").css('background', '#999');
            $(".seckill_mod_goods_info").css('border', '1px solid #666');
		}
	}
}
function againRefresh(){
	var existence = false;
	 json_ajax(webHost+"getCurrentTime.do", function(data) {//异步获取当前时间
 		var todayStr = data.currentTime;	
		$("input[name='skill_time_id']").each(function(){
			var id = $(this).val();
			var startDate = $("#"+id).attr("s");
		    var endDate = $("#"+id).attr("e");
		    var starttime = new Date(startDate.replace("-", "/").replace("-", "/"));//开始时间
	    	var today = new Date(todayStr);//当前时间
	    	var endtime = new Date(endDate.replace("-", "/").replace("-", "/")); //时间结束
	    	var delta_t = starttime.getTime() - today.getTime();//倒计时的时间
	    	var delta_s = endtime.getTime() - today.getTime();//开始之后的倒计时		
	    	var intDiff = parseInt(delta_t / 1000); //<!--倒计时总秒数量-->
	    	var endnum2 = parseInt(delta_s / 1000);// <!--开始之后倒计时总秒数量--> 
			if(endnum2<0){//已经结束
				$("#"+id).hide();
			}else{
				existence = true;
				$("#"+id).click();
				return;
			}
		})
		if(!existence){//全部结束就隐藏
			$(".sk_mod").hide();
		}
	});
}