<?php if($this->options->rewardinstall && $this->options->rewardinstall=1): ?>
<?php else: ?>
<?php if($this->options->reward && $this->options->reward=1): ?>
 <div style="margin: 18px 0 10px 0; width: 100%; font-size:16px; text-align: center;">
    <button id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}">
    <span>打赏</span>
    </button>
    <div id="QR" style="display: none;">
        <div id="wechat" style="display: inline-block">
            <a class="fancybox" rel="group" data-fancybox="gallery" href="<?php $this->options->rewardUrl1(); ?>" class="gallery-link" data-caption="<?php $this->options->rewardName1(); ?>"><img src="<?php $this->options->rewardUrl1(); ?>" alt="<?php $this->options->rewardName1(); ?>"></a>
            <p style="padding-top:5px;">
                <?php $this->options->rewardName1(); ?>
            </p>
        </div>
        <div id="alipay" style="display: inline-block">
            <a class="fancybox" rel="group" data-fancybox="gallery" href="<?php $this->options->rewardUrl2(); ?>" class="gallery-link" data-caption="<?php $this->options->rewardName2(); ?>"><img src="<?php $this->options->rewardUrl2(); ?>" alt="<?php $this->options->rewardName2(); ?>"></a>
            <p style="padding-top:5px;">
                <?php $this->options->rewardName2(); ?>
            </p>
        </div>
         <?php $this->options->rewardDiy(); ?>
    </div>
</div>
<?php else: ?>
   <div style="margin: 18px 0 10px 0; width: 100%; font-size:16px; text-align: center;">
    <button id="rewardButton" disable="enable" onclick="var qr = document.getElementById('QR'); if (qr.style.display === 'none') {qr.style.display='block';} else {qr.style.display='none'}">
    <span>打赏</span>
    </button>
   <div id="QR" style="display: none;">
        <div id="wechat" style="display: inline-block">
            <a class="fancybox" rel="group" data-fancybox="gallery" href="<?php $this->options->rewardUrl1(); ?>" class="gallery-link" data-caption="<?php $this->options->rewardName1(); ?>"><img src="<?php $this->options->rewardUrl1(); ?>" alt="<?php $this->options->rewardName1(); ?>"></a>
            <p style="padding-top:5px;">
                <?php $this->options->rewardName1(); ?>
            </p>
        </div>
        <?php $this->options->rewardDiy(); ?>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>



