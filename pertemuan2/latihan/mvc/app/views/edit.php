
    <div class="container">
        <h1>Edit Pengguna</h1>
        
        <form action="<?= BASEURL; ?>/user/update" method="post">
            
            <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
            
            <p>
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" value="<?= $data['user']['name']; ?>" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $data['user']['email']; ?>" required>
            </p>
            <button type="submit" class="btn">Ubah Data</button>
        </form>
        
        <a href="<?= BASEURL; ?>/user" class="btn">Kembali ke Daftar</a>
    </div>
