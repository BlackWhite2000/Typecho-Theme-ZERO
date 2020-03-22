<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>



<!--页面主要内容-->
 <?php if($this->options->zero && $this->options->zero=1): ?>
   
   <?php $this->need('zero/two/archive.php'); ?>
<?php else: ?>
    <?php $this->need('zero/one/archive.php'); ?> 
<?php endif; ?>

<?php $this->need('includes/footer.php'); ?>
