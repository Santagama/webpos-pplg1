<?php
function uploadimg()
{
  $namafile = $_FILES['image']['name'];
  $ukuran = $_FILES['image']['size'];
  $tmp = $_FILES['image']['tmp_name'];

  // validasi file gambar yang boleh di upload
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
  $ekstensiGambar = explode('.', $namafile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

    echo '<script>
            alert("file yang anda upload bukan gambar, data gagal diupdate");            
            </script>';
    return false;
  }

  //validasi ukuran gambar max 1MB
  if ($ukuran > 1000000) {
    echo '<script>
            alert("Ukuran gambar melebihi 1MB, data gagal diupdate");
            </script>';
    return false;
  }

  $namaFileBaru = rand(10, 1000) . '-' . $namafile;

  move_uploaded_file($tmp, '../assets/image/' . $namaFileBaru);
  return $namaFileBaru;
}

function insert($data)
{
  global $koneksi;

  $username = strtolower(mysqli_real_escape_string($koneksi, $data['username']));
  $fullname = mysqli_real_escape_string($koneksi, $data['fullname']);
  $password = mysqli_real_escape_string($koneksi, $data['password']);
  $password2 = mysqli_real_escape_string($koneksi, $data['password2']);
  $level = mysqli_real_escape_string($koneksi, $data['level']);
  $address = mysqli_real_escape_string($koneksi, $data['address']);
  $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

  if ($password !== $password2) {
    echo "<script>alert('Konfirmasi password tidak sesuai')</script>";
    return false;
  }

  $pass = password_hash($password, PASSWORD_DEFAULT);

  $cekUsername = mysqli_query($koneksi, "SELECT username FROM tbl_user WHERE username = '$username'");
  if (mysqli_num_rows($cekUsername) > 0) {
    echo "<script>alert('Username sudah terpakai')</script>";
    return false;
  }

  if ($gambar != null) {
    $gambar = uploadimg();
  } else {
    $gambar = 'default.jpg';
  }

  //gambar tidak sesuai validasi
  if ($gambar == '') {
    return false;
  }

  $sqlUser = "INSERT INTO tbl_user VALUE (null, '$username', '$fullname', '$pass', '$address', '$level', '$gambar')";
  mysqli_query($koneksi, $sqlUser);
  return mysqli_affected_rows($koneksi);
}
