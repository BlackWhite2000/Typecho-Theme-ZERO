 <div class="height-60px two-mobile-display-none"></div>
<div class="two-diy">
	  
<div class="two-posts-description">NEW<p class="two-posts-title">最新文章</p><div class="two-pages two-mobile-display-none"><?php $this->pageLink('<i class="fa fa-angle-double-left"></i>'); ?>&nbsp;&nbsp;<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>&nbsp;/&nbsp;<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>&nbsp;&nbsp;<?php $this->pageLink('<i class="fa fa-angle-double-right"></i>','next'); ?></div></div>


<div class="posts">
 <?php if($this->have()):?>
 <?php while($this->next()): ?>
 
 <div class="col-lg-4 two-bw-posts">
<div class="bw-over"><a href="<?php if($this -> fields -> customLink){$this -> fields -> customLink(); }else{ $this -> permalink(); }?>"> 

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


  <div class="bw-over-text two-over-text">

  <span class="posts-title">  <?php $this->sticky(); $this->title() ?></span>
  <p class="posts-text two-bwxyz-text"><?php if (($this->fields->excerpt) == ''): ?>
<?php $this->excerpt(40, '...'); ?>
<?php else: ?>
<?php echo $this->fields->excerpt;?>
<?php endif; ?></p>
<p class="two-bwxyz-category ">
<?php $this->category(',', true, ''); ?><a class="two-bwxyz-time"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<?php $this->dateWord(); ?></a></p> 
</div>
   
    
    
    </a></div>
  </div>
  <?php endwhile; ?>
  <?php endif; ?>
  
  
<div class="clearfloat"></div>

</div>  

   
   <div class="pages two-mobile-display-block two-mobile-pages"><?php $this->pageLink('上一页'); ?>&nbsp;&nbsp;<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>&nbsp;/&nbsp;<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>&nbsp;&nbsp;<?php $this->pageLink('下一页','next'); ?></div> </div>
            
            

