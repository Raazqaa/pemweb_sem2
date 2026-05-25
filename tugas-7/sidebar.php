<?php
// sidebar.php - 3 grid, list group bootstrap
?>
<div class="sidebar-wrapper">
  <div class="card shadow-sm mb-4 border-0">
    <div class="card-body text-center py-4">
      <div class="avatar-wrapper mb-3">
        <img
          src="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : 'images/default.webp'; ?>"
          class="rounded-circle border border-3 border-primary object-fit-cover"
          alt="Profile"
          width="90"
          height="90">
      </div>
      <h5 class="fw-bold mb-1"><?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?></h5>
      <p class="text-muted small mb-0">Web Developer</p>
      <div class="mt-2">
        <span class="badge bg-primary">Mahasiswa</span>
      </div>
    </div>
  </div>

  <div class="card shadow-sm mb-4 border-0">
    <div class="card-header bg-primary text-white fw-bold">
      <i class="bi bi-compass me-2"></i>Navigasi
    </div>
    <div class="list-group list-group-flush">
      <?php $current = isset($_GET['page']) ? $_GET['page'] : 'home'; ?>
      <a href="index.php?page=home" class="list-group-item list-group-item-action <?php echo $current === 'home' ? 'active' : ''; ?>">
        <i class="bi bi-house me-2"></i>Home
      </a>
      <a href="index.php?page=about" class="list-group-item list-group-item-action <?php echo $current === 'about' ? 'active' : ''; ?>">
        <i class="bi bi-person me-2"></i>About Me
      </a>
      <a href="index.php?page=contact" class="list-group-item list-group-item-action <?php echo $current === 'contact' ? 'active' : ''; ?>">
        <i class="bi bi-envelope me-2"></i>Contact Me
      </a>
      <a href="index.php?page=level" class="list-group-item list-group-item-action <?php echo $current === 'level' ? 'active' : ''; ?>">
        <i class="bi bi-diagram-3 me-2"></i>Level
      </a>
      <a href="index.php?page=studies" class="list-group-item list-group-item-action <?php echo $current === 'studies' ? 'active' : ''; ?>">
        <i class="bi bi-journal-bookmark me-2"></i>Studies
      </a>
    </div>
  </div>

  <div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white fw-bold">
      <i class="bi bi-info-circle me-2"></i>Info Singkat
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><i class="bi bi-geo-alt me-2 text-primary"></i>Indonesia</li>
      <li class="list-group-item"><i class="bi bi-mortarboard me-2 text-success"></i>S1 Informatika</li>
      <li class="list-group-item"><i class="bi bi-calendar me-2 text-warning"></i>2025 - Sekarang</li>
      <li class="list-group-item">
        <div class="d-flex gap-2 mt-1">
          <a href="https://github.com/Raazqaa" class="btn btn-sm btn-outline-primary"><i class="bi bi-github"></i></a>
          <a href="https://www.linkedin.com/in/muhammad-razqa-108871315/" class="btn btn-sm btn-outline-info"><i class="bi bi-linkedin"></i></a>
          <a href="https://www.instagram.com/raazq.aa/" class="btn btn-sm btn-outline-danger"><i class="bi bi-instagram"></i></a>
        </div>
      </li>
    </ul>
  </div>
</div>