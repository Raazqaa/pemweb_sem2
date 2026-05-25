<?php
// pages/about.php - Accordion Bootstrap
?>
<div class="page-header mb-4">
  <h2 class="fw-bold"><i class="bi bi-person-lines-fill me-2 text-primary"></i>About Me</h2>
  <p class="text-muted">Kenali lebih jauh tentang saya dan perjalanan saya.</p>
</div>

<!-- Profile Section -->
<div class="row g-4 mb-4">
  <div class="col-md-4 text-center">
    <img src="<?php echo isset($_SESSION['image']) ? $_SESSION['image'] : 'images/default.webp'; ?>"
      class="rounded-3 shadow mb-3" alt="Profile" style="max-width:180px">
    <h4 class="fw-bold">Nama <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Tamu'; ?></h4>
    <p class="text-muted">Mahasiswa Informatika</p>
    <div class="d-flex justify-content-center gap-2">
      <a href="https://github.com/Raazqaa" target="_blank" class="btn btn-outline-dark btn-sm"><i class="bi bi-github"></i></a>
      <a href="https://www.linkedin.com/in/muhammad-razqa-108871315/" target="_blank" class="btn btn-outline-primary btn-sm"><i class="bi bi-linkedin"></i></a>
      <a href="https://www.instagram.com/raazq.aa/" target="_blank" class="btn btn-outline-danger btn-sm"><i class="bi bi-instagram"></i></a>
    </div>
  </div>
  <div class="col-md-8">
    <h5 class="fw-bold">Halo! 👋</h5>
    <p>Saya adalah mahasiswa Informatika semester 2 yang memiliki ketertarikan kuat dalam bidang pengembangan web, pemrograman, dan teknologi informasi. Saya terus belajar dan mengembangkan kemampuan untuk mencapai tujuan karir saya.</p>

    <div class="row g-3 mb-3">
      <div class="col-sm-6">
        <ul class="list-unstyled">
          <li class="mb-1"><strong><i class="bi bi-person me-2 text-primary"></i>Nama:</strong> Muhammad Fadhilah Razqa</li>
          <li class="mb-1"><strong><i class="bi bi-calendar me-2 text-primary"></i>Lahir:</strong> 23 juli 2005</li>
          <li class="mb-1"><strong><i class="bi bi-geo-alt me-2 text-primary"></i>Asal:</strong> Indonesia</li>
        </ul>
      </div>
      <div class="col-sm-6">
        <ul class="list-unstyled">
          <li class="mb-1"><strong><i class="bi bi-envelope me-2 text-primary"></i>Email:</strong> fadhilahrazqa@gmail.com</li>
          <li class="mb-1"><strong><i class="bi bi-mortarboard me-2 text-primary"></i>Prodi:</strong> Informatika</li>
          <li class="mb-1"><strong><i class="bi bi-briefcase me-2 text-primary"></i>Status:</strong> Mahasiswa</li>
        </ul>
      </div>
    </div>

    <div class="mb-2">
      <div class="d-flex justify-content-between mb-1"><span>PHP</span><span>80%</span></div>
      <div class="progress mb-2" style="height:8px">
        <div class="progress-bar bg-primary" style="width:80%"></div>
      </div>
      <div class="d-flex justify-content-between mb-1"><span>JavaScript</span><span>70%</span></div>
      <div class="progress mb-2" style="height:8px">
        <div class="progress-bar bg-warning" style="width:70%"></div>
      </div>
      <div class="d-flex justify-content-between mb-1"><span>Bootstrap</span><span>85%</span></div>
      <div class="progress" style="height:8px">
        <div class="progress-bar bg-success" style="width:85%"></div>
      </div>
    </div>
  </div>
</div>

<!-- Accordion Pengalaman Organisasi -->
<h5 class="fw-bold mb-3">
  <i class="bi bi-diagram-2 me-2 text-primary"></i>
  Pengalaman Organisasi
</h5>

<?php if (!empty($orgs)): ?>

  <div class="accordion mb-4" id="orgAccordion">
    

    <?php foreach ($orgs as $i => $org): ?>

      <div class="accordion-item border-0 shadow-sm mb-2">

        <h2 class="accordion-header" id="heading<?php echo $org['id']; ?>">

          <button
            class="accordion-button <?php echo $i !== 0 ? 'collapsed' : ''; ?> fw-semibold"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapse<?php echo $org['id']; ?>">

            <i class="bi bi-building me-2 text-primary"></i>

            <?php echo $org['title']; ?>

            <span class="ms-auto me-3 badge bg-secondary fw-normal">
              <?php echo $org['period']; ?>
            </span>

          </button>

        </h2>

        <div
          id="collapse<?php echo $org['id']; ?>"
          class="accordion-collapse collapse <?php echo $i === 0 ? 'show' : ''; ?>"
          data-bs-parent="#orgAccordion">

          <div class="accordion-body pt-0">

            <span class="badge bg-primary mb-2">
              <i class="bi bi-person-badge me-1"></i>
              <?php echo $org['role']; ?>
            </span>

            <p class="mb-0 text-muted">
              <?php echo $org['desc']; ?>
            </p>

          </div>

        </div>

      </div>

    <?php endforeach; ?>

  </div>

<?php else: ?>

  <div class="alert alert-secondary text-center">
    <i class="bi bi-info-circle me-2"></i>
    Pengalaman organisasi masih kosong
  </div>

<?php endif; ?>