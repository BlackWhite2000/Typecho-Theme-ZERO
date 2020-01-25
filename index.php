<?php
/**
 * ZERO：零
 * 一款深灰色的主题，也是我的第一款主题
 * 
 * 
 * @package     Typecho-Theme-ZERO
 * @author      BlackWhite
 * @version     1.0.1
 * @link        https://www.bwxyz.top
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<!--页面主要内容-->

<section class="body-content">

 <div class="posts">
 <?php if($this->have()):?>
 <?php while($this->next()): ?>
 <div class="col-lg-6 bw-posts">
<div class="bw-over"><a href="<?php $this->permalink(); ?>"> 

<?php if (($this->fields->banner) == ''): ?>
<?php if($this->options->loading_image && $this->options->loading_image=1): ?>
<img class="lazy" src="/usr/themes/ZERO/images/loading.gif" data-original="<?php echo thumb($this); ?>" alt="banner">
<?php else: ?>
<img src="<?php echo thumb($this); ?>" alt="banner">
<?php endif; ?>
<?php else: ?>
<?php if($this->options->loading_image && $this->options->loading_image=1): ?>
<img class="lazy" src="/usr/themes/ZERO/images/loading.gif" data-original="<?php echo $this->fields->banner;?>" alt="banner">
<?php else: ?>
<img src="<?php echo $this->fields->banner;?>" alt="banner">
<?php endif; ?>
<?php endif; ?>

  <div class="bw-over-text">
  <div class="posts-author posts-date"><i class="fa fa-user"></i> <?php $this->author(); ?>&nbsp  <i class="fa fa-hourglass-2"></i> <?php $this->date('Y/m/d'); ?></div>
  <span class="posts-title">  <?php $this->title(); ?></span>
  <p class="posts-text"><?php if (($this->fields->excerpt) == ''): ?>
<?php $this->excerpt(40, '...'); ?>
<?php else: ?>
<?php echo $this->fields->excerpt;?>
<?php endif; ?></p></div>
    </a></div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
<div class="clearfloat"></div>
</div>  
   
   
                <div class="pages">
                <?php $this->pageLink('上一页'); ?> &nbsp;&nbsp;
                第<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>页 &nbsp;&nbsp;
                总<?php echo   ceil($this->getTotal() / $this->parameter->pageSize); ?>页 &nbsp;&nbsp;
                <?php $this->pageLink('下一页','next'); ?></div>
            </div>
            
            
<?php $this->need('includes/footer.php'); ?>
