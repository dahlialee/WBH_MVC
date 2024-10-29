<?php
class TinTucApiController extends Controller
{
    
    function index(){
		echo 'apitintuc';
	}
    function get_tt()
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$tintucModel = $this->model("tintucModel");
        $tintuc = $tintucModel->getAlltintuc();
		$mang = [];

		while ($s = $tintuc->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new tintuc($s["matt"], $s["tentt"],$s["hinhanh"],$s["noidung"]));
		}
		echo json_encode($mang);

    }
    function post_tt()
    {
        
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$tintucModel = $this->model("tintucModel");

        $matt=$data->matt;
        $tentt=$data->tentt;
        $hinhanh=$data->hinhanh;
        $noidung=$data->noidung;
        $tintuc = $tintucModel->addtintuc($matt,$tentt,$hinhanh,$noidung);

        if ($tintuc) {
            echo json_encode(['message' => 'Thêm tin tức thành công']);
        } else {
            echo json_encode(['message' => 'Thêm tin tức không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($tintuc);
    }
    public function put_tt()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$tintucModel = $this->model("tintucModel");
        // Kiểm tra và xác thực dữ liệu đầu vào
        if (!isset($data->matt) || !isset($data->tentt) ) {
            echo json_encode(['success' => false, 'message' => 'Invalid input. Thoát']);
            exit();
        }
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_tintuc;
        $matt=$data->matt;
        $tentt=$data->tentt;
        $hinhanh=$data->hinhanh;
        $noidung=$data->noidung;

        $result = $tintucModel->updatetintuc($matt,$tentt,$hinhanh,$noidung);

        if ($result) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật tin tức thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Cập nhật ko thành công']);
        }
    }
    public function delete_tt($matt)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $tintucModel = $this->model("tintucModel");
        $matt = $data->matt;
        $result = $tintucModel->deletetintuc($matt);

        if ($result) {
            echo json_encode(['message' => 'Xóa tin tức thành công']);

        } else {
            echo json_encode(['message' => 'Xóa tin tức ko thành công']);
        }
        echo json_encode($result);
    }

    
    
}
class tintuc
{
    public $matt;
    public $tentt;
    public $hinhanh;
    public $noidung;
    
    public function __construct( $matt,$tentt,$hinhanh,$noidung)
    {
        $this->matt = $matt;
        $this->tentt =  $tentt;
        $this->hinhanh = $hinhanh;
        $this->noidung = $noidung;
        
    }
}
