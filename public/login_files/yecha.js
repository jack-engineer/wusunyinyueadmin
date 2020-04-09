//yecha编写
var ua = navigator.userAgent;
var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
    isIphone = !ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
    isAndroid = ua.match(/(Android)\s+([\d.]+)/),
    isMobile = isIphone || isAndroid;

$(function(){
	dropdown();
	chongzhi();
	xiuzheng();
	daohang();
	welcome();
	wuliu();
	editaddress();
	favlist();
	buycar();
	jiesuan();
	rdelcar();
	gaoliang();
	shousuo();
	phone();
})

function phone(){
	//手机版js
	if(isMobile) {
		$(".hymain .leftside").animate({left:'-149px'});
	}	
	$(".shousuo").click(function(){
		var text=$(".shousuo").text();
		if(text=="展开菜单"){
			$(".hymain .leftside").animate({left:'0px'});
			$(".shousuo").html("收<br>起<br>菜<br>单")
		}
		if(text=="收起菜单"){
			$(".hymain .leftside").animate({left:'-149px'});
			$(".shousuo").html("展<br>开<br>菜<br>单")
		}
	});
	$(".tab li").each(function(){
		if($(this).find("a").text()=="头像照片"){
			$(this).hide();	
		}	
	})
}

//新增
function shousuo(){
	$(".leftside h3").click(function(){
		$(this).next().fadeToggle();	
	});
}

//一句话高亮 yecha编写
function gaoliang(){
	var nowurl=window.location.pathname,nowcs=window.location.search;
	var turl=nowurl+nowcs;
	$('.leftside li a[href="'+turl+'"]').addClass("hover");
}
//结算
function jiesuan(){
	$(".car-pay li").click(function(){
		if ($(this).find("input[type='radio']").attr("disabled")==false){
			$(".car-pay li").removeClass("hover");
			$(this).find("input[type='radio']").attr("checked",true);
			$(this).addClass("hover");
		}
	});
	$(".car-pay #precode").blur(
	 	function(){
			var precode=$(this).val();
			if (precode){
				$.post("/e/extend/youhui/index.php",{precode:precode},function(data){
					if (data=="nodata"){
						$("#yhprice").text("此优惠券不可用");
					} else{
						var obj = eval( "(" + data + ")" );
						$("#yhprice").text("");
						if (obj.prename){
							$("#yhprice").append(obj.prename);
						}
						if(obj.pretype=="1"){
							$("#yhprice").append(" 优惠比例:<span class='corg'>"+obj.premoney+"%</span>");
						} else if(obj.pretype=="0"){
							$("#yhprice").append(" 优惠金额:<span class='corg'>"+obj.premoney+"元</span>");
						}
						if (obj.endtime){
							$("#yhprice").append(" 到期时间:<span class='corg'>"+obj.endtime+"</span>");
						}
						if (obj.group){
							$("#yhprice").append(" 可使用的会员组:<span class='corg'>"+obj.group+"</span>");
						}
						if (obj.classid){
							$("#yhprice").append(" 可使用的商品栏目:<span class='corg'>"+obj.classid+"</span>");
						}
						if (obj.musttotal!=="0" && obj.musttotal){
							$("#yhprice").append(" 满:<span class='corg'>"+obj.musttotal+"</span> 元可以使用!");
						}
					}
  			});
			}
     });
	$(".dzlist li").click(function(){
		var addressid=$(this).find("input[type='radio']").val();
		window.location.href='/e/ShopSys/order/index.php?addressid='+addressid;	
	});
}
//购物车
function buycar(){
	var allcarnum=$(".carnum input");
	allcarnum.each(function(){
		if ($(this).val()<="1"){
			$(this).parent().find(".numless").addClass("disable");
		}
	});
	$("#mark-all").click(
		function(){
			if($(this).attr('checked')){
				$(".delbox").each(function() {$(this).attr("checked", true);});  
			} else {
				$(".delbox").each(function() {$(this).attr("checked", false);}); 
			}
		}
	)
	
	$(".numless").click(
		function(){
			var carnum=Number($(this).parent().find("input").val());
			if (carnum>1){
				$(this).parent().find("input").val(carnum-1);
				var price=$(this).parent().parent().parent().find(".price").text();
				var totalprice=$(this).parent().parent().parent().find(".totalprice").text();
				var carprice=parseFloat(totalprice)-parseFloat(price);
				$(this).parent().parent().parent().find(".totalprice").text(carprice.toFixed(2));
				gettotalprice();
				if (carnum=="2"){
					$(this).addClass("disable");
				}
			}
		}
	);
	$(".numadd").click(
		function(){
			var carnum=Number($(this).parent().find("input").val());
			if (carnum=="1"){$(this).parent().find(".numless").removeClass("disable");}
			$(this).parent().find("input").val(carnum+1);
			var price=$(this).parent().parent().parent().find(".price").text();
			var totalprice=$(this).parent().parent().parent().find(".totalprice").text();
			var carprice=parseFloat(totalprice)+parseFloat(price);
			$(this).parent().parent().parent().find(".totalprice").text(carprice.toFixed(2));
			gettotalprice();
		}
	);
	$(".carnum input").blur(function(){
		if (parseInt($(this).val())>1){
			$(this).parent().find(".numless").removeClass("disable");
		}
		var price=$(this).parent().parent().parent().find(".price").text();
		var num=$(this).val();
		var carprice=price*num;
		$(this).parent().parent().parent().find(".totalprice").text(carprice.toFixed(2));
		gettotalprice();
	});
}

//收藏列表
function favlist(){
	$("#favlist ul li").mouseenter(function(){$(this).find(".add-fav").show();$(this).find(".del-fav").show();}).mouseleave(function(){$(this).find(".add-fav").hide();$(this).find(".del-fav").hide();});
}

//编辑收货地址
function editaddress(){
	$(".editaddress").click(function(){
		$("#addform #enews").val("EditAddress");
		$("#addform input[name='Submit']").val("编辑这个地址");
		var dz=$(this).find("li");
		dz.each(function(){
			$("#addform input[name="+$(this).attr("rel")+"]").val($(this).text());
		})
	});	
}

//ajax查询商城物流
function wuliu(){
	$(".kdname").mouseenter(function(){
		var kdname=$(this).find(".wuliu").attr("title");
		var kdnum=$(this).find(".wuliu").attr("num");
		$(this).find(".wuliu").show();
		$(this).find(".wuliu").load("/e/extend/kuaidi/?kdname="+kdname+"&kdnum="+kdnum);
	}).mouseleave(function(){
		$(this).find(".wuliu").hide();	
	});
}

function welcome(){
var now = new Date(),hour = now.getHours();
if((hour < 6) && (hour >4)){$(".welcome").prepend("凌晨好");} 
else if (hour < 10){$(".welcome").prepend("早上好");} 
else if (hour < 14){$(".welcome").prepend("中午好");} 
else if (hour < 17){$(".welcome").prepend("下午好");} 
else if (hour < 19){$(".welcome").prepend("傍晚好");} 
else if (hour < 22){$(".welcome").prepend("晚上好");} 
else {$(".welcome").prepend("夜里好");} 	
}

function daohang(){
	$(".morecp").mouseover(function(){$(".morecpfl").show();}).mouseout(function(){$(".morecpfl").hide();});
	$(".morecpfl li").mouseover(function(){if ($(this).find("div").length > 0){$(this).children("a").addClass("hover");$(this).find("div").show();} else {$(this).children("a").addClass("zhover");}}).mouseout(function(){if ($(this).find("div").length > 0){$(this).children("a").removeClass("hover");$(this).find("div").hide();} else {$(this).children("a").removeClass("zhover");}});
}

function xiuzheng(){
//修正部分页面帝国原始代码
	$("input[name='userpicfile']").parent().find("img").attr("width","80").attr("height","80").css({"border":"1px solid #ccc","padding":"1px","float":"left","margin-left":"10px"});
	$("#edituserxx table").attr("cellspacing","0").attr("bgcolor","");
	var mrtd = $("#edituserxx table tr td");
	mrtd.each(
		function(){
			$(this).attr("bgcolor","").attr("width","");
			if ($(this).index()==0){
				$(this).css("width","100px");
			}
		}
	);
}

function dropdown(){
	$(".dropdown").mouseover(function(){$(this).addClass("drop");$(this).children("ul").show();}).mouseleave(function(){$(this).removeClass("drop");$(this).children("ul").hide();});
	$(".inputfont").click(function(){$(this).find(".inputreplace").hide();});
	$(".inputfont input").blur(function(){ if($(this).val()==""){$(this).parent().find(".inputreplace").show();}});
	$(".inputfont input").focus(function(){ if($(this).val()==""){$(this).parent().find(".inputreplace").hide();}});
}

function chongzhi(){
	$(".quickpay li").click(
		function(){
				var price=$(this).find("img").attr("price");
				$(".quickpay li").removeClass("hover");
				$(this).addClass("hover");
				$("#chongzhi li .price").text(price);
				$("#chongzhi input[name=money]").val(price);
		}
	);
	$(".payfs a").click(
		function(){
				var payfs=$(this).attr("payfs");
				$(".payfs a").removeClass("hover");
				$(this).addClass("hover");
				$("#chongzhi input[name=payid]").val(payfs);
		}
	);
	$("#otherprice").blur(function(){
		var price=$(this).val();
		$("#chongzhi li .price").text(price);
		$("#chongzhi input[name=money]").val(price);
	});
}

//顶部删除购物车
function rdelcar(){
	$(".rcart-del").click(
		function(){
			var delclassid=$(this).attr("classid"),delid=$(this).attr("spid"),carnum=$(".buy span").text();
			$.get("/e/ShopSys/doaction.php?enews=delBuycar&classid="+delclassid+"&id="+delid,function(data){});
			$(this).parent().parent().hide();
			$(".buy span").text(carnum-1);
			$(".shopcar .dropindex span").text(carnum-1);
		}
	);
}

//20151207新增计算总价格
function gettotalprice(){
	var totalprice=0;
	$("#carform tbody tr").each(function(index, element) {
		var price=0;num=0;
        price=$(this).find(".price").text();
		num=$(this).find(".carnum input").val();
		if(num){
		 totalprice+=price*num;
		}
    });
	$(".carjsprice").text(totalprice.toFixed(2));
}