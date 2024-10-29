<?php

class tintucModel extends Model
{
	/*private $matt, $tensp, $gia;*/
	function __construct()
	{
		parent::__construct();
	}
	function getPrds($orderBy, $start, $last, $where = null){
		if($where === null){
			$sql = "SELECT * FROM tintuc ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		} else {
			$sql = "SELECT * FROM tintuc WHERE ".$where." ORDER BY ".$orderBy." desc LIMIT ".$start.",".$last;
		}
		
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd[] = $row;
		}
		return $prd;
	}
	function getPrdById($matt){
		$sql = "SELECT * FROM tintuc WHERE matt = ".$matt;
		$prd = array();
		foreach($this->conn->query($sql) as $row){
			$prd = $row;
		}
		return $prd;
	}

}