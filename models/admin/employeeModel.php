<?php

class employeeModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllEmployee(){
		return $mb = $this->select('*', 'thanhvien','quyen = 1', 'ORDER BY date DESC');
	}
	function employeeToday(){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$today = $now->format('Y-m-d');
		$beforeWeek = date("Y-m-d", strtotime("-1 week"));
		$rs = $this->select('count(id) as newmem','thanhvien',"DATE(date) <= '".$today."' AND DATE(date) >= '".$beforeWeek."'");
		return $rs[0]['newmem'];
	}
	function allEmployee(){
		$rs = $this->select('count(id) as sum','thanhvien');
		return $rs[0]['sum'];
	}


    public function KiemTraMa($id)
    {
        $sql = "SELECT * FROM thanhvien WHERE id = '" . $id . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() <= 0) {
            return false;
        } else {
            return true;
        }
    }

    function getAllEmployees() {
		$stmt = $this->conn->prepare("SELECT * FROM thanhvien WHERE quyen = 1");
		$stmt->execute();
		return $stmt;
	}
	public function addEmployee($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen)
    {
        $sql = "INSERT INTO thanhvien VALUES ('','" . $ten . "','" . $tentaikhoan . "',
        '" . $matkhau . "','" . $email . "','" . $sdt . "','" . $diachi . "','" . $date . "',
        '" . $quyen . "')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }
    public function updateEmployee($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen){
        $sql = "UPDATE thanhvien SET ten='" . $ten . "',tentaikhoan='" . $tentaikhoan . "',
        matkhau='" . $matkhau . "',email='" . $email . "',sdt='" . $sdt . "',diachi='" . $diachi . "',date='" . $date . "',
        quyen='" . $quyen . "'

         WHERE id='" . $id. "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;

    }
    public function deleteEmployee($id)
    {
        $query = "DELETE FROM thanhvien WHERE id = '" . $id . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}