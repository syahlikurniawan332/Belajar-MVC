<?php

class Mahasiswa_model
{

    private $table = 'tabelmahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }
    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }


    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $mahasiswa = $this->db->single();
        return $mahasiswa;
    }



    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO tabelmahasiswa
                    VALUES
                    ('', :nama, :nrp, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM tabelmahasiswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE tabelmahasiswa SET
                nama = :nama,
                nrp = :nrp,
                email = :email,
                jurusan = :jurusan
            WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }



    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tabelmahasiswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}
