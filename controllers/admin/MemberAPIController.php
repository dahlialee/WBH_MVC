<?php
class memberApiController extends Controller
{
    
    function index(){
		echo 'apimember';
	}
    function get_kh()
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$memberModel = $this->model("memberModel");
        $member = $memberModel->getAllMember();
		$mang = [];

		while ($s = $member->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new Member($s["id"], $s["ten"],$s["tentaikhoan"],$s["matkhau"],$s["email"],$s["sdt"],$s["diachi"],
            $s["date"],$s["quyen"]));
		}
		echo json_encode($mang);

    }
    function post_kh()
    {
        
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$memberModel = $this->model("memberModel");

        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;
        $member = $memberModel->addMember($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

        if ($member) {
            echo json_encode(['message' => 'Thêm khách hàng thành công']);
        } else {
            echo json_encode(['message' => 'Thêm khách hàng không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($member);
    }
    public function put_kh()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$memberModel = $this->model("memberModel");
        // Kiểm tra và xác thực dữ liệu đầu vào
        if (!isset($data->id) || !isset($data->ten) ) {
            echo json_encode(['success' => false, 'message' => 'Invalid input. Thoát']);
            exit();
        }
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_member;
        $id = $data->id;
        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;

        $result = $memberModel->updateMember($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật khách hàng thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật không thành công']);
        }
    }
    public function delete_kh($id)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $memberModel = $this->model("memberModel");
        $id = $data->id;
        $result = $memberModel->deleteMember($id);

        if ($result) {
            echo json_encode(['message' => 'Xóa khách hàng thành công']);

        } else {
            echo json_encode(['message' => 'Xóa khách hàng không thành công']);
        }
        echo json_encode($result);
    }

    
    
}
class Member
{
    public $id;
    public $ten;
    public $tentaikhoan;
    public $matkhau;
    public $email;
    public $sdt;
    public $diachi;
    public $date;
    public $quyen;
    
    public function __construct( $id, $ten,$tentaikhoan,$matkhau, $email,$sdt,$diachi,$date,$quyen)
    {
        $this->id = $id;
        $this->ten =  $ten;
        $this->tentaikhoan = $tentaikhoan;
        $this->matkhau = $matkhau;
        $this->email = $email;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
        $this->date = $date;
        $this->quyen = $quyen;
        
    }
}
