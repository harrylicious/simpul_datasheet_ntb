

<!--Counter Inbox-->
<!DOCTYPE html>
<html>

<head>

  <?php 
  $this->load->view('admin/parsial/v_head'); ?>

</head>


<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    <?php
    $this->load->view('admin/parsial/v_header');
  ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <?php
    $this->load->view('admin/parsial/v_sidebar');
    ?>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        Tambah Data Usaha
          <small></small>
        </h1>
      </section>

      <!-- Main content -->
         <!-- Main content -->
    <section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">

        

        <h3 class="profile-username text-center"><?php  ?></h3>

        
 
        <ul class="list-group list-group-unbordered">
          <li class="list-group-item" style="height: 80px">
            <b>Nama Unit  : </b> <a class="pull-right"><strong><?= $_SESSION['nama_lengkap']; ?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Bidang :</b> <a class="pull-right"><strong><?= $_SESSION['bidang']; ?></strong></a>
          </li>
          <li class="list-group-item">
            <b>Terakhir Update: </b><?php  echo last_updated() != "" ? last_updated() : 0 ?><a class="pull-right"></a>
          </li>
        </ul>

        <a href="<?= base_url('admin/usaha/tambah/'.$_SESSION['idadmin']); ?>" class="btn btn-primary btn-block"><b>Segarkan</b></a>
        
        <button class="btn btn-success  btn-block"  data-toggle="modal" data-target="#modal-default"><i class="fa fa-upload"> Import data</i></button>
        <a class="btn btn-success  btn-block" href="<?= base_url('assets/uploads/template/template-tambah.xls'); ?>" download="template-tambah.xls"><span class="fa fa-arrow-down"></span> Download template</a>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->

    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Usaha</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">

            <div class="box-header with-border">
                <h3 class="box-title">Usaha</h3>

                </div>
                <div class="box-body">
                <div class="col-sm-12">
                    <h5 class="info-text"></h5>
                </div>

                <form action="<?= base_url('admin/usaha/save_data'); ?>" method="post">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label>Nama Usaha</label>
                                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha"  required>
                            </div>
                        </div>

                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label>Tahun Berdiri </label>
                                <input type="text" class="form-control" id="th_berdiri" name="th_berdiri" placeholder="Tahun Berdiri"  required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No. Izin</label>
                                <input type="text" class="form-control" id="no_izin" name="no_izin" placeholder="No. Izin" >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Pimpinan</label>
                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan" placeholder="Nama Pimpinan" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>NIK Pimpinan</label>
                                <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sektor Usaha</label>
                                    <select class="form-control" name="sektor_usaha" required>
                                        <option value="">- PILIH -</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_sektor_usaha as $row) : 
                                        ?>
                                            <option value="<?= $row->nama_sektor; ?>"><?= $row->nama_sektor; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sub Sektor Usaha</label>
                                    <select class="form-control" name="sub_sektor_usaha" required>
                                        <option value="">- PILIH -</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_sub_sektor_usaha as $row) : 
                                        ?>
                                            <option value="<?= $row->nama_sub; ?>"><?= $row->nama_sub; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"  required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Desa</label>
                                    <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa"  required>
                                </div>
                            </div>
                    </div>

                    <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan"  required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text" class="form-control" id="kabupaten" name="kabupaten" placeholder="Kabupaten"  required>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Komoditas</label>
                                    <input type="text" class="form-control" id="komoditas" name="komoditas" placeholder="Komoditas"  required>
                                </div>
                            </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jumlah Karyawan</label>
                                <input type="text" class="form-control" id="jml_karyawan" name="jml_karyawan" placeholder="Jumlah Karyawan" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kapasitas Produksi</label>
                                <input type="text" class="form-control" id="kapasitas_produksi" name="kapasitas_produksi" placeholder="Kapasitas Produksi" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Periode Produksi</label>
                                <input type="text" class="form-control" id="periode_produksi" name="periode_produksi" placeholder="Periode Produksi">
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Kepemilikan Usaha</label>
                                    <select class="form-control" name="status_kepemilikan">
                                        <option value="">- PILIH -</option>
                                        <option value="Pribadi">Pribadi</option>
                                        <option value="Kelompok">Kelompok</option>
                                        <option value="Pengelola">Pengelola</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Status Kepemilikan Tempat</label>
                                    <select class="form-control" name="status_kepemilikan_tempat">
                                        <option value="">- PILIH -</option>
                                        <option value="Pribadi">Pribadi</option>
                                        <option value="Kelompok">Kelompok</option>
                                        <option value="Pengelola">Pengelola</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Metode Pemasaran</label>
                                    <select class="form-control" name="metode_pemasaran" required>
                                        <option value="<?= $data['metode_pemasaran']; ?>"><?= $data['metode_pemasaran']; ?></option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Luas Lahan</label>
                                <input type="text" class="form-control" id="luas_lahan" name="luas_lahan" placeholder="Luas Lahan">
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Skala Pemasaran</label>
                                    <select class="form-control" name="skala_pasar" required>
                                        <option value="<?= $data['skala_pasar']; ?>"><?= $data['skala_pasar']; ?></option>
                                        <option value="Kecamatan">Kecamatan</option>
                                        <option value="Kabupaten">Kabupaten</option>
                                        <option value="Provinsi">Provinsi</option>
                                        <option value="Nasional">Nasional</option>
                                        <option value="Internasional">Internasional</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Periode Tanam</label>
                                <input type="text" class="form-control" id="periode_tanam" name="periode_tanam" placeholder="Periode Tanam" >
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Telpon</label>
                                <input type="text" class="form-control" id="telpon" name="telpon" placeholder="Telpon"  required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div> 

                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Sumber Modal</label>
                                    <select class="form-control" name="sumber_modal" required>
                                        <option value="">- PILIH -</option>
                                        <?php
                                        $no = 1;
                                        foreach ($data_sumber_modal as $row) : 
                                        ?>
                                            <option value="<?= $row->keterangan; ?>"><?= $row->keterangan; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
               
            </div>
        

        <!-- /.tab-pane -->

    <!-- /.nav-tabs-custom -->
  </div>
  
  <!-- /.col -->
</div>
<!-- /.row -->

</section>
    <!-- /.content -->
</div>
    <!-- /.content-wrapper -->
    <?php $this->load->view('admin/parsial/v_footer')?>



  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>
  
  <!-- FastClick -->
  <script src="<?php echo base_url().'assets/plugins/fastclick/fastclick.js'?>"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url().'assets/dist/js/app.min.js'?>"></script>

</body>
</html> 



<!-- modal -->
<div class="modal fade" id="modal-default">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-toggle="modal" data-target="#modal-default" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Unggah Data</h4>
        </div>
        <form method="post" action="<?php echo base_url('admin/usaha/import_excel'); ?>" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="file" class="btn" name="file" required>
                NB: file harus bertype xls|csv
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Unggah</button>
            </div>
        </form>
    </div> 
</div>
</div>




