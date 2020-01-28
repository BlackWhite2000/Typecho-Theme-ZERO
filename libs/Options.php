<?php
function themeConfig($form) {
	$ver = themeVersion();
        $themeDir = "/usr/themes/ZERO/";
	echo '<div class="ZERO">
	<h1 style="margin: 1em 0px -0.4em 0;">ZERO 主题设置面板</h1>
	<p>欢迎使用 ZERO 主题，目前版本是：'. $ver .' <br>
	作者博客：<a href="https://www.bwxyz.top"  target="_blank">BlackWhite</a> | 帮助文档：<a href="https://github.com/BlackWhite2000/Typecho-Theme-ZERO"  target="_blank">Github</a> | 问题反馈：<a href="https://www.bwxyz.top/posts/32"  target="_blank">Blog</a>
	</p>
	</div>';
	?>
	 <h2>用前须知</h2>
	 <p>关于代码高亮：代码高亮是用了 <a href="https://github.com/Xcnte/Code-Prettify-for-typecho"  target="_blank">CodePrettify</a> 插件，主题本身已内嵌，所以无需下载插件。</p>
	 <p>关于返回顶部：返回顶部是用了 <a href="https://qqdie.com/archives/typecho-to-return-to-the-top-of-the-plug-in-i-first-ran-and-eggs.html"  target="_blank">gotop</a> 插件，主题本身已内嵌，所以无需下载插件。</p>
	 <p>关于博客框架：框架采用了 <a href="https://github.com/AlanDecode/typecho-theme-dev-framework"  target="_blank">typecho-theme-dev-framework</a>。</p>
	 <p>博客还有其他一些代码都是通过学习参考了网上很多大佬来的。</p>
	 <p>建议导航栏页面总共不要超过5-6个，太多会挤，在未来我会考虑下级菜单的应用。</p>
	 <p>考虑到我一直是用笔记本搭建的，对于大屏幕可能没有适配好尺寸，如果遇到了请跟我说。</p>
	 <h2>如果你想支持我，我当然会非常开心~</h2>
	<div><img src="../usr/themes/ZERO/images/jz/alipay.jpg" style="width: 20%;" alt="支付宝">支付宝<img src="../usr/themes/ZERO/images/jz/wechat.png" style="width: 20%;" alt="微信">微信</div>
	<?php

	//logo
	$logoUrl= new Typecho_Widget_Helper_Form_Element_Text('logoUr1', NULL, NULL, _t('<h2>自定义</h2>LOGO'), _t('请填写 LOGO 在线链接, 留空则调用本地资源。本地路径/usr/themes/ZERO/images/favicon.png'));
    $form->addInput($logoUrl);
	  
    //文章置顶
    $sticky = new Typecho_Widget_Helper_Form_Element_Text('sticky', NULL,NULL, _t('文章置顶'), _t('置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔'));
    $form->addInput($sticky);

    //font
	$font = new Typecho_Widget_Helper_Form_Element_Select('font',array('0'=>'关闭','1'=>'开启'),'1','特殊字体 是否开启','显示在顶部底部，会占用约4.3m资源，字体有版权不能商用，除非有授权');
    $form->addInput($font);
    
    //pjax
	$pjax = new Typecho_Widget_Helper_Form_Element_Select('pjax',array('0'=>'关闭','1'=>'开启'),'1','Pjax 预加载 是否开启','Pjax 预加载功能的开关');
    $form->addInput($pjax);
	$pjax_complete = new Typecho_Widget_Helper_Form_Element_Textarea('pjax_complete', NULL, NULL, _t('完成后执行事件'), _t('Pjax 跳转页面后执行的事件，写入 js 代码，一般将 Pjax 重载(回调)函数写在这里。'));
    $form->addInput($pjax_complete);
    
    //LoadingImage
	$loading_image = new Typecho_Widget_Helper_Form_Element_Select('loading_image',array('0'=>'关闭','1'=>'开启'),'1','首页图片懒加载 是否开启','图片懒加载是否开启，不开启则直接显示图片。懒加载图片路径/usr/themes/ZERO/images/loading.gif。<br>这个设置只对首页起效果，文章的懒加载默认开启无法改变，但懒加载图片路径是一样的。');
    $form->addInput($loading_image);
    
    //SiteBuildTime
    $buildTime = new Typecho_Widget_Helper_Form_Element_Text('build_time', NULL, NULL, _t('在页脚输出建站年份'), _t('请直接填写年份，如 2020，留空则单纯显示最新年份'));
    $form->addInput($buildTime);
    
    //search
    $search = new Typecho_Widget_Helper_Form_Element_Select('search',array('0'=>'关闭','1'=>'开启'),'1','是否开启搜索功能','适用于想使用搜索插件以防冲突的');
    $form->addInput($search);
    
    //reward
    $rewardinstall = new Typecho_Widget_Helper_Form_Element_Select('rewardinstall',array('0'=>'开启','1'=>'关闭'),'1','是否开启打赏功能','不开启下面无需填');
    $form->addInput($rewardinstall);
	$reward = new Typecho_Widget_Helper_Form_Element_Select('reward',array('0'=>'一种','1'=>'两种'),'1','开启几种打赏方式','最多支持两种');
    $form->addInput($reward);
    $rewardUrl1 = new Typecho_Widget_Helper_Form_Element_Text('rewardUrl1', NULL, NULL, _t('填写第一种二维码图片链接 (如果开启)'), _t('支持本地链接，如"/usr/themes/ZERO/images/文件名.jpg"'));
    $form->addInput($rewardUrl1);
    $rewardName1 = new Typecho_Widget_Helper_Form_Element_Text('rewardName1', NULL, NULL, _t('填写第一种二维码支付方式 (如果开启)'), _t('如“微信”或者“支付宝”，不填不显示，不填的话第二种支付方式也不能填，否则会错位'));
    $form->addInput($rewardName1);
    $rewardUrl2 = new Typecho_Widget_Helper_Form_Element_Text('rewardUrl2', NULL, NULL, _t('填写第二种二维码图片链接 (如果开启)'), _t('支持本地链接，如"/usr/themes/ZERO/images/文件名.jpg"'));
    $form->addInput($rewardUrl2);
    $rewardName2 = new Typecho_Widget_Helper_Form_Element_Text('rewardName2', NULL, NULL, _t('填写第二种二维码支付方式 (如果开启)'), _t('如“微信”或者“支付宝”，不填不显示，不填的话第一种支付方式也不能填，否则会错位'));
    $form->addInput($rewardName2);
     $rewardDiy = new Typecho_Widget_Helper_Form_Element_Textarea('rewardDiy', NULL, NULL, _t('填写打赏方式自定义内容 (如果开启)'), _t('可以写自定义html，将输出在二维码下方，二维码不填的话只输出自定义内容'));
    $form->addInput($rewardDiy);
	//developer
	$headerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('headerEcho', NULL, NULL, _t('<h2>开发者设置</h2>自定义头部信息'), _t('填写 html 代码，将输出在 &lt;head&gt; 标签中，可以在这里写上统计代码'));
    $form->addInput($headerEcho);
    $footerEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerEcho', NULL, NULL, _t('自定义页脚最底部信息'), _t('填写 html 代码，通常用来引用 JavaScript'));
    $form->addInput($footerEcho);
	$footerleftEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerleft', NULL, NULL, _t('自定义页脚左部分信息'), _t('填写 html 代码，将输出在页脚的版权信息后面'));
	$form->addInput($footerleftEcho);
	$footerrightEcho = new Typecho_Widget_Helper_Form_Element_Textarea('footerright', NULL, NULL, _t('自定义页脚右部分信息'), _t('填写 html 代码，将输出在页脚的版权信息后面'));
    $form->addInput($footerrightEcho);
	$cssEcho = new Typecho_Widget_Helper_Form_Element_Textarea('cssEcho', NULL, NULL, _t('自定义 CSS'), _t('填写 CSS 代码，输出在 head 标签结束之前的 style 标签内'));
    $form->addInput($cssEcho);
	$jsEcho = new Typecho_Widget_Helper_Form_Element_Textarea('jsEcho', NULL, NULL, _t('自定义 JavaScript'), _t('填写 JavaScript 代码，输出在 body 标签结束之前'));
    $form->addInput($jsEcho);
    
   
}
