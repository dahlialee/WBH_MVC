<?php

class tintucModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllPrds(){
        $prd = $this->select('*', 'tintuc');
		return $prd;
	}
	function getAlltintuc() {
		$stmt = $this->conn->prepare("SELECT * FROM tintuc ");
		$stmt->execute();
		return $stmt;
	}
	public function addtintuc($matt,$tentt,$hinhanh,$noidung)
    {
        $sql = "INSERT INTO tintuc VALUES ('" . $matt . "','" . $tentt . "','" . $hinhanh . "','" . $noidung . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updatetintuc($matt,$tentt,$hinhanh,$noidung){
        $sql = "UPDATE tintuc SET tentt='" . $tentt . "',hinhanh='" . $hinhanh . "',noidung='" . $noidung . "'
			WHERE matt='" . $matt. "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deletetintuc($matt)
    {
        $query = "DELETE FROM tintuc WHERE matt = '" . $matt . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}