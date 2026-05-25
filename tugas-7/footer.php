<?php
// footer.php - 12 grid, alerts bootstrap
?>
<footer class="bg-dark text-white mt-5 py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5 class="fw-bold"><i class="bi bi-person-circle me-2"></i>MyPortfolio</h5>
        <p class="text-white-50 small">Personal homepage dibuat dengan Bootstrap 5 sebagai tugas kuliah pemrograman web.</p>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Quick Links</h6>
        <ul class="list-unstyled small">
          <li><a href="index.php?page=home" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right"></i> Home</a></li>
          <li><a href="index.php?page=about" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right"></i> About Me</a></li>
          <li><a href="index.php?page=contact" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right"></i> Contact</a></li>
          <li><a href="index.php?page=studies" class="text-white-50 text-decoration-none"><i class="bi bi-chevron-right"></i> My Studies</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Kontak</h6>
        <ul class="list-unstyled small text-white-50">
          <li><i class="bi bi-envelope me-2"></i>email@example.com</li>
          <li><i class="bi bi-telephone me-2"></i>+62 812-3456-7890</li>
          <li><i class="bi bi-geo-alt me-2"></i>Indonesia</li>
        </ul>
        <div class="mt-2 d-flex gap-2">
          <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-github"></i></a>
          <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-linkedin"></i></a>
          <a href="#" class="btn btn-sm btn-outline-light"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </div>
    <hr class="border-secondary">
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="alert alert-primary alert-sm py-2 px-3 mb-0 d-inline-block small" role="alert">
          <i class="bi bi-info-circle me-1"></i> Website ini dibuat untuk keperluan akademik.
        </div>
      </div>
      <div class="col-md-6 text-md-end mt-2 mt-md-0">
        <p class="text-white-50 small mb-0">&copy; <?php echo date('Y'); ?> MyPortfolio. Dibuat dengan Bootstrap 5.</p>
      </div>
    </div>
  </div>
</footer>
