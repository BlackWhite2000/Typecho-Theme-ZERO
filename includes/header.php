<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<!-- 开始 pjax-container -->
 <div id="pjax-container">
 <?php if($this->options->search && $this->options->search=1): ?>
  <div class="search ready">
	    <button class="search-close ready" id="search-close-button"><i class="fa fa-times fa-2x"></i></button>
	    <form method="post" action="">
          <div class="search-form">
		    <input type="text" name="s" class="text" size="32" /> 
			<button type="submit" class="submit">搜索</button>
		  </div>
        </form>
	  </div>
<?php else: ?>
<?php endif; ?>
 	 <div class="mobile-menu ready">
	    <button class="mobile-menu-close ready"><i class="fa fa-times fa-2x"></i></button>
	    <div class="mobile-menu-title">
	   <?php if (($this->options->logoUr1) == ''): ?>
  <div class="logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;"><img src="/usr/themes/ZERO/images/favicon.png" alt="logo">
<?php else: ?>
  <div class="logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;"><img src="<?php $this->options->logoUr1(); ?>" alt="logo">
<?php endif; ?>&nbsp;<span><?php if($setting['name']) echo $setting['name']; else echo $this->options->title; ?></span></a></div></div>

		<div class="mobile-menu-pagelist"><div class="container-fluid">
		<div class="mobile-menu-item"><a href="<?php Utils::index(''); ?>">首页</a></div>
		  <?php $this->widget('Widget_Contents_Page_List')
          ->parse('<div class="mobile-menu-item"><a href="{permalink}">{title}</a></div>'); ?>
          <?php $this->widget('Widget_Metas_Category_List')
          ->parse('<div class="mobile-menu-item"><a href="{permalink}">{name}</a></div>'); ?>
		</div></div>
	  </div>
	  

<header class="header">

<div class="mobile-nav">
	 <button class="search-form-input mobile-nav-search search-button"><i class="fa fa-search"></i></button>
  <button class="mobile-nav-button">
		  <a class="mobile-menu-button"><i class="fa fa-reorder"></i></a>
	  </button>
</div>


<div class="logo mobile-logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;">
	<?php if (($this->options->logoUr1) == ''): ?><img src="/usr/themes/ZERO/images/favicon.png"><?php else: ?><img src="<?php $this->options->logoUr1(); ?>"><?php endif; ?>&nbsp;<span><?php if($setting['name']) echo $setting['name']; else echo $this->options->title; ?></span></a></div>

<div class="header-height-50px"></div>

<div class="nav-header">
        <div class="center">
            <ul class="ul-list">
<?php if (($this->options->logoUr1) == ''): ?>
  <div class="logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;"><img src="/usr/themes/ZERO/images/favicon.png" alt="logo">
<?php else: ?>
  <div class="logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;"><img src="<?php $this->options->logoUr1(); ?>" alt="logo">
<?php endif; ?>&nbsp;<span><?php if($setting['name']) echo $setting['name']; else echo $this->options->title; ?></span></a></div>

            <li><a href="<?php Utils::index(''); ?>" >首页</a></li>
          
            
             <?php $this->widget('Widget_Contents_Page_List')->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            
                <li>
                    <a href="#">分类</a>
                    <ol class="ol-list">
                        <i class="fa fa-sort-desc fa-2x fa-center"></i>
                        <li><?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}">{name}</a>'); ?></li>
                    </ol>
                </li> 
                 <button class="search-form-input nav-search search-button"><i class="fa fa-search"></i></button>
                 
            </ul>
        </div>
    </div>
    
   
   


    </header>
     <div class="header-height-30px"></div>
    