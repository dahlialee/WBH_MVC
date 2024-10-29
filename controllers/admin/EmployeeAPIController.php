<?php
class employeeApiController extends Controller
{
    
    function index(){
		echo 'apiemployee';
	}
    function get_nv()
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$employeeModel = $this->model("employeeModel");
        $employee = $employeeModel->getAllEmployees();
		$mang = [];

		while ($s = $employee->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new Employee($s["id"], $s["ten"],$s["tentaikhoan"],$s["matkhau"],$s["email"],$s["sdt"],$s["diachi"],
            $s["date"],$s["quyen"]));
		}
		echo json_encode($mang);

    }
    function post_nv()
    {
        
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$employeeModel = $this->model("employeeModel");

        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;
        $employee = $employeeModel->addEmployee($ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

        if ($employee) {
            echo json_encode(['message' => 'Thêm nhân viên thành công']);
        } else {
            echo json_encode(['message' => 'Thêm nhân viên không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($employee);
    }
    public function put_nv()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$employeeModel = $this->model("employeeModel");
        // Kiểm tra và xác thực dữ liệu đầu vào
        if (!isset($data->id) || !isset($data->ten) ) {
            echo json_encode(['success' => false, 'message' => 'Invalid input. Thoát']);
            exit();
        }
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_employee;
        $id = $data->id;
        $ten=$data->ten;
        $tentaikhoan=$data->tentaikhoan;
        $matkhau=$data->matkhau;
        $email=$data->email;
        $sdt=$data->sdt;
        $diachi=$data->diachi;
        $date=$data->date;
        $quyen=$data->quyen;

        $ktrama =$employeeModel->KiemTraMa($id);

        if (empty($id) ) {
            echo json_encode([ 'message' => 'Vui lòng nhập mã ']);
            exit();
        }
        
        else if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        else{
            $result = $employeeModel->updateEmployee($id,$ten,$tentaikhoan,$matkhau,$email,$sdt,$diachi,$date,$quyen);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Cập nhật nhân viên thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Cập nhật không thành công']);
            }
        }
    }
    public function delete_nv($id)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $employeeModel = $this->model("employeeModel");
        $id = $data->id;
        $ktrama =$employeeModel->KiemTraMa($id);

        if (empty($id) ) {
            echo json_encode([ 'message' => 'Vui lòng nhập mã ']);
            exit();
        }
        
        else if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        else{
            $result = $employeeModel->deleteEmployee($id);

            if ($result) {
                echo json_encode(['message' => 'Xóa nhân viên thành công']);

            } else {
                echo json_encode(['message' => 'Xóa nhân viên không thành công']);
            }
        }
        echo json_encode($result);
    }

    
    
}
class Employee
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
