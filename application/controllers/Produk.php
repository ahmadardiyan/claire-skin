<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model');
        // $this->load->helper('form');
        // $this->load->library('form_validation');
        $this->load->model("Admin_model");
        
        if (!$this->Admin_model->is_login()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index(){
        $data['judul'] = 'Data Produk';

        $data['produk'] = $this->Produk_model->getAllData('produk');

        $this->load->view('templates/header_admin',$data);
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer_admin');
    }

    public function create(){
        $data['judul'] = 'Tambah Data Produk';
        $data['jenis'] = $this->Produk_model->getAllData('jenis_produk');

        $this->form_validation->set_rules('nama', 'Nama produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi produk', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga produk', 'required|numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah produk', 'required|numeric');
        $this->form_validation->set_rules('foto', 'File', 'callback_uploadImage');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header_admin',$data);
            $this->load->view('produk/create',$data);
            $this->load->view('templates/footer_admin');
        } else {
            $foto = $this->upload->data()['file_name'];

            $data = [
                "nama_produk" => $this->input->post('nama', true),
                "deskripsi_produk" => $this->input->post('deskripsi', true),
                "jenis_produk" => $this->input->post('jenis', true),
                "harga_produk" => $this->input->post('harga', true),
                "jumlah_produk" => $this->input->post('jumlah', true),
                // "foto_produk" => $this->uploadImage()
                "foto_produk" => $foto,
            ];
            $this->Produk_model->create('produk',$data);
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('produk');
        }
    }

    public function uploadImage(){

        $config['upload_path'] = 'assets/img/produk';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1024 * 2; // 2MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 1024;
        $config['file_name'] = uniqid();

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->form_validation->set_message('uploadImage', $error);
            return false;
        } else {
            return true;
        }
    }

    public function detail($id_produk){
        $data['judul'] = 'Detail Data Produk';
        $data['produk'] = $this->Produk_model->getData('produk','id_produk', $id_produk);

        $this->load->view('templates/header_admin',$data);
        $this->load->view('produk/detail', $data);
        $this->load->view('templates/footer_admin');
    }

    public function update($id_produk){
        $data['judul'] = 'Edit Data Produk';

        $data['produk'] = $this->Produk_model->getData('produk','id_produk',$id_produk);
        $data['jenis'] = $this->Produk_model->getAllData('jenis_produk');

        $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
        $this->form_validation->set_rules('nama', 'Nama produk', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi produk', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga produk', 'required|numeric');
        $this->form_validation->set_rules('jumlah', 'Jumlah produk', 'required|numeric');

        if (!empty($_FILES["foto"]["name"])) {
            $this->form_validation->set_rules('foto', 'File', 'callback_uploadImage');
        }

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header_admin',$data);
            $this->load->view('produk/update', $data);
            $this->load->view('templates/footer_admin');

        } else {

            if (!empty($_FILES["foto"]["name"])) {
                $foto = $this->upload->data()['file_name'];
            } else {
                $foto = $this->input->post('foto_lama');
            }

            $data = [
                "nama_produk" => $this->input->post('nama', true),
                "deskripsi_produk" => $this->input->post('deskripsi', true),
                "jenis_produk" => $this->input->post('jenis', true),
                "harga_produk" => $this->input->post('harga', true),
                "jumlah_produk" => $this->input->post('jumlah', true),
                "foto_produk" => $foto,
            ];

            $this->Produk_model->update('produk','id_produk',$id_produk, $data);
            $this->session->set_flashdata('flash', 'Diperbarui');
            redirect('produk');
        }
    }

    public function delete($id_produk){
        $data['produk'] = $this->Produk_model->delete('produk','id_produk',$id_produk);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('produk');
    }

    public function listProduk(){
        $data = $this->Produk_model->getAllData('produk');
        echo json_encode($data);
    }

}
