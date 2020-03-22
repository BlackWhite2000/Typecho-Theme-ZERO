
<footer class="two-footer">
<div class="container">
  <div class="footer-height-50px"></div>
                <section>
                	<?php if (($this->options->build_time) == ''): ?><p>Copyright © <?php echo date('Y '); ?><?php else: ?><p>Copyright © <?php $this->options->build_time(); ?>-<?php echo date('Y '); ?><?php endif; ?> <a href="#" target=_self><?php $this->author() ?></a></p>
               <?php $this->options->footerleft(); ?>
                </section>
                <section>
                    <p>Powered by <a href="https://typecho.org/" target="_blank">Typecho</a> • <a href="https://www.bwxyz.top/posts/32" target="_blank">Theme ZERO</a></p>
                    <?php $this->options->footerright(); ?>
                    <p><?php echo $setting['footer']; ?></p>
                </section>
            </div>
            <div class="footer-height-50px"></div>
</footer>