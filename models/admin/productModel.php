<?php

class productModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	function getAllPrds(){
		$prd = $this->select('*', 'sanpham sp, danhmucsp dm','sp.madm = dm.madm', 'ORDER BY masp ASC');
		return $prd;
	}
	function getAllProduct() {
		$stmt = $this->conn->prepare("SELECT * FROM sanpham sp INNER JOIN danhmucsp dm ON sp.madm = dm.madm ORDER BY masp ASC");
		$stmt->execute();
		return $stmt;
	}
    function getProduct($masp){
		$stmt = $this->conn->prepare("SELECT * FROM sanpham sp INNER JOIN danhmucsp dm ON sp.madm = dm.madm  WHERE masp ='".$masp."' ORDER BY masp ASC");
		$stmt->execute();
		return $stmt;
	}
    public function addProduct($tensp,$gia,$kichthuoc,$khuyenmai,$soluong,$madm,$anhchinh,$luotxem,$luotmua,$hsd,$nsx)
    {
        $sql = "INSERT INTO sanpham VALUES ('','" . $tensp . "','" . $gia . "',
        '" . $kichthuoc . "','" . $khuyenmai . "','" . $soluong . "','" . $madm . "','" . $anhchinh . "',
        '" . $luotmua . "','" . $luotxem . "','" . $hsd . "','" . $nsx . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updateProduct($masp,$tensp,$gia,$kichthuoc,$khuyenmai,$soluong,$madm,$anhchinh,$luotxem,$luotmua,$hsd,$nsx){
        $sql = "UPDATE sanpham SET tensp='" . $tensp . "',gia='" . $gia . "',
        kichthuoc='" . $kichthuoc . "',khuyenmai='" . $khuyenmai . "',soluong='" . $soluong . "',madm='" . $madm . "',anhchinh='" . $anhchinh . "',
        luotmua='" . $luotmua . "',luotxem='" . $luotxem . "',hsd='" . $hsd . "',nsx='" . $nsx . "'

         WHERE masp='" . $masp. "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deleteProduct($masp)
    {
        $query = "DELETE FROM sanpham WHERE masp = '" . $masp . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function KiemTraMa($masp)
    {
        $sql = "SELECT * FROM sanpham WHERE masp = '" . $masp . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }
	
}
