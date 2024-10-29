<?php

/**
* 
*/
class employeeController extends Controller
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
		require_once 'models/admin/employeeModel.php';
		$md = new employeeModel;
		$data['employee'] = $md->getAllEmployee();
		$this->render('employee',$data,'NHÂN VIÊN','admin');
	}
	function action(){
		$actionName = $id = '';
		if(isset($_POST['name'])){$actionName = $_POST['name'];}
		if(isset($_POST['id'])){$id = $_POST['id'];}

		if(isset($_POST['name2'])){$name2 = $_POST['name2'];}
		if(isset($_POST['username'])){$username = $_POST['username'];} 
		if(isset($_POST['password'])){$password = $_POST['password'];} 
		if(isset($_POST['email'])){$email= $_POST['email'];}
		if(isset($_POST['tel'])){$tel = $_POST['tel'];} 
		if(isset($_POST['addr'])){$addr = $_POST['addr'];} 
		if(isset($_POST['quyen'])){$quyen = $_POST['quyen'];} 
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$now = $now->format('Y-m-d H:i:s');
		//$data[] = $now;// $data[] = '0';
		require_once 'vendor/Model.php';
		require_once 'models/admin/employeeModel.php';
		$md = new employeeModel;

		switch ($actionName) {
			case 'del':
			$md->delete('thanhvien','id = '.$id);
			break;
			case 'add':
				$data = array('',$name2, $username, $password, $email, $tel, $addr, $now, $quyen);

			if($md->insert('thanhvien',$data)){
				echo "OK";
			}
			break;
			case 'edit':
				$setRow = array('ten','tentaikhoan','matkhau','email','sdt','diachi','quyen');
				$setVal = array($name2,$username,$password,$email,$tel,$addr,$quyen);
				$md->update('thanhvien', $setRow, $setVal, 'id = ' . $id);
				echo "OK";
				break;

			default:
			echo "Error!";
			break;
		}
	}
}