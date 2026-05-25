<?php
session_start();
ob_start();

$page = $_GET['page'] ?? 'home';
$valid_pages = ['home', 'about', 'contact', 'login', 'level', 'studies'];
if (!in_array($page, $valid_pages)) $page = 'home';

// Show header carousel only on home
$show_header = ($page === 'home');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyPortfolio - Personal Homepage</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bs-font-sans-serif: 'Plus Jakarta Sans', sans-serif;
    }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8f9fb; }

    /* Carousel */
    .carousel-bg { height: 320px; background: linear-gradient(135deg, #0d6efd, #6610f2); }
    .carousel-bg-1 { background: linear-gradient(135deg, #0d6efd 0%, #6f42c1 100%); }
    .carousel-bg-2 { background: linear-gradient(135deg, #198754 0%, #0dcaf0 100%); }
    .carousel-bg-3 { background: linear-gradient(135deg, #fd7e14 0%, #dc3545 100%); }
    .carousel-caption-custom { position: relative; text-shadow: 0 2px 10px rgba(0,0,0,0.4); }
    
    /* Sidebar */
    .sidebar-wrapper { position: sticky; top: 80px; }

    /* Cards */
    .card { border-radius: 12px; }
    .card-header { border-radius: 12px 12px 0 0 !important; }

    /* Page transition */
    .main-content { animation: fadeIn 0.3s ease; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }

    /* Progress bars */
    .progress { border-radius: 10px; background: #e9ecef; }
    .progress-bar { border-radius: 10px; }

    /* Table */
    .table th { font-size: 0.85rem; letter-spacing: 0.03em; text-transform: uppercase; }

    /* Avatar */
    .avatar-wrapper img { transition: transform 0.3s; }
    .avatar-wrapper img:hover { transform: scale(1.05); }
    
    /* Accordion */
    .accordion-button:not(.collapsed) { background-color: #e7f1ff; color: #0d6efd; }
    .accordion-button:focus { box-shadow: none; }
    
    /* List group active */
    .list-group-item-action.active { background: #0d6efd; border-color: #0d6efd; }

    /* Footer */
    footer a:hover { color: #fff !important; }

    /* Responsive sidebar */
    @media (max-width: 768px) {
      .sidebar-wrapper { position: static; margin-bottom: 1.5rem; }
    }
  </style>
</head>
<body>

<!-- NAVBAR (menu.php - 12 grid) -->
<div class="col-12">
  <?php include 'menu.php'; ?>
</div>

<!-- HEADER (header.php - 12 grid) - only on home -->
<?php if ($show_header): ?>
<div class="col-12">
  <?php include 'header.php'; ?>
</div>
<?php endif; ?>

<!-- MAIN LAYOUT -->
<div class="container py-4">
  <div class="row g-4">

    <!-- SIDEBAR (sidebar.php - 3 grid) -->
    <div class="col-lg-3 col-md-12">
      <?php include 'sidebar.php'; ?>
    </div>

    <!-- MAIN CONTENT (main.php - 9 grid) -->
    <div class="col-lg-9 col-md-12">
      <div class="main-content">
        <?php
        $page_file = "{$page}.php";
        if (file_exists($page_file)) {
            include $page_file;
        } else {
            echo '<div class="alert alert-danger">Halaman tidak ditemukan.</div>';
        }
        ?>
      </div>
    </div>

  </div>
</div>

<!-- FOOTER (footer.php - 12 grid) -->
<?php include 'footer.php'; ?>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
