<?php
class apiGDController extends Controller
{
    function SayHi()
    {
        echo "Xin chào bạn !";
    }
    function GET_GD()
    {
        // Gọi ra model
		require_once 'vendor/Model.php';

        $GD_Model = $this->model("orderModel");
        $GD = $GD_Model->getAllOrder();
        $mang = [];

        while ($s = $GD->fetch(PDO::FETCH_ASSOC)) {
            array_push($mang, new giaodich($s["magd"], $s["tinhtrang"],$s["user_id"],$s["user_name"], $s["user_dst"],$s["user_addr"],$s["user_phone"],$s["masp"],$s["soluong"],$s["tongtien"],$s["date"]));
        }
        echo json_encode($mang);

        // View
    }
    function POST_GD()
    {
        $data = json_decode(file_get_contents("php://input"));

        // Gọi ra model
		require_once 'vendor/Model.php';
        
        $user_name = $data->user_name;
        $user_dst = $data->user_dst;
        $user_addr = $data->user_addr;
        $user_phone = $data->user_phone;
        // $tongtien = $data->tongtien;
        // $date = $data->date;
       
        // Gọi ra model
        $GD_Model = $this->model("orderModel");
        $GD = $GD_Model->Add_gd($user_name, $user_addr,$user_phone,$user_dst);

        // Kiểm tra kết quả và trả về phản hồi
        if ($GD) {
            echo json_encode(['message' => 'Thêm giao dich thành công']);
        } else {
            echo json_encode(['message' => 'Thêm giao dich không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($GD);

    }
    public function PUT_GD()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
        require_once 'vendor/Model.php';
		$GD_Model = $this->model("orderModel");
        // Kiểm tra và xác thực dữ liệu đầu vào
        if (!isset($data->magd) || !isset($data->user_name) || !isset($data->user_dst) || !isset($data->user_addr) || !isset($data->user_phone)) {
            echo json_encode(['success' => false, 'message' => 'Invalid input. Thoát']);
            exit();
        }
        // Gán giá trị đầu vào cho mô hình
        $magd = $data->magd;
        $user_name = $data->user_name;
        $user_dst = $data->user_dst;
        $user_addr = $data->user_addr;
        $user_phone = $data->user_phone;


        // Cập nhật thông tin khách hàng
        $result = $GD_Model->Update_gd($magd,$user_name, $user_dst,$user_addr,$user_phone);

        // Kiểm tra kết quả và trả về phản hồi JSON
        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật giao dich thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật ko thành công']);
        }
    }
    public function DELETE_gd($magd)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $orderModel = $this->model("orderModel");
        $magd = $data->magd;
        $result = $orderModel->Delete_gd($magd);

        if ($result) {
            echo json_encode(['message' => 'Xóa giao dich thành công']);

        } else {
            echo json_encode(['message' => 'Xóa giao dich ko thành công']);
        }
        echo json_encode($result);
    }
}
class giaodich
{
    public $magd;
    public $tinhtrang;
    public $user_id;
    public $user_name;
    public $user_dst;
    public $user_addr;
    public $user_phone;
    public $masp;
    // public $gia;
    public $soluong;
    public $tongtien;
    public $date;
    
    public function __construct( $magd, $tinhtrang,$user_id,$user_name, $user_dst,$user_addr,$user_phone,$masp,$soluong,$tongtien,$date)
    {
        $this->magd = $magd;
        $this->tinhtrang =  $tinhtrang;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_dst = $user_dst;
        $this->user_addr = $user_addr;
        $this->user_phone = $user_phone;
        $this->masp = $masp;
        // $this->gia = $gia;
        $this->soluong = $soluong;
        $this->tongtien = $tongtien;
        $this->date = $date;
        
    }
}
