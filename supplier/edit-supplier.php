<?php
session_start();
if (!isset($_SESSION['ssLoginPOS'])) {
  header("location: ../auth/login.php");
  exit();
}

require "../config/config.php";
require "../config/functions.php";
require "../module/mode-supplier.php";

$title = "Edit Supplier - Market PPLG";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$id = $_GET['id'];

$sqlEdit = "SELECT * FROM tbl_supplier WHERE id_supplier = '$id' ";
$supplier = getData($sqlEdit)[0];

$alert = '';

// jalankan fungsi update data
if (isset($_POST['koreksi'])) {
  if (update($_POST)) {
    echo "<script>document.location.href = 'data-supplier.php?msg=updated';</script>";
  }
}
?>

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
            <li class="breadcrumb-item"><a href="<?= $main_url ?>dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $main_url ?>supplier/data-supplier.php">Supplier
              </a></li>
            <li class="breadcrumb-item active">Edit Supplier</li>
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
        <form action="" method="post">
          <div class="card-header">
            <h3 class="card-title"><i class="far fa-edit"></i> Edit Supplier</h3>
            <button type="submit" name="koreksi" class="btn btn-primary btn-sm float-right"><i class="fas fa-save"></i>
              Update</button>
            <button type="reset" class="btn btn-danger btn-sm float-right mr-1"><i class="fas fa-times"></i>
              Reset</button>
          </div>
          <div class="card-body">
            <div class="row">
              <input type="hidden" name="id" value="<?= $supplier['id_supplier']; ?>">
              <div class="col-lg-8 mb-3">
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama supplier" autofocus autocomplete="off" value="<?= $supplier['nama']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="telpon">Telepon</label>
                  <input type="text" name="telpon" id="telpon" class="form-control" placeholder="nomor telepon supplier" pattern="[0-9]{5,}" value="<?= $supplier['telp']; ?>" required>
                </div>
                <div class="form-group">
                  <label for="ketr">Deskripsi</label>
                  <textarea name="ketr" id="ketr" rows="1" class="form-control" placeholder="Keterangan supplier" required><?= $supplier['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" rows="1" class="form-control" placeholder="Alamat supplier" required><?= $supplier['alamat']; ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php require "../template/footer.php"; ?>