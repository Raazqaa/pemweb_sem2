<?php
// menu.php - navbar bootstrap
$current = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">
      <i class="bi bi-person-circle me-2"></i>MyPortfolio
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo $current === 'home' ? 'active fw-bold' : ''; ?>" href="index.php?page=home">
            <i class="bi bi-house me-1"></i>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current === 'about' ? 'active fw-bold' : ''; ?>" href="index.php?page=about">
            <i class="bi bi-person me-1"></i>About Me
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $current === 'contact' ? 'active fw-bold' : ''; ?>" href="index.php?page=contact">
            <i class="bi bi-envelope me-1"></i>Contact Me
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php echo in_array($current, ['level', 'studies']) ? 'active fw-bold' : ''; ?>" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-book me-1"></i>My Studies
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item <?php echo $current === 'level' ? 'active' : ''; ?>" href="index.php?page=level">
                <i class="bi bi-diagram-3 me-1"></i>Level
              </a>
            </li>
            <li>
              <a class="dropdown-item <?php echo $current === 'studies' ? 'active' : ''; ?>" href="index.php?page=studies">
                <i class="bi bi-journal-bookmark me-1"></i>Studies
              </a>
            </li>
          </ul>
        </li>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item ms-2">
            <span class="nav-link text-warning">
              <i class="bi bi-person-check me-1"></i><?php echo htmlspecialchars($_SESSION['username']); ?>
              <?php if (isset($_SESSION['role'])): ?>
                <small class="badge bg-warning text-dark"><?php echo htmlspecialchars($_SESSION['role']); ?></small>
              <?php endif; ?>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-outline-light btn-sm ms-1 px-3" href="logout.php">
              <i class="bi bi-box-arrow-right me-1"></i>Logout
            </a>
          </li>
        <?php else: ?>
          <li class="nav-item ms-2">
            <a class="nav-link btn btn-outline-light btn-sm ms-1 px-3" href="index.php?page=login">
              <i class="bi bi-box-arrow-in-right me-1"></i>Login
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
