<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<!--页面主要内容-->
 <!-- <title hidden>
        <?php Contents::title($this); ?>
    </title>-->
    <?php if($this->options->zero && $this->options->zero=1): ?>
   <div class="height-80px two-mobile-display-none"></div>
<?php else: ?>
<?php endif; ?>
  <div class="wrapper container">
        <div class="contents-wrap"> <!--start .contents-wrap-->
        
            <section id="post" class="float-up">
                <article class="post yue" itemscope itemtype="http://schema.org/Article">
                    <h1 hidden itemprop="name"><?php $this->title(); ?></h1>
                    <span hidden itemprop="author"><?php $this->author(); ?></span>
                    <time hidden datetime="<?php echo date('c', $this->created); ?>" itemprop="datePublished"><?php echo date('Y-m-d', $this->created); ?></time>

                    <p <?php if($this->fields->excerpt=='' || !$setting['showHeadlineInPost']) echo 'hidden'?> class="headline" itemprop="headline"><?php if($this->fields->excerpt!='') echo $this->fields->excerpt; else $this->excerpt(30); ?></p>

               

                  

                    <div itemprop="articleBody" class="full">
                        <?php $this->content(); ?>
                    </div>
                    
               

              
          
              
                    <div hidden itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="<?php echo $this->options->title; ?>">
                        <meta itemprop="url" content="<?php $this->options->siteUrl(); ?>">
                        <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                            <meta itemprop="url" content="<?php Utils::gravatar($this->author->mail, 256, ''); ?>">
                        </div>
                    </div>
                   
                </article>
                  
                    
            </section>
                   <!--评论区，可选-->
                <?php $this->need('includes/comments.php'); ?>
  </div> </div>  

<?php $this->need('includes/footer.php'); ?>