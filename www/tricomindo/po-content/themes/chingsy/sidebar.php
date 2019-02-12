<div class="line hidden-lg hidden-md"></div>

<div class="sidebar-widgets-wrap clearfix">

	<div class="widget widget_links clearfix">
		<h4><?=$this->e($front_categories);?></h4>
		<div class="col_half nobottommargin col_last">
			<ul>
			<?php
				$categorys_side = $this->category()->getAllCategory(WEB_LANG_ID);
				foreach($categorys_side as $category_side){
			?>
				<li><a href="<?=BASE_URL;?>/category/<?=$category_side['seotitle'];?>"><?=$category_side['title'];?></a></li>
			<?php } ?>
			</ul>
		</div>
	</div>

	<div class="widget clearfix">
		<img class="alignleft" src="<?=BASE_URL;?>/<?=DIR_CON;?>/uploads/ad-square.png" alt="">
	</div>

</div>