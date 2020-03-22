 <?php if($this->options->diyavatar && $this->options->diyavatar=1): ?>
   <?php $this->need('includes/comments3.php'); ?>
<?php else: ?>
    <?php $this->need('includes/comments2.php'); ?>
<?php endif; ?>
