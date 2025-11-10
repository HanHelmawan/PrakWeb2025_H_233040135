<?php

class User_model
{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // --- BAGIAN READ (Sudah Ada) ---
    public function getAllUsers()
    {
        $this->db->query('SELECT * FROM ' . $this->table); 
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id'); 
        $this->db->bind('id', $id); 
        return $this->db->single();
    }

    // --- BAGIAN CREATE (Baru) ---
    public function tambahDataUser($data)
    {
        // $data berisi $_POST
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    // --- BAGIAN DELETE (Baru) ---
    public function hapusUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    // --- BAGIAN UPDATE (Baru) ---
    public function ubahDataUser($data)
    {
        // $data berisi $_POST
        $query = "UPDATE users SET 
                    name = :name, 
                    email = :email 
                  WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']); // Ambil 'id' dari hidden input

        $this->db->execute();
        return $this->db->rowCount();
    }
}