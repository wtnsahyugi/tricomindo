<footer id="footer" class="dark">
	<div class="container">
		<div class="footer-widgets-wrap clearfix">
			<div class="row" style="background: url('<?=$this->asset('/images/world-map.png', false)?>') no-repeat center center; background-size: 60%;">

				<div class="col-md-4">
					<div class="widget clearfix">
						<h4>Alamat Kantor</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[8]['value']);?>
						</address>
						<!-- <abbr title="Phone Number"><strong>Phone:</strong></abbr> <?=$this->pocore()->call->posetting[6]['value'];?><br> -->
						<!-- <abbr title="Fax"><strong>Fax:</strong></abbr> <?=$this->pocore()->call->posetting[7]['value'];?><br> -->
						<!-- <abbr title="Email Address"><strong>Email:</strong></abbr> <?=$this->pocore()->call->posetting[5]['value'];?> -->
					</div>
				</div>

				<div class="col-md-4">
					<div class="widget widget_links clearfix">
						<h4>&nbsp;</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[7]['value']);?>
						</address>
					</div>
				</div>

				<div class="col-md-4">
					<div class="widget widget_links clearfix">
						<h4>&nbsp;</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[6]['value']);?>
						</address>
					</div>
				</div>

			</div>
			
			<!-- <div class="col_two_third">
				<div class="widget widget_links clearfix">
					<div style="background: url('<?=$this->asset('/images/world-map.png', false)?>') no-repeat center center; background-size: 100%;">
						<h4>&nbsp;</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[7]['value']);?>
						</address>
					</div>
				</div>
			</div> -->

			<!-- <div class="col_one_third">
				<div class="widget widget_links clearfix">
					<div style="background: url('<?=$this->asset('/images/world-map.png', false)?>') no-repeat center center; background-size: 100%;">
						<h4>&nbsp;</h4>
						<address>
							<?=htmlspecialchars_decode($this->pocore()->call->posetting[6]['value']);?>
						</address>
					</div>
				</div>
			</div> -->

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