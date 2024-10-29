
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
        <form action="" method="POST" role="form">
        </form>
          <div class="container" style="margin: 10px 0;">
            <span class="btn btn-primary glyphicon glyphicon-plus btn-sm" id="addBtn"></span>
          </div>
          
          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
             
              <legend>Thêm tin tức</legend>
              
              <div class="form-group">
                <label for="">Mã tin tức</label>
                <input type="text" class="form-control" id="matt" required >
              </div>
              <div class="form-group">
                <label for="">Tên tin tức</label>
                <input type="text" class="form-control" id="tentt" required >
              </div>
              <div class="form-group">
                <label class="control-label" for="">Hình ảnh</label> <br>
                <input class="form-control" required type="file" id="hinhanh"  required="required"> <br> 
              </div>
              <div class="form-group">
                <label for="">Nội dung</label>
                <input type="text" class="form-control" id="noidung" >
              </div>
              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>

          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form" id="editForm">
              <legend>Cập nhật tin tức</legend>
              <div class="form-group">
                <label for="">Tên tin tức</label>
                <input type="text" class="form-control" id="tenttEdit" >
              </div>
              <div class="form-group">
                  <label class="control-label" for="">hình ảnh</label> <br>
                  <img id="productImage" src="" style="width: 100px" > <br>
                  <input class="form-control" type="file" id="hinhanhEdit"  > <br>
                  <span id="imageURL"></span>
              </div>
      
              <div class="form-group">
                <label for="">Nội dung</label>
                <input type="text" class="form-control" id="noidungEdit" >
              </div>
              <span class="btn btn-success" id="edit2Btn">Cập nhật</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>

          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr id="tbheader">
                <th>STT</th>
                <th>Mã TT</th>
                <th>Tên tin tức</th>
                <th>Ảnh</th>
                <th>Nội dung</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for ($i=0; $i < count($data); $i++) { ?>
                  <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $data[$i]['matt'] ?></td>
                    <td><?php echo $data[$i]['tentt'] ?></td>
                    <td><img style="width: 50px" src="public/images/<?php echo $data[$i]['hinhanh'] ?>" class="productImage"></td>
                    <td><?php echo $data[$i]['noidung'] ?></td>
                    <td class="text-center">
                      <span class="btn btn-primary editItemBtn" data-id='<?php echo $data[$i]['matt'] ?>'> Sửa</span>
                      <span class="btn btn-danger delItemBtn" data-id='<?php echo $data[$i]['matt'] ?>'>Xóa</span>
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
  $('#tttab').addClass('active');
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
  $('.delItemBtn').on('click', function() {
    var id = $(this).data('id');
    var cf = confirm('Bạn có chắc muốn xóa tin tức này? ' + id);
    if (cf) {
        action('del', id);
    }
  });
  $('#addBtn').click(function(){
    $('#addArea').toggle(300);
  })
  $('#add2Btn').click(function(){
    // hinhanh = $('#hinhanh').val();
    // var confirmed = confirm(hinhanh);
    action('add');
  })
  $('#cancelAddBtn').on('click',function(){
    $('#addArea').toggle(300);
  })

  // sửa edit 
  $('.editItemBtn').on('click',function(){

  // var defaultcategoryName = $(this).closest('tr').children('td:nth-child(8)').text().trim();
    // var cf = confirm('Bạn chắc muốn ?' + defaultcategoryName);

  $('#edit2Btn').attr('data-id', $(this).data('id'));
  $('#example1').toggle();
  $('#editArea').toggle(300);

  // Hiển thị dữ liệu trên text
  $('#tenttEdit').val($(this).closest('tr').children('td:nth-child(3)').text());
  $('#noidungEdit').val($(this).closest('tr').children('td:nth-child(5)').text());

  // Lấy đường dẫn hình ảnh từ thẻ img trong cùng một hàng
  var imageUrl = $(this).closest('tr').find('img').attr('src');
  // Hiển thị đường dẫn hình ảnh trong thẻ img và hiển thị hình ảnh
  $('#productImage').attr('src', imageUrl);

  // hiển thị trên span
  var imageURL = $(this).closest('tr').find('.productImage').attr('src').replace("public/images/", "");
    $('#imageURL').text(imageURL);

        $('#hinhanhEdit').on('change', function() {
            // Xóa hết cái hiện có
            $('#imageURL').remove();
            $('#productImage').remove();
        });
    
  });
  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })
  $('#edit2Btn').on('click',function(){
    var id = $(this).data('id');
    action('edit',id);
  })
  function action(name, id=null){
    var matt = tentt = hinhanh = noidung ='';
    if(name == 'add'){
      matt = $('#matt').val();
      tentt = $('#tentt').val();
      hinhanh = $('#hinhanh').val().replace("C:\\fakepath\\", "",);
      noidung = $('#noidung').val();
      if(matt == '' ){
        alert('Không được để trống!');
        return;
      }
    }
    
    else if (name == 'edit') {
      tentt = $('#tenttEdit').val();
      hinhanh = $('#hinhanhEdit').val().replace("C:\\fakepath\\", "",);// ảnh lấy từ máy
      if (!hinhanh) {
        hinhanh = $('#imageURL').text();  // nếu null thì gán giá trị imageURL
      }
      // hinhanh = $('#hinhanhEdit').val().replace("C:\\fakepath\\", "",);// ảnh lấy từ máy
      noidung = $('#noidungEdit').val();
      if (tentt == '') {
          alert('Không được để trống tên danh mục');
          return;
      }
    }
  
    $.ajax({
      url: 'tintucadmin/action',  // tên controller
      type: 'GET',
      dataType: 'text',
      data: {name, id, matt, tentt, hinhanh, noidung},
      success: function(result){
          location.reload();
      }
    });
    
  }
</script>
