<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function threadedComments($comments, $options)
{
  $commentClass = '';
  if ($comments->authorId) {
    if ($comments->authorId == $comments->ownerId) {
      $commentClass .= ' comment-by-author';
    } else {
      $commentClass .= ' comment-by-user';
    }
  }
  $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
  if ($comments->url) {
    $author = '<a href="' . $comments->url . '"' . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
  } else {
    $author = $comments->author;
  }
  ?>
  <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
  if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
  } else {
    echo ' comment-parent';
  }
  $comments->alt(' comment-odd', ' comment-even');
  echo $commentClass;
  ?>">
    <div id="<?php $comments->theId(); ?>">
      <div class="comments-body">
        <?php $avatar = '//sdn.geekzu.org/avatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d='; ?>
        <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>"/>
        <div class="line"></div>
        <div class="comment_main">
          <div class="comment_meta">
            <span class="comment_author "><?php echo $author ?></span> <span
              class="comment_time <?php echo $commentClass; ?>"> <?php $comments->date('Y-m-d H:i'); ?></span><span
              class="comment_reply comment-form-display"><i class="fa fa-reply" aria-hidden="true" name="回复"><?php $comments->reply() ?></i></span>
          </div>
          <div class="comment_content">
             <?php
                $cos = preg_replace('#\@\((.*?)\)#','<img src="'.$GLOBALS['theme_url'].'/usr/themes/ZERO/images/OwO/paopao/$1.png" class="biaoqing">',$comments->content);
                echo $cos;
              ?>
          </div>

        </div>
      </div>
    </div>
    <?php if ($comments->children) { ?>
      <div class="comment-children"><?php $comments->threadedComments($options); ?></div><?php } ?>
  </li>
<?php } ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>	
  
    



 
  <blockquote><p><?php $this->commentsNum(_t('暂无评论'), _t('已有 1 条评论'), _t('已有 %d 条评论')); ?></p></blockquote>
    

    <?php if($this->allow('comment')): ?>
    <div class="">
    <div id="<?php $this->respondId(); ?>" class="respond">
   
    
  
    	<form method="post" action="<?php $this->commentUrl() ?>" class="comment-form" role="form">
    		     
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
            
    		<div class="comment-form-meta">
               
    			<input type="text" name="author" id="author" class="text" placeholder="<?php _e('你叫？'); ?>" value="<?php $this->remember('author'); ?>" required />
    	
    			<input type="email" name="mail" id="mail" class="text" placeholder="<?php _e('邮箱是？'); ?>" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    	
                
    			<input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    	</div>
            <?php endif; ?>
          
    		<p class="form-textarea"><textarea rows="8" cols="50" name="text" id="textarea" class="textarea OwO-textarea" placeholder="<?php _e('欢迎一起交流~ 评论时候可能会出现短暂的加载，请不要频繁的刷评论~'); ?>" required ><?php $this->remember('text'); ?></textarea></p>
    		<div class="form-0w0 clear">  <div class="OwO-logo" onclick="OwO_show()">    <a>表情</a>  </div>
    	   <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
         	<div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
         	</div>
         	   <div id="OwO-container"><?php  $this->need('owo.php'); ?></div>
    	</form>
    </div><?php if ($comments->have()): ?>

   <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
        
 
    <?php endif; ?>
</div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
