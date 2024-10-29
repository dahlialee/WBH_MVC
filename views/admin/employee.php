<section class="content-header">
  <h1>
    <?php echo $title ?>
    <small>Version 2.0</small>
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
            <a class='btn btn-primary'  onclick="xuatexcel()" title='Xuất'> Excel</a>
          </div>
          <div class="container" style="margin-bottom: 15px; display: none" id="addArea">
            <form action="" method="POST" role="form">
              <legend>Thêm nhân viên</legend>
            
              <div class="form-group">
                <label for="">Tên</label>
                <input type="text" class="form-control" id="name" >
              </div>
              <div class="form-group">
                <label for="">Tên tài khoản</label>
                <input type="text" class="form-control" id="username" >
              </div>
              <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="password" >
              </div>
              <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="cpassword" >
              </div>
              <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="addr" >
              </div>
              <div class="form-group">
                <label for="">SDT</label>
                <input type="text" class="form-control" id="tel" >
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="email" >
              </div>
              <div class="form-group">
                <label for="">Quyền</label>
                <input type="text" class="form-control" id="quyen" >
              </div>
            
              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelBtn">Hủy</span>
            </form>
          </div>
          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Sửa nhân viên</legend>
              
              <div class="form-group">
                <label for="">Tên</label>
                <input type="text" class="form-control" id="nameEdit" >
              </div>
              <div class="form-group">
                <label for="">Tên tài khoản</label>
                <input type="text" class="form-control" id="usernameEdit" >
              </div>
              <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="passwordEdit" >
              </div>
              <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="cpasswordEdit" >
              </div>
              <div class="form-group">
                <label for="">Địa chỉ</label>
                <input type="text" class="form-control" id="addrEdit" >
              </div>
              <div class="form-group">
                <label for="">SDT</label>
                <input type="text" class="form-control" id="telEdit" >
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" id="emailEdit" >
              </div>
              <div class="form-group">
                <label for="">Quyền</label>
                <input type="text" class="form-control" id="quyenEdit" >
              </div>
              <span class="btn btn-success" id="edit2Btn">Sửa</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>ID</th>
                <th>Tên thành viên</th>
                <th>Tên tài khoản</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Ngày tham gia</th>
                <th>Quyền</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                for ($i=0; $i < count($data['employee']); $i++) { ?>
                  <tr>
                    <td><?php echo $i + 1 ?></td>
                    <td><?php echo $data['employee'][$i]['id'] ?></td>
                    <td><?php echo $data['employee'][$i]['ten'] ?></td>
                    <td><?php echo $data['employee'][$i]['tentaikhoan'] ?></td>
                    <td><?php echo $data['employee'][$i]['matkhau'] ?></td>
                    <td><?php echo $data['employee'][$i]['diachi'] ?></td>
                    <td><?php echo $data['employee'][$i]['sdt'] ?></td>
                    <td><?php echo $data['employee'][$i]['email'] ?></td>
                    <td><?php echo $data['employee'][$i]['date'] ?></td>
                    <td><?php echo $data['employee'][$i]['quyen'] ?></td>
                    <td class="text-center">
                      <span class="btn btn-primary btn-sm editItemBtn" data-id="<?php echo $data['employee'][$i]['id'] ?>">Sửa</span>
                      <span class="btn btn-danger btn-sm delBtn" data-id="<?php echo $data['employee'][$i]['id'] ?>">Xóa</span>
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
  $('#nvtab').addClass('active');
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
  $('.delBtn').on('click',function(){
    var cf = confirm('Hãy cân nhắc kỹ! Bạn có chắc muốn xóa tài khoản này?');
    if(cf){
      var id = $(this).data('id');
      action('del',$(this).data('id'));
    }
  })
  $('#addBtn').click(function(){
    $('#addArea').toggle(300);
  })
  $('#add2Btn').click(function(){
    action('add');
  })
  $('#cancelBtn').click(function(){
    $('#addArea').toggle(300);
  })
  $('#edit2Btn').on('click',function(){
    var id = $(this).data('id');
    action('edit',id);
  })
  $('.editItemBtn').on('click', function() {
    
    $('#edit2Btn').attr('data-id', $(this).data('id'));
    $('#example1').toggle();
    $('#editArea').toggle(300);

    $('#nameEdit').val($(this).closest('tr').children('td:nth-child(3)').text());
    $('#usernameEdit').val($(this).closest('tr').children('td:nth-child(4)').text());
    $('#passwordEdit').val($(this).closest('tr').children('td:nth-child(5)').text());
    $('#cpasswordEdit').val($(this).closest('tr').children('td:nth-child(5)').text());
    $('#emailEdit').val($(this).closest('tr').children('td:nth-child(6)').text());
    $('#telEdit').val($(this).closest('tr').children('td:nth-child(7)').text());
    $('#addrEdit').val($(this).closest('tr').children('td:nth-child(8)').text());
    $('#quyenEdit').val($(this).closest('tr').children('td:nth-child(10)').text());


  });
  $('#cancelEditBtn').on('click',function(){
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })
  function action(name, id=null){
    var name2 = username = cpassword = password = addr = tel = email = quyen = '';

    if(name == 'add'){
      name2 = $('#name').val();
      username = $('#username').val();
      password = $('#password').val();
      cpassword = $('#cpassword').val();
      addr = $('#addr').val();
      tel = $('#tel').val();
      email = $('#email').val();
      quyen = $('#quyen').val();
      // $now = new DateTime(null, new DateTimeZone('ASIA/Ho_Chi_Minh'));
			// $now = $now->format('Y-m-d H:i:s');
      // quyen = 1;

      if(username == '' || password == ''){
        alert('Không được để trống!');
        return;
      }
      if(password != cpassword){
        alert('Mật khẩu nhập lại không trùng khớp!');
        return;
      }
    }else if(name == 'edit'){
      name2 = $('#nameEdit').val();
      username = $('#usernameEdit').val();
      password = $('#passwordEdit').val();
      cpassword = $('#cpasswordEdit').val();
      addr = $('#addrEdit').val();
      tel = $('#telEdit').val();
      email = $('#emailEdit').val();
      quyen = $('#quyenEdit').val();

      if(username == '' || password == ''){
        alert('Không được để trống!');
        return;
      }
      if(password != cpassword){
        alert('Mật khẩu nhập lại không trùng khớp!');
        return;
      }
    }
    $.ajax({
      url: 'employee/action',
      type: 'POST',
      dataType: 'text',
      data: {name, id, name2, username, password, addr, tel, email, quyen},
      success: function(result){
        location.reload();
      },
      error: function(xhr, status, error){
            // Xử lý lỗi nếu có
            console.error(error);
            alert('Đã xảy ra lỗi khi thêm tài khoản!');
        }
    })
    
  }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        exportData(name, '.xlsx');

    }

    function exportData(name, type) {
    // Lấy bảng customers
    const table = document.getElementById("example1");

    // Loại bỏ cột cuối cùng của bảng
    const rows = table.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        const cells = row.getElementsByTagName("td");
        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (j == 5) { // Nếu là cột số điện thoại
                const value = cell.textContent || cell.innerText;
                cell.textContent ="'" + value; // Cập nhật giá trị để đảm bảo không mất số 0
            }
        }
        if (cells.length > 0) {
            row.deleteCell(cells.length - 1); // Loại bỏ ô cuối cùng
        }
    }

    // Xuất bảng sang Excel
    const fileName = name + type;
    const wb = XLSX.utils.table_to_book(table);
    XLSX.writeFile(wb, fileName);
}


</script>

<script src="live/lib/js/sheet.js"></script>