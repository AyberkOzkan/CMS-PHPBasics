<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=assets('plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=assets('css/adminlte.min.css')?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=assets('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=assets('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>">
  <link rel="stylesheet" href="<?=assets('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')?>">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


 <?= $data['navbar'];?> 
 <?= $data['sidebar'];?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Müşteriler</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link(' ') ?>">Keşfet</a></li>
              <li class="breadcrumb-item active">Müşteriler</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Müşteriler</th>
                    <th>E-Posta</th>
                    <th>Projeleri</th>
                    <th>Eylem</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($data['customers'] as $key => $value):?>
                      <tr id="row_<?= $value['id']; ?>">
                        <td><?= $value['id']?></td>
                        <td><?= $value['name'] . ' ' . $value['surname'] ?></td>
                        <td><?= $value['email']?></td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                          </div>
                        </td>
                        <td>
                          <!-- <span class="badge bg-danger">55%</span> -->
                          <div class="btn-group btn-group-sm">
                            <button class="btn btn-sm btn-danger" onclick="removeCustomer(<?= $value['id']; ?>)">Sil</button>
                            <a href="<?= _link('customer/edit/' . $value['id']); ?>" class="btn btn-sm btn-info">Güncelle</a>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <!-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> -->
                </table>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=assets('plugins/jquery/jquery.min.js')?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?=assets('plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-responsive/js/dataTables.responsive.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-buttons/js/dataTables.buttons.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')?>"></script>
<script src="<?=assets('plugins/jszip/jszip.min.js')?>"></script>
<script src="<?=assets('plugins/pdfmake/pdfmake.min.js')?>"></script>
<script src="<?=assets('plugins/pdfmake/vfs_fonts.js')?>"></script>
<script src="<?=assets('plugins/datatables-buttons/js/buttons.html5.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-buttons/js/buttons.print.min.js')?>"></script>
<script src="<?=assets('plugins/datatables-buttons/js/buttons.colVis.min.js')?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets('js/adminlte.min.js')?>"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.8/dist/axios.min.js" integrity="sha256-KdYARiowaU79FbmEi0ykLReM0GcAknXDWjBYASERQwQ=" crossorigin="anonymous"></script>
<!-- sweetalert2 -->
<script src="<?=assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script>

  function removeCustomer(id){
    let customer_id = id;
    let formData = new FormData();
    formData.append('customer_id', customer_id);

    axios.post('<?= _link('customer/delete') ?>', formData)
      .then(res =>{
        console.log(res);
        if (res.data.remove) {
          document.getElementById('row_' + res.data.remove).remove();
          // window.location.href = res.data.redirect;

        }
        swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status

        )




      })
      .catch((err) => {
        console.log(err);
      });

  }

  // const customer = document.getElementById('customer');
  // customer.addEventListener('submit', (e) => {
  //   let customer_name = document.getElementById('customer_name').value;
  //   let customer_surname = document.getElementById('customer_surname').value;
  //   let customer_company = document.getElementById('customer_company').value;
  //   let customer_phone = document.getElementById('customer_phone').value;
  //   let customer_gsm = document.getElementById('customer_gsm').value;
  //   let customer_email = document.getElementById('customer_email').value;
  //   let customer_address = document.getElementById('customer_address').value;


  //   formData.append('customer_name', customer_name);
  //   formData.append('customer_surname', customer_surname);
  //   formData.append('customer_company', customer_company);
  //   formData.append('customer_phone', customer_phone);
  //   formData.append('customer_gsm', customer_gsm);
  //   formData.append('customer_email', customer_email);
  //   formData.append('customer_address', customer_address);

    
  //   e.preventDefault();
  // });

</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


</script>
</body>
</html>
