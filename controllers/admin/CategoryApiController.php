<?php
class CategoryApiController extends Controller
{
    
    // function __construct()
	// {
	// 	$this->folder = "admin";
	// 	if(!isset($_SESSION['admin'])){
	// 		header("Location: http://localhost/WBH_MVC/indexadmin");
	// 	}
	// }
    
    function index(){
		echo 'apicategory';
	}
    function get_dm($madm = null)
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$categoryModel = $this->model("categoryModel");

        if (empty($madm)) {
            $category = $categoryModel->getAll();
        } else {
           // gọi show theo mã 
           $category = $categoryModel->getCategory($madm);
        }
		$mang = [];

		while ($s = $category->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new Category($s["madm"], $s["tendm"]));
		}
		echo json_encode($mang);

    }
    
    function post_dm()
    {
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$categoryModel = $this->model("categoryModel");

        $tendm=$data->tendm;
        $category = $categoryModel->addCategory($tendm);

        if ($category) {
            echo json_encode(['message' => 'Thêm danh mục thành công']);
        } else {
            echo json_encode(['message' => 'Thêm danh mục không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        // echo json_encode($category);
    }
    function put_dm()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$categoryModel = $this->model("categoryModel");
        
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_product;
        $madm = $data->madm;
        $tendm = $data->tendm;

        $ktrama =$categoryModel->KiemTraMa($madm);
        // Kiểm tra ko null và tồn tại
        if (empty($madm) ) {
            echo json_encode([ 'message' => 'Vui lòng nhập mã ']);
            exit();
        }
        
        else if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        else{
            $result = $categoryModel->updatecategory($madm,$tendm);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'cập nhật danh mục thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'cập nhật danh mục ko thành công']);
            }
        }
    }
    public function delete_dm($madm)
    {
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $categoryModel = $this->model("categoryModel");
        $madm = $data->madm;

        // Kiểm tra ko null và tồn tại
        if (empty($madm) ) {
            echo json_encode([ 'message' => 'Vui lòng nhập mã ']);
            exit();
        }
        $ktrama =$categoryModel->KiemTraMa($madm);
        if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        $result = $categoryModel->deleteCategory($madm);

        if ($result) {
            echo json_encode(['message' => 'Xóa danh mục thành công']);

        } else {
            echo json_encode(['message' => 'Xóa danh mục không thành công']);
        }
        // echo json_encode($result);
    }

    
    
}
class Category
{
    public $madm;
    public $tendm;

    public function __construct($madm, $tendm)
    {
        $this->madm = $madm;
        $this->tendm = $tendm;
    }
}
