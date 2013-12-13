<?php include("globaloptions.php"); ?>	

<div id="sidebar">
<div id="sidebarHint">MORE</div>
<div id="sidebarScroll">
	<ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('侧边栏') ) : ?>
		去添加小工具吧!
		<?php endif; ?>
	</ul>
</div><!--end sidebarScroll-->
</div><!--end sidebar-->