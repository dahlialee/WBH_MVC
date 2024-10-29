<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<section class="content-header">
  <h1>
    <?php echo $title 
    ?>

  </h1>
</section>
    
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container" style="margin: 10px 0;">
            <span class="btn btn-primary glyphicon glyphicon-plus btn-sm" id="addBtn"></span>
            <a class='btn btn-success'  onclick="xuatexcel()" title='Thêm'>
                    Xuất Excel</a>
          </div>
          
          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
             
              <legend>Thêm sản phẩm</legend>
              
              <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" required >
              </div>
              <div class="form-group">
                <label class="control-label" for="">Ảnh sản phẩm</label> <br>
                <input class="form-control" required type="file" id="anhchinh"  required="required"> <br> 
              </div>
              <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="gia" >
              </div>
              <div class="form-group">
                <label for="">Kích thước</label>
                <input type="text" class="form-control" id="size" >
              </div>
              <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" id="soluong">
              </div>
              <div class="form-group">
                <label for="">Danh mục sản phẩm</label>
                <select class="form-control" required="required"  id="chondm">
                  <!-- <option value="">--Chọn--</option> -->
                        <?php
                          foreach($data['category'] as $category): ?>                                                    
                          <option value='<?=$category['madm'];?>'><?=$category["tendm"];?></option>
                      <?php
                      endforeach;
                      ?>
                </select>   
              </div>
              <div class="form-group">
                <label for="">NSX</label>
                <input type="datetime-local" class="form-control" id="nsx" >
              </div>
              <div class="form-group">
                <label for="">HSD</label>
                <input type="datetime-local" class="form-control" id="hsd" >
              </div>
              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>
            
          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form" id="editForm">
              <legend>Cập nhật sản phẩm</legend>
              <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="nameEdit" >
                
              </div>
              <div class="form-group">
                  <label class="control-label" for="">Ảnh sản phẩm</label> <br>

                  <img id="productImage" src="" style="width: 100px" > <br>
                  <input class="form-control" type="file" id="anhchinhEdit"  > <br>
                  <span id="imageURL"></span>
              </div>
      
              <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="giaEdit" >
              </div>
              <div class="form-group">
                <label for="">Kích thước</label>
                <input type="text" class="form-control" id="sizeEdit" >
              </div>
              <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" id="soluongEdit" >
              </div>
              <div class="form-group">
                <label for="">Danh mục sản phẩm </label>
                <select class="form-control" required="required" id="chondmEdit">
                      <?php
                          foreach($data['category'] as $category): ?>                                                    
                          <option value='<?=$category['madm'];?>'><?=$category["tendm"];?></option>
                      <?php
                      endforeach;
                      ?>
                      
                </select>   
              </div>
              <div class="form-group">
                <label for="">NSX</label>
                <input type="datetime-local" class="form-control" id="nsxEdit" >
              </div>
              <div class="form-group">
                <label for="">HSD</label>
                <input type="datetime-local" class="form-control" id="hsdEdit" >
              </div>
              <span class="btn btn-success" id="edit2Btn">Cập nhật</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>
         
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr id="tbheader">
                <!-- <th><input type="checkbox" id="check-all-gd"></th> -->
                <th>STT</th>
                <th>Mã sp</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Kích thước</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>NSX</th>
                <th>HSD</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php 
             
                for ($i=0; $i < count($data['product']); $i++) { ?>
                  <tr>
                    <!-- <td><input type="checkbox" class="cbsp" value="< echo $data['product'][$i]['masp'] ?>"></td> -->
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $data['product'][$i]['masp'] ?></td>
                    <td><?php echo $data['product'][$i]['tensp'] ?></td>
                    <td><img style="width: 50px" src="public/images/<?php echo $data['product'][$i]['anhchinh'] ?>" class="productImage"></td>
                    <td><?php echo $data['product'][$i]['gia'] ?></td>
                    <td><?php echo $data['product'][$i]['kichthuoc'] ?></td>
                    <td><?php echo $data['product'][$i]['soluong'] ?></td>
                    
                    <td><?php echo $data['product'][$i]['tendm'] ?></td>
                    <td><?php echo $data['product'][$i]['nsx'];?></td>
                    <td><?php echo $data['product'][$i]['hsd'];?></td>
                    <td class="text-center">
                      
                      <span class="btn btn-primary editItemBtn" data-id='<?php echo $data['product'][$i]['masp'] ?>'> Sửa</span>
                      <span class="btn btn-danger delItemBtn" data-id='<?php echo $data['product'][$i]['masp'] ?>'>Xóa</span>
                    </td>
                  </tr>
                <?php
              }
               ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<!-- jQuery 3 -->
<script src="views/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="views/admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/admin/AdminLTE/dist/js/demo.js"></script>

<!-- page script -->
<script>
  $('#sptab').addClass('active');
  $(document).ready(function(){
      $('#example1 tr').not($('#tbheader')).click(function(event){
        if (event.target.type !== 'checkbox') {
          $(':checkbox', this).trigger('click');
        }
      })
      $('#example1').addClass('active');
      $('#check-all-gd').click(function() {
       $('input:checkbox').not(this).prop('checked', this.checked);
     });
    })
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
 
  }) 
  </script>
<script>
  $('#addBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  $('#cancelAddBtn').on('click',function(){
    $('#addArea').toggle(300);
  })
  $('#add2Btn').on('click',function(){
    // nsx = $('#nsx').val();
    // hsd = $('#hsd').val();
    // var confirmed = confirm("Ngày sản xuất: " + nsx + "\nHạn sử dụng: " + hsd );
    action('add',);
  })
  $('#edit2Btn').on('click',function(){
    
    // nsx = $('#nsxEdit').val();
    // hsd = $('#hsdEdit').val();
    // var confirmed = confirm("Ngày sản xuất: " + nsx + "\nHạn sử dụng: " + hsd );
    
    var id = $(this).data('id');
    action('edit',id);
  })

  $('.delItemBtn').on('click',function(){
    
    var cf = confirm('Bạn chắc muốn xóa sản phẩm?' + id);
    if(cf){
      var id = $(this).data('id');
      action('del',$(this).data('id') );  
    }
  })
  
  $('.editItemBtn').on('click',function(){

      // Lấy giá trị tên danh mục từ cột thứ 8 
      var tenDanhMuc = $(this).closest('tr').find('td:nth-child(8)').text().trim();

      // Lặp qua tất cả các tùy chọn trong menu dropdown
      $('#chondmEdit option').each(function() {
          if ($(this).text().trim() === tenDanhMuc) {
              // Nếu trùng khớp, đặt thuộc tính selected cho tùy chọn này
              $(this).prop('selected', true);
          }
      });                                

    $('#edit2Btn').attr('data-id', $(this).data('id'));
    $('#example1').toggle();
    $('#editArea').toggle(300);

    // Hiển thị dữ liệu trên text
    $('#nameEdit').val($(this).closest('tr').children('td:nth-child(3)').text());
    $('#giaEdit').val($(this).closest('tr').children('td:nth-child(5)').text());
    $('#sizeEdit').val($(this).closest('tr').children('td:nth-child(6)').text());
    $('#soluongEdit').val($(this).closest('tr').children('td:nth-child(7)').text());
    $('#nsxEdit').val($(this).closest('tr').children('td:nth-child(9)').text());
    $('#hsdEdit').val($(this).closest('tr').children('td:nth-child(10)').text());

    var imageUrl = $(this).closest('tr').find('img').attr('src');
    // Hiển thị đường dẫn hình ảnh trong thẻ img và hiển thị hình ảnh
    $('#productImage').attr('src', imageUrl);
    // hiển thị trên span
    var imageURL = $(this).closest('tr').find('.productImage').attr('src').replace("public/images/", "");
    $('#imageURL').text(imageURL);

        $('#anhchinhEdit').on('change', function() {
            // Xóa hết cái hiện có
            $('#imageURL').remove();
            $('#productImage').remove();
        });
    
  });

  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })

  function action(name, id=null){
    var name2 = anhchinh = gia = kichthuoc = chondm =soluong = nsx = hsd = '';
    if(name == 'add'){
      name2 = $('#name').val();
      anhchinh = $('#anhchinh').val().replace("C:\\fakepath\\", "",);// ảnh lấy từ máy
      gia = $('#gia').val();
      kichthuoc = $('#size').val();
      chondm = $('#chondm').val(); // lấy madm
      soluong = $('#soluong').val();
      nsx = $('#nsx').val();
      hsd = $('#hsd').val();
      if(name2 == ''){
        alert('Không được để trống ');
        return;
      }
    }
    else if (name == 'edit') {
      name2 = $('#nameEdit').val();
      anhchinh = $('#anhchinhEdit').val().replace("C:\\fakepath\\", "",);// ảnh lấy từ máy
      if (!anhchinh) {
            anhchinh = $('#imageURL').text();  // nếu null thì gán giá trị imageURL
      }
      gia = $('#giaEdit').val();
      kichthuoc = $('#sizeEdit').val();
      chondm = $('#chondmEdit').val();
      soluong = $('#soluongEdit').val();
      nsx = $('#nsxEdit').val();
      hsd = $('#hsdEdit').val();
      if (name2 == '') {
          alert('Không được để trống tên danh mục');
          return;
      }
    }
    $.ajax({
      url: 'productadmin/action',  // tên controller
      type: 'GET',
      dataType: 'text',
      data: {name, id, name2, anhchinh, gia, kichthuoc, chondm, soluong, nsx, hsd},
      success: function(result){
        location.reload();
      }
    })
    
  }

</script>
<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        if (name !== null) {
            exportData(name, '.xlsx');
        }

    }
   
function exportData(name, type) {
    const table = document.getElementById("example1");
    // Mảng dữ liệu mới sẽ được xuất ra Excel
    const dataToExport = [];

    // Lấy url
    const baseURL = window.location.protocol + "//" + window.location.host + "/WBH_MVC/public/images/";

    // Thêm cột tiêu đề vào mảng 
    const headerRow = [];
    const headerCells = table.getElementsByTagName("th");
    for (let i = 0; i < headerCells.length-1; i++) {
        headerRow.push(headerCells[i].textContent.trim());
    }
    dataToExport.push(headerRow);

    // Duyệt qua từng hàng trong bảng :start 1
    const rows = table.getElementsByTagName("tr");
    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const rowData = [];
        // Duyệt qua từng ô trong hàng
        const cells = row.getElementsByTagName("td");
        for (let j = 0; j < cells.length - 1; j++) { // Loại bỏ cột cuối cùng
            const cell = cells[j];
            //  đường dẫn từ thẻ <img> trong cột thứ 4
            if (j === 3) {
                const imgSrc = cell.querySelector('img').src;
                // chỉ giữ lại phần đường dẫn tương đối
                const relativePath = imgSrc.replace(baseURL, "");
                rowData.push(relativePath);
            } else {
                // Thêm dữ liệu từ ô vào mảng 
                rowData.push(cell.textContent.trim());
            }
        }
        // Thêm hàng dữ liệu mới vào mảng dữ liệu
        dataToExport.push(rowData);
    }

    // Xuất bảng sang Excel
    const wb = XLSX.utils.book_new();
    const ws = XLSX.utils.aoa_to_sheet(dataToExport);
    XLSX.utils.book_append_sheet(wb, ws, "Data");
    XLSX.writeFile(wb, name + type);
}

      // // Kiểm tra xem có phải là cột thứ 5 hoặc thứ 6 không
      // else if (j !== 4 && j !== 5) { // Không phải cột thứ 5 hoặc thứ 6
      //     // Thêm dữ liệu từ ô vào mảng dữ liệu mới như bình thường
      //     rowData.push(cell.textContent.trim());
      // }
   
</script>

<script src="live/lib/js/sheet.js"></script>

