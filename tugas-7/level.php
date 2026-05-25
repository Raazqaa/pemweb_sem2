<?php
include 'koneksi.php';

$message = '';
$edit_data = null;

// Tambah, Edit, Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $action = $_POST['action'] ?? '';

    // Tambah Data
    if ($action === 'add') {

        $nama = trim($_POST['nama'] ?? '');
        $ket  = trim($_POST['keterangan'] ?? '');

        if ($nama) {

            mysqli_query($conn, "
                INSERT INTO levels(nama, keterangan)
                VALUES('$nama', '$ket')
            ");

            $message = [
                'type' => 'success',
                'text' => 'Level berhasil ditambahkan!'
            ];
        }
    }

    // Edit Data
    if ($action === 'edit') {

        $id   = intval($_POST['id']);
        $nama = trim($_POST['nama'] ?? '');
        $ket  = trim($_POST['keterangan'] ?? '');

        mysqli_query($conn, "
            UPDATE levels
            SET nama='$nama', keterangan='$ket'
            WHERE id=$id
        ");

        $message = [
            'type' => 'success',
            'text' => 'Level berhasil diperbarui!'
        ];
    }

    // Hapus Data
    if ($action === 'delete') {

        $id = intval($_POST['id']);

        mysqli_query($conn, "
            DELETE FROM levels
            WHERE id=$id
        ");

        $message = [
            'type' => 'warning',
            'text' => 'Level berhasil dihapus!'
        ];
    }
}

// Edit Mode
$edit_id = intval($_GET['edit'] ?? 0);

if ($edit_id) {

    $result = mysqli_query($conn, "
        SELECT * FROM levels
        WHERE id=$edit_id
    ");

    $edit_data = mysqli_fetch_assoc($result);
}

// Ambil semua data
$levels = mysqli_query($conn, "
    SELECT * FROM levels
    ORDER BY id ASC
");

$total = mysqli_num_rows($levels);
?>

<div class="page-header mb-4">
  <h2 class="fw-bold">
    <i class="bi bi-diagram-3 me-2 text-primary"></i>
    Kelola Level Pendidikan
  </h2>
  <p class="text-muted">Manajemen data level / jenjang pendidikan.</p>
</div>

<?php if (!isset($_SESSION['username'])): ?>

<div class="alert alert-warning">
  <i class="bi bi-lock me-2"></i>
  Silakan <a href="index.php?page=login">login</a>
  terlebih dahulu untuk mengakses fitur CRUD.
</div>

<?php else: ?>

<?php if ($message): ?>
<div class="alert alert-<?php echo $message['type']; ?> alert-dismissible fade show">
  <?php echo $message['text']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<div class="row g-4">

  <!-- Form -->
  <div class="col-md-4">
    <div class="card shadow-sm border-0">

      <div class="card-header bg-<?php echo $edit_data ? 'warning' : 'primary'; ?> text-white fw-bold">
        <?php echo $edit_data ? 'Edit Level' : 'Tambah Level'; ?>
      </div>

      <div class="card-body">

        <form method="POST">

          <input type="hidden" name="action" value="<?php echo $edit_data ? 'edit' : 'add'; ?>">

          <?php if ($edit_data): ?>
          <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
          <?php endif; ?>

          <div class="mb-3">
            <label class="form-label">Nama Level</label>
            <input
              type="text"
              name="nama"
              class="form-control"
              required
              value="<?php echo htmlspecialchars($edit_data['nama'] ?? ''); ?>"
            >
          </div>

          <div class="mb-3">
            <label class="form-label">Keterangan</label>
            <input
              type="text"
              name="keterangan"
              class="form-control"
              value="<?php echo htmlspecialchars($edit_data['keterangan'] ?? ''); ?>"
            >
          </div>

          <button type="submit" class="btn btn-<?php echo $edit_data ? 'warning' : 'primary'; ?> w-100">
            <?php echo $edit_data ? 'Update' : 'Simpan'; ?>
          </button>

        </form>

      </div>
    </div>
  </div>

  <!-- Table -->
  <div class="col-md-8">
    <div class="card shadow-sm border-0">

      <div class="card-header bg-light fw-bold d-flex justify-content-between">
        <span>Data Level</span>
        <span class="badge bg-primary"><?php echo $total; ?> Data</span>
      </div>

      <div class="table-responsive">

        <table class="table table-striped table-hover mb-0">

          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Nama</th>
              <th>Keterangan</th>
              <th width="120">Aksi</th>
            </tr>
          </thead>

          <tbody>

            <?php if ($total == 0): ?>

            <tr>
              <td colspan="4" class="text-center py-4 text-muted">
                Belum ada data
              </td>
            </tr>

            <?php else: ?>

            <?php while($lvl = mysqli_fetch_assoc($levels)): ?>

            <tr>
              <td><?php echo $lvl['id']; ?></td>

              <td>
                <span class="badge bg-primary">
                  <?php echo htmlspecialchars($lvl['nama']); ?>
                </span>
              </td>

              <td>
                <?php echo htmlspecialchars($lvl['keterangan']); ?>
              </td>

              <td>

                <a
                  href="index.php?page=level&edit=<?php echo $lvl['id']; ?>"
                  class="btn btn-warning btn-sm"
                >
                  <i class="bi bi-pencil"></i>
                </a>

                <form method="POST" class="d-inline">

                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="id" value="<?php echo $lvl['id']; ?>">

                  <button
                    type="submit"
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Hapus data ini?')"
                  >
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
  </div>
</div>

<?php endif; ?>
