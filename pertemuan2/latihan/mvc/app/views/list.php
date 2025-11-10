<div class="container mt-4"> 
    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/user/tambah" class="btn btn-primary">Tambah User Baru</a>
        </div>
    </div>

    <h1>Daftar Pengguna</h1> 
    <br>

    <table class="table table-striped table-hover"> 
        <thead> 
            <tr>
                <th>Nama</th> 
                <th>Email</th> 
                <th style="width: 210px;">Aksi</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['users'] as $user): ?> 
            <tr>
                <td><?= htmlspecialchars($user['name']); ?></td> 
                <td><?= htmlspecialchars($user['email']); ?></td> 
                <td>
                    <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?= BASEURL; ?>/user/edit/<?= $user['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach;?> 
        </tbody>
    </table>
</div>