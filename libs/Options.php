<?php
function themeConfig($form) {
	$ver = themeVersion();
    $themeDir = "/usr/themes/ZERO/";
	echo '<div class="ZERO">
	<h1 style="margin: 1em 0px -0.4em 0;">ZERO 主题设置面板</h1>
	<p>欢迎使用 ZERO 主题，目前版本是：'. $ver .' <br>
	作者博客：<a href="https://www.bwxyz.top"  target="_blank">BlackWhite</a> | 帮助文档：<a href="https://github.com/BlackWhite2000/Typecho-Theme-ZERO"  target="_blank">Github</a> | 问题反馈：<a href="https://www.bwxyz.top/posts/48"  target="_blank">Blog</a>
	</p>
	</div>';
	?>
	
<link href="/usr/themes/ZERO/css/admincss.css" rel="stylesheet" type="text/css" />
<div id="tab-f" class="col-mb-12" role="complementary"><ul class="typecho-option-tabs clearfix">
<li class="w-20" id="home" onclick="return Tabs.bwxyz('home');" style="background:#E9E9E6;"><a>基本设置</a></li>
<li class="w-20" id="diyhome" onclick="return Tabs.bwxyz('diyhome');"><a>高级自定义</a></li>
<li class="w-20" id="helpme" onclick="return Tabs.bwxyz('helpme');"><a style="color:red;">用前须知</a></li>
</ul></div>
<script src="/usr/themes/ZERO/js/adminjs.js"></script>
	<div class="helpme">
	 <h2>关于主题</h2>
	 <p>代码高亮：代码高亮是用了 <a href="https://github.com/Xcnte/Code-Prettify-for-typecho"  target="_blank">CodePrettify</a> 插件，主题本身已内嵌，所以无需下载插件。</p>
	 <p>返回顶部：返回顶部是用了 <a href="https://qqdie.com/archives/typecho-to-return-to-the-top-of-the-plug-in-i-first-ran-and-eggs.html"  target="_blank">gotop</a> 插件，主题本身已内嵌，所以无需下载插件。</p>
	 <p>博客框架：框架采用了 <a href="https://github.com/AlanDecode/typecho-theme-dev-framework"  target="_blank">typecho-theme-dev-framework</a>。</p>
	 <p>博客还有其他一些代码都是通过学习参考了网上很多大佬来的。</p>
	 <p>建议导航栏页面总共不要超过5-6个，太多会挤。</p>
	 <p style="color:red;">two模板导航栏字数不能超过5个，太多会导致换行或者看不到。</p>
	 <p>考虑到我一直是用笔记本搭建的，对于大屏幕可能没有适配好尺寸，如果遇到了请跟我说。</p>
	 <p>对于二次开发，需要修改css、js的话建议另外新建文件来进行修改。</p>
	 <h2>如果你想支持我，我当然会非常开心~</h2>
	<div><img src="../usr/themes/ZERO/images/jz/alipay.jpg" style="width: 20%;" alt="支付宝"><span style="color:#d9d9d9;">支付宝</spawn><img src="../usr/themes/ZERO/images/jz/wechat.png" style="width: 20%;" alt="微信"><span style="color:#d9d9d9;">微信</span></div></div>
	<?php

    //zero
	$zero = new Typecho_Widget_Helper_Form_Element_Select('zero',array('0'=>'one','1'=>'two'),'1','选择模板','');
		$zero->setAttribute('class', 'col-mb-12 home');
    $form->addInput($zero);
    
 //font
	$font = new Typecho_Widget_Helper_Form_Element_Select('font',array('0'=>'关闭','1'=>'开启'),'1','<h2 style="color:red;">one模板专用</h2>特殊字体','显示在顶部底部，会占用约4.3m资源，字体有版权不能商用，除非有授权');
	  	$font->setAttribute('class', 'col-mb-12 home');
    $form->addInput($font);
    
    //font
	$twobannertitle = new Typecho_Widget_Helper_Form_Element_Text('twobannertitle', NULL, NULL, _t('<h2 style="color:red;">two模板专用</h2>banner标题'), _t('显示在顶部banner的白色标题，默认输出站点名称'));
	  	$twobannertitle->setAttribute('class', 'col-mb-12 home');
    $form->addInput($twobannertitle);
    $twobannerdescription = new Typecho_Widget_Helper_Form_Element_Text('twobannerdescription', NULL, NULL, _t('banner介绍'), _t('显示在顶部banner的灰色介绍，默认输出站点描述'));
	  	$twobannerdescription->setAttribute('class', 'col-mb-12 home');
    $form->addInput($twobannerdescription);
    
	//logo
	$logoUrl= new Typecho_Widget_Helper_Form_Element_Text('logoUr1', NULL, NULL, _t('<h2>基本设置</h2>LOGO'), _t('请填写 LOGO 在线链接, 留空则调用本地资源。本地路径/usr/themes/ZERO/images/favicon.png'));
	$logoUrl->setAttribute('class', 'col-mb-12 home');
    $form->addInput($logoUrl);
    
    
    //author
	$authorName= new Typecho_Widget_Helper_Form_Element_Text('authorName', NULL, NULL, _t('站长名'), _t('评论区用来区分站长与游客的牌子，不填写默认显示“博主”'));
		$authorName->setAttribute('class', 'col-mb-12 home');
    $form->addInput($authorName);
    
    //文章置顶
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔'));
    	$sticky->setAttribute('class', 'col-mb-12 home');
    $form->addInput($sticky);
    
   //评论头像
    $diyavatar = new Typecho_Widget_Helper_Form_Element_Select('diyavatar',array('0'=>'关闭','1'=>'开启'),'1','评论qq头像 是否开启','因为可以通过源代码看到qq号，请自行决定是否开启');
    	$diyavatar->setAttribute('class', 'col-mb-12 home');
    $form->addInput($diyavatar);

    //pjax
	$pjax = new Typecho_Widget_Helper_Form_Element_Select('pjax',array('0'=>'关闭','1'=>'开启'),'1','Pjax 预加载 是否开启','Pjax 预加载功能的开关');
		$pjax->setAttribute('class', 'col-mb-12 home');
    $form->addInput($pjax);
	$pjax_complete = new Typecho_Widget_Helper_Form_Element_Textarea('pjax_complete', NULL, NULL, _t('完成后执行事件'), _t('Pjax 跳转页面后执行的事件，写入 js 代码，一般将 Pjax 重载(回调)函数写在这里。'));
		$pjax_complete->setAttribute('class', 'col-mb-12 home');
    $form->addInput($pjax_complete);
    
    //LoadingImage
	$loading_image = new Typecho_Widget_Helper_Form_Element_Select('loading_image',array('0'=>'关闭','1'=>'开启'),'1','首页图片懒加载 是否开启','图片懒加载是否开启，不开启则直接显示图片。懒加载图片路径/usr/themes/ZERO/images/loading.gif。<br>这个设置只对首页起效果，文章的懒加载默认开启无法改变，但懒加载图片路径是一样的。');
		$loading_image->setAttribute('class', 'col-mb-12 home');
		
    $form->addInput($loading_image);
    
    //SiteBuildTime
    $buildTime = new Typecho_Widget_Helper_Form_Element_Text('build_time', NULL, NULL, _t('在页脚输出建站年份'), _t('请直接填写年份，如 2020，留空则单纯显示最新年份'));
    	$buildTime->setAttribute('class', 'col-mb-12 home');
    $form->addInput($buildTime);
    
    //search
    $search = new Typecho_Widget_Helper_Form_Element_Select('search',array('0'=>'关闭','1'=>'开启'),'1','是否开启搜索功能','适用于想使用搜索插件以防冲突的');
    	$search->setAttribute('class', 'col-mb-12 home');
    $form->addInput($search);
    
    //reward
    $rewardinstall = new Typecho_Widget_Helper_Form_Element_Select('rewardinstall',array('0'=>'开启','1'=>'关闭'),'1','是否开启打赏功能','不开启下面无需填');
    	$rewardinstall->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardinstall);
	$reward = new Typecho_Widget_Helper_Form_Element_Select('reward',array('0'=>'一种','1'=>'两种'),'1','开启几种打赏方式','最多支持两种');
		$reward->setAttribute('class', 'col-mb-12 home');
    $form->addInput($reward);
    $rewardUrl1 = new Typecho_Widget_Helper_Form_Element_Text('rewardUrl1', NULL, NULL, _t('填写第一种二维码图片链接 (如果开启)'), _t('支持本地链接，如"/usr/themes/ZERO/images/文件名.jpg"'));
    	$rewardUrl1->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardUrl1);
    $rewardName1 = new Typecho_Widget_Helper_Form_Element_Text('rewardName1', NULL, NULL, _t('填写第一种二维码支付方式 (如果开启)'), _t('如“微信”或者“支付宝”，不填不显示，不填的话第二种支付方式也不能填，否则会错位'));
    	$rewardName1->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardName1);
    $rewardUrl2 = new Typecho_Widget_Helper_Form_Element_Text('rewardUrl2', NULL, NULL, _t('填写第二种二维码图片链接 (如果开启)'), _t('支持本地链接，如"/usr/themes/ZERO/images/文件名.jpg"'));
    	$rewardUrl2->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardUrl2);
    $rewardName2 = new Typecho_Widget_Helper_Form_Element_Text('rewardName2', NULL, NULL, _t('填写第二种二维码支付方式 (如果开启)'), _t('如“微信”或者“支付宝”，不填不显示，不填的话第一种支付方式也不能填，否则会错位'));
    	$rewardName2->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardName2);
     $rewardDiy = new Typecho_Widget_Helper_Form_Element_Textarea('rewardDiy', NULL, NULL, _t('填写打赏方式自定义内容 (如果开启)'), _t('可以写自定义html，将输出在二维码下方，二维码不填的话只输出自定义内容'));
     	$rewardDiy->setAttribute('class', 'col-mb-12 home');
    $form->addInput($rewardDiy);
	//developer
	 $htmllang = new Typecho_Widget_Helper_Form_Element_Text('htmllang', NULL, NULL, _t('<h2>高级自定义设置</h2>自定义头部语言声明'), _t('网页头部语言声明。默认<span style="color:red;">zh-Hans</span>'));
    	$htmllang->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($htmllang);
	  $bodytop = new Typecho_Widget_Helper_Form_Element_Textarea('bodytop', NULL, NULL, _t('自定义html'), _t('输出到body下面'));
    	$bodytop->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($bodytop);
	$headerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('headerEcho', NULL, NULL, _t('自定义头部信息'), _t('填写 html 代码，将输出在 &lt;head&gt; 标签中，可以在这里写上统计代码'));
	$headerEcho->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($headerEcho);
    $footerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerEcho', NULL, NULL, _t('自定义页脚最底部信息'), _t('填写 html 代码，通常用来引用 JavaScript'));
    	$footerEcho->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($footerEcho);
	$footerleftEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerleft', NULL, NULL, _t('自定义页脚左部分信息'), _t('填写 html 代码，将输出在页脚的版权信息后面'));
		$footerleftEcho->setAttribute('class', 'col-mb-12 diyhome');
	$form->addInput($footerleftEcho);
	$footerrightEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerright', NULL, NULL, _t('自定义页脚右部分信息'), _t('填写 html 代码，将输出在页脚的版权信息后面'));
		$footerrightEcho->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($footerrightEcho);
	$cssEcho = new Typecho_Widget_Helper_Form_Element_Textarea('cssEcho', NULL, NULL, _t('自定义 CSS'), _t('填写 CSS 代码，输出在 head 标签结束之前的 style 标签内'));
		$cssEcho->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($cssEcho);
	$jsEcho = new Typecho_Widget_Helper_Form_Element_Textarea('jsEcho', NULL, NULL, _t('自定义 JavaScript'), _t('填写 JavaScript 代码，输出在 body 标签结束之前'));
		$jsEcho->setAttribute('class', 'col-mb-12 diyhome');
    $form->addInput($jsEcho);
  
   
}
