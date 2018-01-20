$(function () {
	/*实习生招聘，薪酬福利内容部分鼠标移入样式变换*/
	$('.hr .inner_con .intern_con li').on('mouseover', function(){
		$(this).addClass('active').siblings().removeClass('active');
	});
	$('.salary_con ul li').on('mouseover', function(){
		$(this).addClass('active').siblings().removeClass('active');
	});
	/*应届生，公开招聘切换*/
	$('.graduate_tab li').on('click', function(){
		var index = $(this).index();
		$(this).addClass('active').siblings().removeClass('active');
		$('.graduate_con').eq(index).show().siblings('.graduate_con').hide();
	});
	/*薪酬福利切换*/
	$('.salary_tab a').on('click', function(){
		var index = $(this).index();
		$(this).addClass('active').siblings().removeClass('active');
		$('.salary_con ul').eq(index).show().siblings('ul').hide();
	});
	/*视频中心详情页视频轮播*/
	(function () {
        if ($('#video_slider').size() > 0) {
            $('#video_slider').owlCarousel({
                items: 1,
                pagination: false,
                navigation: true,
                paginationSpeed:5000,
                rewindNav:true
            });

        }
    })();
});
