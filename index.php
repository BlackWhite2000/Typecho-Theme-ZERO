<?php
/**
 * ZERO：零
 * 一款深灰色的主题，也是我的第一款主题
 * 
 * 
 * @package     Typecho-Theme-ZERO
 * @author      BlackWhite
 * @version     2.0.3
 * @link        https://www.bwxyz.top
 */
$sticky = $this->options->sticky;
if($sticky && $this->is('index') || $this->is('front')){
    $sticky_cids = explode(',', strtr($sticky, ' ', ','));
    $sticky_html = "<span style='color:red'>[置顶] </span>"; 
    $db = Typecho_Db::get();
    $pageSize = $this->options->pageSize;
    $select1 = $this->select()->where('type = ?', 'post');
    $select2 = $this->select()->where('type = ? && status = ? && created < ?', 'post','publish',time());
    $this->row = [];
    $this->stack = [];
    $this->length = 0;
    $order = '';
    foreach($sticky_cids as $i => $cid) {
        if($i == 0) $select1->where('cid = ?', $cid);
        else $select1->orWhere('cid = ?', $cid);
        $order .= " when $cid then $i";
        $select2->where('table.contents.cid != ?', $cid); 
    }
    if ($order) $select1->order(null,"(case cid$order end)");
    if ($this->_currentPage == 1) foreach($db->fetchAll($select1) as $sticky_post){ 
        $sticky_post['sticky'] = $sticky_html;
        $this->push($sticky_post); 
    }
$uid = $this->user->uid;
    if($uid) $select2->orWhere('authorId = ? && status = ?',$uid,'private');
    $sticky_posts = $db->fetchAll($select2->order('table.contents.created', Typecho_Db::SORT_DESC)->page($this->_currentPage, $this->parameter->pageSize));
    foreach($sticky_posts as $sticky_post) $this->push($sticky_post); 
    $this->setTotal($this->getTotal()-count($sticky_cids));
}
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('includes/head.php');
$this->need('includes/header.php');
?>

<!--页面主要内容-->

<section class="body-content">
    
<?php if($this->options->zero && $this->options->zero=1): ?>
   <?php $this->need('zero/two/index.php'); ?>
<?php else: ?>
    <?php $this->need('zero/one/index.php'); ?> 
<?php endif; ?>

            
<?php $this->need('includes/footer.php'); ?>
