<?php
// pages/login.php
if (isset($_SESSION['username'])) {
  header('Location: index.php?page=home');
  exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');

  // Demo users
  $users = [
    ['username' => 'admin', 'password' => 'admin123', 'role' => 'Admin', 'image' => 'images/admin.webp'],
    ['username' => 'Razqa', 'password' => '123', 'role' => 'User', 'image' => 'images/razqa.jpeg'],
  ];


  $found = false;
  foreach ($users as $u) {
    if ($u['username'] === $username && $u['password'] === $password) {
      $_SESSION['username'] = $u['username'];
      $_SESSION['role'] = $u['role'];
      $_SESSION['image'] = $u['image'];
      header('Location: index.php?page=home');
      exit;
    }
  }
  $error = 'Username atau password salah!';
}
?>

<div class="row justify-content-center">
  <div class="col-md-5">
    <div class="card shadow border-0 mt-3">
      <div class="card-header bg-primary text-white text-center py-4">
        <i class="bi bi-person-lock fs-1 d-block mb-2"></i>
        <h4 class="fw-bold mb-0">Login</h4>
        <small>Masuk ke akun Anda</small>
      </div>
      <div class="card-body p-4">
        <?php if ($error): ?>
          <div class="alert alert-danger"><i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?></div>
        <?php endif; ?>

        <div class="alert alert-info small py-2">
          Admin: <code>admin</code> / <code>admin123</code><br>
          User: <code>Razqa</code> / <code>123</code><br>
        </div>

        <form method="POST">
          <div class="mb-3">
            <label class="form-label fw-semibold"><i class="bi bi-person me-1"></i>Username</label>
            <input type="text" name="username" class="form-control form-control-lg"
              placeholder="Masukkan username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>" required>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold"><i class="bi bi-lock me-1"></i>Password</label>
            <div class="input-group">
              <input type="password" name="password" id="passwordField" class="form-control form-control-lg"
                placeholder="Masukkan password" required>
              <button class="btn btn-outline-secondary" type="button" onclick="togglePass()">
                <i class="bi bi-eye" id="eyeIcon"></i>
              </button>
            </div>
          </div>
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="bi bi-box-arrow-in-right me-2"></i>Login
            </button>
          </div>
        </form>
      </div>
      <div class="card-footer text-center text-muted py-3">
        <small>Belum punya akun? <a href="#">Daftar di sini</a></small>
      </div>
    </div>
  </div>
</div>

<script>
  function togglePass() {
    const field = document.getElementById('passwordField');
    const icon = document.getElementById('eyeIcon');
    if (field.type === 'password') {
      field.type = 'text';
      icon.className = 'bi bi-eye-slash';
    } else {
      field.type = 'password';
      icon.className = 'bi bi-eye';
    }
  }
</script>