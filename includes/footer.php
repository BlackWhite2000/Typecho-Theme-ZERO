<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
</div><!-- 结束 pjax-container -->

<footer class="footer">
<div class="container">
  <div class="footer-height-50px"></div>
                <section class="footer-float-left footer-align-center">
                	<?php if (($this->options->build_time) == ''): ?><p>Copyright © <?php echo date('Y '); ?><?php else: ?><p>Copyright © <?php $this->options->build_time(); ?>-<?php echo date('Y '); ?><?php endif; ?> <a href="#" target=_self><?php $this->author() ?></a></p>
               <?php $this->options->footerleft(); ?>
                </section>
                <section class="footer-float-right footer-align-center">
                    <p>Powered by <a href="https://typecho.org/" target="_blank">Typecho</a> • <a href="https://www.bwxyz.top/posts/32" target="_blank">Theme ZERO</a></p>
                    <?php $this->options->footerright(); ?>
                    <p><?php echo $setting['footer']; ?></p>
                </section>
            </div>
            <div class="footer-height-60px"></div>
</footer>

<!--引入jquery.js-->
<script src="<?php Utils::indexTheme('js/jquery-3.4.1.min.js'); ?>"></script>
<!--引入js-->
<script src="<?php Utils::indexTheme('js/ZERO.js?v=1.0.0'); ?>"></script>
<!--引入clipboard、prism.js-->
<script src="<?php Utils::indexTheme('js/clipboard.min.js'); ?>"></script>
<script src="<?php Utils::indexTheme('js/prism.js'); ?>"></script>
<!--引入fancybox.js-->
<script src="<?php Utils::indexTheme('js/jquery.fancybox.min.js'); ?>"></script>
<!--引入nprogress.js-->
<script src="<?php Utils::indexTheme('js/nprogress.js'); ?>"></script>
<?php if($this->options->pjax && $this->options->pjax!=0) :?>
<!--引入jquery.pjax.js-->
<script src="<?php Utils::indexTheme('js/jquery.pjax.min.js'); ?>"></script>
<script>
//pjax 刷新
$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
    container: '#pjax-container',
    fragment: '#pjax-container',
    timeout: 8000
}).on('pjax:send',
function() {
NProgress.start();
}).on('pjax:complete',
function() {
NProgress.done();
$("img.lazy").lazyload({
            effect: "fadeIn",
            threshold: 2000
        });
if (typeof Prism !== 'undefined') {
Prism.highlightAll(true,null);}
var a=$('.dalao >.link-box'),b=$('.dalao > .link-box > .link-box-area').toArray();while(b.length)a.prepend(b.splice(~~(Math.random()*b.length),1)[0]);
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
$('.container').addClass('animated fadeIn');
<?php $this->options->pjax_complete(); ?>
}); 
</script>
<?php endif; ?>
<!--引入jquery.lazyload.js-->
<script src="<?php Utils::indexTheme('js/jquery.lazyload.min.js'); ?>"></script>
<?php $this->options->footerEcho(); ?>
<script><?php $this->options->jsEcho(); ?></script>
<div class="go-top dn" id="go-top"><a href="javascript:;" class="go"><i class="fa fa-arrow-up" aria-hidden="true"></i></a></div>
<?php $this->footer(); ?>
</body>
</html>
