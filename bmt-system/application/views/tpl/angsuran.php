{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Transaksi Umum</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Setor Angsuran</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Search</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <form class="form-horizontal" id="form_angsuran" method="post">
                                        <div class="span6 ">
                                            <div class="control-group fm-req">
                                                <label class="control-label">Tanggal Transaksi</label>
                                                <div class="controls">
                                                    <input name="tgl_transaksi" tabindex="0" type="text" size="16" class="inp m-wrap m-ctrl-medium date-picker input-small">
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Jurnal <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_jurnal" tabindex="1" type="text" class="inp input-small">
                                                    <input name="id_jurnal" type="hidden">
                                                    <input name="gl_administrasi" type="hidden">
                                                    <input name="gl_marginditangguhkan" type="hidden">
                                                    <input name="gl_pendapatanmargin" type="hidden">
                                                    <input name="gl_diskon" type="hidden">
                                                    <input name="gl_pendapatanbagihasil" type="hidden">
                                                    <input name="gl_bonusalqardh" type="hidden">
                                                    <input name="gl_pendapatanbagihasilmusy" type="hidden">
                                                    <input name="gl_activaijarah" type="hidden">
                                                    <input name="gl_pendapatanijarah" type="hidden">
                                                    <input name="gl_asetistishna" type="hidden">
                                                    <input name="gl_pendapatanmarjinistishna" type="hidden">
                                                    <input name="gl_diskonistishna" type="hidden">
                                                    <input name="gl_pendapatankeuntungansalam" type="hidden">
                                                    <input name="pembiayaandetail_id" type="hidden">
                                                    <input name="jenis_pembiayaan" type="hidden">
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Ref <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_ref" id="nomor_ref" tabindex="2" type="text" class="inp input-small">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Wilayah Kerja</label>
                                                <div class="controls">
                                                    <select tabindex="3" class="inp input-large" name="wilayah_id"></select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="span6 ">
                                            <div class="control-group fm-req">
                                                <label class="control-label">No. Rekening <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="nomor_rekening" id="nomor_rekening" tabindex="4" type="text" class="inp input-large"> 
                                                        <a class="btn searchact"><i class="icon-search"></i></a>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Nama</label>
                                                <div class="controls">
                                                    <input name="nama" id="nama" tabindex="5" type="text" class="input-large">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Alamat</label>
                                                <div class="controls">
                                                    <input name="alamat" tabindex="6" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Kota / Kode pos</label>
                                                <div class="controls">
                                                    <input name="kota" tabindex="7" type="text" class="input-large">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="span6">
                                            <hr>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Jumlah <span class="required">*</span></label>
                                                <div class="controls">
                                                    <input name="jumlah" tabindex="9" type="text" class="input-large" style="text-align: right;">
                                                    <input name="pokok" id="pokok" type="hidden">
                                                    <input name="margin" id="margin" type="hidden">
                                                    
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label"></label>
                                                <div class="controls">
                                                    <span class="badge badge-inverse jumlahket"><b></b></span>
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Pokok</label>
                                                <div class="controls">
                                                    <input name="pokokinfo" id="pokokinfo" type="text" class="input-large" style="text-align: right;">
                                                </div>
                                            </div>
                                            <div class="control-group fm-req">
                                                <label class="control-label">Margin</label>
                                                <div class="controls">
                                                    <input name="margininfo" id="margininfo" type="text" class="input-large" style="text-align: right;">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Terbilang : </label>
                                                <div class="controls">
                                                    <span id="terbilang" class="alert-info"></span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label">Keterangan</label>
                                                <div class="controls">
                                                    <input name="ket" tabindex="9" type="text" class="input-xlarge">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span5">
                                            <hr>
                                            <div class="widget box blue">
                                                <div class="widget-title">
                                                   <h4><i class="icon-reorder"></i> Setoran yang telah dilakukan</h4>
                                                </div>
                                                <table style="width:100%;color:#000" border="0" bgcolor="#fff">
                                                    <thead class="jdl">
                                                        <tr>
                                                            <td align=\"center\"><b>Kode</b></td>
                                                            <td align=\"center\"><b>Tanggal</b></td>
                                                            <td align=\"center\"><b>Jumlah</b></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tb_view"></tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="span11 ">
                                            <div class="form-actions">
                                                <button class="btn btn-primary" id="save_a"><i class="icon-ok"></i> Save</button>
                                            </div>
                                            <p class="infonya"></p>
                                         </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i> Data pembiayaan</h4>
                                            </div>
                                            <div id="table_datapembiayaan">

{% set option = [{'t2.nama': 'Nama Nasabah'}, {'t2.nomor_rekening': 'Nomor Rekening'}] %}

{%
set tabel_head = [
    ['', '5%', 'No'],
    ['nomor_nasabah', '10%', 'Nomor Rekening'],
    ['', '18%', 'Nama Nasabah'],
    ['', '20%', 'Jenis Pembiayaan'],
    ['', '15%', 'Jumlah Pengajuan'],
    ['', '10%', 'Tgl Pengajuan'],
    ['', '5%', 'Manage'],
    ['pembiayaan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
        {% endblock page %}
