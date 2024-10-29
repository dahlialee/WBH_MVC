<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<section class="content-header">
  <h1>
    <?php echo $title ?>
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
            <a class='btn btn-success'  onclick="xuatexcel()" title='Xuất'>
                   Excel</a>
          </div>

          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Thêm danh mục</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" id="categoryName">
              </div>
              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>

          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Sửa danh mục</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" id="categoryNameEdit">
              </div>
              <span class="btn btn-success" id="edit2Btn">Cập nhật</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>
          
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã danh mục</th>
                <th>Tên danh mục</th>
                <th>Tổng sản phẩm</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              for ($i=0; $i < count($data['category']); $i++) { ?>
              <tr>
                <td><?php echo $i + 1 ?></td>
                <td><?php echo $data['category'][$i]['madm'] ?></td>
                <td><?php echo $data['category'][$i]['tendm'] ?></td>
                <td><?php echo $data['category'][$i]['tongsp'] ?></td>
                <td class="text-center">
                  <span class="btn btn-primary editItemBtn" data-id='<?php echo $data['category'][$i]['madm'] ?>'>Sửa</span>
                  <span class="btn btn-danger delItemBtn" data-id='<?php echo $data['category'][$i]['madm'] ?>'>Xóa</span>
                </td>
              </tr>
              <?php }
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
  $('#dmsptab').addClass('active');
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
    action('add',);
  })
  $('#edit2Btn').on('click',function(){
    var id = $(this).data('id');
    action('edit',id);
  })
  $('.delItemBtn').on('click',function(){
    var cf = confirm('Bạn chắc chứ?');
    if(cf){
      var id = $(this).data('id');
      action('del', id);  
    }
  })
  $('.editItemBtn').on('click',function(){
    $('#edit2Btn').attr('data-id',$(this).data('id'));
    $('#example1').toggle();
    $('#editArea').toggle(300);
    // hiện giá trị:  tendm là cột thứ 3
    $('#categoryNameEdit').val($(this).closest('tr').children('td:nth-child(3)').text());
  })
  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })

  function action(name, id=null){
    var name2= '';
    if(name == 'add'){
      name2 = $('#categoryName').val();
      if(name2 == ''){
        alert('Không được để trống tên danh mục');
        return;
      }
    }
    else if (name == 'edit') {
        name2 = $('#categoryNameEdit').val(); 
        if (name2 == '') {
            alert('Không được để trống tên danh mục');
            return;
        }
    }
    $.ajax({
      url: 'category/action',
      type: 'GET',
      dataType: 'text',
      data: {name, id, name2},
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
        // Lấy bảng customers
        const table = document.getElementById("example1");

        // Loại bỏ cột cuối cùng của bảng
        const rows = table.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            if (row.cells.length > 0) {
                row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
            }
        }
        // Xuất bảng sang Excel
        const fileName = name + type;
        const wb = XLSX.utils.table_to_book(table);
        XLSX.writeFile(wb, fileName);
    }
//     function exportData(name, type) {
//     // Lấy bảng customers
//     const table = document.getElementById("example1");

//     // Loại bỏ cột thứ 4, 5 và cột cuối cùng của bảng
//     const rows = table.getElementsByTagName("tr");
//     for (let i = 0; i < rows.length; i++) {
//         const row = rows[i];
//         if (row.cells.length >= 5) {
//             row.deleteCell(4); // Loại bỏ cột 5
//             row.deleteCell(3); // Loại bỏ cột  4
//         }
//         if (row.cells.length > 0) {
//             row.deleteCell(row.cells.length - 1); // Loại bỏ cột cuối cùng
//         }
//     }
//     // Xuất bảng sang Excel
//     const fileName = name + type;
//     const wb = XLSX.utils.table_to_book(table);
//     XLSX.writeFile(wb, fileName);
// }
</script>

<script src="live/lib/js/sheet.js"></script>




