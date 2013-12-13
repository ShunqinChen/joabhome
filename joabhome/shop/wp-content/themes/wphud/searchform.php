<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<label class="hidden" for="s"><?php _e('搜索:'); ?></label>
		<input type="text" value="关键词...." onfocus="this.value=''; this.onfocus=null;" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="我搜!" />
        
</form>