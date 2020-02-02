<?php
/**
 * ZERO：零
 * 一款深灰色的主题，也是我的第一款主题
 * 
 * 
 * @package     Typecho-Theme-ZERO
 * @author      BlackWhite
 * @version     1.0.5
 * @link        https://www.bwxyz.top
 */
 /** 文章置顶 */
$sticky = $this->options->sticky; //置顶的文章cid，按照排序输入, 请以半角逗号或空格分隔
if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));//分割文本 
    $sticky_html = "<span style='color:red'>[置顶] </span>"; //置顶标题的 html
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    //清空原有文章的列队
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); //避免重复
    }
    if ($order) $select1->order(null,"(case cid$order end)"); //置顶文章的顺序 按 $sticky 中 文章ID顺序
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ //首页第一页才显示
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); //压入列队
    }
$uid = $this->user->uid; //登录时，显示用户各自的私密文章
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); //压入列队
    $this->setTotal($this->getTotal()-count($sticky_cids)); //置顶文章不计算在所有文章内
}
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
  <span class="posts-title">  <?php $this->sticky(); $this->title() ?></span>
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
   
   <div class="pages"><?php $this->pageLink('上一页'); ?>&nbsp;&nbsp;<?php if($this->_currentPage>1) echo $this->_currentPage;  else echo 1;?>&nbsp;/&nbsp;<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>&nbsp;&nbsp;<?php $this->pageLink('下一页','next'); ?></div> </div>
            
            
<?php $this->need('includes/footer.php'); ?>
