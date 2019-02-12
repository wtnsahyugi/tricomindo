
<header id="header" class="sticky-style-2">
	<div class="container clearfix">
		<div id="logo">
			<a href="<?=BASE_URL;?>" class="standard-logo" data-dark-logo="<?=BASE_URL.'/'.DIR_INC;?>/images/logo.png"><img src="<?=BASE_URL.'/'.DIR_INC;?>/images/logo.png" alt="Logo" /></a>
			<a href="<?=BASE_URL;?>" class="retina-logo" data-dark-logo="<?=BASE_URL.'/'.DIR_INC;?>/images/logo.png"><img src="<?=BASE_URL.'/'.DIR_INC;?>/images/logo.png" alt="Logo" /></a>
		</div>
		<div class="top-advert">
			<img src="<?=BASE_URL;?>/<?=DIR_CON;?>/uploads/ad-long.jpg" alt="">
		</div>
	</div>

	<div id="header-wrap">
		<nav id="primary-menu" class="style-2">
			<div class="container clearfix">
				<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
				<?php
					echo $this->menu()->getFrontMenu(WEB_LANG, '', '', '');
				?>
				<div id="top-search">
					<a href="javascript:void(0)" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
					<form action="<?=BASE_URL;?>/search" method="post">
						<input type="text" name="search" class="form-control" value="" placeholder="<?=$this->e($front_search);?>...">
					</form>
				</div>
			</div>
		</nav>
	</div>
</header>