
    <div class="container">
        <h1>Tambah Pengguna Baru</h1>
        
        <form action="<?= BASEURL; ?>/user/store" method="post">
            <p>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </p>
            <button type="submit" class="btn btn-success">Tambah Data</button>
            <a href="<?= BASEURL; ?>/user" class="btn btn-secondary ms-2">Kembali ke Daftar</a>
        </form>
    </div>
