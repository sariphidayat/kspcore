<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/pembiayaan.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Pembiayaan extends Controller
{

    public function __construct()
    {
        parent::Controller();
        $this->authlib->cekcontr();
        $this->tema = $this->allfunct->getSetupapp('tema');
        $this->load->model('master_model', 'master');
        $this->load->model('admin_model', 'modelku');
        $this->nama_group = $this->authlib->getGroup($this->encrypt->decode($this->session->userdata('id_group')));
        $this->menuact = "param";
        $this->menuactsub = "pembiayaan";
    }

    //---- Pameter Pembiayaan
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');
        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Pembiayaan";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/pembiayaan.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/pembiayaan.php', $data);
        // $this->load->view('param/pembiayaan',$data);
    }
    
    //---- Fungsi level otorisasi
    public function isi_level()
    {
        $hasil = $this->db->select('jabatan_id,nama_jabatan')->get('jabatan')->result();
        $i=0;
        foreach ($hasil as $row) {
            $clr = (($i%2) == 0) ? '#fff' : '#EFF1F1';
            echo "<option style=\"background:".$clr."\" value=\"".$row->jabatan_id."\">".$row->nama_jabatan."</option>";
            $i++;
        }
    }
    //
    //---- Simpan produk
    public function saveproduk()
    {
        echo $this->master->simpan('master_grouppembiayaan', $this->allfunct->securePost());
    }

    //---- Edit produk
    public function editproduk()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $where = array('grouppembiayaan_id' => $id);
        echo $this->master->update("master_grouppembiayaan", $data, $where);
    }
    public function get_produk()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllPembiayaanProduk($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }
    public function get_pembiayaaninfo()
    {
        $objord = $this->input->post('id');
        $query = $this->db->query("SELECT * FROM master_pembiayaan WHERE kode_produk='".$objord."' order by pembiayaan_id");
        $data = $query->result_array();
        $hasil['alldata'] = $data;
        echo json_encode($hasil);
    }
    //---- Edit pembiayaan info
    public function editPembiayaan()
    {
        $data = $this->allfunct->securePost();
        $data['biaya_administrasi'] = $data['biaya_administrasi'];
        $id    = $data['kode_produk'];
        unset($data['kode_produk']);
        $where = array('kode_produk' => $id);
        echo $this->master->update("master_pembiayaan", $data, $where);
    }
}

/* End of file */
