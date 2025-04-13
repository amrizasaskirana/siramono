<?php
session_start();
include './CRUD/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = htmlspecialchars(trim($_POST['username']));
  $email = htmlspecialchars(trim($_POST['email']));
  $password = $_POST['password'];

  $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
  if (mysqli_num_rows($check) > 0) {
    echo "<script>
                alert('Username atau email sudah terdaftar!');
                window.location.href = 'register.html';
              </script>";
    exit;
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $insert = mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashedPassword')");

  if ($insert) {
    echo "<script>
                alert('Registrasi berhasil!');
                window.location.href = 'login.html';
              </script>";
  } else {
    echo "<script>
                alert('Registrasi gagal. Silakan coba lagi.');
                window.location.href = 'register.html';
              </script>";
  }
}
