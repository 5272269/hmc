$(function() {
	//banner滑动
	(function() {
		if ($('#slide-banner').size() > 0) {
			$('#slide-banner').flexslider({
				animation: "slide",
				animationSpeed: 800,
				slideshowSpeed: 5000,
				directionNav: false
			});
		}
	})();

	(function() {
		var numbers = [],
			win = $(window),
			maxNumber;
			setHeight();
			win.resize(function(){
				setHeight();
			});
		function setHeight() {
			if (win.width() > 990) {
				$('.wealth .wealth_list .inner_con').each(function() {
					var elm = $(this);
					numbers.push(elm.height());
					maxNumber = Math.max.apply(Math, numbers);
					$('.wealth .wealth_list .inner_con').each(function(){
						var elm = $(this);
							elm.height(maxNumber);
					});
				});
			}else{
				$('.wealth .wealth_list .inner_con').each(function(){
						var elm = $(this);
							elm.css({
								'height':'auto'
							});
					});
			}
		}
	})();

	/*分页效果*/
	$('.page .page_num a').on('click', function() {
		$(this).addClass('active').siblings().removeClass('active');
	});
	/*私人飞机切换效果*/
	$('.pro_fly .pro_title a').on('mouseover', function() {
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.pro_fly .pro_title a').on('click', function() {
		var _index = $(this).index();
		$(this).addClass('active').siblings().removeClass('active');
		$('.pro_con').eq(_index).show().siblings('.pro_con').hide();
	});
	//用户名框鼠标焦点移进，文字消失 
	$(".footer .idea_box input,.ucenter-box #user-account").focus(function() {
		var _check = $(this).val();
		console.log(this.defaultValue);
		if (_check == this.defaultValue) {
			$(this).val("");
		}
	});
	$(".footer .idea_box input,.ucenter-box #user-phone").focus(function() {
		var _check = $(this).val();
		if (_check == this.defaultValue) {
			$(this).val("");
		}
	});

	//联系我们表单
	$(".leftbox input").focus(function() {
		var _check = $(this).val();
		if (_check == this.defaultValue) {
			$(this).val("");
		}
	});
	$(".leftbox input").blur(function() {
		var _check = $(this).val();
		if (_check == '') {
			$(this).val(this.defaultValue);
		}
	});
	$(".leftbox textarea").focus(function() {
		var _check = $(this).val();
		if (_check == this.defaultValue) {
			$(this).val("");
		}
	});
	$(".leftbox textarea").blur(function() {
		var _check = $(this).val();
		if (_check == '') {
			$(this).val(this.defaultValue);
		}
	});

	//用户名框鼠标焦点移出，文字显示 
	$(".footer .idea_box input,.ucenter-box #user-account").blur(function() {
		var _check = $(this).val();
		if (_check == '') {
			$(this).val(this.defaultValue);
		}
	});
	$(".footer .idea_box input,.ucenter-box #user-phone").blur(function() {
		var _check = $(this).val();
		if (_check == '') {
			$(this).val(this.defaultValue);
		}
	});

	$(".pw").focus(function() {
		var _check = $(this).val();
		$(this).addClass('active')
	});
	$(".pw").blur(function() {
		var _check = $(this).val();
		if (_check == '') {
			$(this).removeClass('active')
		}
	});

	$('.footer .follow_us a').hover(function () {
        $(this).hide();
        $(this).parent().find('.code-con').show();
    });
    $('.footer .follow_us').on('mouseleave', function () {
        $(this).find('a').show();
        $(this).find('.code-con').hide();
    });

	if ($('input.radio,input.checkbox').size() > 0) {
		$('input.radio,input.checkbox').iCheck({
			checkboxClass: 'icheckbox_flat',
			radioClass: 'iradio_flat'
		});
	}


	//关爱大事记
	(function() {
		var $itembox = $('.events-item-box');
		$('.item', $itembox).each(function() {
			var $elm = $(this);
			var $idx = $elm.index();
			var $cloneHtml = $elm.clone(),
				year = $elm.attr('data-year');

			console.log($elm.height());
			if (year == '2014') {
				$('.events-sliders .slider-top').append($cloneHtml);

				if ($('.events-sliders .slider-top').height() <= $elm.outerHeight()) {
					$('.events-sliders .slider-top').height($elm.outerHeight());
					$elm.height($elm.outerHeight());
					$('.events-sliders .slider-top .item').each(function() {
						var $elm = $(this);
						$elm.css({
							'padding-top': $('.events-sliders .slider-top').height() - $elm.outerHeight()
						});
					});
				}
			} else {
				$('.events-sliders .slider-bottom').append($cloneHtml);
				$('.events-sliders .slider-bottom').css({
					'width': '+=' + ($elm.width() + 50)
				});
			}
		});
		if ($(".events-sliders").size() > 0) {
			$(".events-sliders").mCustomScrollbar({
				scrollInertia: 600,
				mouseWheel: false,
				autoDraggerLength: false,
				horizontalScroll: true
			});
		}

		$('.mCSB_scrollTools').css({
			'top': $('.events-sliders .slider-top').height()
		});
		$itembox.hide();
	})();
	
	//传家翡翠
    (function(){
        if($('#img-list').size() > 0){
            $('#img-list').owlCarousel({
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [768, 3],
                itemsMobile: [479, 2],
                slideSpeed: 1000,
                pagination: false,
                navigation: true
            });
        }
    })();
});

/*验证手机号*/
function checkphone(phone) {

	if (phone == '' || !phone) {
		return false;
	}
	if (!phone.match(/(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/g)) {
		return false;
	}
	return true;
}

/*验证邮箱*/
function isemail(email) {
	var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;

	return reg1.test(email);
}

$(".idea a").click(function() {
	var idea = $("#idea").val();
	var data = {
		idea: idea
	};

	$.post("/member/idea", data, function(result) {
		if (result.code == 1000) {
			alert(result.msg);
		} else if (result.code == 1001) {
			alert(result.msg);
			window.location.href = result.data.url;
		}
	})
});