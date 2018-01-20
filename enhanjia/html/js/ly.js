$(function(){
	$(".culture .con2_hf .btn_sd").click(function(){
		$(this).siblings().removeClass("cur")
		$(this).addClass("cur")
		$(".con2_nr").hide()
		$(".con2_nr").eq($(this).index()).show();
	})
})

$(function(){
	$(".culture .con4_hf .btn_sd").click(function(){
		$(this).siblings().removeClass("cur")
		$(this).addClass("cur")
		$(".con4_nr").hide()
		$(".con4_nr").eq($(this).index()).show();
	})
})