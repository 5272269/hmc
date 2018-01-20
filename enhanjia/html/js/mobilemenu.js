$(function(){
  var menuwidth  = 240; // 边栏宽度
  var menuspeed  = 400; // 边栏滑出耗费时间
  
  var $bdy       = $('body');
	var $container = $('#pgcontainer');
  var $burger    = $('.mongodb_navbar');
  var negwidth   = "-"+menuwidth+"px";
  var poswidth   = menuwidth+"px";
  
  $('.icon-nav').on('click',function(e){
    if($bdy.hasClass('openmenu')) {
      jsAnimateMenu('close');
    } else {
    	$('div.box').addClass('pgcontainer');
      jsAnimateMenu('open');
    }
  });
  
  $('.overlay').on('click', function(e){
    if($bdy.hasClass('openmenu')) {
      jsAnimateMenu('close');
      $('div.box').removeClass('pgcontainer');
    }
  });
  
  function jsAnimateMenu(tog) {
  	var $container = $('.pgcontainer');
    if(tog == 'open') {
      $bdy.addClass('openmenu');
      $('.header, .footer').animate({marginRight: negwidth, marginLeft: poswidth}, menuspeed);
//    $container.animate({marginRight: negwidth, marginLeft: poswidth}, menuspeed);
      $burger.animate({width: poswidth}, menuspeed);
      $('.overlay').css('display','block');
      $('.overlay').animate({left: poswidth}, menuspeed);
      
    }
    
    if(tog == 'close') {
      $bdy.removeClass('openmenu');
      $('.header, .footer').animate({marginLeft: "0", marginRight: "0"}, menuspeed);
//    $container.animate({marginLeft: "0", marginRight: "0"}, menuspeed);
      $burger.animate({width: "0"}, menuspeed);
      $('.overlay').animate({left: "0"}, menuspeed);
      $('.overlay').css('display','none');
    }
  }
});