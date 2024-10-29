<?php
class ProductApiController extends Controller
{
    
    function index(){
		echo 'apiproduct';
	}
    // function get_sp()
    // {
    //     // Gọi ra model lấy db
	// 	require_once 'vendor/Model.php';
	// 	$productModel = $this->model("productModel");
    //     $product = $productModel->getAllProduct();
	// 	$mang = [];

	// 	while ($s = $product->fetch(PDO::FETCH_ASSOC)) {
	// 		array_push($mang, new Product($s["masp"], $s["tensp"],$s["gia"],$s["kichthuoc"],$s["khuyenmai"],$s["soluong"],$s["madm"],
    //         $s["anhchinh"],$s["luotxem"],$s["luotmua"],$s["hsd"],$s["nsx"]));
	// 	}
	// 	echo json_encode($mang);

    // }
    function get_sp($masp = null)
    {
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$productModel = $this->model("productModel");

        if (empty($masp)) {
            // Nếu không có $id, gọi list 
            $product = $productModel->getAllProduct();
        } else{
           // gọi show theo mã 
            $product = $productModel->getProduct($masp);
        }
        $mang = [];

        while ($s = $product->fetch(PDO::FETCH_ASSOC)) {
			array_push($mang, new Product($s["masp"], $s["tensp"],$s["gia"],$s["kichthuoc"],$s["khuyenmai"],$s["soluong"],$s["madm"],
            $s["anhchinh"],$s["luotxem"],$s["luotmua"],$s["hsd"],$s["nsx"]));
		}
		echo json_encode($mang);

    }
    function post_sp()
    {
        
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model lấy db
		require_once 'vendor/Model.php';
		$productModel = $this->model("productModel");

        $tensp=$data->tensp;
        $gia=$data->gia;
        $kichthuoc=$data->kichthuoc;
        $khuyenmai=$data->khuyenmai;
        $soluong=$data->soluong;
        $madm=$data->madm;
        $anhchinh=$data->anhchinh;
        $luotmua=$data->luotmua;
        $luotxem=$data->luotxem;
        $hsd=$data->hsd;
        $nsx=$data->nsx;
        $product = $productModel->addproduct($tensp,$gia,$kichthuoc,$khuyenmai,$soluong,$madm,$anhchinh,$luotmua,$luotxem,$hsd,$nsx);

        if ($product) {
            echo json_encode(['message' => 'Thêm sản phẩm thành công']);
        } else {
            echo json_encode(['message' => 'Thêm sản phẩm không thành công']);
        }
        // Trả về phản hồi dưới dạng JSON
        echo json_encode($product);
    }
    public function put_sp()
    {
        // Nhận dữ liệu từ yêu cầu PUT
        $data = json_decode(file_get_contents("php://input"));
        // Gọi ra model
		require_once 'vendor/Model.php';
		$productModel = $this->model("productModel");
        
        // Gán giá trị đầu vào cho mô hình
        // $id = $data->id_product;
        $masp = $data->masp;
        $tensp=$data->tensp;
        $gia=$data->gia;
        $kichthuoc=$data->kichthuoc;
        $khuyenmai=$data->khuyenmai;
        $soluong=$data->soluong;
        $madm=$data->madm;
        $anhchinh=$data->anhchinh;
        $luotmua=$data->luotmua;
        $luotxem=$data->luotxem;
        $hsd=$data->hsd;
        $nsx=$data->nsx;

        $ktrama =$productModel->KiemTraMa($masp);

        // Kiểm tra ko null và tồn tại
        if (empty($masp) ) {
            echo json_encode([ 'message' => 'Vui lòng nhập mã ']);
            exit();
        }
        
        else if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        else{
            $result = $productModel->updateproduct($masp,$tensp,$gia,$kichthuoc,$khuyenmai,$soluong,$madm,$anhchinh,$luotmua,$luotxem,$hsd,$nsx);

            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Cập nhật sản phẩm thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Cập nhật ko thành công']);
            }
        }
    }
    public function delete_sp($masp)
    {
        
        $data = json_decode(file_get_contents("php://input"));

        // Khởi tạo model
        require_once 'vendor/Model.php';
        $productModel = $this->model("productModel");
        $masp = $data->masp;
        $ktrama =$productModel->KiemTraMa($masp);
        // kiểm tra null và có mã trong csdl
        if (empty($masp)) {
            echo json_encode(array('message' => 'Vui lòng nhập mã để xóa.'));
            return;
        }
        
        else if($ktrama==false){
            echo json_encode([ 'message' => 'Mã này ko tồn tại ']);
            exit();
        }
        else{
        $result = $productModel->deleteproduct($masp);

        if ($result) {
            echo json_encode(['message' => 'Xóa sản phẩm thành công']);

        } else {
            echo json_encode(['message' => 'Xóa sản phẩm ko thành công']);
        }}
        echo json_encode($result);
    }
    
    
    
}
class Product
{
    public $masp;
    public $tensp;
    public $gia;
    public $khuyenmai;
    public $kichthuoc;
    public $madm;
    public $anhchinh;
    public $luotmua;
    public $luotxem;
    public $hsd;
    public $nsx;

    public function __construct($masp, $tensp,$gia,$kichthuoc,$khuyenmai,$soluong,$madm,$anhchinh,$luotxem,$luotmua,$hsd,$nsx)
    {
        $this->masp = $masp;
        $this->tensp = $tensp;
        $this->gia = $gia;
        $this->kichthuoc = $kichthuoc;
        $this->khuyenmai = $khuyenmai;
        $this->soluong = $soluong;
        $this->madm = $madm;
        $this->anhchinh = $anhchinh;
        $this->luotmua = $luotmua;
        $this->luotxem = $luotxem;
        $this->hsd = $hsd;
        $this->nsx = $nsx;
    }
}
