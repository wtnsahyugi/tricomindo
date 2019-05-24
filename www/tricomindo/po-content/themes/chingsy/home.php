<?=$this->layout('index');?>
<section id="content">
	<div class="container clearfix">
		<div class="row">
			<div id="demo" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ul class="carousel-indicators" style="bottom:-20px">
					<li data-target="#demo" data-slide-to="0" class="active"></li>
					<li data-target="#demo" data-slide-to="1"></li>
					<li data-target="#demo" data-slide-to="2"></li>
				</ul>
				<!-- The slideshow -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?=BASE_URL.'/'.DIR_INC;?>/images/header-picture.png" width="100%" alt="Los Angeles">
					</div>
					<div class="item">
						<img src="<?=BASE_URL.'/'.DIR_INC;?>/images/header-picture.png" width="100%" alt="Chicago">
					</div>
					<div class="item">
						<img src="<?=BASE_URL.'/'.DIR_INC;?>/images/header-picture.png" width="100%" alt="Chicago">
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#demo" role="button" data-slide="prev">
					<i class='fa fa-pencil'></i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#demo" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>

			</div>
		</div>
	</div>
</section>
