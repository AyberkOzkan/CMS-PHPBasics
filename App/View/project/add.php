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
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="<?=assets('plugins/sweetalert2/sweetalert2.css')?>">

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
            <h1 class="m-0">Proje Ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= _link('') ?>">Keşfet</a></li>
              <li class="breadcrumb-item"><a href="<?= _link('project') ?>">Projeler</a></li>
              <li class="breadcrumb-item active">Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <form id="project" name="customer_form">
            <div class="card-body">
              <div class="form-group">
                <label for="customer_id">Müşteri Seçiniz</label>
                <select id="customer_id" name="customer_id" class="form-control">
                  <option value="">- Müşteri Seçiniz -</option>
                    <?php foreach ($data['customers'] as $key => $value):?>
                      <option value="<?= $value['id']; ?>"><?= $value['name'] . ' ' . $value['surname'] ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="title">Proje Başlığı</label>
                <input type="text" class="form-control" id="title">
              </div>
              <div class="form-group">
                <label for="description">Proje Detayları</label>
                <textarea class="form-control" id="description"></textarea>
              </div>
              <div class="form-group">
                <label for="start_date">Başlangıç Tarihi</label>
                <input type="date" class="form-control" id="start_date">
              </div>
              <div class="form-group">
                <label for="end_date">Bitiş Tarihi</label>
                <input type="date" class="form-control" id="end_date">
              </div>
              <div class="form-group">
                <label for="progress">İlerleyiş</label>
                <input type="range" min="0" max="100" class="form-control" id="progress">
              </div>
              <div class="form-group">
                <label for="status">Proje Durumu</label>
                <select id="status" class="form-control">
                  <option value="a">Aktif</option>
                  <option value="p">Pasif</option>
                </select>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ekle</button>
            </div>
        </form>
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
<!-- Bootstrap 4 -->
<script src="<?=assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?=assets('js/adminlte.min.js')?>"></script>
<!-- Axios -->
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.8/dist/axios.min.js" integrity="sha256-KdYARiowaU79FbmEi0ykLReM0GcAknXDWjBYASERQwQ=" crossorigin="anonymous"></script>
<!-- sweetalert2 -->
<script src="<?=assets('plugins/sweetalert2/sweetalert2.all.js')?>"></script>
<script>

  const project = document.getElementById('project');
  project.addEventListener('submit', (e) => {
    let customer_id = document.getElementById('customer_id').value;
    let title = document.getElementById('title').value;
    let start_date = document.getElementById('start_date').value;
    let end_date = document.getElementById('end_date').value;
    let progress = document.getElementById('progress').value;
    let status = document.getElementById('status').value;
    let description = document.getElementById('description').value;

    let formData = new FormData();
    formData.append('customer_id', customer_id);
    formData.append('title', title);
    formData.append('start_date', start_date);
    formData.append('end_date', end_date);
    formData.append('progress', progress);
    formData.append('status', status);
    formData.append('description', description);

    axios.post('<?= _link('project/add') ?>', formData)
      .then(res =>{
        console.log(res);


        swal.fire(
          res.data.title,
          res.data.msg,
          res.data.status

        )

        if (res.data.redirect) {
          window.location.href = res.data.redirect;
        }
      })
      .catch((err) => {
        console.log(err);
      });
    e.preventDefault();
  });

</script>
</body>
</html>
