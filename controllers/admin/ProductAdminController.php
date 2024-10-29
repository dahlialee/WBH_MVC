<?php



/**
* 
*/
class ProductAdminController extends Controller
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
		require_once 'models/admin/productModel.php';
		$md = new productModel;
		$data['product'] = $md->getAllPrds();

		require_once 'models/admin/categoryModel.php';
		$md = new categoryModel;
		$data['category']=$md->getAllCtgrs();

		// print_r($data);
		$this->render('product',$data,'SẢN PHẨM','admin');
	}
	function action(){
		$actionName = $id= '';
		if(isset($_GET['name'])){$actionName = $_GET['name'];}  // lấy tên method
		if(isset($_GET['id'])){$id = $_GET['id'];}
		// các biến đặt ở trong action-view
		if(isset($_GET['name2'])){$name2 = $_GET['name2'];}
		if(isset($_GET['anhchinh'])){$anhchinh = $_GET['anhchinh'];}
		if(isset($_GET['gia'])){$gia = $_GET['gia'];}
		if(isset($_GET['kichthuoc'])){$kichthuoc = $_GET['kichthuoc'];}
		if(isset($_GET['chondm'])){$chondm = $_GET['chondm'];}
		if(isset($_GET['soluong'])){$soluong = $_GET['soluong'];}
		if(isset($_GET['nsx'])){$nsx = $_GET['nsx'];}
		if(isset($_GET['hsd'])){$hsd = $_GET['hsd'];}

		require_once 'vendor/Model.php';
		require_once 'models/admin/productModel.php';
		$md = new productModel;
		
		switch ($actionName) {

			case 'add':
			$data = array('', $name2,$gia, $kichthuoc,'',$soluong, $chondm, $anhchinh,'','', $nsx, $hsd);
			$md->insert('sanpham',$data);
			echo "OK";
			break;

			case 'del':
			$md->delete('sanpham','masp = '.$id);
			echo "OK";
			break;

			case 'edit':
			$setRow = array('tensp','anhchinh','gia','kichthuoc','madm','soluong','nsx','hsd');
			$setVal = array($name2,$anhchinh,$gia,$kichthuoc,$chondm,$soluong,$nsx,$hsd);
			$md->update('sanpham', $setRow, $setVal, 'masp = ' . $id);
			echo "OK";
			break;
			
			default:
				# code...
			break;
		}
	}


}