/**
 *
 * @authors Landry(lanmaomao6@gmail.com)
 * @date    2014-05-14 18:39:43
 * @version $Id$
 */
$(function () {

    // 搜索展开收起
    (function () {
        if ($('.search_btn').size() > 0) {
            $(".search_btn").click(function () {
                $(".search_input").slideToggle("slow");
            });
        }
    })();


    //底部效果
    (function () {
        if ($('.footer_yy').size() > 0) {
            $('.footer_img').bind('mouseover', function () {
                $('.footer_text').stop().animate({
                    'opacity': 1
                })
            });
            $('.footer_img').bind('mouseleave', function () {
                $('.footer_text').stop().animate({
                    'opacity': 0
                })
            });
            var footHeight = $('.left_form').height(), _window = $(window).height();
            if (footHeight < _window) {
                $('.footer_yy').addClass('footer_absolute');
            }
            else {
                $('.footer_yy').removeClass('footer_absolute');
            }
        }
    })();

    // 左侧展开收起
    (function () {
        var hl = $(".left").outerHeight(); //获取左侧left层的高度 
        var hr = $(window).height(); //获取右侧right层的高度  
        var mh = Math.max(hl, hr) - 117; //比较hl与hr的高度，并将最大值赋给变量mh
        $(".scroll-pane").height(mh);
        $('#togglemenu').toggle(function () {
            $('body').removeClass('showmenu');
            $('body').addClass('hidemenu');
            $('.index_menu2 ').removeClass('scroll-pane');
            $('.left').animate({ width: "52px" });
            $('.logo-env .logo,.left_form').hide();
            // $('.logo-env').animate({padding:"10px"});

        },
	             	function () {
	             	    $('body').addClass('showmenu');
	             	    $('body').removeClass('hidemenu');
	             	    $('.index_menu2 ').addClass('scroll-pane');
	             	    $('.left').animate({ width: "225px" });
	             	    $('.logo-env .logo,.left_form').show();
	             	    $('.logo-env').animate({ padding: "25px 10px 10px" });
	             	})
        $(window).resize(function () {
            var hl = $(".left").outerHeight(); //获取左侧left层的高度 
            var hr = $(window).height(); //获取右侧right层的高度  
            var mh = Math.max(hl, hr) - 117; //比较hl与hr的高度，并将最大值赋给变量mh
            $(".scroll-pane").height(mh);
        });
    })();

    (function () {
        $('.scroll-pane').jScrollPane();
        $('.left_form dl').click(function () {
            $('.scroll-pane').jScrollPane();
        })
        $('.sitemu li a').click(function () {
            var $this = $(this),
                $ul = $this.parent().find('>ul');

            $('.sitemu li a').removeClass('active');
            if ($ul.length) {
                if ($ul.css('display') == 'block') {
                    $this.removeClass('selected');
                    $this.parent().find('ul').hide();
                } else {
                    $this.addClass('selected');
                    $ul.show();
                }
            } else {
                $this.parent().siblings().find('a.selected').removeClass('selected');
                $this.parent().siblings().find('ul').hide();
                $this.addClass('active');
            }
        });
        $(window).resize(function () { $('.scroll-pane').jScrollPane(); });

        $('#ct80 dt').bind('click', function () {
            var testHeight = $('.jspPane').height();
            var scrollpane = $('.scroll-pane').height();
            if (testHeight < scrollpane) {
                $('.jspPane').css({ "top": "0px" });
            }
        })

    })();



});
