<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!-- 开始 pjax-container -->
 <div id="pjax-container">
 <?php if($this->options->zero && $this->options->zero=1): ?>
   <?php $this->need('zero/two/header.php'); ?>
<?php else: ?>
    <?php $this->need('zero/one/header.php'); ?> 
<?php endif; ?>
    