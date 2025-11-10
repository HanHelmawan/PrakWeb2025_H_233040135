<?php

class User extends Controller
{
    // --- BAGIAN READ (Sudah Ada) ---
    public function index()
{
        $data["judul"] = "Data user"; 
        $data['users'] = $this->model('User_model')->getAllUsers(); 

        $this->view('templates/header', $data); 
        $this->view('list', $data); 
        $this->view('templates/footer');        
}

        public function detail($id)
    {
        $data["judul"] = "Detail user"; 
        $data['user'] = $this->model('User_model')->getUserById($id); 

        $this->view('templates/header', $data); 
        $this->view('detail', $data);
        $this->view('templates/footer');        
    }

    // --- BAGIAN CREATE (Baru) ---
    public function tambah()
    {
        // Method untuk menampilkan view/form tambah data
        $data['judul'] = 'Tambah User';
        $this->view('templates/header', $data);
        $this->view('tambah', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        // Method untuk memproses data dari form (aksi 'Create')
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            // Jika berhasil, redirect ke halaman utama
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            // Jika gagal
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    // --- BAGIAN DELETE (Baru) ---
    public function hapus($id)
    {
        if ($this->model('User_model')->hapusUser($id) > 0) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }

    // --- BAGIAN UPDATE (Baru) ---
    public function edit($id)
    {
        // Method untuk menampilkan view/form edit data
        $data['judul'] = 'Edit User';
        $data['user'] = $this->model('User_model')->getUserById($id); // Ambil data lama
        $this->view('templates/header', $data);
        $this->view('edit', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        // Method untuk memproses data dari form (aksi 'Update')
        if ($this->model('User_model')->ubahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/user');
            exit;
        } else {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}