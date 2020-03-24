<div class="height-60px two-mobile-display-none"></div>
<div class="two-banner-description two-mobile-display-none"><?php if (($this->options->twobannerdescription) == ''): ?><?php $this->options->description() ?><?php else: ?><?php $this->options->twobannerdescription(); ?><?php endif; ?><p class="two-banner-title"><?php if (($this->options->twobannertitle) == ''): ?><?php $this->options->title() ?><?php else: ?><?php $this->options->twobannertitle(); ?><?php endif; ?></p></div>
<div class="two-submit-diy two-mobile-display-none"><form method="post" action=""> <div class="search-form"> <input type="text" name="s" class="text" size="32" placeholder=" 搜索你想要的内容"> <button type="submit" class="submit"><i class="fa fa-search" aria-hidden="true"></i></button> </div> </form></div>

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
  	
	<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>
<?php if ($categorys->levels === 0): ?>
<?php $children = $categorys->getAllChildren($categorys->mid); ?>
<?php if (empty($children)) { ?>
<div class="mobile-menu-item">
<a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
</div>
<?php } else { ?>

					<?php foreach ($children as $mid) { ?>
<?php $child = $categorys->getCategory($mid); ?>
					<div class="mobile-menu-item">
					<a href="<?php echo $child['permalink'] ?>" class="dropdown-item <?php if($this->is('category', $mid)): ?>active<?php endif; ?>"><?php echo $child['name']; ?></a>	</div>
			<?php } ?>
	<?php } ?><?php endif; ?><?php endwhile; ?>
		</div></div>
	  </div>
	  
<div class="mobile-nav">
	 <button class="search-form-input mobile-nav-search search-button"><i class="fa fa-search"></i></button>
  <button class="mobile-nav-button">
		  <a class="mobile-menu-button"><i class="fa fa-reorder"></i></a>
	  </button>
</div>


<div class="logo mobile-logo"> <a href="<?php Utils::index(''); ?>" style="text-decoration:none;">
	<?php if (($this->options->logoUr1) == ''): ?><img src="/usr/themes/ZERO/images/favicon.png"><?php else: ?><img src="<?php $this->options->logoUr1(); ?>"><?php endif; ?>&nbsp;<span><?php if($setting['name']) echo $setting['name']; else echo $this->options->title; ?></span></a></div>
	  


  <div class="height-30px two-mobile-display-none"></div>
<div class="two-nav two-mobile-display-none">
<div class="two-index-nav">
	<div class="two-nav-frame-line active" tabindex="-1">
		<a href="<?php Utils::index(''); ?>" >首页</a>
		</div>
		

	<?php $this->widget('Widget_Contents_Page_List')->parse('<div class="two-nav-frame-line active" tabindex="-1"><a href="{permalink}">{title}</a></div>'); ?>
		
	<?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
<?php while($categorys->next()): ?>
<?php if ($categorys->levels === 0): ?>
<?php $children = $categorys->getAllChildren($categorys->mid); ?>
<?php if (empty($children)) { ?>
<div class="two-nav-frame-line active" tabindex="-1">
<a href="<?php $categorys->permalink(); ?>"><?php $categorys->name(); ?></a>
</div>
<?php } else { ?>


		<div class="two-nav-frame-line active" tabindex="-1">
	<a href="#"><?php $categorys->name(); ?></a>
			<div class="two-nav-frame-line-center">
					<?php foreach ($children as $mid) { ?>
<?php $child = $categorys->getCategory($mid); ?>
				<div class="two-nav-frame-line-li">
					<a href="<?php echo $child['permalink'] ?>" class="dropdown-item <?php if($this->is('category', $mid)): ?>active<?php endif; ?>"><?php echo $child['name']; ?></a>
				</div>	<?php } ?>
			
			</div>
		
		</div><?php } ?><?php endif; ?><?php endwhile; ?>
	
		
		</div>
    

</div>

   

