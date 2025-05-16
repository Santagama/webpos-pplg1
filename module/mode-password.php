<?php

function update($data)
{
  global $koneksi;

  $curPass = trim(mysqli_real_escape_string($koneksi, $_POST['curPass']));
  $newPass = trim(mysqli_real_escape_string($koneksi, $_POST['newPass']));
  $confPass = trim(mysqli_real_escape_string($koneksi, $_POST['confPass']));

  //buat variable untuk menampung user yang aktif
  $userActive = userLogin()['username'];

  //cek apakah pass baru sama dengan confirmasi pass
  if ($newPass !== $confPass) {
    echo "<script>
    alert('Password gagal diperbarui..');
    document.location='?msg=err1';
  </script>";
    return false;
  }

  //cek pass sekarang sama dengan di database atau tidak
  if (!password_verify($curPass, userLogin()['password'])) {
    echo "<script>
    alert('Password gagal diperbarui..');
    document.location='?msg=err2';
  </script>";
    return false;
  } else {
    // variable untuk menyimpan pass baru
    $pass = password_hash($newPass, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "UPDATE tbl_user SET password = '$pass' WHERE username = '$userActive' ");
    return mysqli_affected_rows($koneksi);
  }
}
