<form action="<?php bloginfo('url'); ?>" class="searchform" method="get">
	<input class="searchinput" type="text" placeholder="<?php echo esc_attr(__('search ...','scapegoat')); ?>" name="s">
	<button type="submit" name="submit" class="searchsubmit">
		<i class="fa fa-search"></i>
	</button>
	<div class="clear"></div>
</form>