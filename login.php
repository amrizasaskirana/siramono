<?php
session_start();
include './CRUD/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $username = htmlspecialchars($_POST['username']);
  $password = $_POST['password'];

  $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if (mysqli_num_rows($query) === 1) {
    $user = mysqli_fetch_assoc($query);
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      header("Location: beranda.html");
      exit;
    } else {
      echo "<script>
              alert('Password salah!');
              window.location.href = 'login.html';
            </script>";
    }
  } else {
    echo "<script>
            alert('Username tidak ditemukan!');
            window.location.href = 'login.html';
          </script>";
  }
} else {
  echo "Method not allowed!";
}
