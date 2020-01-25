
<?php if (($this->fields->copy_author) == ''): ?>
<div class="copyright">
    <blockquote><p>《<?php $this->title(); ?>》由
        <a href="<?php $this->options->siteUrl();?>" title="<?php $this->options->title();?>" target="_blank">
            <?php $this->author(); ?></a> 采用 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh" target="_blank">知识共享署名 4.0 国际许可协议</a> 进行许可,
      转载请注明出处
        <a href="<?php $this->permalink();?>" title="<?php $this->title();?>">
            <?php $this->permalink();?></a></p></blockquote>
    
</div>
<?php else: ?>
<div class="copyright">
<blockquote> <p>本文主要内容转载自 <a href="<?php echo $this->fields->copy_link;?>" rel="nofollow" title="文章来源：<?php echo $this->fields->copy_link;?>" target="_blank"><?php echo $this->fields->copy_author;?></a>，仅供用于学习和交流，若有侵权请邮件联系本站！<a href="mailto:<?php $this->author('mail'); ?> " target="_blank"><?php $this->author('mail'); ?> </a>
    </p></blockquote>
</div>
<?php endif; ?>