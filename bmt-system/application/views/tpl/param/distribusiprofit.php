{% extends "tpl/tpl1.php" %}

        {% block breadcrumb %}
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="..">Home</a> 
								<i class="icon-angle-right"></i>
							</li>
							<li><a href="#">Parameter Distribusi Profit</a></li>
						</ul>
        {% endblock breadcrumb %}

        {% block page %}
				<div id="page" class="dashboard">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable tabbable-custom boxless">
                                <ul class="nav nav-tabs">
                                   <li class="active"><a href="#tabs-1" data-toggle="tab">Akun Perhimpunan dana</a></li>
                                   <li><a href="#tabs-2" data-toggle="tab">Akun Pendapatan dana</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Akun Perhimpunan dana</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_perhimpunan">
{% set option = [{'nama_produk': 'Nama Produk'}] %}
{% set tombol = '<button id="addperhimpunan" class="btn btn-success">Tambah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode_produk', '20%', 'Kelompok Perhimpunan'],
    ['', '20%', 'Nama Produk'],
    ['', '30%', 'Akun'],
    ['', '10%', 'Manage'],
    ['perhimpunan_id', '5%', 'ID'],
]
%}

{% embed "app/filter_layout.php" %}{% endembed %}
{% embed "app/table_layout.php" %}{% endembed %}
{% embed "app/paging_layout.php" %}{% endembed %}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2">
                                        <div class="widget box blue">
                                            <div class="widget-title">
                                               <h4><i class="icon-reorder"></i>Akun Pendapatan dana</h4>
                                            </div>
                                            <br>
                                            <div class="row-fluid">
                                                <div id="table_pendapatan">
{% set option = [{'nama_produk': 'Nama Produk'}] %}
{% set tombol = '<button id="addpendapatan" class="btn btn-success">Tambah <i class="icon-plus"></i></button>' %}

{%
set tabel_head = [
    ['', '3%', 'No'],
    ['kode_produk', '20%', 'Kelompok Pendapatan'],
    ['', '20%', 'Nama Produk'],
    ['', '30%', 'Akun'],
    ['', '10%', 'Manage'],
    ['akunpendapatan_id', '5%', 'ID'],
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
			</div>	
        {% endblock page %}

{% block footer %}
    {% embed "app/footer.php" %}{% endembed %}
    {% block footer_dialog %}
<!-- Dialog Area -->
<div id="dialog-hapus-perhimpunan">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-hapus">
      <br /><h3><img src="assets/images/question.png">&nbsp;Anda yakin <span class="phps"></span> akan dihapus ?</h3>
</div>
<div id="dialog-perhimpunan">
      <form id="form_perhimpunan" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="type_kolekbilitas">Kelompok :</label>
		      <input class="inp" name="kelompok" type="text"/>
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Nama produk :</label>
		      <input class="inp" name="nama_produk" type="text" />
		    </div>
            <div class="fm-req">
		      <label for="jangka_waktu">Akun :</label>
              <select name="akun" id="jurnal1"></select>
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>
<div id="dialog-pendapatan">
      <form id="form_pendapatan" method="post">
        <fieldset>
		    <div class="fm-req">
		      <label for="type_kolekbilitas">Kelompok :</label>
		      <input class="inp" name="kelompok" type="text"/>
		    </div>
		    <div class="fm-req">
		      <label for="jangka_waktu">Nama produk :</label>
		      <input class="inp" name="nama_produk" type="text"/>
		    </div>
            <div class="fm-req">
		      <label for="jangka_waktu">Akun :</label>
              <select name="akun" id="jurnal2"></select>
		    </div>
		    </fieldset>
		    <p class="infonya"></p>
    </form>
</div>

    {% endblock footer_dialog %}   	
{% endblock footer %}
