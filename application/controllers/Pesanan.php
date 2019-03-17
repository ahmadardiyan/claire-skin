<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model('Pesanan_model');
        $this->load->model('Produk_model');
        $this->load->model("Admin_model");

        if (!$this->Admin_model->is_login()) {
            redirect('auth/login', 'refresh');
        }
    }

    public function index()
    {
        $data['judul'] = 'Data Pesanan';

        //cek apakah tombol cari diklik
        if (isset($_POST['cari-pesanan'])) {
            // var_dump('haha');

            //cek apakah tanggal sudah dimasukkan
            if (!empty($_POST['tanggal-awal']) && !empty($_POST['tanggal-akhir'])) {

                //cari data berdasarkan tanggal (like ... between ... )
                $tanggalAwal = strtotime($this->input->post('tanggal-awal'));
                $tanggalAkhir = strtotime($this->input->post('tanggal-akhir'));

                $tanggalAwal = date('Y-m-d', $tanggalAwal);
                $tanggalAkhir = date('Y-m-d', strtotime('+1 day', $tanggalAkhir)); //melebihkan 1 hari

                $data['pesanan'] = $this->Pesanan_model->getPesananByTimeCreated($tanggalAwal, $tanggalAkhir);
                $data['detail'] = $this->Pesanan_model->getAllDetailPesanan();
                // var_dump($data);
                // die();
                // $data['subtotal'] = $this->subtotalById($data['pesanan']['id_pesanan']);

                $this->load->view('templates/header_admin', $data);
                $this->load->view('pesanan/index', $data);
                $this->load->view('templates/footer_admin');

                //set session tanggal dipakai untuk print PDF
                $_SESSION['tanggalAwal'] = $tanggalAwal;
                $_SESSION['tanggalAkhir'] = $tanggalAkhir;

            } else {
                // var_dump('tangal kosong');

                //jika tanggal kosong tampilkan semua data dengan flashdata tanggal kosong
                $data['pesanan'] = $this->Pesanan_model->getAllPesanan();
                $data['detail'] = $this->Pesanan_model->getAllDetailPesanan();
                $this->session->set_flashdata('cari-pesanan', 'Tanggal pencarian');

                //unsset tanggal awal dan tanggal akhir
                unset($_SESSION['tanggalAwal'], $_SESSION['tanggalAkhir']);

                // $this->load->view('templates/header_admin');
                // $this->load->view('pesanan/index', $data);
                // $this->load->view('templates/footer_admin');
                redirect('pesanan');
            }

        } else {
            $data['pesanan'] = $this->Pesanan_model->getAllPesanan();
            $data['detail'] = $this->Pesanan_model->getAllDetailPesanan();
            // var_dump($data['pesanan']);
            // die();

            $this->load->view('templates/header_admin', $data);
            $this->load->view('pesanan/index', $data);
            $this->load->view('templates/footer_admin');
        }
    }

    // public function index()
    // {
    //     $data['pesanan'] = $this->Pesanan_model->getAllPesanan();

    //     $this->load->view('templates/header_admin');
    //     $this->load->view('pesanan/index', $data);
    //     $this->load->view('templates/footer_admin');
    // }

    public function create()
    {
        $data['judul'] = 'Tambah Data Pesanan';

        $data['produk'] = $this->Produk_model->getAllData('produk');

        $this->form_validation->set_rules('nama', 'nama pemesan', 'required');
        $this->form_validation->set_rules('phone', 'nomor telephone', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required');
        $this->form_validation->set_rules('kabupaten', 'kabupaten', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('produk[]', 'produk', 'required');
        $this->form_validation->set_rules('jumlah_produk[]', 'jumlah produk', 'required|numeric');
        $this->form_validation->set_rules('jasa_pengiriman', 'jasa pengiriman', 'required');

        if ($this->form_validation->run() === false) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('pesanan/create', $data);
            $this->load->view('templates/footer_admin');
        } else {
            // $x = $this->input->post('jumlah_input_produk');
            // var_dump($x);
            // // die();
            // var_dump($_POST);
            // die();

            //membuat id_pesanan
            $kodeDepan = 'PSN' . date('ymd');

            $time = date('Y-m-d');

            $idMax = $this->Pesanan_model->maxId('id_pesanan', $time, 'pesanan');

            $kodeBelakang = (int) substr($idMax, 9, 5);
            $kodeBelakang++;

            $idPesanan = $kodeDepan . sprintf('%04s', $kodeBelakang);

            //create data ke tabel pesanan
            $data = [
                'id_pesanan' => $idPesanan,
                'username' => $this->input->post('nama'),
                'phone' => $this->input->post('phone'),
                'alamat' => $this->input->post('alamat'),
                'id_kec' => $this->input->post('kecamatan'),
                'id_kab' => $this->input->post('kabupaten'),
                'id_prov' => $this->input->post('provinsi'),
                'status' => '0',
                'jasa_pengiriman' => $this->input->post('jasa_pengiriman'),
            ];

            $this->Pesanan_model->createData('pesanan', $data);

            //create data ke detail pesanan
            $produk = $this->input->post('produk');

            foreach ($produk as $key => $p):
                // for ($i = 0; $i <= $x; $i++):

                //membuat id_detail_pesanan
                $kodeDepan = 'DTL' . date('ymd');

                $time = date('Y-m-d');

                $idMax = $this->Pesanan_model->maxId('id_detail_pesanan', $time, 'detail_pesanan');

                $kodeBelakang = (int) substr($idMax, 9, 5);
                $kodeBelakang++;

                $idDetailPesanan = $kodeDepan . sprintf('%04s', $kodeBelakang);

                //ambil data post
                $namaProduk = $this->input->post('produk');
                $jumlahProduk = $this->input->post('jumlah_produk');
                $data = [
                    'id_detail_pesanan' => $idDetailPesanan,
                    'id_pesanan' => $idPesanan,
                    'nama_produk' => $p,
                    'jumlah_produk' => $jumlahProduk[$key],
                    'total_harga' => $jumlahProduk[$key] * 300000,
                ];

                $this->Pesanan_model->createData('detail_pesanan', $data);
            endforeach;
            // die();

            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('pesanan');
        }
    }

    public function detail($id_pesanan)
    {
        $data['judul'] = 'Detail Data Pesanan';
        $data['pesanan'] = $this->Pesanan_model->getPesanan('id_pesanan', $id_pesanan);
        $data['detail'] = $this->Pesanan_model->getDetailPesanan($id_pesanan);

        $this->load->view('templates/header_admin', $data);
        $this->load->view('pesanan/detail', $data);
        $this->load->view('templates/footer_admin');
    }

    public function delete($id_pesanan)
    {
        $this->Pesanan_model->deleteData('pesanan', 'id_pesanan', $id_pesanan);
        $this->Pesanan_model->deleteData('detail_pesanan', 'id_pesanan', $id_pesanan);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('pesanan');
    }

    public function cetakPesanan($id_pesanan)
    {
        $data['pesanan'] = $this->Pesanan_model->getPesanan('id_pesanan', $id_pesanan);
        $data['detail'] = $this->Pesanan_model->getDetailPesanan($id_pesanan);
        $this->load->view('pesanan/cetak_pesanan', $data);
    }

    public function cetakPesananByTime()
    {
        //jika session tanggal kosong cetak semua pesanan
        if (isset($_SESSION['tanggalAwal']) && isset($_SESSION['tanggalAkhir'])) {

            // var_dump('isi');
            // die();

            $data['pesanan'] = $this->Pesanan_model->getPesananByTimeCreated($_SESSION['tanggalAwal'], $_SESSION['tanggalAkhir']);
            $data['detail'] = $this->Pesanan_model->getAllDetailPesanan();

            $this->load->view('pesanan/cetak_semua_pesanan', $data);

        } else {

            $data['pesanan'] = $this->Pesanan_model->getAllPesanan();
            $data['detail'] = $this->Pesanan_model->getAllDetailPesanan();

            $this->load->view('pesanan/cetak_semua_pesanan', $data);
            // var_dump('isi');
            // die();
        }
    }

    public function konfirmasi($id_pesanan)
    {

        $this->Pesanan_model->konfirmasi($id_pesanan);
        $this->session->set_flashdata('flash', 'Dikonfirmasi');
        redirect('pesanan');
    }

    // public function subtotalById($id_pesanan){
    //     $query = $this->Pesanan_model->getDetailPesanan($id_pesanan);
    //     $subtotal = 0;
    //     foreach ($query as $q) {
    //         $subtotal += $q['total_harga'];
    //     }

    //     return $subtotal;
    //     // echo $subtotal;
    // }

}
