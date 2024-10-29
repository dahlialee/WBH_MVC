<?php

class orderModel extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	function getAllOrders(){
		$gd = $this->select('*', 'giaodich',null, 'ORDER BY date DESC');
		for ($i=0; $i < count($gd); $i++) { 
			$magdArr[] = $gd[$i]['magd'];
		}
		for ($i=0; $i < count($gd); $i++){
			$sp = $this->select('*','chitietgd ctgd, sanpham sp',"ctgd.masp = sp.masp AND ctgd.magd = ".$magdArr[$i]."");
			for ($j=0; $j < count($sp); $j++) { 
				$cart[$j] = array('masp'=> $sp[$j]['masp'], 'tensp' => $sp[$j]['tensp'],'dongia'=> $sp[$j]['gia'], 'soluong'=>$sp[$j]['soluong']);
			}
			
			$gd[$i]['sp'] = $cart; $cart = null;
		}
		return $gd;
		/*echo "<pre>";
		print_r($gd);
		echo "</pre>";*/
	}
	function getAllOrder(){
		
			$stmt = $this->conn->prepare("SELECT * from giaodich gd INNER JOIN chitietgd ct ON gd.magd=ct.magd");
			$stmt->execute();

			
		return $stmt;
		
	}

	public function Add_gd($user_name, $user_addr,$user_phone,$user_dst)
    {
        $stmt = $this->conn->prepare("INSERT INTO giaodich VALUES ('','','','','" .$user_name . "','" . $user_dst. "','" . $user_addr. "','" . $user_phone. "','','')");
        $stmt->execute();

			
		return $stmt;
    }

	public function Delete_gd($magd)
    {
        $stmt = $this->conn->prepare("DELETE FROM giaodich WHERE magd = '" . $magd . "'");
    	$stmt->execute();
		return $stmt;
		
    }
	public function Update_gd($magd,$user_name, $user_dst,$user_addr, $user_phone)
    {
        

		$stmt = $this->conn->prepare("UPDATE giaodich SET user_name='" . $user_name . "',user_dst='" . $user_dst . "',user_addr='" . $user_addr . "',user_phone='" . $user_phone . "'
            WHERE magd='" . $magd . "'");
            $stmt->execute();
		return $stmt;
        
    }

	function orderToday(){
		$now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
		$today = $now->format('Y-m-d');
		$rs = $this->select('count(magd) as neworder','giaodich',"DATE(date) = '".$today."'");
		return $rs[0]['neworder'];
	}
	function gerOrderById(){
		$magd = 44;
		$rs = $this->select('*','giaodich',"magd = '".$magd."'");
		return $rs;
	}
}