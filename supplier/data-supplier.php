<?php
session_start();
if (!isset($_SESSION['ssLoginPOS'])) {
  header("location: ../auth/login.php");
  exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-supplier.php";

$title = "Data Supplier - Market PPLG";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];
} else {
  $msg = '';
}

$alert = '';
if ($msg == 'deleted') {
  $alert = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  Supplier berhasil dihapus..
                </div>';
}

if ($msg == 'aborted') {
  $alert = '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                  Supplier gagal dihapus..
                </div>';
}

if ($msg == 'updated') {
  $alert = '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check-circle"></i> Alert!</h5>
                  Supplier berhasil diperbarui..
                </div>';
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $main_url ?>supplier/data-supplier.php">Home</a></li>
            <li class="breadcrumb-item active">Supplier</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <?php if ($alert != '') {
        echo $alert;
      } ?>
      <div class="card">

        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Data Supplier</h3>
          <div class="card-tools">
            <a href="<?= $main_url ?>supplier/add-supplier.php" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus fa-sm"></i> Add Supplier</a>
          </div>
        </div>
        <div class="card-body table-responsive p-3">
          <table class="table table-hover text-nowrap" id="tblData">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th style="width: 10%;">Operasi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $supplier = getData("SELECT * FROM tbl_supplier");
              foreach ($supplier as $s): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $s['nama'] ?></td>
                  <td><?= $s['telp'] ?></td>
                  <td><?= $s['alamat'] ?></td>
                  <td><?= $s['deskripsi'] ?></td>
                  <td>
                    <a href="edit-supplier.php?id=<?= $s['id_supplier'] ?>" class="btn btn-sm btn-warning"><i
                        class="far fa-edit"></i></a>
                    <a href="del-supplier.php?id=<?= $s['id_supplier'] ?>"
                      class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin akan menghapus supplier ini?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </section>
</div>

<?php require "../template/footer.php"; ?>