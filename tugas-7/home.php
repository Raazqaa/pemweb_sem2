<?php
// pages/home.php - Card Horizontal Bootstrap
?>
<div class="page-header mb-4">
  <h2 class="fw-bold"><i class="bi bi-house-heart me-2 text-primary"></i>Beranda</h2>
  <p class="text-muted">Selamat datang di Web personal saya!</p>
</div>

<!-- Profile Card Horizontal -->
<div class="card shadow-sm mb-4 border-0 overflow-hidden">
  <div class="row g-0">
    <div class="col-md-3 bg-primary d-flex align-items-center justify-content-center p-4">
      <div class="text-center text-white">
        <img src="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : 'images/default.webp'; ?>"
          class=" mb-2 border border-3 border-white" alt="Profile" width="150" height="150">
        <h5 class="mb-0 fw-bold"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?></h5>
        <small>Web Developer</small>
      </div>
    </div>
    <div class="col-md-9">
      <div class="card-body p-4">
        <h4 class="card-title fw-bold">Halo,Saya <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?>👋</h4>
        <p class="card-text text-muted">
          Saya adalah mahasiswa Informatika yang passionate di bidang pengembangan web dan teknologi.
          Senang bertemu dengan Anda di halaman personal saya ini.
        </p>
        <div class="row g-2 mt-2">
          <div class="col-auto">
            <span class="badge bg-primary"><i class="bi bi-code-slash me-1"></i>PHP</span>
          </div>
          <div class="col-auto">
            <span class="badge bg-warning text-dark"><i class="bi bi-filetype-js me-1"></i>JavaScript</span>
          </div>
          <div class="col-auto">
            <span class="badge bg-success"><i class="bi bi-bootstrap me-1"></i>Bootstrap</span>
          </div>
          <div class="col-auto">
            <span class="badge bg-danger"><i class="bi bi-database me-1"></i>MySQL</span>
          </div>
        </div>
        <hr>
        <div class="row text-center">
          <div class="col-4">
            <div class="fw-bold text-primary fs-4">5+</div>
            <small class="text-muted">Proyek</small>
          </div>
          <div class="col-4">
            <div class="fw-bold text-success fs-4">3+</div>
            <small class="text-muted">Tahun Belajar</small>
          </div>
          <div class="col-4">
            <div class="fw-bold text-warning fs-4">7+</div>
            <small class="text-muted">Teknologi</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Hobby Cards Horizontal -->
<h5 class="fw-bold mb-3"><i class="bi bi-controller me-2 text-success"></i>Hobi Saya</h5>
<div class="row g-3 mb-4">
  <?php
  $hobbies = [
    ['icon' => 'bi-code-square', 'color' => 'primary', 'title' => 'Coding', 'desc' => 'Membuat website dan aplikasi'],
    ['icon' => 'bi-book', 'color' => 'success', 'title' => 'Membaca', 'desc' => 'Buku teknologi & fiksi'],
    ['icon' => 'bi-music-note-beamed', 'color' => 'warning', 'title' => 'Musik', 'desc' => 'Mendengarkan berbagai genre'],
    ['icon' => 'bi-bicycle', 'color' => 'danger', 'title' => 'Olahraga', 'desc' => 'Bersepeda dan jogging'],
  ];
  foreach ($hobbies as $h): ?>
    <div class="col-md-6">
      <div class="card h-100 border-0 shadow-sm">
        <div class="row g-0 align-items-center">
          <div class="col-auto p-3">
            <div class="rounded-circle bg-<?php echo $h['color']; ?> bg-opacity-10 p-3">
              <i class="bi <?php echo $h['icon']; ?> fs-3 text-<?php echo $h['color']; ?>"></i>
            </div>
          </div>
          <div class="col">
            <div class="card-body py-2">
              <h6 class="card-title fw-bold mb-0"><?php echo $h['title']; ?></h6>
              <small class="text-muted"><?php echo $h['desc']; ?></small>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- Favorite Menu -->
<h5 class="fw-bold mb-3"><i class="bi bi-star me-2 text-warning"></i>Favorite Menu</h5>
<div class="row g-3">
  <?php
  $favorites = [
    ['icon' => 'bi-laptop', 'title' => 'VSCode', 'desc' => 'Editor favorit saya'],
    ['icon' => 'bi-github', 'title' => 'GitHub', 'desc' => 'Version control'],
    ['icon' => 'bi-bootstrap', 'title' => 'Bootstrap', 'desc' => 'CSS Framework'],
  ];
  foreach ($favorites as $f): ?>
    <div class="col-md-4">
      <div class="card border-0 shadow-sm text-center p-3">
        <i class="bi <?php echo $f['icon']; ?> fs-1 text-primary mb-2"></i>
        <h6 class="fw-bold"><?php echo $f['title']; ?></h6>
        <small class="text-muted"><?php echo $f['desc']; ?></small>
      </div>
    </div>
  <?php endforeach; ?>
</div>