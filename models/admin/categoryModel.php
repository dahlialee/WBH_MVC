<?php

class categoryModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getAllCtgrs(){
		$rs = $this->select('*','danhmucsp',null, 'ORDER BY madm ASC');
		for ($i=0; $i < count($rs); $i++){
			$tmp = $this->select('count(masp)','danhmucsp dm, sanpham sp','dm.madm = sp.madm AND dm.madm = '.$rs[$i]['madm']);
			$sum[] = $tmp[0]['count(masp)'];
		}
		for ($i=0; $i < count($rs); $i++) { 
			$rs[$i]['tongsp'] = $sum[$i];
		}
		return $rs;
    }
    function getAll(){
        $stmt = $this->conn->prepare("SELECT * FROM danhmucsp ORDER BY madm DESC");
        $stmt->execute();
        return $stmt;
    }
	function getCategory($madm){
		$stmt = $this->conn->prepare("SELECT * FROM danhmucsp where madm ='".$madm."' ORDER BY madm DESC");
		$stmt->execute();
		return $stmt;
	}
    
    public function addCategory($tendm)
    {
        $sql = "INSERT INTO danhmucsp VALUES ('','" . $tendm . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updateCategory($madm, $tendm){
        $sql = "UPDATE danhmucsp SET tendm='" . $tendm . "'
            WHERE madm='" . $madm . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deleteCategory($madm)
    {
        $query = "DELETE FROM danhmucsp WHERE madm = '" . $madm . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
	public function KiemTraMa($madm)
    {
        $sql = "SELECT * FROM danhmucsp WHERE madm = '" . $madm . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }
    
	/*function getCtgrs($where = null, $orderBy = 'madm ASC'){
		$sql = "SELECT * FROM danhmucsanpham ".$where." ORDER BY ".$orderBy;
		$ctgr = array();
		foreach($this->conn->query($sql) as $row){
			$ctgr[] = $row;
		}
		return $ctgr;
	}
	function getCtgrById($madm){
		$sql = "SELECT * FROM danhmucsanpham WHERE madm = ".$madm;
		$ctgr = array();
		foreach($this->conn->query($sql) as $row){
			$ctgr = $row;
		}
		return $ctgr;
	}*/

}