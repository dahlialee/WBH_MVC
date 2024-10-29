<?php

class memberModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllMembers(){
		return $mb = $this->select('*', 'thanhvien','quyen = 0', 'ORDER BY date DESC');
	}
	function memberToday(){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$today = $now->format('Y-m-d');
		$beforeWeek = date("Y-m-d", strtotime("-1 day"));
		$rs = $this->select('count(id) as newmem','thanhvien',"DATE(date) <= '".$today."' AND DATE(date) >= '".$beforeWeek."'");
		return $rs[0]['newmem'];
	}
	function allMember(){
		$rs = $this->select('count(id) as sum','thanhvien');
		return $rs[0]['sum'];
	}

    function getAllMember() {
		$stmt = $this->conn->prepare("SELECT * FROM thanhvien WHERE quyen = 0");
		$stmt->execute();
		return $stmt;
	}
	public function addMember($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen)
    {
        $sql = "INSERT INTO thanhvien VALUES ('','" . $ten . "','" . $tentaikhoan . "',
        '" . $matkhau . "','" . $email . "','" . $sdt . "','" . $diachi . "','" . $date . "',
        '" . $quyen . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updateMember($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen){
        $sql = "UPDATE thanhvien SET ten='" . $ten . "',tentaikhoan='" . $tentaikhoan . "',
        matkhau='" . $matkhau . "',email='" . $email . "',sdt='" . $sdt . "',diachi='" . $diachi . "',date='" . $date . "',
        quyen='" . $quyen . "'

         WHERE id='" . $id. "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deleteMember($id)
    {
        $query = "DELETE FROM thanhvien WHERE id = '" . $id . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}