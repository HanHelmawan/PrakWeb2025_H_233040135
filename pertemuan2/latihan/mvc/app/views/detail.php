<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1>Selamat Datang, <?= htmlspecialchars($data['user']['name']); ?></h1>
        </div>
        <div class="card-body">
            <h5 class="card-title">Email: <?= htmlspecialchars($data['user']['email']); ?></h5>
        </div>
        <div class="card-footer">
            <a href="<?= BASEURL; ?>/user/edit/<?= $data['user']['id']; ?>" class="btn btn-warning">Edit</a>
            <a href="<?= BASEURL; ?>/user/hapus/<?= $data['user']['id']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
            <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Kembali ke Daftar</a> 
        </div>
    </div>
</div>