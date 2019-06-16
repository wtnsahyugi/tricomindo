<?php
/*
 *
 * - PopojiCMS Front End File
 *
 * - File : karir.php
 * - Version : 1.0
 * - Author : Jenuar Dalapang
 * - License : MIT License
 *
 *
 * Ini adalah file php yang di gunakan untuk menangani proses di bagian depan untuk halaman kontak.
 * This is a php file for handling front end process for contact page.
 *
*/

/**
 * Router untuk memproses request $_POST[] komentar.
 *
 * Router for process request $_POST[] comment.
 *
*/
$router->match('GET|POST', '/karir', function() use ($core, $templates) {
	$alertmsg = '';
	$lang = $core->setlang('contact', WEB_LANG);
	$errorMessage = ''; 
	if (!empty($_POST)) {
		require_once(DIR_INC.'/core/vendor/recaptcha/recaptchalib.php');
		$secret = $core->posetting[22]['value'];
		$recaptcha = new PoReCaptcha($secret);
		if (!empty($_POST["g-recaptcha-response"])) {
			$resp = $recaptcha->verifyResponse(
				$_SERVER["REMOTE_ADDR"],
				$_POST["g-recaptcha-response"]
			);
			if ($resp != null && $resp->success) {
				$core->poval->validation_rules(array(
					'career_name' => 'required|max_len,100',
					'career_position' => 'required|max_len,255',
					'career_message' => 'required'
				));
				$core->poval->filter_rules(array(
					'career_name' => 'trim|sanitize_string',
					'career_position' => 'trim|sanitize_string',
					'career_message' => 'trim|sanitize_string'
				));
				$validated_data = $core->poval->run($_POST);
				
				$isValidFile = true;
				$fileErrorMsg = '';
				
				if (!isset($_FILES['career_attachment']) || empty($_FILES['career_attachment']['tmp_name'])) {
					$isValidFile = false;
					$fileErrorMsg = "Mungkin ukuran file yang anda upload melebihi ukuran maksimal yang diperkenankan";
				}
				
				if (
					(!isset($_FILES['career_attachment']['error']) ||
					is_array($_FILES['career_attachment']['error'])) && $isValidFile
				) {
					// return false;
					$isValidFile = false;
					$fileErrorMsg = "Terjadi kesalahan saat mengupload file";
				}
				// You should also check filesize here. 
				if ($_FILES['career_attachment']['size'] > 2000000 && $isValidFile) {
					$isValidFile = false;
					$fileErrorMsg = "Ukuran file melebihi batas maksimum 2MB";
				}
				
				// DO NOT TRUST $_FILES['upfile']['mime'] VALUE !!
				// Check MIME Type by yourself.
				$finfo = new finfo(FILEINFO_MIME_TYPE);
				if ($isValidFile && false === $ext = array_search(
					$finfo->file($_FILES['career_attachment']['tmp_name']),
					array(
						'pdf' => 'application/pdf',
						'doc' => 'application/msword',
						'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
					),
					true
				)) {
					$isValidFile = false;
					$fileErrorMsg = "Format file tidak sesuai, harus berupa pdf, doc, atau docx";
				}

				$dir = 'po-content/uploads/career_attachment';
				if (!is_dir($dir)) {
					mkdir($dir, 0755, true);
				}
				
				$uniqueFileName = "CV_" . $_POST['career_name'] . '_' . $_POST['career_position'] . '_' . date('Ymd_his') . '.' . $ext;
				$filepath = $dir . '/' . $uniqueFileName;
				if ($isValidFile && !move_uploaded_file(
					$_FILES['career_attachment']['tmp_name'],
					$filepath
				)) {
					$isValidFile = false;
					$fileErrorMsg = "Terjadi kesalahan, File tidak dapat diupload.";
				}
				
				if ($validated_data === false || $isValidFile === false) {
					$errorMsg = !empty($fileErrorMsg) ? $fileErrorMsg : $lang['front_career_error'];
					$alertmsg = '<div id="contact-form-result">
						<div class="alert alert-warning" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							'. $errorMsg .'
						</div>
					</div>';
				} else {
					// $fileData = file_get_contents($_FILES['career_attachment']['tmp_name']);
					// $fileData = base64_encode($fileData);
					$data = array(
						'career_name' => $_POST['career_name'],
						'career_position' => $_POST['career_position'],
						'career_message' => $_POST['career_message'],
						'career_attachment' => $uniqueFileName,
						'datetime' => date('Y-m-d h:i:s')
					);
					
					$msg = '';
					try {
						$query = $core->podb->insertInto('career')->values($data);
						$core->podb->getPdo()->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

						$execute = $query->execute();
					} catch (\Throwable $th) {
						$msg = $th->getMessage();
					}

					unset($_POST);
					$alertmsg = '<div id="contact-form-result">
						<div class="alert alert-success" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							'.$lang['front_career_success'].'
						</div>
					</div>';
				}
			} else {
				$errorMessage = "Mohon klik terlebih dahulu verifikasi bukan robot.";
			}
		} else {
			$errorMessage = "Mohon klik terlebih dahulu verifikasi bukan robot.";
		}
	}

	if (!empty($errorMessage)) {
		$alertmsg = '<div id="contact-form-result">
		<div class="alert alert-warning" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			'. $errorMessage .'
		</div>
	</div>';
	}

	$info = array(
		'page_title' => $lang['front_career'],
		'page_desc' => $core->posetting[2]['value'],
		'page_key' => $core->posetting[3]['value'],
		'social_mod' => $lang['front_career'],
		'social_name' => $core->posetting[0]['value'],
		'social_url' => $core->posetting[1]['value'],
		'social_title' => $core->posetting[0]['value'],
		'social_desc' => $core->posetting[2]['value'],
		'social_img' => $core->posetting[1]['value'].'/'.DIR_INC.'/images/favicon.png',
		'alertmsg' => $alertmsg
	);
	$adddata = array_merge($info, $lang);
	
	$templates->addData(
		$adddata
	);
	echo $templates->render('karir', compact('lang'));
});