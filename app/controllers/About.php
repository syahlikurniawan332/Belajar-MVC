<?php
class About extends Controller
{
    public function index($nama = 'syahli', $pekerjaan = 'mahasiswa', $umur = 21)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'Halaman About';
        $this->view('templates/header',$data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Halaman page';
        $this->view('templates/header',$data);
        $this->view('About/page');
        $this->view('templates/footer');
    }
}
