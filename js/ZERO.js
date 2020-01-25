//主题信息 请勿删除
setTimeout(function () {console.log(" %c Theme ZERO %c By BlackWhite %c https://www.bwxyz.top/posts/32/ ","color: #fadfa3; background: #333; padding:8px;","color: #111; background: #fadfa3; padding:8px;","background: #efefef; padding:8px;");}, 8000);
//导航开关
$(function(){
  $(window).ready(function(){
    $(".mobile-menu-button").click(function(){
      $(".mobile-menu").toggleClass("ready");
    });
      $(".mobile-menu-close").click(function(){
      $(".mobile-menu").toggleClass("ready");
    });
     $(".mobile-menu-button").click(function(){
      $(".mobile-menu-close").toggleClass("ready");
    });
      $(".mobile-menu-close").click(function(){
      $(".mobile-menu-close").toggleClass("ready");
    });
    $(".search-button").click(function(){
      $(".search").toggleClass("ready");
    });
      $(".search-close").click(function(){
      $(".search").toggleClass("ready");
    });
     $(".search-button").click(function(){
      $(".search-close").toggleClass("ready");
    });
     $(".search-close").click(function(){
      $(".search-close").toggleClass("ready");
    });
  });
});
//lazyload
$(function() {$("img.lazy").lazyload({effect: "fadeIn", threshold: 2000});});
//友链随机排序
!function(){var a=$('.dalao >.link-box'),b=$('.dalao > .link-box > .link-box-area').toArray();while(b.length)a.prepend(b.splice(~~(Math.random()*b.length),1)[0]);}()
//返回顶部 源自https://qqdie.com/archives/typecho-to-return-to-the-top-of-the-plug-in-i-first-ran-and-eggs.html
$(function(){
	$(window).on('scroll',function(){
		var st = $(document).scrollTop();
		if( st>0 ){
			if( $('#main-container').length != 0  ){
				var w = $(window).width(),mw = $('#main-container').width();
				if( (w-mw)/2 > 70 )
					$('#go-top').css({'left':(w-mw)/2+mw+20});
				else{
					$('#go-top').css({'left':'auto'});
				}
			}
			$('#go-top').fadeIn(function(){
				$(this).removeClass('dn');
			});
		}else{
			$('#go-top').fadeOut(function(){
				$(this).addClass('dn');
			});
		}	
	});
	$('#go-top .go').on('click',function(){
		$('html,body').animate({'scrollTop':0},500);
	});

	$('#go-top .uc-2vm').hover(function(){
		$('#go-top .uc-2vm-pop').removeClass('dn');
	},function(){
		$('#go-top .uc-2vm-pop').addClass('dn');
	});
});