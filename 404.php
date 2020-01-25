<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>


<!--页面主要内容-->
<main class="wrapper container post-404">
	  <div class="contents-wrap">
   <div id="container"></div>
    <script src="https://cdn.yyvhc.com/js/404.js"></script>
    <script>
     initRunner('#container');
    </script>
<h1>404</h1>  
<h3>服务器上找不到对应的文件</h3>  
<p>可能该文件已经被我删辣~~~<br> 
<a href="<?php $this->options->SiteUrl(); ?>" class="button error-button no-line">点我返回首页</a>
</p> 
		
	  </div>
	</main>

<?php $this->need('includes/footer.php'); ?>