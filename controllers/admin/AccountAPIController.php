<?php
class AccountApiController extends Controller
{
    
    function index(){
		echo 'apiaccount';
	}
    function get_tk()
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$accountModel = $this->model("accountModel");
        $account = $accountModel->getAllAccounts();
		$mang = [];

		while ($s = $account->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new Account($s["id"], $s["ten"],$s["tentaikhoan"],$s["matkhau"],$s["email"],$s["sdt"],$s["diachi"],
            $s["date"],$s["quyen"]));
		}
		echo json_encode($mang);

    }
    function post_tk()
    {
        
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$accountModel = $this->model("accountModel");

        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;
        $account = $accountModel->addAccount($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

        if ($account) {
            echo json_encode(['message' => 'Thêm thành viên thành công']);
        } else {
            echo json_encode(['message' => 'Thêm thành viên không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($account);
    }
    public function put_tk()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$accountModel = $this->model("accountModel");
        // Kiểm tra và xác thực dữ liệu đầu vào
        if (!isset($data->id) || !isset($data->ten) ) {
            echo json_encode(['success' => false, 'message' => 'Invalid input. Thoát']);
            exit();
        }
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_account;
        $id = $data->id;
        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;

        $result = $accountModel->updateAccount($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật thành viên thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật không thành công']);
        }
    }
    public function delete_tk($id)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $accountModel = $this->model("accountModel");
        $id = $data->id;
        $result = $accountModel->deleteAccount($id);

        if ($result) {
            echo json_encode(['message' => 'Xóa thành viên thành công']);

        } else {
            echo json_encode(['message' => 'Xóa thành viên không thành công']);
        }
        echo json_encode($result);
    }

    
    
}
class Account
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
