<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $data['orders'] = $this->Madmin->get_all_data('tbl_order')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/pesanan/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function kelola_pesanan()
    {
        $data['orders'] = $this->Madmin->get_all_data('tbl_order')->result();
        $data['kategori'] = $this->Madmin->get_all_data('tbl_kategori')->result();
        $this->load->view('home/layout/header', $data);
        $this->load->view('home/toko/kelola_pesanan', $data);
        $this->load->view('home/layout/footer');
    }


    public function ubah_status($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $dataWhere = array('idOrder' => $id);
        $result = $this->Madmin->get_by_id('tbl_order', $dataWhere)->row_object();
        $status = $result->statusOrder;

        $dataUpdate = array();
        if ($status == "Belum Bayar") {
            $dataUpdate['statusOrder'] = "Dikemas";
        } elseif ($status == "Dikemas") {
            $dataUpdate['statusOrder'] = "Dikirim";
            if (empty($result->nomorResi)) {
                $dataUpdate['nomorResi'] = $this->Madmin->generate_resi();
            }
        } elseif ($status == "Dikirim") {
            $dataUpdate['statusOrder'] = "Diterima";
        } elseif ($status == "Diterima") {
            $dataUpdate['statusOrder'] = "Selesai";
        } elseif ($status == "Selesai") {
            $dataUpdate['statusOrder'] = "Dibatalkan";
        } else {
            $dataUpdate['statusOrder'] = "Belum Bayar";
        }

        $this->Madmin->update('tbl_order', $dataUpdate, 'idOrder', $id);
        redirect('order/kelola_pesanan');
    }

    public function delete($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('adminpanel');
        }
        $this->Madmin->delete('tbl_order', 'idOrder', $id);
        redirect('order/kelola_pesanan');
    }
}
