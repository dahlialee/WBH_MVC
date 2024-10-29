<?php

/**
* 
*/
class TinTucAdminController extends Controller
{
	
	function __construct()
	{
		$this->folder = "admin";
		if(!isset($_SESSION['admin'])){
			header("Location: http://localhost/WBH_MVC/indexadmin");
		}
	}
	function index(){
		require_once 'vendor/Model.php';
		require_once 'models/admin/tintucModel.php';
		$md = new tintucModel;
		$data = $md->getAllPrds();
		$this->render('tintuc',$data,'TIN TỨC','admin');
	}
	function action(){
		$actionName = $id='';
		if(isset($_GET['name'])){$actionName = $_GET['name'];}  // lấy tên method
		if(isset($_GET['id'])){$id = $_GET['id'];}
		// các biến đặt ở trong action-view
		if(isset($_GET['matt'])){$matt = $_GET['matt'];}
		if(isset($_GET['tentt'])){$tentt = $_GET['tentt'];}
		if(isset($_GET['hinhanh'])){$hinhanh = $_GET['hinhanh'];}
		if(isset($_GET['noidung'])){$noidung = $_GET['noidung'];}

		require_once 'vendor/Model.php';
		require_once 'models/admin/tintucModel.php';
		$md = new tintucModel;
		switch ($actionName) {
			case 'del':
				$md->delete('tintuc','matt = '.$id);
			break;
			case 'add':
			$data = array($matt, $tentt, $hinhanh,$noidung);
			$md->insert('tintuc',$data);
			echo "OK";
			break;

			case 'edit':
				$setRow = array('tentt','hinhanh','noidung');
				$setVal = array($tentt, $hinhanh,$noidung);
				$md->update('tintuc', $setRow, $setVal, 'matt = ' . $id);
				echo "OK";
			break;

			default:
			echo "Error!";
			break;
		}
	}
	
}