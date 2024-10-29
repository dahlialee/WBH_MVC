<?php

/**
* 
*/
class CategoryController extends Controller
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
		require_once 'models/admin/categoryModel.php';
		$md = new categoryModel;
		$data['category']=$md->getAllCtgrs();
		$this->render('category',$data,'DANH MỤC SẢN PHẨM','admin');
	}
	function action(){
		$actionName = $id= '';
		if(isset($_GET['name'])){$actionName = $_GET['name'];}  // lấy tên method
		if(isset($_GET['id'])){$id = $_GET['id'];}
		require_once 'vendor/Model.php';
		require_once 'models/admin/categoryModel.php';
		$md = new categoryModel;
		
		switch ($actionName) {
			case 'add':
			if(isset($_GET['name2'])){$name2 = $_GET['name2'];}
			$data = array('',$name2);
			if($md->insert('danhmucsp',$data)){
				echo "OK";
			}
			break;

			case 'del':
			$md->delete('danhmucsp','madm = '.$id);
			echo "OK";
			break;

			case 'edit':
			// $c4edit = $n4edit = '';
			// $setRow = array('tendm','xuatsu');
			// if(isset($_GET['country4edit'])){$c4edit = $_GET['country4edit'];}
			// if(isset($_GET['name4edit'])){$n4edit = $_GET['name4edit'];}
			// $setVal = array($n4edit, $c4edit);
			// $md->update('danhmucsp',$setRow, $setVal, 'madm = '.$id);
			// echo "OK";
			// break;

			$name2='';
			if(isset($_GET['name2'])){
				$name2 = $_GET['name2'];
			}
			$setRow = array('tendm');
			$setVal = array($name2);
			$md->update('danhmucsp', $setRow, $setVal, 'madm = ' . $id);
			echo "OK";
			break;
			
			default:
				# code...
			break;
		}
	}

}