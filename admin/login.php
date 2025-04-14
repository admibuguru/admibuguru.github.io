<?php
session_start();
if (isset($_SESSION['admin'])) {
  header("Location: index.php");
  exit;
}
?>

<form action="login.php" method="POST">
  <h2>Login Admin</h2>
  Username: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <button type="submit">Login</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_POST['username'];
  $pass = $_POST['password'];

  // contoh akun admin default
  if ($user === "admin" && $pass === "admin123") {
    $_SESSION['admin'] = $user;
    header("Location: index.php");
  } else {
    echo "Login gagal";
  }
}
?>
