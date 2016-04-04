<?php
/*
 * Aplikasi AKSIOMA (Aplikasi Keuangan Mikro Masyarakat Ekonomi Syariah) ver. 1.0
 * Copyright (c) 2014
 *
 * file   : param/pegawai.php
 * author : Edi Suwoto S.Komp
 * email  : edi.suwoto@gmail.com
 */
/*----------------------------------------------------------*/
class Pegawai extends Controller
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

        $this->menuactsub = "pegawai";

    }

    //---- Halaman Admin Pegawai
    public function index()
    {
        $data['idpeg'] = $this->session->userdata('username');

        $data['menunya'] = $this->authlib->loadMenu('0', $this->nama_group, $this->menuact, $this->menuactsub);
        $data['tema'] = $this->tema;
        $data['page_title'] = "Parameter Pegawai";

        $assets_path = $this->config->item('assets_path');

        $data['css_links'] = get_css(
            array(
            $assets_path .'/css/autocomplete.css',
            )
        );
        $data['js_links'] = get_js(
            array(
            $assets_path .'/js/param/pegawai.js',
            $assets_path .'/js/jq/jquery.autocomplete.js',
            )
        );

        echo $this->twig_lib->render('tpl/param/pegawai.php', $data);
    }
    
    /*
    *  --------------------- PEGAWAI -----------------------------------------
    */

    //---- Get Kategori
    public function isi_jabatan()
    {
        $hasil = $this->db->get('jabatan')->result();
        foreach ($hasil as $row) {
            echo "<option value=\"".$row->jabatan_id."\">".$row->nama_jabatan."</option>";
        }
    }

    //---- Simpan Kategori
    public function savePegawai()
    {
        $data = $this->allfunct->securePost();
        $data['tgl_lhr'] = $this->allfunct->revDate($data['tgl_lhr']);
        echo $this->master->simpan('pegawai', $data);
    }

    //---- Edit Kategori
    public function editPegawai()
    {
        $data = $this->allfunct->securePost();
        $id    = $data['id'];
        unset($data['id']);
        $data['tgl_lhr'] = $this->allfunct->revDate($data['tgl_lhr']);
        $where = array('pegawai_id' => $id);
        $nippeg = $this->db->select('nip')->get_where('pegawai', $where)->result_array();
        $realp = str_replace("\\", "/", realpath('assets/images/fotopegawai'));
        if (file_exists($realp."/".$nippeg[0]['nip'].".jpg")) {
             rename($realp."/".$nippeg[0]['nip'].".jpg", $realp."/".$data['nip'].".jpg");
        }
        echo $this->master->update("pegawai", $data, $where);
    }

    //---- Hapus Kategori
    public function delPegawai()
    {
        $where = array('pegawai_id' => $this->input->post('id'));
        $nippeg = $this->db->select('nip')->get_where('pegawai', $where)->result_array();
        $realp = str_replace("\\", "/", realpath('assets/images/fotopegawai'));
        if (file_exists($realp."/".$nippeg[0]['nip'].".jpg")) {
             unlink($realp."/".$nippeg[0]['nip'].".jpg");
        }
        echo $this->master->delete("pegawai", $where);
    }

    public function get_pegawai()
    {
        $ff            = $this->input->post('ff'); // Jenis Filter
        $if            = $this->input->post('if'); // Value Filter
        $fd            = $this->input->post('fd'); // Field Sorting
        $adsc        = $this->input->post('adsc'); // Asc or Desc
        $hal        = $this->input->post('hal'); // Offset Limit
        $juml        = $this->input->post('juml'); // Jumlah Limit
        $awal         = $juml * ($hal - 1);
        $alldata     = $this->modelku->getAllPegawai($ff, $if, $fd, $adsc, $awal, $juml);
        $records     = $alldata['numrow'];
        $page_num     = ceil($records / $juml);
        if ($records > 0) {
            $hasil['total'] = $page_num;
            foreach ($alldata['result'] as $key => $peg) {
                $alldata['result'][$key]['tgl_lhr'] = $this->allfunct->revDate($peg['tgl_lhr']);
            }
            $hasil['alldata'] = $alldata['result'];
               echo json_encode($hasil);
        }
    }

    //---- Upload Foto
    public function uploadfoto()
    {
        $config['upload_path'] = 'assets/images/fotopegawai/';
        $config['allowed_types'] = 'jpg';
        $config['max_size']    = '500';
        $config['max_width']  = '800';
        $config['max_height']  = '600';

        $this->load->library('upload', $config);

        if (! $this->upload->do_upload()) {
            echo  strip_tags($this->upload->display_errors());
        } else {
            $hasil = $this->upload->data();
            $fileasli = $hasil['full_path'];
            $nipfoto = $hasil['file_path'].$this->input->post('nipfoto').'.jpg';
            if (file_exists($nipfoto)) {
                unlink($nipfoto);
            }
            echo rename($fileasli, $nipfoto);
        }
    }

    //---- cetak detail pegawai
    public function cetakDetail()
    {
        $this->load->view('cetak/laporan');
    }
    /*

    *  --------------------- jabatan -----------------------------------------

    */

    //---- Simpan jabatan

    public function savejabatan()
    {

        echo $this->master->simpan('jabatan', $this->allfunct->securePost());

    }



    //---- Edit jabatan

    public function editjabatan()
    {

        $data = $this->allfunct->securePost();

        $id    = $data['id'];

        unset($data['id']);

        $where = array('jabatan_id' => $id);

        echo $this->master->update("jabatan", $data, $where);

    }



    //---- Hapus jabatan

    public function deljabatan()
    {

        $where = array('jabatan_id' => $this->input->post('id'));

        echo  $this->master->delete("jabatan", $where);

    }



    public function get_jabatan()
    {

        $ff            = $this->input->post('ff'); // Jenis Filter

        $if            = $this->input->post('if'); // Value Filter

        $fd            = $this->input->post('fd'); // Field Sorting

        $adsc        = $this->input->post('adsc'); // Asc or Desc

        $hal        = $this->input->post('hal'); // Offset Limit

        $juml        = $this->input->post('juml'); // Jumlah Limit

        $awal         = $juml * ($hal - 1);

        $alldata     = $this->modelku->getAllJabatan($ff, $if, $fd, $adsc, $awal, $juml);

        $records     = $alldata['numrow'];

        $page_num     = ceil($records / $juml);

        if ($records > 0) {

            $hasil['total'] = $page_num;

            $hasil['alldata'] = $alldata['result'];

               echo json_encode($hasil);

        }

    }

    

    /*

    *  --------------------- otoritas -----------------------------------------

    */

    //---- Simpan otoritas

    public function saveotoritas()
    {

        echo $this->master->simpan('master_otoritas', $this->allfunct->securePost());

    }



    //---- Edit otoritas

    public function editotoritas()
    {

        $data = $this->allfunct->securePost();

        $id    = $data['id'];

        unset($data['id']);

        $where = array('otoritas_id' => $id);

        echo $this->master->update("master_otoritas", $data, $where);

    }



    //---- Hapus otoritas

    public function delotoritas()
    {

        $where = array('otoritas_id' => $this->input->post('id'));

        echo  $this->master->delete("master_otoritas", $where);

    }



    public function get_otoritas()
    {

        $ff            = $this->input->post('ff'); // Jenis Filter

        $if            = $this->input->post('if'); // Value Filter

        $fd            = $this->input->post('fd'); // Field Sorting

        $adsc        = $this->input->post('adsc'); // Asc or Desc

        $hal        = $this->input->post('hal'); // Offset Limit

        $juml        = $this->input->post('juml'); // Jumlah Limit

        $awal         = $juml * ($hal - 1);

        $alldata     = $this->modelku->getAllOtoritas($ff, $if, $fd, $adsc, $awal, $juml);

        $records     = $alldata['numrow'];

        $page_num     = ceil($records / $juml);

        if ($records > 0) {

            $hasil['total'] = $page_num;

            $hasil['alldata'] = $alldata['result'];

               echo json_encode($hasil);

        }

    }
}

/* End of file */
