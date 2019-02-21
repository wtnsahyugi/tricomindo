<?=$this->layout('index');?>

<section id="content">
		<div class="container clearfix">

			<div class="row">
			<?php if ($this->e($pages['seotitle']) !== 'legalitas') { ?>  
				<div class="col-md-4">
					<!-- Insert Sidebar -->
					<?php 
						switch ($this->e($pages['seotitle'])) {
							case "tentang-kami":
								$this->insert('sidebar_tentang_kami');
								break;

							case "visi-misi":
								$this->insert('sidebar_visi_misi');
								break;

							case "organisasi":
								$this->insert('sidebar_organisasi');
								break;

							case "studi-kawasan-kelayakan":
								$this->insert('sidebar_studi_kawasan');
								break;

							case "perancangan-bangunan":
								$this->insert('sidebar_perancangan_bangunan');
								break;

							case "pengawasan-bangunan":
								$this->insert('sidebar_pengawasan_bangunan');
								break;

							case "manajemen-konstruksi":
								$this->insert('sidebar_manajemen_konstruksi');
								break;

							case "evaluasi-asset":
								$this->insert('sidebar_evaluasi_asset');
								break;

							case "fortofolio-perancangan-bangunan":
								$this->insert('sidebar_ff_perancangan_bangunan');
								break;

							case "fortofolio-pengawasan-bangunan":
								$this->insert('sidebar_ff_pengawasan_bangunan');
								break;

							case "fortofolio-manajemen-konstruksi":
								$this->insert('sidebar_ff_manajemen_konstruksi');
								break;

							case "fortofolio-evaluasi-asset":
								$this->insert('sidebar_ff_evaluasi_asset');
								break;

							default:
								// $this->insert('sidebar');
								break;
						}
					?>
				</div>

				<?php } ?>

				<?php if ($this->e($pages['seotitle']) == 'legalitas') { ?> 
				<div class="col-md-12">
				<?php } else { ?> 
				<div class="col-md-8">
				<?php } ?>
						<div class="heading-block center nobottomborder">
							<h2><?=$this->e($pages['title']);?></h2>
						</div>
						<?php if ($this->e($pages['picture']) != '') { ?>
						<div class="col-md-12 text-center" style="margin-bottom:30px;">
							<img src="<?=BASE_URL.'/'.DIR_CON.'/uploads/'.$this->e($pages['picture']);?>" alt="" />
						</div>
						<?php } ?>
						<div class="col-md-12">
							<?=htmlspecialchars_decode(html_entity_decode($this->e($pages['content'])));?>
						</div>
				</div>
			</div>
		</div>
</section>