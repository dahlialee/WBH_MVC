<?php

class accountModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllAccount(){
		return $mb = $this->select('*', 'thanhvien');
	}
	function accountToday(){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$today = $now->format('Y-m-d');
		$beforeWeek = date("Y-m-d", strtotime("-1 week"));
		$rs = $this->select('count(id) as newmem','thanhvien',"DATE(date) <= '".$today."' AND DATE(date) >= '".$beforeWeek."'");
		return $rs[0]['newmem'];
	}
	function allAccount(){
		$rs = $this->select('count(id) as sum','thanhvien');
		return $rs[0]['sum'];
	}

	function getAllAccounts() {
		$stmt = $this->conn->prepare("SELECT * FROM thanhvien");
		$stmt->execute();
		return $stmt;
	}
	public function addAccount($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen)
    {
        $sql = "INSERT INTO thanhvien VALUES ('','" . $ten . "','" . $tentaikhoan . "',
        '" . $matkhau . "','" . $email . "','" . $sdt . "','" . $diachi . "','" . $date . "',
        '" . $quyen . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updateAccount($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen){
        $sql = "UPDATE thanhvien SET ten='" . $ten . "',tentaikhoan='" . $tentaikhoan . "',
        matkhau='" . $matkhau . "',email='" . $email . "',sdt='" . $sdt . "',diachi='" . $diachi . "',date='" . $date . "',
        quyen='" . $quyen . "'

         WHERE id='" . $id. "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deleteAccount($id)
    {
        $query = "DELETE FROM thanhvien WHERE id = '" . $id . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}