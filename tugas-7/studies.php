<?php
include 'koneksi.php';

$message = '';
$edit_data = null;

// Ambil Data Level
$levels = mysqli_query($conn, "SELECT * FROM levels ORDER BY nama ASC");

$levels_map = [];
while ($lvl = mysqli_fetch_assoc($levels)) {
  $levels_map[$lvl['id']] = $lvl['nama'];
}

// CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $action = $_POST['action'] ?? '';

  // Tambah
  if ($action === 'add') {

    $nama = trim($_POST['nama'] ?? '');
    $id_level = intval($_POST['id_level'] ?? 0);
    $tahun = trim($_POST['tahun'] ?? '');
    $foto = trim($_POST['foto'] ?? '');
    $ket = trim($_POST['keterangan'] ?? '');

    mysqli_query($conn, "
            INSERT INTO studies(nama, id_level, tahun, foto, keterangan)
            VALUES('$nama', '$id_level', '$tahun', '$foto', '$ket')
        ");

    $message = [
      'type' => 'success',
      'text' => 'Data studi berhasil ditambahkan!'
    ];
  }

  // Edit
  if ($action === 'edit') {

    $id = intval($_POST['id']);

    $nama = trim($_POST['nama'] ?? '');
    $id_level = intval($_POST['id_level'] ?? 0);
    $tahun = trim($_POST['tahun'] ?? '');
    $foto = trim($_POST['foto'] ?? '');
    $ket = trim($_POST['keterangan'] ?? '');

    mysqli_query($conn, "
            UPDATE studies
            SET
                nama='$nama',
                id_level='$id_level',
                tahun='$tahun',
                foto='$foto',
                keterangan='$ket'
            WHERE id=$id
        ");

    $message = [
      'type' => 'success',
      'text' => 'Data studi berhasil diperbarui!'
    ];
  }

  // Delete
  if ($action === 'delete') {

    $id = intval($_POST['id']);

    mysqli_query($conn, "DELETE FROM studies WHERE id=$id");

    $message = [
      'type' => 'warning',
      'text' => 'Data studi berhasil dihapus!'
    ];
  }
}

// Edit Mode
$edit_id = intval($_GET['edit'] ?? 0);

if ($edit_id) {

  $result = mysqli_query($conn, "
        SELECT * FROM studies
        WHERE id=$edit_id
    ");

  $edit_data = mysqli_fetch_assoc($result);
}

// Ambil Semua Data
$studies = mysqli_query($conn, "
    SELECT * FROM studies
    ORDER BY id DESC
");

$total = mysqli_num_rows($studies);
?>

<div class="page-header mb-4">
  <h2 class="fw-bold">
    <i class="bi bi-journal-bookmark me-2 text-primary"></i>
    Data Riwayat Pendidikan
  </h2>
  <p class="text-muted">Manajemen data riwayat studi / pendidikan saya.</p>
</div>

<?php if (!isset($_SESSION['username'])): ?>

  <div class="alert alert-warning">
    <i class="bi bi-lock me-2"></i>
    Silakan login terlebih dahulu.
  </div>

<?php else: ?>

  <?php if ($message): ?>
    <div class="alert alert-<?php echo $message['type']; ?> alert-dismissible fade show">
      <?php echo $message['text']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Form -->
  <div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-<?php echo $edit_data ? 'warning' : 'primary'; ?> text-white fw-bold">
      <?php echo $edit_data ? 'Edit Data Studi' : 'Tambah Data Studi'; ?>
    </div>

    <div class="card-body">

      <form method="POST">

        <input type="hidden" name="action" value="<?php echo $edit_data ? 'edit' : 'add'; ?>">

        <?php if ($edit_data): ?>
          <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
        <?php endif; ?>

        <div class="row g-3">

          <div class="col-md-6">
            <label class="form-label">Nama Institusi</label>
            <input
              type="text"
              name="nama"
              class="form-control"
              required
              value="<?php echo htmlspecialchars($edit_data['nama'] ?? ''); ?>">
          </div>

          <div class="col-md-3">
            <label class="form-label">Level</label>

            <select name="id_level" class="form-select">

              <?php foreach ($levels_map as $id => $nama): ?>

                <option
                  value="<?php echo $id; ?>"
                  <?php echo ($edit_data['id_level'] ?? 0) == $id ? 'selected' : ''; ?>>
                  <?php echo htmlspecialchars($nama); ?>
                </option>

              <?php endforeach; ?>

            </select>
          </div>

          <div class="col-md-3">
            <label class="form-label">Tahun</label>
            <input
              type="text"
              name="tahun"
              class="form-control"
              value="<?php echo htmlspecialchars($edit_data['tahun'] ?? ''); ?>">
          </div>

          <div class="col-md-6">
            <label class="form-label">URL Foto</label>
            <input
              type="text"
              name="foto"
              class="form-control"
              value="<?php echo htmlspecialchars($edit_data['foto'] ?? ''); ?>">
          </div>

          <div class="col-md-6">
            <label class="form-label">Keterangan</label>
            <input
              type="text"
              name="keterangan"
              class="form-control"
              value="<?php echo htmlspecialchars($edit_data['keterangan'] ?? ''); ?>">
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-<?php echo $edit_data ? 'warning' : 'primary'; ?>">
              <?php echo $edit_data ? 'Update Data' : 'Simpan Data'; ?>
            </button>
          </div>

        </div>

      </form>

    </div>
  </div>

  <!-- Table -->
  <div class="card shadow-sm border-0">

    <div class="card-header bg-light fw-bold d-flex justify-content-between align-items-center">
      <span>Data Riwayat Pendidikan</span>
      <span class="badge bg-primary"><?php echo $total; ?> Data</span>
    </div>

    <div class="table-responsive">

      <table class="table table-striped table-hover mb-0 align-middle">

        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Tahun</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>

          <?php if ($total == 0): ?>

            <tr>
              <td colspan="7" class="text-center py-4 text-muted">
                Belum ada data
              </td>
            </tr>

          <?php else: ?>

            <?php while ($s = mysqli_fetch_assoc($studies)): ?>

              <tr>

                <td><?php echo $s['id']; ?></td>

                <td>
                  <?php if ($s['foto']): ?>
                    <img
                      src="<?php echo htmlspecialchars($s['foto']); ?>"
                      width="45"
                      height="45"
                      class="rounded border object-fit-cover">
                  <?php endif; ?>
                </td>

                <td><?php echo htmlspecialchars($s['nama']); ?></td>

                <td>
                  <span class="badge bg-success">
                    <?php echo htmlspecialchars($levels_map[$s['id_level']] ?? '-'); ?>
                  </span>
                </td>

                <td><?php echo htmlspecialchars($s['tahun']); ?></td>

                <td><?php echo htmlspecialchars($s['keterangan']); ?></td>

                <td>

                  <a
                    href="index.php?page=studies&edit=<?php echo $s['id']; ?>"
                    class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil"></i>
                  </a>

                  <form method="POST" class="d-inline">

                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo $s['id']; ?>">

                    <button
                      type="submit"
                      class="btn btn-danger btn-sm"
                      onclick="return confirm('Hapus data ini?')">
                      <i class="bi bi-trash"></i>
                    </button>

                  </form>

                </td>

              </tr>

            <?php endwhile; ?>

          <?php endif; ?>

        </tbody>

      </table>

    </div>
  </div>

<?php endif; ?>