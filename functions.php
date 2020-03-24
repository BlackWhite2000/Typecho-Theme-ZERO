<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<?php

require_once("libs/Utils.php");
require_once("libs/Options.php");
require_once("libs/Contents.php");

/**
 * 注册文章解析 hook
 * 具体的解析代码需要在 Contents::parseContent() 方法中实现
 * 解析不会改变数据库中的内容，体现在文章前台输出、RSS 输出时
 */
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('Contents','parseContent');
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('Contents','parseContent');

/**
 * 主题启用时执行的方法
 */
function themeInit() {
    /**
     * 重置某些设置项，采用数据库查询方式完成
     */
    $db = Typecho_Db::get();
    
    /* 关闭评论反垃圾保护，使用 PJAX 时可能需要取消注释以下 4 行 */
     $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsAntiSpam');
     $db->query($query);
     $query = $db->update('table.options')->rows(array('value'=>'0'))->where('name=?', 'commentsCheckReferer');
     $db->query($query);

    /* 设置评论最大嵌套层数 */
    $query = $db->update('table.options')->rows(array('value'=>'999'))->where('name=?', 'commentsMaxNestingLevels');
    $db->query($query);

    /* 强制新评论在前 */
    $query = $db->update('table.options')->rows(array('value'=>'DESC'))->where('name=?', 'commentsOrder');
    $db->query($query);

    /* 默认显示第一页评论 */
    $query = $db->update('table.options')->rows(array('value'=>'first'))->where('name=?', 'commentsPageDisplay');
    $db->query($query);
}

/**
 * 文章与独立页自定义字段
 */
function themeFields(Typecho_Widget_Helper_Layout $layout) {
    $excerpt = new Typecho_Widget_Helper_Form_Element_Textarea('excerpt', NULL, NULL, '文章摘要', '输入自定义摘要。留空自动从文章截取。');
    $excerpt->input->setAttribute('class', 'w-100');
    $layout->addItem($excerpt);
    $thumb = new Typecho_Widget_Helper_Form_Element_Text('banner', NULL, NULL, '文章主图', '留空自动从本地随机调用图片');
    $thumb->input->setAttribute('class', 'w-100');
    $layout->addItem($thumb);
    $customLink = new Typecho_Widget_Helper_Form_Element_Text('customLink', NULL, NULL, '外链跳转', '输入要跳转的外链。');
    $customLink->input->setAttribute('class', 'w-100');
    $layout->addItem($customLink);
    $copy_author = new Typecho_Widget_Helper_Form_Element_Text('copy_author', NULL, NULL, '转载作者', '文章转载自哪个网站，若为原创则留空');
    $copy_author->input->setAttribute('class', 'w-100');
    $layout->addItem($copy_author);
    $copy_link = new Typecho_Widget_Helper_Form_Element_Textarea('copy_link', NULL, NULL, '转载链接', '转载文章的链接，若为原创则留空');
    $copy_link->input->setAttribute('class', 'w-100');
    $layout->addItem($copy_link);

}

/**
 * 获取主题版本号
 */
function themeVersion() {
    $info = Typecho_Plugin::parseInfo(__DIR__ . '/index.php');
    return $info['version'];
}


/** 输出文章缩略图 */
function thumb($obj) {
$rand_num = 20; //根据我们随机图片文件夹中的图片数量
if ($rand_num == 0) {
$imgurl = "/usr/themes/ZERO/images/banner/0.jpg";
//如果$rand_num = 0,则显示默认图片，须命名为"0.jpg"
}else{
$imgurl = "/usr/themes/ZERO/images/banner/".rand(1,$rand_num).".jpg";
// 须按"1.jpg","2.jpg","3.jpg"，一定要安装顺序
}
$attach = $obj->attachments(1)->attachment;
if(isset($attach->isImage) && $attach->isImage == 1){
$thumb = $attach->url;
}else{
$thumb = $imgurl;
}
return $thumb;
}


function isqq($email)
{
    if ($email) {
        if (strpos($email, "@qq.com") !== false) {
            $email = str_replace('@qq.com', '', $email);
            if(is_numeric($email)){
            echo "//q1.qlogo.cn/g?b=qq&nk=" . $email . "&";
            }else{
                $mmail = $email.'@qq.com';
                $email = md5($mmail);
                echo "//cdn.v2ex.com/gravatar/" . $email . "?";
            }
            
        } else {
            $email = md5($email);
            echo "//cdn.v2ex.com/gravatar/" . $email . "?";
        }
    } else {
        echo "//cdn.v2ex.com/gravatar/null?";
     
    }
}
function parse_content($content,$cid,$mail,$login){
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.comments')
    ->where('cid = ?',$cid)
    ->where('mail = ?', $mail)
    ->where('status = ?', 'approved')
    ->limit(1);
    $result = $db->fetchAll($sql);
    if($login || $result) {
        $content = preg_replace("/\{hide\}(.*?)\{\/hide\}/sm",'$1',$content);
    }
    else{
        $content = preg_replace("/\{hide\}(.*?)\{\/hide\}/sm",'<div class="reply2view">您需要<a onclick="window.scrollTo(0, document.documentElement.clientHeight);">回复</a>才能显示此处隐藏内容。</div>',$content);
    }
    return $content;
}
Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('moleft','one');
Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('moleft','one');
class moleft {
    public static function one($con,$obj,$text)
    {
      $text = empty($text)?$con:$text;
      if(!$obj->is('single')){
      $text = preg_replace("/\{hide\}(.*?)\{\/hide\}/sm",'此处内容已隐藏',$text);
      }
      return $text;
    }
}