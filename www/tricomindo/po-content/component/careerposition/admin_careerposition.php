<?php
/*
 *
 * - PopojiCMS Admin File
 *
 * - File : admin_career.php
 * - Version : 1.0
 * - Author : Jenuar Dalapang
 * - License : MIT License
 *
 *
 * Ini adalah file php yang di gunakan untuk menangani proses admin pada halaman karir.
 * This is a php file for handling admin process for career page.
 *
*/

/**
 * Fungsi ini digunakan untuk mencegah file ini diakses langsung tanpa melalui router.
 *
 * This function use for prevent this file accessed directly without going through a router.
 *
*/
if (!defined('CONF_STRUCTURE')) {
	header('location:index.html');
	exit;
}

/**
 * Fungsi ini digunakan untuk mencegah file ini diakses langsung tanpa login akses terlebih dahulu.
 *
 * This function use for prevent this file accessed directly without access login first.
 *
*/
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login'] == 0) {
	header('location:index.php');
	exit;
}

class Careerposition extends PoCore
{

	/**
	 * Fungsi ini digunakan untuk menginisialisasi class utama.
	 *
	 * This function use to initialize the main class.
	 *
	*/
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fungsi ini digunakan untuk menampilkan halaman index karir.
	 *
	 * This function use for index career page.
	 *
	*/
	public function index()
	{
		if (!$this->auth($_SESSION['leveluser'], 'career', 'read')) {
			echo $this->pohtml->error();
			exit;
		}
		?>
		<div class="block-content">
			<div class="row">
				<div class="col-md-12">
					<?=$this->pohtml->headTitle($GLOBALS['_']['component_name']);?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?=$this->pohtml->formStart(array('method' => 'post', 'action' => 'route.php?mod=careerposition&act=multidelete', 'autocomplete' => 'off'));?>
						<?=$this->pohtml->inputHidden(array('name' => 'totaldata', 'value' => '0', 'options' => 'id="totaldata"'));?>
						<?php
							$columns = array(
								array('title' => $GLOBALS['_']['career_position_name'], 'options' => ''),
								array('title' => $GLOBALS['_']['career_position_action'], 'options' => 'class="no-sort" style="width:50px;"')
							);
						?>
						<?=$this->pohtml->createTable(array('id' => 'table-career-position', 'class' => 'table table-striped table-bordered'), $columns, $tfoot = true);?>
					<?=$this->pohtml->formEnd();?>
				</div>
			</div>
		</div>
		<?=$this->pohtml->dialogDelete('careerposition');?>
		<?php
	}

	/**
	 * Fungsi ini digunakan untuk menampilkan data json pada tabel.
	 *
	 * This function use for display json data in table.
	 *
	*/
	public function datatable()
	{
		if (!$this->auth($_SESSION['leveluser'], 'career', 'read')) {
			echo $this->pohtml->error();
			exit;
		}

		$table = 'career_position';
		$primarykey = 'id_career_position';
		$columns = array(
			array('db' => $primarykey, 'dt' => '0', 'field' => $primarykey,
				'formatter' => function($d, $row, $i){
					return "<div class='text-center'>\n
						<input type='checkbox' id='titleCheckdel' />\n
						<input type='hidden' class='deldata' name='item[".$i."][deldata]' value='".$d."' disabled />\n
					</div>\n";
				}
			),
			array('db' => 'career_position_name', 'dt' => '1', 'field' => 'career_position_name'),
			array('db' => $primarykey, 'dt' => '2', 'field' => $primarykey,
				'formatter' => function($d, $row, $i){
					return "<div class='text-center'>\n
						<div class='btn-group btn-group-xs'>\n
							<a class='btn btn-xs btn-danger alertdel' id='".$d."' data-toggle='tooltip' title='{$GLOBALS['_']['action_2']}'><i class='fa fa-times'></i></a>
						</div>\n
					</div>\n";
				}
			)
		);
		
		echo json_encode(SSP::simple($_POST, $this->poconnect, $table, $primarykey, $columns));
	}

	/**
	 * Fungsi ini digunakan untuk menampilkan dan memproses halaman hapus karir.
	 *
	 * This function is used to display and process delete career page.
	 *
	*/
	public function delete()
	{
		if (!$this->auth($_SESSION['leveluser'], 'career', 'delete')) {
			echo $this->pohtml->error();
			exit;
		}

		if (!empty($_POST)) {
			$query_career = $this->podb->deleteFrom('career_position')->where('id_career_position', $this->postring->valid($_POST['id'], 'sql'));
			$query_career->execute();
			$this->poflash->success($GLOBALS['_']['position_message_2'], 'admin.php?mod=careerposition');
		}
	}

	/**
	 * Fungsi ini digunakan untuk menampilkan dan memproses halaman hapus multi karir.
	 *
	 * This function is used to display and process multi delete career page.
	 *
	*/
	public function multidelete()
	{
		if (!$this->auth($_SESSION['leveluser'], 'career', 'delete')) {
			echo $this->pohtml->error();
			exit;
		}
		if (!empty($_POST)) {
			$totaldata = $this->postring->valid($_POST['totaldata'], 'xss');
			if ($totaldata != "0") {
				$items = $_POST['item'];
				foreach($items as $item){
					
					$query_career = $this->podb->deleteFrom('career_position')->where('id_career_position', $this->postring->valid($item['deldata'], 'sql'));
					$query_career->execute();
				}
				$this->poflash->success($GLOBALS['_']['position_message_2'], 'admin.php?mod=careerposition');
			} else {
				$this->poflash->error($GLOBALS['_']['position_message_4'], 'admin.php?mod=careerposition');
			}
		}
	}


	/**
	 * Fungsi ini digunakan untuk menampilkan dan memproses halaman add career position.
	 *
	 * This function is used to display and process add career position page.
	 *
	*/
	public function addnew()
	{
		if (!$this->auth($_SESSION['leveluser'], 'career', 'create')) {
			echo $this->pohtml->error();
			exit;
		}
		if (!empty($_POST)) {
			$career_position_name = $this->postring->valid($_POST['career_position_name'],'xss');
			
			$data = array(
				'career_position_name' => $career_position_name
			);
			$query_tag = $this->podb->insertInto('career_position')->values($data);
			$query_tag->execute();
				
			$this->poflash->success($GLOBALS['_']['position_message_1'], 'admin.php?mod=careerposition');
		}
		?>
		<div class="block-content">
			<div class="row">
				<div class="col-md-12">
					<?=$this->pohtml->headTitle($GLOBALS['_']['position_addnew']);?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?=$this->pohtml->formStart(array('method' => 'post', 'action' => 'route.php?mod=careerposition&act=addnew', 'autocomplete' => 'off'));?>
						<div class="row">
							<div class="col-md-12">
								<?=$this->pohtml->inputText(array('type' => 'text', 'label' => $GLOBALS['_']['component_name'], 'name' => 'career_position_name', 'id' => 'career_position_name', 'mandatory' => true, 'options' => 'required'));?>
								<?=$this->pohtml->formAction();?>
							</div>
						</div>
					<?=$this->pohtml->formEnd();?>
				</div>
			</div>
		</div>
		<?php
	}

}