<?php 

/**
* 
*/
class tintucController extends Controller
{
	
	function __construct()
	{
		$this->folder = "default";
	}
	function index(){
		$this->List();
	}
	function List($type = null){
		require_once 'vendor/Model.php';
		require_once 'models/default/tintucModel.php';
		$md = new tintucModel();
		$data = $md->getPrds('matt', 0, 8);
		$title = "<span id='contentTitle' data-type='all'>Tin tức</span>";
		$this->render('tintuc',$data, $title);
	}
	
	function PrdDetail1($matt){
		require_once 'vendor/Model.php';
		require_once 'models/default/tintucModel.php';
		$md = new tintucModel();
		$data = $md->getPrdById($matt);
		$title = $data['tentt'];
		require_once 'views/default/tintucDetail.php';
	}

}