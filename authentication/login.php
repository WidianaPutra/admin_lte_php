<?php
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rememberMe = isset($_POST['rememberMe']) ? 1 : 0;

  $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
  $result = $conn->query($sql);
  $assoc_data = $result->fetch_assoc();

  if ($result->num_rows > 0) {
    if ($rememberMe === 1) {
      setcookie('username', $username, time() + 60 * 60 * 24 * 7);
      setcookie('account_id', $assoc_data['id'], time() + 60 * 60 * 24 * 7);
    }
  }

}
?>
<div class="w-100 d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="mt-3 mb-3 py-3 px-5" style="width: 50%; background-color: #fff; border-radius: 10px;">
    <h2 class="mb-4 text-center">Login</h2>
    <form method="POST">
      <!-- email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required">
      </div>
      <!-- Nama -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required">
      </div>
      <!-- Email -->
      <div class="mb-3">
        <input type="checkbox" name="rememberMe" id="rememberMe">
        <label for="rememberMe">Ingat saya</label>
      </div>
      <button type=" submit" class="btn btn-primary w-100" name="submit">Submit</button>
    </form>
  </div>
</div>