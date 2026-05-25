<?php
// pages/contact.php - Card Groups Bootstrap
?>
<div class="page-header mb-4">
  <h2 class="fw-bold"><i class="bi bi-envelope-heart me-2 text-primary"></i>Contact Me</h2>
  <p class="text-muted">Hubungi saya melalui berbagai platform berikut.</p>
</div>

<!-- Card Group Kontak -->
<h5 class="fw-bold mb-3">Daftar Kontak Saya</h5>
<div class="card-group mb-4 shadow-sm">
  <?php
  $contacts = [
    ['icon' => 'bi-envelope-fill', 'color' => 'danger', 'title' => 'Email', 'value' => 'fadhilahrazqa@gmail.com', 'link' => 'mailto:fadhilahrazqa@gmail.com', 'img' => 'https://ui-avatars.com/api/?name=Email&background=dc3545&color=fff&size=60'],
    ['icon' => 'bi-whatsapp', 'color' => 'success', 'title' => 'WhatsApp', 'value' => '+62 812-3456-7890', 'link' => 'https://wa.me/62881010049060', 'img' => 'https://ui-avatars.com/api/?name=WA&background=198754&color=fff&size=60'],
    ['icon' => 'bi-linkedin', 'color' => 'primary', 'title' => 'LinkedIn', 'value' => 'linkedin.com/in/Razqaa', 'link' => 'https://www.linkedin.com/in/muhammad-razqa-108871315/', 'img' => 'https://ui-avatars.com/api/?name=Li&background=0d6efd&color=fff&size=60'],
  ];
  foreach ($contacts as $c): ?>
  <div class="card border-0">
    <div class="card-body text-center py-4">
      <img src="<?php echo $c['img']; ?>" class="rounded-circle mb-3 shadow-sm" alt="<?php echo $c['title']; ?>" width="60" height="60">
      <h5 class="card-title fw-bold"><i class="bi <?php echo $c['icon']; ?> me-1 text-<?php echo $c['color']; ?>"></i><?php echo $c['title']; ?></h5>
      <p class="card-text text-muted small"><?php echo $c['value']; ?></p>
      <a href="<?php echo $c['link']; ?>" class="btn btn-<?php echo $c['color']; ?> btn-sm" target="_blank">
        Hubungi
      </a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- More Contact Card Groups -->
<div class="card-group mb-4 shadow-sm">
  <?php
  $contacts2 = [
    ['icon' => 'bi-github', 'color' => 'dark', 'title' => 'GitHub', 'value' => 'github.com/Razqaa', 'link' => 'https://github.com/Raazqaa', 'img' => 'https://ui-avatars.com/api/?name=GH&background=212529&color=fff&size=60'],
    ['icon' => 'bi-instagram', 'color' => 'danger', 'title' => 'Instagram', 'value' => '@Razqaa', 'link' => 'https://www.instagram.com/raazq.aa/', 'img' => 'https://ui-avatars.com/api/?name=IG&background=e83e8c&color=fff&size=60'],
    ['icon' => 'bi-twitter-x', 'color' => 'dark', 'title' => 'Twitter/X', 'value' => '@Razqaa', 'link' => '#', 'img' => 'https://ui-avatars.com/api/?name=X&background=343a40&color=fff&size=60'],
  ];
  foreach ($contacts2 as $c): ?>
  <div class="card border-0">
    <div class="card-body text-center py-4">
      <img src="<?php echo $c['img']; ?>" class="rounded-circle mb-3 shadow-sm" alt="<?php echo $c['title']; ?>" width="60" height="60">
      <h5 class="card-title fw-bold"><i class="bi <?php echo $c['icon']; ?> me-1 text-<?php echo $c['color']; ?>"></i><?php echo $c['title']; ?></h5>
      <p class="card-text text-muted small"><?php echo $c['value']; ?></p>
      <a href="<?php echo $c['link']; ?>" class="btn btn-outline-<?php echo $c['color']; ?> btn-sm" target="_blank">
        Follow
      </a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- Contact Form -->
<div class="card shadow-sm border-0">
  <div class="card-header bg-primary text-white fw-bold">
    <i class="bi bi-send me-2"></i>Kirim Pesan
  </div>
  <div class="card-body p-4">
    <div id="contactAlert" class="alert alert-success d-none" role="alert">
      <i class="bi bi-check-circle me-2"></i>Pesan berhasil dikirim! Saya akan membalas sesegera mungkin.
    </div>
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" id="contactName" class="form-control" placeholder="Masukkan nama Anda">
      </div>
      <div class="col-md-6">
        <label class="form-label fw-semibold">Email</label>
        <input type="email" id="contactEmail" class="form-control" placeholder="example@example.com">
      </div>
      <div class="col-12">
        <label class="form-label fw-semibold">Subjek</label>
        <input type="text" id="contactSubject" class="form-control" placeholder="Subjek pesan">
      </div>
      <div class="col-12">
        <label class="form-label fw-semibold">Pesan</label>
        <textarea id="contactMessage" class="form-control" rows="4" placeholder="Tulis pesan Anda di sini..."></textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" onclick="sendContact()">
          <i class="bi bi-send me-2"></i>Kirim Pesan
        </button>
      </div>
    </div>
  </div>
</div>

<script>
function sendContact() {
  const name = document.getElementById('contactName').value;
  const email = document.getElementById('contactEmail').value;
  if (!name || !email) {
    alert('Mohon isi nama dan email terlebih dahulu!');
    return;
  }
  document.getElementById('contactAlert').classList.remove('d-none');
  setTimeout(() => document.getElementById('contactAlert').classList.add('d-none'), 5000);
}
</script>
