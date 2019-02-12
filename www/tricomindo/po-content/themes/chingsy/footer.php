<footer id="footer" class="dark">
	<div class="container">
		<div class="footer-widgets-wrap clearfix">
			<div class="col_one_third">
				<div class="widget clearfix">
					<div style="background: url('<?=$this->asset('/images/world-map.png', false)?>') no-repeat center center; background-size: 100%;">
						<h4>Alamat Kantor</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[8]['value']);?>
						</address>
						<!-- <abbr title="Phone Number"><strong>Phone:</strong></abbr> <?=$this->pocore()->call->posetting[6]['value'];?><br> -->
						<!-- <abbr title="Fax"><strong>Fax:</strong></abbr> <?=$this->pocore()->call->posetting[7]['value'];?><br> -->
						<!-- <abbr title="Email Address"><strong>Email:</strong></abbr> <?=$this->pocore()->call->posetting[5]['value'];?> -->
					</div>
				</div>
			</div>
			<div class="col_one_third">
				<div class="widget widget_links clearfix">
					<div style="background: url('<?=$this->asset('/images/world-map.png', false)?>') no-repeat center center; background-size: 100%;">
						<h4>&nbsp;</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[7]['value']);?>
						</address>
					<!-- <h4><?=$this->e($front_quick_link);?></h4>
					<ul>
						<li><a href="<?=BASE_URL;?>/category/indonesiaku"><?=$this->e($front_indonesia);?></a></li>
						<li><a href="<?=BASE_URL;?>/category/motivasi"><?=$this->e($front_motivation);?></a></li>
						<li><a href="<?=BASE_URL;?>/category/hubungan"><?=$this->e($front_relationship);?></a></li>
						<li><a href="<?=BASE_URL;?>/category/sukses"><?=$this->e($front_success);?></a></li>
						<li><a href="<?=BASE_URL;?>/album"><?=$this->e($front_gallery);?></a></li>
						<li><a href="<?=BASE_URL;?>/contact"><?=$this->e($front_contact);?></a></li>
					</ul> -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="copyrights">
		<div class="container clearfix">
			<div class="col_half">
				Copyrights &copy; <?=date('Y');?> All Rights Reserved by <?=$this->pocore()->call->posetting[0]['value'];?><br>
				<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
			</div>
			<div class="col_half col_last tright">
				<div class="clear"></div>
				<i class="icon-envelope2"></i> <?=$this->pocore()->call->posetting[5]['value'];?>
			</div>
		</div>
	</div>
</footer>